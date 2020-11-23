
  <div style="margin-left:5px;margin-top:30px;" class="container">
      <form method="GET" action="" id="newvoyage">
 <div class="row">

 <p class="h1">Ajouter un Voyage</p> 
 </div>

 <div class="row"> 

<div class="col">
  <?php if($context->success) { ?>
   <div class="card text-center">
          <div class="card-body">
            <img src="images/success.gif" width="50px">
          <h5 class="card-title">VOYAGE AJOUTE</h5>
          <p class="card-text">Vous pouvez consuler vos voyages.</p>
          <a href="monApplication.php?action=mesvoyages" class="btn btn-success btn-lg">Mes Voyages</a>
        </div>
            </div>
 <?php } ?>
	<input type="hidden" name="action" value="nouveauVoyagePost">	
	<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="depart">Ville de départ</label>
  </div>
<select name="depart" id="depart" class="custom-select">
	
	<?php foreach($context->villes as $ville) { ?>
		<?php if(isset($_REQUEST['depart']) && $_REQUEST['depart'] == $ville['ville']){ ?>
		<option value="<?php echo $ville['ville'] ?>" selected><?php echo $ville['ville'] ?></option>
		<?php }else{ ?>
		<option value="<?php echo $ville['ville'] ?>"><?php echo $ville['ville'] ?></option>
	<?php } } ?> 
</select>
</div>
</div>
<div class="col">
<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="arrivee">Ville d'arrivée</label>
  </div>
<select name="arrivee" id="arrivee" class="custom-select">
	<?php foreach($context->villes as $ville) { ?>
		<?php if(isset($_REQUEST['arrivee']) && $_REQUEST['arrivee'] == $ville['ville']){ ?>
		<option value="<?php echo $ville['ville'] ?>" selected><?php echo $ville['ville'] ?></option>
		<?php }else{ ?>
		<option value="<?php echo $ville['ville'] ?>"><?php echo $ville['ville'] ?></option>
	<?php } } ?> 
</select>
</div>
</div>

</div>
<div class="row">
	<div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Nombre de Places</div>
        </div>
        <input type="number" max="5" min="1" class="form-control" name="nbplace" id="nbplace" value="1">
      </div>
</div>
<div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Prix par Km</div>
        </div>
        <input type="number" max="50" min="0" step="0.001" class="form-control" name="tarifparkm" id="tarifparkm" value="1">
      </div>
</div>
</div>
<div class="row">
	<div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Heure De Depart</div>
        </div>
        <input type="number" max="23" min="0" class="form-control" name="heuredepart"  id="heuredepart" value="0">
      </div>
</div>
<div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Contraintes</div>
        </div>
        <textarea name="contraintes" id="contraintes" ></textarea>
      </div>
</div>
</div>
<div class="row">
<div class="col">
<button type="submit" class="btn btn-dark">Rechercher</button>
</div>
</div>
</form>
</div>
<div id="resultat">

</div>