
$(document).ready(function(){
	$(".eventLogin").on("click",function(){
		$.ajax({
	        url: basePatch+"/logarUsuario",
	        type: 'POST',
	        success: function( data )  
            { 
	        	if(data == "01")
	        		{
	        		location.reload();
	        		}
	        	else
	        		{
	        		alert(data);
	        		}
            },
	        data:{eventLogin:$(".usuario").val(), eventPassword:$(".senha").val()},
	    });
		return false;
	})
});