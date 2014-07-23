$(document).ready(function(){
	$(".conteudo").on("click",".atualizaCampanhaAction",function(){
		var formData = new FormData();
		if($(".bannerDireto .titulo").val() != "") formData.append('titulo', $(".bannerDireto .titulo").val());
		if($(".bannerDireto .url").val() != "") formData.append('url', $(".bannerDireto .url").val());
		if($(".bannerDireto input[type=file]")[0].files[0] != null) formData.append('imagemCampanha', $(".bannerDireto input[type=file]")[0].files[0]);
		$.ajax({
	        url: basePatch+"/admin/crud/banner/atualizaCampanha",
	        type: 'POST',
	        contentType: 'multipart/form-data',
	        success: function( data )  
            { 
	        	alert("Campanha atualizada com sucesso!");
        		location.reload();
            },
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false
	    });
		return false;
	});
	$(".conteudo").on("click",".editarTecnologiaAction",function(){
		var idTecnologia = $(this).attr("rel");
		$(".editar"+idTecnologia).slideDown();
		return false;
	});
	$(".conteudo").on("click",".salvarEdicaoTecnologiaAction",function(){
		var idTecnologia = $(this).attr("rel");
		var formData = new FormData();
		formData.append('idTecnologia',idTecnologia);
		if($(".editar"+idTecnologia+" .titulo").val() != "") formData.append('titulo', $(".editar"+idTecnologia+" .titulo").val());
		if($(".editar"+idTecnologia+" .statusMensagem").val() != "") formData.append('descricao', $(".editar"+idTecnologia+" .statusMensagem").val());
		if($(".editar"+idTecnologia+' input[type=file]')[0].files[0] != null) formData.append('imagem_destaque', $(".editar"+idTecnologia+' input[type=file]')[0].files[0]);
		if($(".editar"+idTecnologia+' input[type=file]')[1].files[0] != null) formData.append('logo', $(".editar"+idTecnologia+' input[type=file]')[1].files[0]);
		if($(".editar"+idTecnologia+' input[type=file]')[2].files[0] != null) formData.append('imagem_perspectiva_primeira', $(".editar"+idTecnologia+' input[type=file]')[2].files[0]);
		if($(".editar"+idTecnologia+' input[type=file]')[3].files[0] != null) formData.append('imagem_perspectiva_segunda', $(".editar"+idTecnologia+' input[type=file]')[3].files[0]);
		if($(".editar"+idTecnologia+' input[type=file]')[4].files[0] != null) formData.append('imagem_perspectiva_terceira', $(".editar"+idTecnologia+' input[type=file]')[4].files[0]);
		if($(".editar"+idTecnologia+' input[type=file]')[5].files[0] != null) formData.append('imagem_perspectiva_quarta', $(".editar"+idTecnologia+' input[type=file]')[5].files[0]);
		formData.append('imagem_perspectiva_primeiraID', $(".editar"+idTecnologia+" .imagemId1").attr("rel"));
		formData.append('imagem_perspectiva_segundaID', $(".editar"+idTecnologia+" .imagemId2").attr("rel"));
		formData.append('imagem_perspectiva_terceiraID', $(".editar"+idTecnologia+" .imagemId3").attr("rel"));
		formData.append('imagem_perspectiva_quartaID', $(".editar"+idTecnologia+" .imagemId4").attr("rel"));
		$.ajax({
	        url: basePatch+"/admin/crud/TecnologiaAdm/editar",
	        type: 'POST',
	        contentType: 'multipart/form-data',
	        success: function( data )  
            { 
	        	if(data == "")
	        		{
	        		alert("Tecnologia editada com sucesso!");
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
		return false;
	});
	
	$(".conteudo").on("click",".edit-categoria",function(){
		var idCategoria = $(this).attr("rel");
		$(".boxCategoria"+idCategoria).fadeIn();
		return false;
	})
	$(".conteudo").on("click",".edit-subcategoria",function(){
		var idCategoriasub = $(this).attr("rel");
		$(".boxCategoriaSubcategoria"+idCategoriasub).fadeIn();
		return false;
	})
	$(".conteudo").on("click",".actionEditarCategoria",function(){
		var idCategoria = $(this).attr("rel");
		var valor = $(".boxCategoria"+idCategoria+" .valorSet").val();
		if(valor == "")
			{
				alert("Atenção o campo de edição está em branco.");
			}
		else
			{
		
				if(confirm("Tem certeza que deseja editar esta categoria?"))
				{
					$.ajax({
		    	        url: basePatch+"/admin/crud/produtos/editarCategoria",
		    	        type: 'POST',
		    	        success: function( data )  
		                { 
		    	        	alert("Categoria atualizada com sucesso!");
		    	        	location.reload();
		                },
		                data: {idCategoria:$(this).attr("rel"), valor:valor},
		    	    });
				}
			
			}
			return false;
		})
	$(".conteudo").on("click",".actionEditarCategoriaSub",function(){
		var idCategoriasub = $(this).attr("rel");
		var valor = $(".boxCategoriaSubcategoria"+idCategoriasub+" .valorSet").val();
		if(valor == "")
		{
			alert("Atenção o campo de edição está em branco.");
		}
		else
			{
			if(confirm("Tem certeza que deseja editar esta sub-categoria?"))
				{
					$.ajax({
		    	        url: basePatch+"/admin/crud/produtos/editarSubCategoria",
		    	        type: 'POST',
		    	        success: function( data )  
		                { 
		    	        	alert("Sub-Categoria atualizada com sucesso!");
		    	        	location.reload();
		                },
		                data: {idCategoria:$(this).attr("rel"), valor:valor},
		    	    });
				}
			}
			return false;
		})	
	$(".conteudo").on("click",".delete-email-news",function(){
		var DeletEmail = $(this).attr("rel");
		var Email = $(this);
		if(confirm("Tem certeza que deseja excluir este email?"))
			
		{
		        $.ajax({
	    	        url: basePatch+"/admin/crud/newslatter/delete",
	    	        type: 'POST',
	    	        success: function( data )  
	                { 
	                	$(Email).closest("li").remove();
	                },
	                data: {id:DeletEmail},
	    	    });
		}		
		return false;
	})
	$(".conteudo").on("click",".EdTec",function(){
		var idProduto = $(this).attr("rel");
		$.ajax({
	        url: basePatch+"/admin/crud/produtos/editarTecnologia",
	        type: 'POST',
	        success: function( data )  
            { 
	        	$( "#popupTecnologia" ).html(data).dialog({
	  		      resizable: false,
	  		      width:400,
	  		      height:210,
	  		      title:"Alterar tecnologia do produto",
	  		      modal: true,
	  		      buttons: {
	  		    	  	"Salvar alterações": function() {
	  		        	var erros = "";
	  		        	var n = $( ".setsEditarTecnologia:checked" ).length;
	  		        	if(n == 0) erros = erros+"- Selecione no minímo uma tecnologia\n";
	  		        	if(erros == "")
	  		        	{
	  		        		var formData = new FormData();
		  		  			var ids = [];
		  		  			$(".setsEditarTecnologia:checked").each(function(i, e) {
		  		  			    ids.push($(this).val());
		  		  			});
		  		  			formData.append('tecnologia', ids );
		  		  			formData.append('idProduto', idProduto );
			  		  		$.ajax({
			  	    	        url: basePatch+"/admin/crud/produtos/salvarTecnologia",
			  	    	        type: 'POST',
			  	    	        contentType: 'multipart/form-data',
			  	    	        success: function( data )  
			  	                { 
			  	    	        	alert("Tecnologia atualizada com sucesso.");
			  	    	        	$( "#popupTecnologia" ).dialog("close");
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
	  		        	
	  		        },
	  		      }
	        	})
            },
            data: {idProduto:idProduto},
	    });
		
		return false;
	})
	$(".conteudo").on("click",".AddCor",function(){
		var idProduto = $(this).attr("rel");
		$( "#popupCor" ).dialog({
		      resizable: false,
		      width:400,
		      height:210,
		      title:"Adicionar uma nova cor",
		      modal: true,
		      buttons: {
		        "Adicionar": function() {
		    		var erros = "";
		    		if($('.formpopupCor input[type=file]')[0].files[0] == null) erros = erros+"- Insira uma imagem para cor do tenis\n";
		    		if($('.formpopupCor .modelo').val() == "") erros = erros+"- Qual o modelo do tenis?\n";
		    		
		    		if(erros == "")
		    		{
		    			var formData = new FormData();
		    			formData.append('imagem', $('.formpopupCor input[type=file]')[0].files[0]);
		    			formData.append('modelo', $(".formpopupCor .modelo").val());
		    			formData.append('idProduto', idProduto);
		    			$.ajax({
		        	        url: basePatch+"/admin/crud/produtos/adicionaCor",
		        	        type: 'POST',
		        	        contentType: 'multipart/form-data',
		        	        success: function( data )  
		                    { 
		        	        	if(data == "")
		        	        		{
		        	        		alert("Sugestão de cor adicionada com sucesso!");
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
		        },
		      }
		})
		return false;
	})
	$( document ).ajaxSend(function() {
		  $("#popup-login").fadeIn();
		});
	$( document ).ajaxComplete(function() {
		 $("#popup-login").fadeOut();
		});
	$(".conteudo").on("click",".excluirCategoria",function(){
		if(confirm("Atenção, excluindo esta categoria todos os produtos do mesmo serão excluídos, tem certeza que deseja excluir?"))
			{
				$.ajax({
	    	        url: basePatch+"/admin/crud/produtos/deleteCategoria",
	    	        type: 'POST',
	    	        success: function( data )  
	                { 
	    	        	location.reload();
	                },
	                data: {idCategoria:$(this).attr("rel")},
	    	    });
			}
		return false;
	})
	$(".conteudo").on("click",".excluirSubcategoria",function(){
		if(confirm("Atenção, excluindo esta sub-categoria todos os produtos do mesmo serão excluídos, tem certeza que deseja excluir?"))
			{
				$.ajax({
	    	        url: basePatch+"/admin/crud/produtos/deleteSubCategoria",
	    	        type: 'POST',
	    	        success: function( data )  
	                { 
	    	        	location.reload();
	                },
	                data: {idSubcategoria:$(this).attr("rel")},
	    	    });
			}
		return false;
	})
	$(".conteudo").on("click",".actionAdicionaWallpaper",function(){
		var erros = "";
		if($(".formWallpaper .titulo").val() == "") erros = erros+"- Qual o título do clipping?\n";
    	if($('.formWallpaper input[type=file]')[0].files[0] == null) erros = erros+"- Insira uma imagem do clipping\n";
    	if(erros == "")
    		{
    			var formData = new FormData();
    			formData.append('imagem', $('.formWallpaper input[type=file]')[0].files[0]);
    			formData.append('titulo', $(".formWallpaper .titulo").val());
    			$.ajax({
        	        url: basePatch+"/admin/crud/wallpaper/wallpaperCrud",
        	        type: 'POST',
        	        contentType: 'multipart/form-data',
        	        success: function( data )  
                    { 
        	        	if(data == "")
        	        		{
        	        			alert("Clipping Adicionado com sucesso");
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
				formData.append('titulo', $(".formMidia .titulo").val());
				formData.append('url', $(".formMidia .url").val());
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
	$(".conteudo").on("click",".salvarCategoriaProduto",function(){
		var erros = "";
		if($('.formProduto .tituloCategoria').val() == "") erros = erros+"- Digite o titulo da categoria\n";
		if(erros == "")
		{
			$.ajax({
    	        url: basePatch+"/admin/crud/produtos/adicionaCategoria",
    	        type: 'POST',
    	        data: {titulo:$('.formProduto .tituloCategoria').val()},
    	        success: function( data )  
                { 
    	        	$(".adicionaCategoria").fadeOut()
    	        	$(".adicionaSubCategoria").fadeIn();
    	        	$.ajax({
    	    	        url: basePatch+"/admin/crud/produtos/populateCategoriaAjax",
    	    	        type: 'POST',
    	    	        data: {checked:data},
    	    	        success: function( data )  
    	                { 
    	    	        	if(data != "")
    	    	        		{
    	    	        			$(".formProduto .categoria").removeAttr("disabled");
    	    	        			$(".formProduto .categoria").html(data);
    	    	        			$(".categoriaSelect").fadeIn();
    	    	        		}
    	    	        	$.ajax({
    	    	    	        url: basePatch+"/admin/crud/produtos/populateCategoriaAndSubcategoriaAjax",
    	    	    	        type: 'POST',
    	    	    	        success: function( data )  
    	    	                { 
    	    	    	        	$(".box-produto").html(data);
    	    	                }
    	    	    	    });
    	                }
    	    	    });
                }
    	    });
		}
		else
		{
			alert("Existe alguns erros abaixo:\n\n"+erros);
		}
		return false;
	})
	$(".conteudo").on("click",".salvarSubCategoriaProduto",function(){
    	        		var erros = "";
    	        		if($('.formProduto .tituloSubCategoria').val() == "") erros = erros+"- Digite o titulo da sub-categoria\n";
    	        		if(erros == "")
    	        			{
    	        				var idCategoria = $(".formProduto .categoria").val();
		    	        		$.ajax({
		    	        	        url: basePatch+"/admin/crud/produtos/adicionaSubCategoria",
		    	        	        type: 'POST',
		    	        	        data: {titulo:$('.formProduto .tituloSubCategoria').val(),categoria:idCategoria},
		    	        	        success: function( data )  
		    	                    { 
		    	        	        	
		    	        	        	$(".adicionaSubCategoria").fadeOut()
		    	        	        	$.ajax({
		    	        	    	        url: basePatch+"/admin/crud/produtos/populateSubcategoriaAjax",
		    	        	    	        type: 'POST',
		    	        	    	        data: {idCategoria:idCategoria,checked:data},
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
		    	        	    	        	$(".subcategoriaSelect").fadeIn();
		    	        	    	        	$.ajax({
		    	        	    	    	        url: basePatch+"/admin/crud/produtos/populateCategoriaAndSubcategoriaAjax",
		    	        	    	    	        type: 'POST',
		    	        	    	    	        success: function( data )  
		    	        	    	                { 
		    	        	    	    	        	$(".box-produto").html(data);
		    	        	    	                }
		    	        	    	    	    });
		    	        	                }
		    	        	    	    });
		    	                    }
		    	        	    });
    	        			}
	    	        		else
	    	        		{
	    	        			alert("Existe alguns erros abaixo:\n\n"+erros);
	    	        		}
    	        		return false;
    })
	$(".conteudo").on('change',".formProduto .subcategoria",function(){
		if($(this).val() == "adicionaOutra")
		{
			$(".subcategoriaSelect").fadeOut();
			$(".adicionaSubCategoria").fadeIn();
		}
	})
	$(".conteudo").on('change',".formProduto .categoria",function(){
		if($(this).val() == "")
			{
			}
		else if($(this).val() == "addCategoria")
			{
				$(".categoriaSelect").fadeOut();
				$(".subcategoriaSelect").fadeOut();
				$(".adicionaSubCategoria").fadeOut();
				$(".adicionaCategoria").fadeIn();
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
	    	        			$(".subcategoriaSelect").fadeIn();
	    	        			$(".adicionaSubCategoria").fadeOut();
	    	        			$(".formProduto .subcategoria").removeAttr("disabled");
	    	        			$(".formProduto .subcategoria").html(data);
	    	        		}
	    	        	else
	    	        		{
	    	        			$(".subcategoriaSelect").fadeOut();
	    	        			$(".adicionaSubCategoria").fadeIn();
	    	        		}
	                }
	    	    });
			}
	})
	$(".conteudo").on("click",".actionAdicionaProduto",function(){
		
		var erros = "";
		var n = $( ".tecnologia:checked" ).length;
		if($('.formProduto .titulo').val() == "") erros = erros+"- Qual o titulo do produto?\n";
		if($('.formProduto input[type=file]')[0].files[0] == null) erros = erros+"- Insira uma imagem do tenis\n";
		if($('.formProduto .categoria').val() == "" || $('.formProduto .categoria').val() == "addCategoria") erros = erros+"- Selecione uma categoria\n";
		if($('.formProduto .statusDescricaoTenis').val() == "") erros = erros+"- Digite uma descrição minima do tenis\n";
		if($('.formProduto .subcategoria').val() == "") erros = erros+"- Selecione uma sub-categoria\n";
		if($('.formProduto .tamanhoMin').val() == "") erros = erros+"- Digite um tamanho minimo\n";
		if($('.formProduto .tamanhoMax').val() == "") erros = erros+"- Digite um tamanho maximo\n";
		if($('.formProduto .modelo').val() == "") erros = erros+"- Qual o modelo do tenis?\n";
		if(n == 0) erros = erros+"- Selecione no minímo uma tecnologia\n";
		if($('.formProduto .vitrine:checked').val() == "sim")
		{
			if($('.formProduto input[type=file]')[1].files[0] == null) erros = erros+"- Insira uma imagem para a vitrine\n";
		}
		if(erros == "")
		{
			var formData = new FormData();
			var ids = [];
			$(".tecnologia:checked").each(function(i, e) {
			    ids.push($(this).val());
			});
			formData.append('imagem', $('.formProduto input[type=file]')[0].files[0]);
			formData.append('categoria', $(".formProduto .categoria").val());
			formData.append('tecnologia', ids );
			formData.append('descricao', $(".formProduto .statusDescricaoTenis").val());
			formData.append('subcategoria', $(".formProduto .subcategoria").val());
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
	$(".conteudo").on("click",".deletarSugestaoAction",function(){
		var action = $(this).attr("rev");
		var idAction = $(this).attr("rel");
		if(confirm("Tem certeza que deseja excluir esta sugestão de cor?"))
			{
				$.ajax({	
		        url: basePatch+"/admin/crud/"+action+"/deleteSugestao",
		        type: 'POST',
		        success: function( data )  
	            { 
		        	alert(data);
		        	location.reload();
	            },
		        data: {idAction:idAction}
		    		});
			}
		return false;
	})
	$(".conteudo").on("click",".deletarAction",function(){
		var action = $(this).attr("rev");
		var idAction = $(this).attr("rel");
		if(confirm("Tem certeza que deseja excluir?"))
			{
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
			}
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
	
	
	$(".conteudo").on("click",".actionAdicionaTecnologia",function(){
		var erros = "";
		if($(".formTecnologia .titulo").val() == "") erros = erros+"- Digite o título da Tecnologia.\n";
		if($(".formTecnologia .statusMensagem").val() == "") erros = erros+"- Digite a descrição da Tecnologia.\n";
		if($('.formTecnologia input[type=file]')[0].files[0] == null) erros = erros+"- Insira uma imagem do logo\n";
		if($('.formTecnologia input[type=file]')[1].files[0] == null) erros = erros+"- Insira uma imagem de destaque\n";
		if($('.formTecnologia input[type=file]')[2].files[0] == null) erros = erros+"- Insira a 1° Imagem de perspectiva\n";
		if($('.formTecnologia input[type=file]')[3].files[0] == null) erros = erros+"- Insira a 2° Imagem de perspectiva\n";
		if($('.formTecnologia input[type=file]')[4].files[0] == null) erros = erros+"- Insira a 3° Imagem de perspectiva\n";
		if($('.formTecnologia input[type=file]')[5].files[0] == null) erros = erros+"- Insira a 4° Imagem de perspectiva\n";
    	if(erros == "")
    		{
		    		var formData = new FormData();
		    		formData.append('titulo', $(".formTecnologia .titulo").val());
		    		formData.append('descricao', $(".formTecnologia .statusMensagem").val());
					formData.append('logo', $('.formTecnologia input[type=file]')[0].files[0]);
					formData.append('imagem_destaque', $('.formTecnologia input[type=file]')[1].files[0]);
					formData.append('imagem_perspectiva_primeira', $('.formTecnologia input[type=file]')[2].files[0]);
					formData.append('imagem_perspectiva_segunda', $('.formTecnologia input[type=file]')[3].files[0]);
					formData.append('imagem_perspectiva_terceira', $('.formTecnologia input[type=file]')[4].files[0]);
					formData.append('imagem_perspectiva_quarta', $('.formTecnologia input[type=file]')[5].files[0]);
					
					$.ajax({
		    	        url: basePatch+"/admin/crud/TecnologiaAdm/tecnologiaAdmCrud",
		    	        type: 'POST',
		    	        contentType: 'multipart/form-data',
		    	        success: function( data )  
		                { 
		    	        	if(data == "")
		    	        		{
		    	        		alert("Tecnologia adicionada com sucesso!");
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


})