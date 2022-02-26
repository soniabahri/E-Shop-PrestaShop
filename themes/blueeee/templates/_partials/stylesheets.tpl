{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
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
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
{foreach $stylesheets.external as $stylesheet}
  <link rel="stylesheet" href="{$stylesheet.uri}" type="text/css" media="{$stylesheet.media}">
{/foreach}

{foreach $stylesheets.inline as $stylesheet}
  <style>
    {$stylesheet.content}
  </style>
{/foreach}

{if isset($WB_customCSS) && $WB_customCSS}
<!-- Start Custom CSS -->
    <style>{$WB_customCSS}</style>
<!-- End Custom CSS -->
{/if}
{if isset($WB_JQUERY) && $WB_JQUERY}
<script type="text/javascript" src="{$WB_JQUERY}"></script>
{/if}
<script type="text/javascript">
	var LANG_RTL={$language.is_rtl};
	var langIso='{$language.language_code}';
	var baseUri='{$urls.base_url}';
{if (isset($WB_stickyMenu) && $WB_stickyMenu)}
	var WB_stickyMenu=true;
{/if}
{if (isset($WB_stickySearch) && $WB_stickySearch)}
	var WB_stickySearch=true;
{/if}
{if (isset($WB_stickyCart) && $WB_stickyCart)}
	var WB_stickyCart=true;
{/if}
{if (isset($WB_mainLayout) && $WB_mainLayout)}
	var WB_mainLayout='{$WB_mainLayout}';
{/if}
{if (isset($WB_enableCountdownTimer) && $WB_enableCountdownTimer)}
var WB_enableCountdownTimer=true;
{/if}
{if (isset($WB_mainLayout) && $WB_mainLayout)}
var WB_mainLayout='{$WB_mainLayout}';
{/if}


 </script>