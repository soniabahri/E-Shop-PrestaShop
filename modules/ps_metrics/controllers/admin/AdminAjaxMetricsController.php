<?php

/**
 * Copyright since 2007 PrestaShop SA and Contributors
 * PrestaShop is an International Registered Trademark & Property of PrestaShop SA
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License version 3.0
 * that is bundled with this package in the file LICENSE.md.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * @author    PrestaShop SA and Contributors <contact@prestashop.com>
 * @copyright Since 2007 PrestaShop SA and Contributors
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License version 3.0
 */

use PrestaShop\Module\Ps_metrics\Adapter\LinkAdapter;
use PrestaShop\Module\Ps_metrics\Helper\JsonHelper;

class AdminAjaxMetricsController extends ModuleAdminController
{
    /**
     * @var Ps_metrics
     */
    public $module;

    /**
     * Load JsonHelper to avoid jsonEncode issues on AjaxDie
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Generate all products BO urls from list of products for top 10
     *
     * @return void
     */
    public function ajaxProcessRetrieveProductsLinksFromList()
    {
        /** @var JsonHelper $jsonHelper */
        $jsonHelper = $this->module->getService('ps_metrics.helper.json');

        /** @var LinkAdapter $linkAdapter */
        $linkAdapter = $this->module->getService('ps_metrics.adapter.link');

        $products = $jsonHelper->jsonDecode(Tools::getValue('products', '{}'));
        $links = [];

        foreach ($products as $product) {
            $links[$product] = $linkAdapter->getAdminLink('AdminProducts', true, ['id_product' => $product], ['id_product' => $product, 'updateproduct' => 1]) . '#tab-step3';
        }

        $this->ajaxDie($jsonHelper->jsonEncode($links));
    }
}
