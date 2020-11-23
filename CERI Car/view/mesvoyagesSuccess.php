
 <div id="container">
            <div id="page_maincontent">	

      	<div class="col voyages" > 
           <div class="card voyage rounded-lg">
           <div class="card-header text-center">
            Vos Voyages
          </div>
          <div class="card-body">
          <a href="monApplication.php?action=nouveauVoyage" class="btn btn-primary btn-lg btn-block">Nouveau Voyage</a>

<?php foreach($context->voyagesData as $voyageData) { ?>
         <div class="row">
             <div class="col-sm">
          <div class="card voyage rounded-lg">
           
          <div class="card-body">
            
                <div class="row">
              <div class="col-sm">
                <table cellpadding="5">
                  <tr><th><?php echo $voyageData->departFormat?></th><th><?php echo $voyageData->voyage->trajet->depart;?></th></tr>
                  <tr><td colspan="2"><i class="fa fa-clock-o"></i> <?php echo $voyageData->dureeFormat?></td></tr>
                  <tr><th><?php echo $voyageData->arriveeFormat?></th><th><?php echo $voyageData->voyage->trajet->arrivee;?></th></tr>
                  <tr><td colspan="2"> </td></tr>
                </table>
              </div>
              <div class="col-sm">
                    <input type="hidden" name="voyages[]" value="<?php echo $correspendance->voyagesData[0]->voyage->id ?>">
                    <table cellpadding="5">
                      <?php if(trim($voyageData->voyage->contraintes) !=="") { ?>
                    <tr><th>Contraintes</th><td><?php echo trim($voyageData->voyage->contraintes) ?></td></tr>
                      <?php } ?>
                    <tr><th colspan="2">Conducteur</th></tr>
                    <tr><td colspan="2"><img src="https://picsum.photos/200" class="profilpic"> <?php echo $voyageData->voyage->conducteur->nom." ".$voyageData->voyage->conducteur->prenom?></td></tr>
                     <tr><td colspan="2"><b><?php echo $voyageData->placeReserve?> Passager(s)</b></td></tr>
                    </table>
              </div>
            </div>
                <?php if($voyageData->placeReserve >0) { ?>
              <div><a href="#" class="showreservations">Afficher le(s) <?php echo $voyageData->placeReserve?> Passager(s)</a></div>
            <div class="table table-striped reservations" style="display: none" >
              <table style="width: 100%">
                <?php foreach($voyageData->reservations as $reservation) {?>

                <tr>
                  <td>
                    <b> <?php echo $reservation->voyageur->nom . " ".$reservation->voyageur->prenom;?></b><br>
                    <i> <?php echo $reservation->voyageur->identifiant;?></i>
                  </td>
                </tr>

                <?php } ?>
              </table>
            </div>
                <?php } ?>
            </div>
              </div></div>
    	</div>    
<?php } ?>
 </div>
          </div>
         
    </div>