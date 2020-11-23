
 <div id="page">
            <div id="page_maincontent">	
<?php if($context->correspendancesData){ ?>
  Trié par:
<button class="btn btn-warning sortprice">Prix</button>
 <button class="btn btn-warning sortcorrespendance">Nombre de correspendances</button>
<button class="btn btn-warning sorttime">Heure de depart</button>
<button class="btn btn-warning sortduree">Durée</button>
      	<div class="col voyages" >
<?php foreach($context->correspendancesData as $correspendance) { ?>
        <div data-price="<?php echo $correspendance->tarif?>" data-correspendance="<?php echo $correspendance->taille?>" data-duree="<?php echo $correspendance->dureeMinute ?>" data-depart="<?php echo $correspendance->departFormat?>"class="voyagerow">
            <form method="POST" id="reservationform" onsubmit="return confirm('Confimer votre réservation ?\n Vous allez payer <?php echo $correspendance->tarif." €* par voyageur" ?> ?');">
                <input type="hidden" name="action" value="reservation">
                <input type="hidden" name="nbvoyageur" value="<?php echo $context->nbvoyageur?>">
         <div class="row">
             <div class="col-sm">
          <div class="card voyage rounded-lg">
           
          <div class="card-body">
            
                <div class="row">
              <div class="col-sm">
                <table cellpadding="5">
                  <tr><th class="departtime"><?php echo $correspendance->departFormat?></th><th><?php echo $context->trajet->depart;?></th></tr>
                  <tr><td colspan="2"><i class="fa fa-clock-o"></i> <?php echo $correspendance->duree?></td></tr>
                  <tr><th class="arriveetime"><?php echo $correspendance->arriveeFormat?></th><th><?php echo $context->trajet->arrivee;?></th></tr>
                  <tr><td colspan="2"> </td></tr>
                </table>
                <?php if($correspendance->taille > 1) { ?>
                <a href="#" class="showcorrespendance">Afficher les <?php echo $correspendance->taille?> correspendances</a>
                <?php }else{ ?>
                <span> Direct </span><?php } ?>
              </div>
              <div class="col-sm">
                 <?php if($correspendance->taille ==1) { ?>
                    <input type="hidden" name="voyages[]" value="<?php echo $correspendance->voyagesData[0]->voyage->id ?>">
                    <table cellpadding="5">
                      <?php if(trim($correspendance->voyagesData[0]->voyage->contraintes) !=="") { ?>
                    <tr><th>Contraintes</th><td><?php echo trim($correspendance->voyagesData[0]->voyage->contraintes) ?></td></tr>
                      <?php } ?>
                    <tr><th colspan="2">Conducteur</th></tr>
                    <tr><td colspan="2"><img src="https://picsum.photos/200" class="profilpic"> <?php echo $correspendance->voyagesData[0]->voyage->conducteur->nom." ".$correspendance->voyagesData[0]->voyage->conducteur->prenom?></td></tr>
                    </table>
                  <?php } ?>
              </div>
            </div>
            <?php if($correspendance->taille > 1) { ?>
            <div align="center" class="table table-striped correspendancetable" style="display: none;">
              <table >
                <?php foreach($correspendance->voyagesData as $voyageData) {?>

                <tr>
                  <td><?php echo $voyageData->departFormat." > ".$voyageData->arriveeFormat . " ".$voyageData->voyage->trajet->distance . "km"?></td>
                  <td><?php echo $voyageData->voyage->trajet->depart?></td>
                  <td><?php echo $voyageData->voyage->trajet->arrivee?></td>
                  <td><?php echo $voyageData->placeDisponible; ?> Places disponibles</td>
                  <td><?php echo $voyageData->voyage->conducteur->nom . " ".$voyageData->voyage->conducteur->prenom?></td>
                  <td><?php echo $voyageData->voyage->contraintes?></td>
                  <td><b><?php echo $voyageData->voyage->tarif." €"?></b></td>
                  <td><input type="hidden" name="voyages[]" value="<?php echo $voyageData->voyage->id ?>"></td>
                </tr>

                <?php } ?>
              </table>
            </div>
                <?php } ?>
              </div></div></div>

           <div class="col col-lg-2" align="center">
           		<div class="card voyage rounded-lg">
           
		          <div class="card-body">
		                <div class="price"><span><?php echo $correspendance->tarif." €*"?></span></div>
                    <small>*Par voyageur </small>
		                <div><button class="reserver btn btn-warning" role="button" aria-pressed="true" <?php echo $context->reservation ?>>Réserver</button></div>

                    <?php if($correspendance->taille ==1) { ?>
                     <div><span><?php echo $correspendance->voyagesData[0]->placeDisponible; ?> Places Disponibles</span></div>
                    <?php } ?>
		          </div>
		         </div>
		    </div>
		
	</div>
   
              
  </form>     
  </div>    
<?php } ?>
 </div>
<?php }else{ ?>
    <div class="alert alert-danger" role="alert">
              Aucun Voyages Trouvés
            </div>
  <?php } ?>
          </div>
         
    </div>