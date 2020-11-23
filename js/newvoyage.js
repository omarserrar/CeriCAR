
$(document).ready(function(){
	$('#newvoyage').submit(function(){
		 	$("#resultat").html( "<center><div class=\"spinner-border text-dark\" role=\"status\"><span class=\"sr-only\">Loading...</span></div><p>Recherche en cours...</p></center>" );
		 	var data = $(this).serialize();
		 	console.log(data);

			if(true){
			 	 $.ajax({
			       url : 'ajaxDispatcher.php',
			       data: $(this).serialize(),
			       type : 'POST',
			       dataType : 'html', // On désire recevoir du HTML
			       success : function(json, statut){ // code_html contient le HTML renvoyé

			       	console.log(json);
			       	var resultat = JSON.parse(json);
			       	if(resultat.success==="true"){
			       		$("#resultat").html("<div class='alert alert-success' role='alert'>Le voyage a été crée <a href='?action=mesvoyages'>Consulter vos voyages </a></div>");
			       	}
			       	else{
			       		$("#resultat").html("<div class='alert alert-danger' role='alert'>"+resultat.error+"</div>");
			       	}
			       }
		   		});
		 	}

		 	return false;
		 })
});