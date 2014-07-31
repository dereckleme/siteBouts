$(document).ready(function(){
	$(".zoomProduto").elevateZoom({
		zoomWindowFadeIn: 500, 
		zoomWindowFadeOut: 500, 
		lensFadeIn: 500, 
		lensFadeOut: 500,
		zoomWindowWidth: 150,
		zoomWindowHeight: 125
	});
	//   == se for igualx
	//   != se não for igual
	//   && dupla condição igual
	$(".pg-wallpaper figure a").on("click",function() {
		var src = $("img",this).attr("src");
		$('#popup-clipping img').attr("src",src);
		$('#popup-clipping').fadeIn();
		return false;
	});
	$(".fx-clipping").on("click",function() {
		$('#popup-clipping').fadeOut();
		return false;
	})
	
	$(".vd").on("click",function() {
		var CadastroNews = $(".news-top").val();
		if (CadastroNews == "" ) {
			alert("Este campo está vazio")	
		}else {

			$.ajax({
	    	        url: basePatch+"/admin/crud/newslatter/newslatterCrud",
	    	        type: 'POST',
	    	        success: function( data )  
	                { 
	    	        	alert("O email "+CadastroNews+" foi cadastrado com sucesso.")
	                },
	                data: {email:CadastroNews},
	    	    });
		}
	return false;
    });

    $(".az").on("click",function() {
		var CadastroNews = $(".news-bottom").val();
		if (CadastroNews == "" ) {
			alert("Este campo está vazio")
		}else {

			$.ajax({
	    	        url: basePatch+"/admin/crud/newslatter/newslatterCrud",
	    	        type: 'POST',
	    	        success: function( data )  
	                { 
	    	        	alert("O email "+CadastroNews+" foi cadastrado com sucesso.")
	                },
	                data: {email:CadastroNews},
	    	    });
		}
	return false;
    });

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
	var slideAtual = 3;

	$(".testeSlice").css("left","-385px");
	if(total > 3)
		{
			$(".s-direita").on("click",function(){
				if(block == false && slideAtual < total)
				{
					slideAtual++;
					block = true;
				var sec = 0.1;
				 $(".testeSlice li").each(function( index, element ) {
					 $(this).css('transition-delay', sec+'s');
					 sec = sec+0.1;
				 }).css("left",'-=385px');
				 setTimeout(function(){
						 	block = false;
					 },1500);
				}
				return false;
			})
			$(".s-esquerda").on("click",function(){
				if(block == false && slideAtual > 3)
					{
						slideAtual--;
						block = true;
				 var sec = 0.1;
				 $(".testeSlice li").reverse(function(i, e) {
					 $(this).css('transition-delay', sec+'s');
					 sec = sec+0.1;
				 })
				$(".testeSlice li").css("left",'+=385px');
				 setTimeout(function(){
					 	block = false;
				 },1500);
					}
				return false;
			})
			
		}
	else
		{
			$(".s-direita").on("click",function(){
				return false;
			})
			$(".s-esquerda").on("click",function(){
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
	$(".sugestaoTenis .eventOpenSugestao").on("click",function(){
		var nossoNumero = $(this).attr("rel");
		var imagem = $(this).attr("rev");
		$(".valModel").html(nossoNumero);
		$(".viewport-imagem img").attr("src",imagem+'big.png');
		$(".carouselPerspectiva li").remove();
		$(".carouselPerspectiva").html('<li><a href="'+imagem+'"><img title="teste" alt="teste" src="'+imagem+'medio.png"/></a></li>');

		$(".zoomWindowContainer div").css("background-image", "url("+imagem+")");
		block_detalhe = true;
		return false;
	})

	$(".viewport-galery").on("click",function(){
		var imagem = $(this).attr("href");
		$(".pg-galeria img").attr("src",imagem);
		return false;
	})
	
	//********************carousel detalhe produto
	var total_detalhe = $(".carouselPerspectiva li").size();
	var block_detalhe = false;
	var slideAtual_detalhe = 4;
	if(total_detalhe > 4)
	{
		$(".next").on("click",function(){
			
			if(block_detalhe == false && slideAtual_detalhe < total_detalhe)
			{
				slideAtual_detalhe++;
				block_detalhe = true;
			var sec = 0.1;
			 $(".carouselPerspectiva li").each(function( index, element ) {
				 $(this).css('transition-delay', sec+'s');
				 sec = sec+0.1;
			 }).css("left",'-=135px');
			 setTimeout(function(){
				 block_detalhe = false;
				 },1500);
			}
			return false;
		})
		$(".previous").on("click",function(){
			if(block_detalhe == false && slideAtual_detalhe > 4)
				{
				slideAtual_detalhe--;
					block_detalhe = true;
			 var sec = 0.1;
			 $(".carouselPerspectiva li").reverse(function(i, e) {
				 $(this).css('transition-delay', sec+'s');
				 sec = sec+0.1;
			 })
			$(".carouselPerspectiva li").css("left",'+=135px');
			 setTimeout(function(){
				 block_detalhe = false;
			 },1500);
				}
			return false;
		})
		
	}
	else
		{
			$(".previous").on("click",function(){
				return false;
			})
			$(".next").on("click",function(){
				return false;
			})
		}
	$(".carouselPerspectiva").on("click","a",function(){
		var imagem = $(this).attr("href");
		$(".viewport-imagem img").attr("src",imagem+'big.png');
		$(".zoomWindowContainer div").css("background-image", "url("+imagem+")"); 
		return false;
	})
	$(".loadAjax").on("click",".EnviarContato",function(){
		var n = $(".statusDepartamento:checked").length;
		
		var erros = "";
		if(n == 0) erros = erros+"- Selecione um departamento.\n";
		if($(".inputNome").val() == "") erros = erros+"- Campo Nome está em branco.\n";
		if($(".InputEmail").val() == "") erros = erros+"- Campo Email está em branco.\n";
		if($(".inputTelefoneDDD").val() == "") erros = erros+"- Campo DDD está em branco.\n";
		if($(".inputTelefoneNumero").val() == "") erros = erros+"- Campo Telefone está em branco.\n";
		if($(".InputModelo").val() == "") erros = erros+"- Campo Modelo está em branco.\n";
		if($(".inputMensagem").val() == "") erros = erros+"- Campo Mensagem está em branco.\n";
		if($(".InputCidade").val() == "") erros = erros+"- Campo Cidade está em branco.\n";
		if($(".InputUF").val() == "") erros = erros+"- Campo UF está em branco.\n";
		if(erros != "")
		{
			alert("Atenção existe alguns erros abaixo:\n\n"+erros);
		}
		else
			{
				var formData = new FormData();

	        	formData.append('EmailEnvio', $(".statusDepartamento:checked").val());
	        	formData.append('Nome', $(".inputNome").val());
	        	formData.append('Email', $(".InputEmail").val());
	        	formData.append('telefone', $(".inputTelefoneDDD").val()+$(".inputTelefoneNumero").val());
	        	formData.append('Modelo', $(".InputModelo").val());
	        	formData.append('Mensagem', $(".inputMensagem").val());
	        	formData.append('UF', $(".InputUF").val());
	        	formData.append('Cidade', $(".InputCidade").val());
	        	$.ajax({
	    	        url: basePatch+"/contato/enviar",
	    	        type: 'POST',
	    	        contentType: 'multipart/form-data',
	    	        success: function( data )  
	                {  
	    	        	alert("Contato enviado com sucesso!");
	                },
	    	        data: formData,
	    	        cache: false,
	    	        contentType: false,
	    	        processData: false
	    	    });
			}
		return false;
	})
});