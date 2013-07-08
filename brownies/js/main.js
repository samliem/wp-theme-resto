/* 
 * This script is used in all pages
 */

jQuery(document).ready(function($){
    
    var offset = $('.wrapper').offset();
    var topHeight = offset.top;
    
    $(window).scroll(function(){
        if( $(this).scrollTop() < topHeight )
            $('#back-to-top').fadeOut('slow');
        else
            $('#back-to-top').fadeIn('slow');
    });

    $('#back-to-top').click(function(e){
        $(window).scrollTop(0);
        e.preventDefault();
    });
    
});


