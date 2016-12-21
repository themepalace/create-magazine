( function( $ ) {
    $(window).load(function(){
        

/*------------------------------------------------
                SIDR MENU
------------------------------------------------*/

$('#sidr-left-top-button').sidr({
    name: 'sidr-left-top',
    timing: 'ease-in-out',
    speed: 500,
    side: 'left',
    source: '.left'
});

/*------------------------------------------------
                END SIDR MENU
------------------------------------------------*/


/*------------------------------------------------
                PRELOADER
------------------------------------------------*/

 $('#loader').delay(10).fadeOut('slow');
 $('#loader-container').delay(10).fadeOut('slow');
 $('body').delay(10).css({'overflow-x':'hidden'});

/*------------------------------------------------
                END PRELOADER
------------------------------------------------*/

/*------------------------------------------------
                MENU ACTIVE
------------------------------------------------*/

$('.main-navigation ul li').click(function(){
    $('.main-navigation ul li').removeClass('current-menu-item');
    $(this).addClass('current-menu-item');
});

/*------------------------------------------------
                END MENU ACTIVE
------------------------------------------------*/

/*------------------------------------------------
                STICKY HEADER
------------------------------------------------*/

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();  
    if (scroll > 120) {
        $(".site-header").addClass("is-sticky");
    }
    else {
        $(".site-header").removeClass("is-sticky");
    }
});
/*------------------------------------------------
                END STICKY HEADER
------------------------------------------------*/

/*------------------------------------------------
                BACK TO TOP
------------------------------------------------*/

 $(window).scroll(function(){
    if ($(this).scrollTop() > 1) {
    $('.backtotop').css({bottom:"20px"});
    } else {
    $('.backtotop').css({bottom:"-100px"});
    }
    });
    $('.backtotop').click(function(){
    $('html, body').animate({scrollTop: '0px'}, 800);
    return false;
    });
/*------------------------------------------------
                END BACK TO TOP
------------------------------------------------*/


/*------------------------------------------------
                PAGINATION
------------------------------------------------*/
$('ul.page-numbers .page-numbers').addClass('read-more');

/*------------------------------------------------------------
            COLOR SWITCHER, WIDE AND BOXED LAYOUTS
-------------------------------------------------------------*/

$("#green" ).click(function(){
    $("#color" ).attr("href", "assets/css/green.css");
});

$("#red" ).click(function(){
    $("#color" ).attr("href", "assets/css/red.css");
});

$("#dark-green" ).click(function(){
    $("#color" ).attr("href", "assets/css/dark-green.css");
});

$("#blue" ).click(function(){
    $("#color" ).attr("href", "assets/css/blue.css");
});

$("#default" ).click(function(){
    $("#color" ).attr("href", "assets/css/default.css");
});

$(".picker_close").click(function(){  
    $("#choose_color").toggleClass("position");
});

$('.boxed').click(function() {
    $('body').addClass('boxed');
});

$('.wide').click(function() {
    $('body').removeClass('boxed');
    $('body').addClass('wide');
});


$('.font-family li').click(function() {
    $('.font-family li').removeClass('active');
    $(this).addClass('active');
});

$('.courgette').click(function() {
    if  ($('body').hasClass('montserrat') || 
        $('body').hasClass('raleway') ||
        $('body').hasClass('roboto') || 
        $('body').hasClass('poppins'))
    {
        $('body').removeClass('montserrat raleway roboto poppins');
    }
    $('body').addClass('courgette');
});
$('.montserrat').click(function() {
    if  ($('body').hasClass('courgette') || 
        $('body').hasClass('raleway') ||
        $('body').hasClass('roboto') || 
        $('body').hasClass('poppins'))
    {
        $('body').removeClass('courgette raleway roboto poppins');
    }
    $('body').addClass('montserrat');
});
$('.raleway').click(function() {
    if  ($('body').hasClass('courgette') || 
        $('body').hasClass('montserrat') ||
        $('body').hasClass('roboto') || 
        $('body').hasClass('poppins'))
    {
        $('body').removeClass('courgette montserrat roboto poppins');
    }
    $('body').addClass('raleway');
});
$('.roboto').click(function() {
    if  ($('body').hasClass('courgette') || 
        $('body').hasClass('montserrat') ||
        $('body').hasClass('raleway') || 
        $('body').hasClass('poppins'))
    {
        $('body').removeClass('courgette montserrat raleway poppins');
    }
    $('body').addClass('roboto');
});
$('.poppins').click(function() {
    if  ($('body').hasClass('courgette') || 
        $('body').hasClass('montserrat') ||
        $('body').hasClass('raleway') || 
        $('body').hasClass('roboto'))
    {
        $('body').removeClass('courgette montserrat raleway roboto');
    }
    $('body').addClass('poppins');
});

/*------------------------------------------------
        END COLOR SWITCHER, WIDE AND BOXED LAYOUTS
------------------------------------------------*/

});
} )( jQuery );


/*------------------------------------------------
            END JQUERY
------------------------------------------------*/
