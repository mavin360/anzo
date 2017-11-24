$(document).ready(function(){
    $(window).scroll(function(){
        if ($(window).scrollTop() >= 100) {
           $('header').addClass('fixed');
           $('footer').addClass('space');
           $('.sticky-footer').addClass('fixed');
           $('.backtotop').fadeIn();
        }
        else {
           $('header').removeClass('fixed');
           $('footer').removeClass('space');
           $('.sticky-footer').removeClass('fixed');
           $('.backtotop').fadeOut();
        }
    });

    $('.backtotop').hide();

    $('.backtotop').click(function(){
        $('html, body').animate({scrollTop: 0}, 600);;
    });

    $('header nav strong').click(function(){
        $('header ul').slideToggle();
    });

    $(".secondary_menu li a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("active");
        $(this).parent().siblings().removeClass("active");
        var tab = $(this).attr("href");
        $(".secondary_tabs .tab-content").not(tab).css("display", "none");
        $(tab).show();
    });

    $('.secondary_menu li').click(function(){
      var indx = $(this).index();
      $('.secondary_menu li').removeClass('active');
      $('.secondary_menu li').eq(indx).addClass('active');
      $('.menutagline .tab-content').hide();
      $('.menutagline .tab-content').eq(indx).show();
  	  return false;
    });
    
    $('#lightgallery').lightGallery();

    // $(".secondary_menu li a").click(function(event) {
    //     event.preventDefault();
    //     $(this).parent().addClass("active");
    //     $(this).parent().siblings().removeClass("active");
    //     var tab = $(this).attr("href");
    //     $(".menutagline .tab-content").not(tab).css("display", "none");
    //     $(tab).show();
    // });

});

$(window).on('load',function(){
    $('#signup-modal').modal('show');
});
