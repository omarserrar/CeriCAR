
 <div id="container">
            <div id="page_maincontent">	

      	<div class="col voyages" > 
           <div class="card voyage rounded-lg">
           <div class="card-header text-center">
            Vos Réservations
          </div>
          <div class="card-body">
          <a href="monApplication.php?action=rechercheVoyage" class="btn btn-primary btn-lg btn-block">Nouvelle Réservation</a>

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
                    </table>
              </div>
            </div>
              </div></div></div>
    	</div>    
<?php } ?>
 </div>
          </div>
         
    </div>