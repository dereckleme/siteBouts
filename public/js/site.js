$(document).ready(function(){
	//JqueRY carousel home. .testeSlice
	var total = $(".testeSlice li").size();
	if(total > 3)
		{
			var ultimo = $(".testeSlice li:last").clone().prependTo(".testeSlice");
			$(".testeSlice").css("left","-385px");
			$(".s-direita").on("click",function(){
				$(".testeSlice").css("left","+=385px");
				//$(".testeSlice li:first").appendTo(".testeSlice");
				return false;
			})
			$(".s-esquerda").on("click",function(){
				//$(".testeSlice li:last").prependTo(".testeSlice");
				$(".testeSlice").css("left","-=385px");
				return false;
			})
		}
	//
	$(".loadAjax").on("click","a",function(){
		$(".loadAjax").fadeOut("fast",function(){
			$('html, body').css({
			    'overflow': 'auto',
			    'height': 'auto'
			});
		});
		return false;
	});
	$(".abrirContato").on("click",function(){
		$.ajax({
	        url: basePatch+"/contato",
	        success: function( data )  
	        { 
	        	$(".loadAjax").html(data);
	        	$(".loadAjax").fadeIn("fast",function(){
	        		$('html, body').css({
		        	    'overflow': 'hidden',
		        	    'height': '100%'
		        	})
	        	});
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
	var cont = 1;
	$(".listaImagensTecnologia li").each(function( key, value ) {
		switch (cont)
		{
		case 1:
		  $("a",this).addClass("effect-top");
		  break;
		case 2:
			$("a",this).addClass("effect-left");
		  break;
		case 3:
			$("a",this).addClass("effect-bottom");
		  break;
		case 4:
			$("a",this).addClass("effect-right");
		  break;
		}
			if(cont == 4)
				{
				cont = 1;
				}
			else
				{
				cont++;
				}
		});
});