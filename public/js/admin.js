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
        	        	alert(data);
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
})