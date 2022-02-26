/*
 * Custom code goes here.
 * A template should always ship with an empty custom.js
 */

 /* sticky header */
 $('.owl-next-thump').appendTo('.title-1');

if (($(document).width() >= 768) && ($(document).width() <= 991)){
$('#_mobile_currency_selector').appendTo('.user-down');
$('#_mobile_language_selector').appendTo('.user-down');
};

$(document).ready(function(){
if ($(document).width() >= 992){
$(window).scroll(function () {
    if ($(this).scrollTop() > 165) {
        $('#index .header-top').addClass('fixed fadeInDown animated');
    } else {
        $('#index .header-top').removeClass('fixed fadeInDown animated');
    }
});
};
});

/* serach */
function openSearch() {
    $('body').addClass("active-search");
    document.getElementById("search_toggle_desc").style.height = "auto";
    $('#search_toggle_desc').addClass("dblock");
    $('.search_query').attr('autofocus', 'autofocus').focus();
}
function closeSearch() {
    $('body').removeClass("active-search");
    document.getElementById("search_toggle_desc").style.height = "0";
    $('#search_toggle_desc').addClass("dnone");
    $('.search_query').attr('autofocus', 'autofocus').focus();
}

$(document).ready(function() {
    $('#xs-zoom').owlCarousel({
            loop: true,
            center: true,
            items: 1,
            margin: 0,
            nav: false,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            dots:true,
            autoplay:false,
            autoplayTimeout: 2000,
            smartSpeed: 450,
            responsive: {
              0: {
                items: 1
              },
              768: {
                items: 1
              },
              1170: {
                items: 1
              }
            }
        });
});


/* review */
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("#ratep").on('click', function(event) {

   
    if (this.hash !== "") {
     
      event.preventDefault();

      var hash = this.hash;
       $('#tab1').removeClass('active');
    $('#tab2').removeClass('active');
    $('#tab3').removeClass('active');
    $('#description').removeClass('active in');
    $('#attachments').removeClass('active in');
    $('#product-details').removeClass('active in');
    $("#rv").addClass("active");
    $("#rate").addClass("active in")
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1500, function(){
   
        window.location.hash = hash;
      });
    } 
  });
});


/* list grid view */
$(document).ready(function(){
    listGrid();
});
(function($){var ls=window.localStorage;var supported;if(typeof ls=='undefined'||typeof window.JSON=='undefined'){supported=false;}else{supported=true;}
$.totalStorage=function(key,value,options){return $.totalStorage.impl.init(key,value);}
$.totalStorage.setItem=function(key,value){return $.totalStorage.impl.setItem(key,value);}
$.totalStorage.getItem=function(key){return $.totalStorage.impl.getItem(key);}
$.totalStorage.getAll=function(){return $.totalStorage.impl.getAll();}
$.totalStorage.deleteItem=function(key){return $.totalStorage.impl.deleteItem(key);}
$.totalStorage.impl={init:function(key,value){if(typeof value!='undefined'){return this.setItem(key,value);}else{return this.getItem(key);}},setItem:function(key,value){if(!supported){try{$.cookie(key,value);return value;}catch(e){console.log('Local Storage not supported by this browser. Install the cookie plugin on your site to take advantage of the same functionality. You can get it at https://github.com/carhartl/jquery-cookie');}}
var saver=JSON.stringify(value);ls.setItem(key,saver);return this.parseResult(saver);},getItem:function(key){if(!supported){try{return this.parseResult($.cookie(key));}catch(e){return null;}}
return this.parseResult(ls.getItem(key));},deleteItem:function(key){if(!supported){try{$.cookie(key,null);return true;}catch(e){return false;}}
ls.removeItem(key);return true;},getAll:function(){var items=new Array();if(!supported){try{var pairs=document.cookie.split(";");for(var i=0;i<pairs.length;i++){var pair=pairs[i].split('=');var key=pair[0];items.push({key:key,value:this.parseResult($.cookie(key))});}}catch(e){return null;}}else{for(var i in ls){if(i.length){items.push({key:i,value:this.parseResult(ls.getItem(i))});}}}
return items;},parseResult:function(res){var ret;try{ret=JSON.parse(res);if(ret=='true'){ret=true;}
if(ret=='false'){ret=false;}
if(parseFloat(ret)==ret&&typeof ret!="object"){ret=parseFloat(ret);}}catch(e){}
return ret;}}})(jQuery);



function listGrid()
{
  var view = $.totalStorage('display');

  if (!view && (typeof displayList != 'undefined') && displayList)
    view = 'list';

  if (view && view != 'grid')
    display(view);
  else
    $('.display').find('#wbgrid').addClass('selected');

  $(document).on('click', '#wbgrid', function(e){
    e.preventDefault();
    display('grid');
    $(this).parents("#products-list").find(".wb-product-grid .item-product").removeClass("fadeInRight");
    $(this).parents("#products-list").find(".wb-product-grid .item-product").addClass(" animated zoomIn"); 
  
  });

  $(document).on('click', '#wblist', function(e){
    e.preventDefault();
    display('list');
    $(this).parents("#products-list").find(".wb-product-list .item-product").addClass(" animated fadeInRight");
    $(this).parents("#products-list").find(".wb-product-list .item-product").removeClass(" zoomIn"); 

  });

}

function display(view)
{
  if (view == 'grid')
  {
    $('#js-product-list .product-thumbs').removeClass('wb-product-list').addClass('wb-product-grid row');
    $('.product-thumbs .item-product').removeClass('col-xs-12 col-xl-12').addClass('col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4');
    $('.product-thumbs .item-product .wb-image-block').removeClass('col-xl-4 col-lg-3 col-md-4  col-sm-5 col-xs-12');
    $('.product-thumbs .item-product .wb-product-desc').removeClass('col-xl-8 col-lg-9 col-md-8 col-sm-7 col-xs-12');
    $('.display').find('#wbgrid').addClass('selected');
    $('.display').find('#wblist').removeAttr('class');
    $.totalStorage('display', 'grid');
  }
  else
  { 
    $('#js-product-list .product-thumbs').removeClass('wb-product-grid').addClass('wb-product-list row');
    $('.product-thumbs .item-product').removeClass('col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4').addClass('col-xs-12 col-xl-12');
    $('.product-thumbs .item-product .wb-image-block').addClass('col-xl-4 col-lg-3 col-md-4 col-sm-5 col-xs-12');
    $('.product-thumbs .item-product .wb-product-desc').addClass('col-xl-8 col-lg-9 col-md-8 col-sm-7 col-xs-12');
    $('.display').find('#wblist').addClass('selected');
    $('.display').find('#wbgrid').removeAttr('class');
    $.totalStorage('display', 'list');
  }
}

/* loader */
$(document).ready(function(){
    var o = $('#page-preloader');
    if (o.length > 0) {
        $(window).on('load', function() {
            $('#page-preloader').removeClass('visible');
        });
    }
});


//menu
$(document).ready(function(){
function collwr(){
     if ($(document).width() >=768){
          $('#under-menu.menu-page').addClass('collapse');
     }
     else
     {
        $('#under-menu.menu-page').removeClass('collapse');
     }
}
$(document).ready(function(){ collwr();});
$(window).resize(function(){ collwr();});
});

$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
       $('body').removeClass("active");
    document.getElementById("mySidenav").style.width = "0";
    $('#mobile_top_menu_wrapper').addCss("display","none");
       }
});


/* sidemenu */
function openNav() {
    $('body').addClass("active");
    document.getElementById("mySidenav").style.width = "280px";
    $('#mobile_top_menu_wrapper').addClass("dblock");
    $('#mobile_top_menu_wrapper').removeClass("dnone");
}
function closeNav() {
    $('body').removeClass("active");
    document.getElementById("mySidenav").style.width = "0";
    $('#mobile_top_menu_wrapper').addClass("dnone");
    $('#mobile_top_menu_wrapper').removeClass("dblock");
}
/* sidemenu over */

$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
       $('body').removeClass("active");
    document.getElementById("mySidenav").style.width = "0";
    $('#mobile_top_menu_wrapper').addClass("dnone");
       }
});


//go to top

$(document).ready(function () {
  $("#scroll").addClass("scrollhide");
    $(window).scroll(function () {
    if ($(this).scrollTop() === 0) {
      $("#scroll").addClass("scrollhide")
    } else {
      $("#scroll").removeClass("scrollhide")
    }
  });

  $('#scroll').click(function () {
    $("html, body").animate({scrollTop: 0}, 600);
    return false;
  });
});



$(document).ready(function() {
var owl = $("#owl-slider");
imagesLoaded(owl, function() {
  owl.owlCarousel({
        loop: false,
      autoplay:false,
      animateIn: 'fadeIn',
        animateOut: 'fadeOut',
      autoplayTimeout: 6000,
      responsive: {
        0: { items: 1}
      },
      dots: true,
       nav: false,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      margin:30
      });
  });
});



$(document).ready(function() {
var owl = $("#wb_cat_carousel");
imagesLoaded(owl, function() {
  owl.owlCarousel({
      loop: false,
      autoplay: false,
      responsive: {
        0: { items: 1},
        320:{ items: 2, slideBy: 1},
        412:{ items: 2, slideBy: 1},
        600:{ items: 3, slideBy: 1},
        768:{ items: 4, slideBy: 1},
        992:{ items: 3, slideBy: 1},
        1200:{ items: 4, slideBy: 1},
        1590:{ items: 5, slideBy: 1}
        
      },
      dots: false, 
       nav: true,
    navText: ['<i class="material-icons">arrow_back</i>', '<i class="material-icons aright">arrow_forward</i>'],
      margin:0
      });
  });
});

if ($(document).width() >= 768){
$('.pro-tab').appendTo('.tabapp');
}

$(document).ready(function() {
var owl = $("#owl-fea,#owl-new,#owl-best,#owl-spe,#view-pro");
imagesLoaded(owl, function() {
  owl.owlCarousel({
      loop: false,
      responsive: {
        0: { items: 1},
        320:{ items: 2, slideBy: 1, margin:5},
        412:{ items: 2, slideBy: 1, margin:15},
        600:{ items: 3, slideBy: 1},
        768:{ items: 3, slideBy: 1},
        992:{ items: 3, slideBy: 1},
        1200:{ items: 4, slideBy: 1},
        1590:{ items: 4, slideBy: 1}
        
      },
      dots: false, 
       nav: true,
    navText: ['<i class="material-icons">arrow_back</i>', '<i class="material-icons aright">arrow_forward</i>'],
      margin:30
      });
  });
});
$(document).ready(function() {
var owl = $("#owl-rate");
imagesLoaded(owl, function() {
  owl.owlCarousel({
      loop: false,
      responsive: {
        0: { items: 1},
        320:{ items: 2, slideBy: 1},
        410:{ items: 2, slideBy: 1},
        600:{ items: 3, slideBy: 1},
        768:{ items: 3, slideBy: 1},
        992:{ items: 4, slideBy: 1},
        1200:{ items: 2, slideBy: 1},
        1590:{ items: 1, slideBy: 1}
        
      },
      dots: false, 
       nav: true,
    navText: ['<i class="material-icons">arrow_back</i>', '<i class="material-icons aright">arrow_forward</i>'],
      margin:0
      });
  });
});

$(document).ready(function() {
var owl = $("#owl-related,#owl-same,#owl-view,#owl-cross");
imagesLoaded(owl, function() {
  owl.owlCarousel({
      loop: false,
      responsive: {
       0: { items: 1},
        320:{ items: 2, slideBy: 1, margin:5},
        412:{ items: 2, slideBy: 1, margin:15},
        600:{ items: 3, slideBy: 1},
        768:{ items: 3, slideBy: 1},
        992:{ items: 3, slideBy: 1},
        1200:{ items: 4, slideBy: 1},
        1590:{ items: 4, slideBy: 1}
        
      },
      dots: false, 
       nav: true,
    navText: ['<i class="material-icons">arrow_back</i>', '<i class="material-icons aright">arrow_forward</i>'],
      margin:30
      });
  });
});



$(document).ready(function() {
var owl = $("#testi");
imagesLoaded(owl, function() {
  owl.owlCarousel({
      loop: false,
      autoplay:false,
      responsive: {
        0: { items: 1}
        
      },
      dots: true,
       nav: false,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      margin:30
      });
  });
});


$(document).ready(function() {
var owl = $("#blog");
imagesLoaded(owl, function() {
  owl.owlCarousel({
      loop: false,
      autoplay:false,
      responsive: {
        0: { items: 1},
        320:{ items: 1, slideBy: 1},
        600:{ items: 2, slideBy: 1},
        768:{ items: 2, slideBy: 1},
        992:{ items: 2, slideBy: 1},
        1200:{ items: 3, slideBy: 1},
        1590:{ items: 3, slideBy: 1}
        
      },
      dots: false,
       nav: true,
    navText: ['<i class="material-icons">arrow_back</i>', '<i class="material-icons aright">arrow_forward</i>'],
      margin:30
      });
  });
});


$(document).ready(function() {
var owl = $("#owl-logo");
imagesLoaded(owl, function() {
  owl.owlCarousel({
      loop: true,
      autoplay:true,
      responsive: {
        0: { items: 1},
        320:{ items: 2, slideBy: 1},
        400:{ items: 3, slideBy: 1},
        600:{ items: 4, slideBy: 1},
        768:{ items: 3, slideBy: 1},
        1200:{ items: 3, slideBy: 1},
        1590:{ items: 3, slideBy: 1}
        
      },
      dots: false,
       nav: false,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
      margin:0
      });
  });
});
$('#_mobile_currency_selector').appendTo('.user-down');
  $('#_mobile_language_selector').appendTo('.user-down');
if ($(window).width() <= 767) {
$('.user-info').click(function(event){
  if ($(".currency-selector")){
  $(".language-selector > ul").css('display', 'none');
  }
  if ($(".language-selector")){
  $(".currency-selector > ul").css('display', 'none');
  }
  $(this).toggleClass('active');
  event.stopPropagation();
  $(".user-down").slideToggle("fast");
  $(".language-selector").removeClass("open");
  $(".currency-selector").removeClass("open");
  return false;
  });
  $(".user-down").on("click", function (event) {
  event.stopPropagation();
  });
  $('.hcom').appendTo('.user-down');
  $('.wishl').appendTo('.user-down');
  $('#_mobile_currency_selector').appendTo('.user-down');
  $('#_mobile_language_selector').appendTo('.user-down');
  
  $(".currency-selector").click(function(){
  $(this).toggleClass('open');                    
  $( ".currency-selector > ul" ).slideToggle( "1500" ); 
  $(".language-selector > ul").slideUp("medium");
  $(".language-selector").removeClass('open');
  
  });
  
  $(".language-selector").click(function(){
  $(this).toggleClass('open');                          
  $( ".language-selector > ul" ).slideToggle( "1500" );    
  $(".currency-selector > ul").slideUp("medium");
  $(".currency-selector").removeClass('open');
  });
  };



// disabled
$('.wbblog_submit_btn').on("click",function(e) {
  e.preventDefault();
  if(!$(this).hasClass("disabled")){
    var data = new Object();
    $('[id^="wbblog_"]').each(function()
    {
      id = $(this).prop("id").replace("wbblog_", "");
      data[id] = $(this).val();
    });
    function logErrprMessage(element, index, array) {
      $('.wbblogs_message').append('<span class="wbblogs_error">'+element+'</span>');
    }
    function wbremove() {
      $('.wbblogs_error').remove();
      $('.wbblogs_success').remove();
    }
    function logSuccessMessage(element, index, array) {
      $('.wbblogs_message').append('<span class="wbblogs_success">'+element+'</span>');
    }
    $.ajax({
      url: xprt_base_dir + 'modules/wbblog/ajax.php',
      data: data,
      type:'post',
      dataType: 'json',
      beforeSend: function(){
        wbremove();
        $(".wbblog_submit_btn").val("Please wait..");
        $(".wbblog_submit_btn").addClass("disabled");
      },
      complete: function(){
        $(".wbblog_submit_btn").val("Submit Button");
        $(".wbblog_submit_btn").removeClass("disabled");  
      },
      success: function(data){
        wbremove();
        if(typeof data.success != 'undefined'){
          data.success.forEach(logSuccessMessage);
        }
        if(typeof data.error != 'undefined'){
          data.error.forEach(logErrprMessage);
        }
      },
      error: function(data){
        wbremove();
        $('.wbblogs_message').append('<span class="error">Something Wrong ! Please Try Again. </span>');
      },
    }); 
  }
});



if ($(document).width() >= 1590){
var number_blocks =8;
var count_block = $('.menu-content .level-1');
var moremenu = count_block.slice(number_blocks, count_block.length);
moremenu.wrapAll('<li class="view_menu"><div class="more-menu sub-menu clearfix">');
$('.view_menu').prepend('<a href="#" class="level-top">More</a>');
$('.view_menu').mouseover(function(){
$(this).children('div').show();
})
$('.view_menu').mouseout(function(){
$(this).children('div').hide();
});
};

if (($(document).width() >= 1200) && ($(document).width() <= 1589)){
var number_blocks =5;
var count_block = $('.menu-content .level-1');
var moremenu = count_block.slice(number_blocks, count_block.length);
moremenu.wrapAll('<li class="view_menu"><div class="more-menu sub-menu clearfix">');
$('.view_menu').prepend('<a href="#" class="level-top">More</a>');
$('.view_menu').mouseover(function(){
$(this).children('div').show();
})
$('.view_menu').mouseout(function(){
$(this).children('div').hide();
});
};


if (($(document).width() >= 992) && ($(document).width() <= 1199)){
var number_blocks =5;
var count_block = $('.menu-content .level-1');
var moremenu = count_block.slice(number_blocks, count_block.length);
moremenu.wrapAll('<li class="view_menu"><div class="more-menu sub-menu clearfix">');
$('.view_menu').prepend('<a href="#" class="level-top">More</a>');
$('.view_menu').mouseover(function(){
$(this).children('div').show();
})
$('.view_menu').mouseout(function(){
$(this).children('div').hide();
});
};

$(document).ready(function(){
  'use strict';

    var owl = $('#owl-slider'),
        item,
        itemsBgArray = [], // to store items background-image
        itemBGImg;
  
    owl.owlCarousel({  
        items: 1,
        smartSpeed: 1000,
        autoplay: true,
        autoplayTimeout: 8000,
        autoplaySpeed: 1000,
        loop: true,
        nav: true,
        navText: false,
        onTranslated: function () {
        changeNavsThump();
        }
    });
  
    $('.active').addClass('anim');
  
    var owlItem = $('.owl-item'),
        owlLen = owlItem.length;
    /* --------------------------------
      * store items bg images into array
    --------------------------------- */
    $.each(owlItem, function( i, e ) {
        itemBGImg = $(e).find('.owl-item-bg').attr('src');
        itemsBgArray.push(itemBGImg);
    });
    /* --------------------------------------------
      * nav control thump
      * nav control icon
    --------------------------------------------- */
    var owlNav = $('.owl-nav'),
        el;
    
    $.each(owlNav.children(), function (i,e) {
        el = $(e);
        // append navs thump/icon with control pattern(owl-prev/owl-next)
        el.append('<div class="'+ el.attr('class').match(/owl-\w{4}/) +'-thump">');
        el.append('<div class="'+ el.attr('class').match(/owl-\w{4}/) +'-icon">');
    });
    
    /*-------------------------------------------
      Change control thump on each translate end
    ------------------------------------------- */
    function changeNavsThump() {
        var activeItemIndex = parseInt($('.owl-item.active').index()),
            // if active item is first item then set last item bg-image in .owl-prev-thump
            // else set previous item bg-image
            prevItemIndex = activeItemIndex != 0 ? activeItemIndex - 1 : owlLen - 1,
            // if active item is last item then set first item bg-image in .owl-next-thump
            // else set next item bg-image
            nextItemIndex = activeItemIndex != owlLen - 1 ? activeItemIndex + 1 : 0;
        
        
        $('.owl-next-thump').css({
            backgroundImage: 'url(' + itemsBgArray[nextItemIndex] + ')'
        });
    }
    changeNavsThump();
});


