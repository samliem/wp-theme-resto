jQuery(document).ready(function($){
   
   /********************* Init **********************
    * Awalnya lebar dari li dan img adalah 100% 
    * agar pada waktu loadiang site terlihat SATU
    * gambar yang memenuhi slide containter,
    * Hanya gambar pertama yang ditampikan pada waktu
    * loading. Yang lainnya di hide.
    * Setelah ul di perlebar, gambar yang lain di show
    *************************************************/
   var slideWidth = 0;
   imageSizing();
   $('ul#slider-list').width(9999);
   $('ul#slider-list img').show();
   $('.callout').hide();
   /************************************************/
   
   $(window).resize(imageSizing);
   
   var selectedSlide = 0, iTimer = 0;
   var isRunning = true, stopTimer = false;
   var totalSlide = $('.slide-item').length;
   
   startTimer();
   
   $('a.slide-counter').click(function(e){
       var slideId = $(this).attr('id').split('-');
       var slideNo = parseInt(slideId[1]);
       var deviation = slideNo - selectedSlide;
       
       if( deviation === 0)
           return false;
       
       selectedSlide = slideNo;
       var shiftLeft = -1 * slideNo * slideWidth;
       $('ul#slider-list').animate({'left': shiftLeft}, 500);
       
       $('a.slide-counter').removeClass('selected-slide');
       $(this).addClass('selected-slide');
       
       e.preventDefault();
   });
   
   $('a.slide-counter').hover(
        function(){
            var slide = $(this).attr('id').split('-');
            var slideNo = slide[1];
            var postTitle = $('#slide-post-title-' + slideNo).text();
            
            if( postTitle != '') {
                var calloutHtml = '<strong>' + $('#slide-post-title-' + slideNo).text() + '</strong><br />';
                calloutHtml += $('#slide-post-excerpt-' + slideNo).text();
                $('.callout-content').html(calloutHtml);

                var pos = $(this).offset();
                var calloutWidth = $('.callout').width();
                $('.callout')
                    .css({'top' : pos.top + 30, 'left' : pos.left - calloutWidth + 17})
                    .fadeIn();
            }
        },
        function() {
            $('.callout').hide();
        });
   
   $('ul#slider-list').hover(
       function(){
            stopTimer = true;
            setTimeout(function(){
                if( stopTimer ) {
                    isRunning = false;
                    clearInterval(iTimer);
                }
            }, 500);
       },
       function(){
            stopTimer = false;
            if( !isRunning ) {
                isRunning = true;
                startTimer();
            }
       });
      
   
   /**************************************************
   *************** Custom Functions *****************/
   function startSlider() {
       selectedSlide += 1;
       if( selectedSlide === totalSlide ) 
           selectedSlide = 0;
       var shiftLeft = -1 * selectedSlide * slideWidth;
       
       $('a.slide-counter').removeClass('selected-slide');
       $('a#slideno-' + selectedSlide).addClass('selected-slide');
       
       $('ul#slider-list').animate({'left': shiftLeft}, 1000);
   }
   
   function imageSizing() {
       slideWidth = $('#home-slider').innerWidth();
       $('li.slide-item').width(slideWidth);
   }
   
   function startTimer() {
       iTimer = setInterval(startSlider, 4000);
   }
   
});


