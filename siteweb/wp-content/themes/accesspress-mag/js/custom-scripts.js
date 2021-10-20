/**
* Custom js for Accesspress Mag
* 
*/

jQuery(document).ready(function($){
        
$('.search-btn-wrap').click(function(){
    $('.search_form_wrap').addClass('form-active');
});

$('body').on('click keypress','.search_close',function(){
    $('.search_form_wrap').removeClass('form-active');
});


$('.nav-toggle').click(function() {
    $('.nav-wrapper .menu').slideToggle('slow');
    $(this).parent('.nav-wrapper').toggleClass('active');
});

jQuery('#site-navigation .nav-wrapper .menu-item-has-children > a').wrap('<div class="sub-wrap"></div>');


$('.nav-wrapper .menu-item-has-children .sub-wrap').append('<button type="button" class="sub-toggle"> <i class="fa fa-angle-right"></i> </button>');


$('.nav-wrapper .sub-toggle').click(function() {
    $(this).parents('.menu-item-has-children').children('ul.sub-menu').first().slideToggle('1000');
    $(this).children('.fa-angle-right').first().toggleClass('fa-angle-down');
});

new WOW().init();
 
// hide #back-top first
$("#back-top").hide();

// fade in #back-top
$(function() {
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });

    // scroll body to 0px on click
    $('#back-top').click(function() {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});
 
});