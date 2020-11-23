
$(document).ready(function() {
	$('body').on('click','.showreservations',function (event) {
		var table = $(this).parents().eq(2).find( ".reservations");
		if(table.is(":hidden")){
			this.innerText = this.innerText.replace("Afficher", "Masquer");
			table.show();
		}
		else{
			this.innerText = this.innerText.replace("Masquer", "Afficher");
			table.hide();
		}
		return false;
	});
});
