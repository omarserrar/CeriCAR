
  <div style="margin-left:5px;margin-top:30px;" class="container">
 <div class="row">

 <p class="h1">Ajouter un Voyage</p> 
 </div>

 <div class="row"> 
<div class="col">
<form method="GET" action="">
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

</div>
<div class="row">
  <div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Nombre de Places</div>
        </div>
        <input type="number" max="5" min="1" class="form-control" name="nbplace" id="voyageurnb" value="1">
      </div>
</div>
<div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Prix par Km</div>
        </div>
        <input type="number" max="50" min="0" step="0.001" class="form-control" name="tarifparkm" id="prix" value="1">
      </div>
</div>
</div>
<div class="row">
  <div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Heure De Depart</div>
        </div>
        <input type="number" max="23" min="0" class="form-control" name="heuredepart"  id="prix" value="0">
      </div>
</div>
<div class="col">
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">Contraintes</div>
        </div>
        <textarea name="contraintes" ></textarea>
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