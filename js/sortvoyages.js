$(document).ready(function() {


	$('#page_maincontent').on('click','.sortprice',function (event) {
	  trierVoyage("data-price");
	});

	$('#page_maincontent').on('click','.sortcorrespendance',function (event) {
		trierVoyage("data-correspendance");
	});

	$('#page_maincontent').on('click','.sorttime',function (event) {
	  trierVoyage("data-depart");
	});

	$('#page_maincontent').on('click','.sortduree',function (event) {
	  trierVoyage("data-duree");
	  });
	function trierVoyage(attr){
		var voyages = document.getElementsByClassName("voyagerow");
		for(var i=0;i<voyages.length;i++){

			for(var j=i+1;j<voyages.length-1;j++){
				var val1 = parseInt(voyages[i].getAttribute("data-price"));
				var val2 = parseInt(voyages[j].getAttribute("data-price"));
				if(val1 > val2){
					console.log("ha");
					var tmp = voyages[i].outerHTML;
					voyages[i].outerHTML=voyages[j].outerHTML;
					voyages[j].outerHTML = tmp;
				}
			}
		}
	}
});
