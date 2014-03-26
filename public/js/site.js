$(document).ready(function(){
	$(".abrirContato").on("click",function(){
		$.ajax({
	        url: basePatch+"/contato",
	        success: function( data )  
	        { 
	        	$('html, body').css({
	        	    'overflow': 'hidden',
	        	    'height': '100%'
	        	})
	        	$(".loadAjax").html(data);
	        	$(".loadAjax").fadeIn();
	        }
	    });
		return false;
	})
	
	$(".nav-button").click(function () {
		$(".nav-button,.box-menu").toggleClass("open");
	});
	var w = window.innerWidth;
	if(w <= 800)
	{
		$(".g-produtos").css('overflow-x', 'auto');
	}
	window.onresize = function(event) {
		if(w <= 800)
			{
				$(".g-produtos").css('overflow-x', 'auto');
			}
	};
	$(window).scroll(function() {
			var posicao = $(document).scrollTop();
			if(posicao >= 88)
				{
					$("#wowslider-container1").css("top",(posicao-88)+"px");
				}
			else
				{
					$("#wowslider-container1").css("top","0px");
				}
			if(posicao >= 0)
			{
				$(".h-container-top").css("top",(posicao-0)+"px");
			}
		else
			{
				$(".h-container-top").css("top","0px");
			}
			
		});
	
	
	
});