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
			if(posicao >= 58)
				{
					$("#wowslider-container1").css("top",(posicao-58)+"px");
				}
			else
				{
					$("#wowslider-container1").css("top","0px");
				}
		});
});