{**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License 3.0 (AFL-3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/AFL-3.0
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
 * @license   https://opensource.org/licenses/AFL-3.0 Academic Free License 3.0 (AFL-3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *}
<div id="_desktop_user_info" class="dropdown js-dropdown hidden-md-down d-inline-block">
    <div class="user-info d-inline-block" data-toggle="dropdown"><svg width="25px" height="25px"><use xlink:href="#huser"></use></svg></div>
    <ul class="dropdown-menu user-down dropdown-menu-right">
       {if $logged}
       <li>
      <a class="account" href="{$my_account_url}" title="{l s='View my customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
        <i class="fa fa-user logged"></i>
        {$customerName}
      </a>
      </li>
       <li>
      <a class="logout" href="{$logout_url}" rel="nofollow">
        <i class="fa fa-sign-out"></i>
        {l s='Sign out' d='Shop.Theme.Actions'}
      </a>
      </li>
    {else}
     <li> <a href="{$my_account_url}" title="{l s='Log in to your customer account' d='Shop.Theme.Customeraccount'}" rel="nofollow">
        <i class="fa fa-user"></i>
        {l s='Sign in' d='Shop.Theme.Actions'}
      </a></li>
    {/if}
    {hook h='displayComNav2'} {hook h='displayWbNav2'}
  </ul>
</div>
