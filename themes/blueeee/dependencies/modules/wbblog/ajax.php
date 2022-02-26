<?php
/**
* 2007-2018 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

//session_start();
require_once(dirname(__FILE__).'../../../config/config.inc.php');
require_once(dirname(__FILE__).'../../../init.php');
require_once(_PS_MODULE_DIR_.'wbblog/wbblog.php');
    $commentobj = new wbcommentclass();
    $results = array();
    if (Tools::getValue('name') !=false && Tools::getValue('name') !=null) {
        $commentobj->name = Tools::getValue('name');
    } else {
        $results['error'][] = Context::getContext()->getTranslator()->trans(
            "Name Is Required",
            array(),
            'Modules.wbblog.Admin'
        );
    }
    if (Tools::getValue('email') !=false &&
        Tools::getValue('email') !=null &&
        Validate::isEmail(Tools::getValue('email'))) {
        $commentobj->email = Tools::getValue('email');
    } else {
        $results['error'][] = Context::getContext()->getTranslator()->trans(
            "Valid Email Address Is Required",
            array(),
            'Modules.wbblog.Admin'
        );
    }
    $commentobj->website = (Tools::getValue('website') !=false &&
        Tools::getValue('website') !=null) ? Tools::getValue('website') : '#';
    if (Tools::getValue('subject') !=false && Tools::getValue('subject') !=null) {
        $commentobj->subject = Tools::getValue('subject');
    } else {
        $results['error'][] = Context::getContext()->getTranslator()->trans(
            "Subject Is Required",
            array(),
            'Modules.wbblog.Admin'
        );
    }
    if (Tools::getValue('content') !=false && Tools::getValue('content') !=null) {
        $commentobj->content = Tools::getValue('content');
    } else {
        $results['error'][] = Context::getContext()->getTranslator()->trans(
            "Comment Content Is Required",
            array(),
            'Modules.wbblog.Admin'
        );
    }
    $commentobj->id_parent = (Tools::getValue('id_parent') !=false &&
        Tools::getValue('id_parent') !=null) ? (int)Tools::getValue('id_parent') : 0;
    $commentobj->id_post = (Tools::getValue('id_post') !=false &&
        Tools::getValue('id_post') !=null) ? (int)Tools::getValue('id_post') : 0;
    if ($results['error'] !=false && $results['error'] !=null) {
        die(Tools::jsonEncode($results));
    } else {
        $commentobj->id_customer    =   0;
        $commentobj->id_guest   =   0;
        $commentobj->position   =   0;
        $commentobj->uniqueid   =   'abc';
        $comment_approved = Configuration::get(wbblog::$wbblogshortname."comment_approved");
        if ($comment_approved == 1) {
            $commentobj->active =   1;
        } else {
            $commentobj->active =   1;
        }
        $commentobj->created    =   date("Y-m-d h:i:s");
        $commentobj->updated    =   date("Y-m-d h:i:s");
        if ($commentobj->add()) {
            $url = wbblog::wbBlogPostLink(array('id' => $commentobj->id_post));
            $name = $commentobj->name;
            $email = $commentobj->email;
            $comment = $commentobj->content;
            $comment_approved = Configuration::get(wbblog::$wbblogshortname."comment_approved");
            $name = Tools::stripslashes($name);
            if ($comment_approved == 1) {
                $body = 'You have Received a New Comment In Your Blog Post
                From ' . $name . '. Comment: ' . $comment . ' .Your Can Reply Here : ' . $url . '';
            } else {
                $body = 'You have Received a New Comment In Your Blog Post
                From ' . $name . '. Comment: ' . $comment . ' . This comment is waiting for approved.
                Please review this comment.';
            }
            $email = Tools::stripslashes($email);
            $comment = Tools::stripslashes($comment);
            if ($comment_approved == 1) {
                $subject = 'New Blog Comment Posted';
            } else {
                $subject = 'Pending Review : New Blog Comment';
            }
            $id_lang = (int) Configuration::get('PS_LANG_DEFAULT');
            $to = Configuration::get('PS_SHOP_EMAIL');
            $contactMessage = "
                            $comment
                            Name: $name
                            IP: " . ((version_compare(_PS_VERSION_, '1.3.0.0', '<')) ? $_SERVER['REMOTE_ADDR'] : Tools::getRemoteAddr());
            Mail::Send(
                $id_lang,
                'contact',
                $subject,
                array(
                    '{message}' => nl2br($body),
                    '{email}' => $email,
                ),
                $to,
                null,
                $email,
                $name
            );
            $results['success'][] = Context::getContext()->getTranslator()->trans(
                "Successfully Comment Added",
                array(),
                'Modules.wbblog.Admin'
            );
            $results['results'] = $commentobj;
            die(Tools::jsonEncode($results));
        } else {
            $results['error'][] = Context::getContext()->getTranslator()->trans(
                "Something Wrong Please Try Again ! ",
                array(),
                'Modules.wbblog.Admin'
            );
            die(Tools::jsonEncode($results));
        }
    }
