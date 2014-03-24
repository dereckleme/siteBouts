$(document).ready(function(){
	$(".openPopup").on("click",function(){
		$("#adm-popup").slideUp();
		var action = $(this).attr("rel");
		var title = $(this).attr("title");
		$("#adm-popup h4").html(title);
		$.ajax({
			url: basePatch+"/admin/crud/"+action,
			success: function(data) {
						$(".conteudo").html(data);
						$("#adm-popup").slideDown();
					}
				});	
		
		return false;
	});
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
        	        url: basePatch+"/admin/crud/bannerCrud",
        	        type: 'POST',
        	        contentType: 'multipart/form-data',
        	        success: function( data )  
                    { 
        	        	if(data == "")
        	        		{
        	        			alert("Banner Adicionado com sucesso");
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
	    	        url: basePatch+"/admin/crud/populateSubcategoriaAjax",
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
		if($('.formProduto input[type=file]')[0].files[0] == null) erros = erros+"- Insira uma imagem do tenis\n";
		if($('.formProduto .categoria').val() == "") erros = erros+"- Selecione uma categoria\n";
		if($('.formProduto .subcategoria').val() == "") erros = erros+"- Selecione uma sub-categoria\n";
		if($('.formProduto .modelo').val() == "") erros = erros+"- Selecione um modelo\n";
		if($('.formProduto .tamanhoMin').val() == "") erros = erros+"- Digite um tamanho minimo\n";
		if($('.formProduto .tamanhoMax').val() == "") erros = erros+"- Digite um tamanho maximo\n";
		
		
		if(erros == "")
		{
			var formData = new FormData();
			formData.append('imagem', $('.formProduto input[type=file]')[0].files[0]);
			formData.append('categoria', $(".formProduto .categoria").val());
			formData.append('subcategoria', $(".formProduto .subcategoria").val());
			formData.append('modelo', $(".formProduto .modelo").val());
			formData.append('tamanhoMin', $(".formProduto .tamanhoMin").val());
			formData.append('tamanhoMax', $(".formProduto .tamanhoMax").val());
			$.ajax({
    	        url: basePatch+"/admin/crud/produtosCrud",
    	        type: 'POST',
    	        contentType: 'multipart/form-data',
    	        success: function( data )  
                { 
    	        	alert(data);
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
})