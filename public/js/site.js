$(document).ready(function(){
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
	$( window ).scroll(function() {
			var posicao = $(document).scrollTop();
			if(posicao >= 90)
				{
					$("#wowslider-container1").css("top",(posicao-90)+"px");
				}
			else
				{
					$("#wowslider-container1").css("top","0px");
				}
			if(posicao >= 0)
			{
				$(".h-produtos").css("top",(posicao-0)+"px");
			}
		else
			{
				$(".h-produtos").css("top","0px");
			}
			
		});
	
	
	
});