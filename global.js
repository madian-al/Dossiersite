// Custom JS
$(document).ready(function(){
  // Add your code here
  // ------------------------------
	// http://twitter.com/mattsince87
	// ------------------------------

	function scrollNav() {
	  $('.nav a').click(function(){  
		//Toggle Class
		$(".active").removeClass("active");      
		$(this).closest('li').addClass("active");
		var theClass = $(this).attr("class");
		$('.'+theClass).parent('li').addClass('active');
		//Animate
		$('html, body').stop().animate({
			scrollTop: $( $(this).attr('href') ).offset().top - 55
		}, 200);
		return false;
	  });
	  $('.scrollTop a').scrollTop();
	}


	scrollNav();
});

$('#send_btn').popover({content: 'Thank You'},'click');	
