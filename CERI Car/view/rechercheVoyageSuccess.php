
  <div style="margin-left:5px;margin-top:30px;" class="container">
 <div class="row">

 <p class="h1">Recherchez votre trajet</p> 
 </div>

 <div class="row"> 
<div class="col">
<form method="GET" action="" id="recherche">
	<input type="hidden" name="action" value="<?php echo $action ?>">	
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
<div class="col">
      <label class="sr-only" for="inlineFormInputGroup">Username</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Nombre de voyageurs</div>
        </div>
        <input type="number" max="5" min="1" class="form-control"  id="voyageurnb" value="1">
      </div>
    </div>
<div class="col">
<button type="submit" class="btn btn-dark">Rechercher</button>
</div>


</form>
</div>
</div>
<div id="resultat">

</div>