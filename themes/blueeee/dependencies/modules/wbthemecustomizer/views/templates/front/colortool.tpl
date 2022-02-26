{*
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
*  @copyright  2017-2018 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*
*  MODIFIED BY MYPRESTA.EU FOR PRESTASHOP 1.7 PURPOSES !
*
*}
<div class="wb-demo-wrap">
    <h2 class="wb-demo-title">{l s='Theme Settings' mod='wbthemecustomizer'}</h2>
    <div class="wb-demo-option">
        <div class="cl-wrapper">
            <div class="cl-container">
                <div class="cl-table">
                    <div class="cl-tr cl-tr-mode-label">{l s='Mode Layout' mod='wbthemecustomizer'}</div>
                    <div class="cl-tr cl-tr-mode">
                        <div class="cl-td-l"><input id="mode_box" type="radio" name="mode_css" value="box"/><label for="mode_box">{l s='Box' mod='wbthemecustomizer'}</label></div>
                        <div class="cl-td-r"><input id="mode_full" type="radio" name="mode_css" value="wide"/><label for="mode_full">{l s='Wide' mod='wbthemecustomizer'}</label></div>
                    </div>
                    <div class="cl-tr cl-tr-style-label">{l s='Theme color' mod='wbthemecustomizer'}</div>
                    <!-- 1 -->
                    <div class="cl-tr cl-tr-style">
                        <div class="cl-td-l cl-td-layout cl-td-layout1"><a href="javascript:void(0)" id="F2991D_222222" title="Strong pink_dark gray"><span class="tcbrown"></span><span class="tceb5f60"></span>{l s='Skin 1' mod='wbthemecustomizer'}</a></div>
                    </div>
                    <!-- 2 -->
                     <div class="cl-tr cl-tr-style">
                        <div class="cl-td-r cl-td-layout cl-td-layout2"><a href="javascript:void(0)" id="ED2B5C_222222" title="lime green_Vivid yellow"><span class="tcred"></span><span class="tcyellow"></span>{l s='Skin 2' mod='wbthemecustomizer'}</a></div>
                    </div>
                <!-- 3 -->
                    <div class="cl-tr cl-tr-style">
                        <div class="cl-td-l cl-td-layout cl-td-layout3"><a href="javascript:void(0)" id="6dab3c_222222" title="Strong cyan_dark blue"><span class="tcorange"></span><span class="tcblue2"></span>{l s='Skin 3' mod='wbthemecustomizer'}</a></div>
                    </div>
                    <!-- 4 -->
                     <div class="cl-tr cl-tr-style">
                        <div class="cl-td-r cl-td-layout cl-td-layout4"><a href="javascript:void(0)" id="1bbc9b_222222" title="soft red_grayish cyan."><span class="tcblue3"></span><span class="tcblack"></span>{l s='Skin 4' mod='wbthemecustomizer'}</a></div>
                    </div>
                    <!-- 5 -->
                    <div class="cl-tr cl-tr-style">
                        <div class="cl-td-l cl-td-layout cl-td-layout5"><a href="javascript:void(0)" id="E88766_222222" title="Bright pink_dark blue"><span class="tcpink"></span><span class="tcblue"></span>{l s='Skin 5' mod='wbthemecustomizer'}</a></div>
                    </div>
                    <!-- 6 -->
                     <div class="cl-tr cl-tr-style">
                        <div class="cl-td-r cl-td-layout cl-td-layout6"><a href="javascript:void(0)" id="1e8178_222222" title="moderate blue_orange."><span class="tcgreen"></span><span class="tcgray"></span>{l s='Skin 6' mod='wbthemecustomizer'}</a></div>
                    </div>
                    <div class="label_chosen">
                        <div class="cl-tr cl-tr-style-label">{l s='Choose your colors' mod='wbthemecustomizer'}</div>
                    </div>
                    <div class="cl-tr cl-tr-background">
                        <div class="cl-td-l">{l s='Background Color' mod='wbthemecustomizer'}:</div>
                        <div class="cl-td-r">
                                <div class="colorSelector cl-tool" id="backgroundColor">
                                        <div style="background-color: {$WB_mainColorScheme}"></div>
                                </div>
                        </div>
                    </div>
                    <div class="cl-tr cl-tr-link">
                        <div class="cl-td-l">{l s='Active Color' mod='wbthemecustomizer'}:</div>
                        <div class="cl-td-r">
                                <div class="colorSelector cl-tool" id="hoverColor">
                                        <div style="background-color: {$WB_activeColorScheme}"></div>
                                </div>
                        </div>
                    </div>
                    <div class="cl-tr cl-row-reset">
                        <span class="cl-reset btn btn-primary">{l s='Reset' mod='wbthemecustomizer'}</span>
                    </div>
                </div>
            </div>		
        </div>
    </div>
    <div class="control inactive"><a href="javascript:void(0)"></a></div>
</div>