
$(document).ready(function(){
	jQuery.fn.reverse = function(fn) {

		   var i = this.length;

		   while(i) {
		        i--;
		        fn.call(this[i], i, this[i])
		   }
		};
	//JqueRY carousel home. .testeSlice
	var total = $(".testeSlice li").size();
	var block = false;
	if(total > 3)
		{
		/*
			var ultimo = $(".testeSlice li:last").clone().prependTo(".testeSlice");
			$(".testeSlice").css("left","-385px");
			$(".s-direita").on("click",function(){
				var sec = 0.1;
				 $(".testeSlice li").each(function( index, element ) {
					 $(this).css('transition-delay', sec+'s');
					 sec = sec+0.1;
				 }).css("left",'-=385px');
				//$(".testeSlice li:first").appendTo(".testeSlice");
				return false;
			})
			$(".s-esquerda").on("click",function(){
				 var sec = 0.1;
				 $(".testeSlice li").reverse(function(i, e) {
					 $(this).css('transition-delay', sec+'s');
					 sec = sec+0.1;
				 })
				$(".testeSlice li").css("left",'+=385px');
				return false;
			})
			*/
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