jQuery(document).ready(function($){
       
    arrange_thumbnail();
    $('ul.products', '.woocommerce').show();
    $('#thumbnail-loading').hide();
    $(window).resize(arrange_thumbnail);
    
    function arrange_thumbnail() {
        var siteContentWidth = $('.site-content').width();
        
        //each li.product has border width 1px;
        var borderWidth = (1 / siteContentWidth) * 100;
        
        var productColumn = $('#product-column').val();
        var totalBorderWidth = borderWidth * 2 * productColumn;         
        var marginRight;

        if( productColumn < 4 )
            marginRight = 4; //4%
        else
            marginRight = 3; //3%

        var width = (100-totalBorderWidth-(productColumn-1) * marginRight)/productColumn;
        //var width = (100-(productColumn-1) * marginRight)/productColumn;
        $('ul.products li.product').each(function(){
            if( !$(this).hasClass('last') ) {
                $(this).css('margin-right', marginRight + '%');
            }
            $(this).css('width', width + '%');
        })  
    }
});


