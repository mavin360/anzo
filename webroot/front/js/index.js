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
	var mod=sessionStorage.getItem('model');
	if(!mod){
		$('#signup-modal').modal('show');
	}
});

function subscribe(id){
	$('#'+id).children('.msg').removeClass('success');
	$('#'+id).children('.msg').removeClass('error');
	$('#'+id).children('.msg').html('');
	if($('#'+id).children('input[type="email"]').val()==''){
		$('#'+id).children('input[type="email"]').addClass('error');
		$('#'+id).children('.msg').addClass('error');
		$('#'+id).children('.msg').html('Enter email.');
	}else{
		$('#'+id).children('input[type="email"]').removeClass('error');
		var data =$('#'+id).serialize();
		$.ajax({
				method:'POST',
				url:base_url+'subscribe',
				data:data,
				beforeSend:function(){
					$('#'+id).children('button').html('<i class="fa fa-spinner fa-spin"></i>');
					$('#'+id).children('button').attr('disabled',true);
				},
				success:function(res){
					$('#'+id).children('button').html('Submit');
					$('#'+id).children('button').attr('disabled',false);
					var res=JSON.parse(res);
					if(res.type=='success'){
						$('#'+id).children('.msg').html(res.msg);
						$('#'+id).children('.msg').addClass(res.type);
						$('#'+id).children('input[type="email"]').val('')
					}
					if(res.type=='error'){
						$('#'+id).children('.msg').html(res.msg);
						$('#'+id).children('.msg').addClass(res.type);
					}
				}
			});
	}
	return false;
}
function modalClose(){
	$('#signup-modal').modal('hide');
	sessionStorage.setItem('model','close');
}
