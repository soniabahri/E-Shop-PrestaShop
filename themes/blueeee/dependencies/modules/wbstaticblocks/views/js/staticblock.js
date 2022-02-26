/*
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


$(document).ready(function(){
    
    $('#name_module').live('change',function(){
        var module_id = $(this).val();
        get_hook_by_module_id(module_id);
    })
    
    function get_hook_by_module_id(module_id) {
        $.ajax({
            type: 'POST',
            url:'../modules/posstaticblocks/ajax.php',
            data: 'module_id='+module_id,
            dataType: 'json',
            success: function(json) {
                var obj = JSON.parse(json);
                var option = "";
                $.each(obj, function (index, value) {
                    var hook_id = value.id_hook
                    var hook_name = value.name;
                    option +="<option value='"+hook_id+"'>"+hook_name+"</option>";
                })
                if(option!=""){
                    $('#hook_module').html(option);
                }else {
                    option = "<option value=0>No Hook</option>";
                    $('#hook_module').html(option);
                }
            }
        });
    }
    
    if( $( "#active_off_module" ).attr('checked')=='checked'){

        $('#name_module').attr('disabled','disabled');
        $('#hook_module').attr('disabled','disabled');
    }
            
    $( "input[name$='insert_module']" ).bind('click',function(){
        var insert_module = $(this).val();
        if(insert_module==0) {
            $('#name_module').attr('disabled','disabled');
            $('#hook_module').attr('disabled','disabled');
        } else {
            $('#name_module').removeAttr('disabled');
            $('#hook_module').removeAttr('disabled');
        }
    })
    
    var module_id = $('#name_module').val();
        get_hook_by_module_id(module_id);
    var option = "<option value=0>No Hook</option>";
    //$('#hook_module').html(option);


});
