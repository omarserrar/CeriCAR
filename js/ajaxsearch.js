$(document).ready(function(){
	$('#recherche').submit(function(){
		 	$("#resultat").html( "<center><div class=\"spinner-border text-dark\" role=\"status\"><span class=\"sr-only\">Loading...</span></div><p>Recherche en cours...</p></center>" );
		 	var villeDepart = $("#depart").val();
		 	var villeArrivee = $("#arrivee").val();
			 var voyageurnb = $("#voyageurnb").val();

		 	 $.ajax({
		       url : 'ajaxDispatcher.php?action=rechercheVoyageCorrespendance',
		       data: {depart: villeDepart, arrivee: villeArrivee, nbvoyageur: voyageurnb},
		       type : 'POST',
		       dataType : 'html', // On désire recevoir du HTML
		       success : function(code_html, statut){ // code_html contient le HTML renvoyé
		       	console.log(code_html);
		          $("#resultat").html(code_html);
		       }
	   		});


		 	return false;
		 })
});