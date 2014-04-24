$(document).ready(function(){
	$(".openPopup").on("click",function(){
		$("#adm-popup").slideUp();
		var action = $(this).attr("rel");
		var title = $(this).attr("title");
		$("#adm-popup h4").html(title);
		$.ajax({
			url: basePatch+"/admin/crud/"+action+"/"+action,
			success: function(data) {
						$(".conteudo").html(data);
						$("#adm-popup").slideDown();
					}
				});	
		
		return false;
	});
	$(".conteudo").on("click",".actionAdicionaOndeComprar",function(){
		var erros = "";
		if($(".formComprar .titulo").val() == "") erros = erros+"- Digite o título do site.\n";
		if($(".formComprar .url").val() == "") erros = erros+"- Qual o endereço do site.\n";
    	if(erros == "")
    		{
	    		var formData = new FormData();
				formData.append('titulo', $(".formComprar .titulo").val());
				formData.append('url', $(".formComprar .url").val());
				$.ajax({
	    	        url: basePatch+"/admin/crud/OndeComprar/adiciona",
	    	        type: 'POST',
	    	        contentType: 'multipart/form-data',
	    	        success: function( data )  
	                { 
	    	        	alert(data);
	    	        	location.reload();
	                },
	                error:function(){},
	    	        data: formData,
	    	        cache: false,
	    	        contentType: false,
	    	        processData: false
	    	    });
    		}
    	else
		{
			alert("Existe alguns erros abaixo:\n\n"+erros);
		}
		return false;
	})
	$(".conteudo").on("click",".actionAdicionaMidia",function(){
		var erros = "";
		if($(".formBanner .titulo").val() == "") erros = erros+"- Qual o título do vídeo?\n";
		if($(".formBanner .url").val() == "") erros = erros+"- Digite uma url do vídeo.\n";
    	if(erros == "")
    		{
	    		var formData = new FormData();
				formData.append('titulo', $(".formBanner .titulo").val());
				formData.append('url', $(".formBanner .url").val());
				$.ajax({
	    	        url: basePatch+"/admin/crud/midia/adiciona",
	    	        type: 'POST',
	    	        contentType: 'multipart/form-data',
	    	        success: function( data )  
	                { 
	    	        	alert(data);
	    	        	location.reload();
	                },
	                error:function(){},
	    	        data: formData,
	    	        cache: false,
	    	        contentType: false,
	    	        processData: false
	    	    });
    		}
    	else
		{
			alert("Existe alguns erros abaixo:\n\n"+erros);
		}
		return false;
	})
	$(".conteudo").on("click",".actionAdicionaBanner",function(){
		var erros = "";
		if($(".formBanner .titulo").val() == "") erros = erros+"- Qual o título do banner?\n";
		if($(".formBanner .url").val() == "") erros = erros+"- Digite uma url para redirecionar o banner\n";
    	if($('.formBanner input[type=file]')[0].files[0] == null) erros = erros+"- Insira uma imagem do banner\n";
    	if(erros == "")
    		{
    			var formData = new FormData();
    			formData.append('imagem', $('.formBanner input[type=file]')[0].files[0]);
    			formData.append('titulo', $(".formBanner .titulo").val());
    			formData.append('url', $(".formBanner .url").val());
    			$.ajax({
        	        url: basePatch+"/admin/crud/banner/bannerCrud",
        	        type: 'POST',
        	        contentType: 'multipart/form-data',
        	        success: function( data )  
                    { 
        	        	if(data == "")
        	        		{
        	        			alert("Banner Adicionado com sucesso");
        	        			location.reload();
        	        		}
                    },
                    error:function(){alert("Formato de imagem inválido!");},
        	        data: formData,
        	        cache: false,
        	        contentType: false,
        	        processData: false
        	    });
    		}
    	else
		{
			alert("Existe alguns erros abaixo:\n\n"+erros);
		}
		return false;
	})
	$(".conteudo").on('change',".formProduto .categoria",function(){
		if($(this).val() == "")
			{
			}
		else
			{
				$.ajax({
	    	        url: basePatch+"/admin/crud/produtos/populateSubcategoriaAjax",
	    	        type: 'POST',
	    	        data: {idCategoria:$(this).val()},
	    	        success: function( data )  
	                { 
	    	        	
	    	        	if(data != "")
	    	        		{
	    	        			$(".formProduto .subcategoria").removeAttr("disabled");
	    	        			$(".formProduto .subcategoria").html(data);
	    	        		}
	    	        	else
	    	        		{
	    	        			$(".formProduto .subcategoria").prop('disabled', true);
	    	        			$(".formProduto .subcategoria").html('<option value="">Selecione uma Subcategoria</option>');
	    	        		}
	                }
	    	    });
			}
	})
	$(".conteudo").on("click",".actionAdicionaProduto",function(){
		
		
		var erros = "";
		
		if($('.formProduto .titulo').val() == "") erros = erros+"- Qual o titulo do produto?\n";
		if($('.formProduto input[type=file]')[0].files[0] == null) erros = erros+"- Insira uma imagem do tenis\n";
		if($('.formProduto .categoria').val() == "") erros = erros+"- Selecione uma categoria\n";
		if($('.formProduto .statusDescricaoTenis').val() == "") erros = erros+"- Digite uma descrição minima do tenis\n";
		if($('.formProduto .tecnologia').val() == "") erros = erros+"- Selecione a tecnologia de amortecimento\n";
		if($('.formProduto .subcategoria').val() == "") erros = erros+"- Selecione uma sub-categoria\n";
		if($('.formProduto .tamanhoMin').val() == "") erros = erros+"- Digite um tamanho minimo\n";
		if($('.formProduto .tamanhoMax').val() == "") erros = erros+"- Digite um tamanho maximo\n";
		if($('.formProduto .modelo').val() == "") erros = erros+"- Qual o modelo do tenis?\n";
		if($('.formProduto .vitrine:checked').val() == "sim")
		{
			if($('.formProduto input[type=file]')[1].files[0] == null) erros = erros+"- Insira uma imagem para a vitrine\n";
		}
		if(erros == "")
		{
			var formData = new FormData();
			formData.append('imagem', $('.formProduto input[type=file]')[0].files[0]);
			formData.append('categoria', $(".formProduto .categoria").val());
			formData.append('descricao', $(".formProduto .statusDescricaoTenis").val());
			formData.append('subcategoria', $(".formProduto .subcategoria").val());
			formData.append('tecnologia', $(".formProduto .tecnologia").val());
			formData.append('titulo', $(".formProduto .titulo").val());
			formData.append('tamanhoMin', $(".formProduto .tamanhoMin").val());
			formData.append('tamanhoMax', $(".formProduto .tamanhoMax").val());
			formData.append('modelo', $(".formProduto .modelo").val());
			if($('.formProduto .vitrine:checked').val() == "sim")
			{
				formData.append('imagemVitrine', $('.formProduto input[type=file]')[1].files[0]);
			}
			$.ajax({
    	        url: basePatch+"/admin/crud/produtos/produtosCrud",
    	        type: 'POST',
    	        contentType: 'multipart/form-data',
    	        success: function( data )  
                { 
    	        	if(data == "")
    	        		{
    	        		alert("Produto adicionado com sucesso!");
    	        		location.reload();
    	        		}
    	        	else
    	        		{
    	        		alert(data);
    	        		}
                },
    	        data: formData,
    	        cache: false,
    	        contentType: false,
    	        processData: false
    	    });
		}
    	else
		{
			alert("Existe alguns erros abaixo:\n\n"+erros);
		}
		return false;
	})
	$(".conteudo").on("click",".style-gerenciar",function(){
		$(".accordion").slideToggle();
		return false;
	})
	$(".conteudo").on("click",".deletarAction",function(){
		var action = $(this).attr("rev");
		var idAction = $(this).attr("rel");
		$.ajax({
	        url: basePatch+"/admin/crud/"+action+"/delete",
	        type: 'POST',
	        success: function( data )  
            { 
	        	alert(data);
	        	location.reload();
            },
	        data: {idAction:idAction}
	    });
		return false;
	})
	
	$('.conteudo').change('.vitrine',function() {
		
		if($('.formProduto .vitrine:checked').val() == "sim")
		  {
		  	$(".fotoAdicionalVitrine").slideDown();
		  }
	  else
		  {
		    $(".fotoAdicionalVitrine").slideUp();
		  }
	});
})