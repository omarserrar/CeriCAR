<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script></script>
    <title>
    <?php echo (isset($context->titre))?$context->titre:"Ceri Car";?>
    </title>
   <link href="https://fonts.googleapis.com/css?family=Public+Sans&display=swap" rel="stylesheet">
  

   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

   <script type="text/javascript" src="js/showhidepassword.js"></script>
   <script type="text/javascript" src="js/sortvoyages.js"></script>
   <script type="text/javascript" src="js/recherchevoyage.js"></script>
   <script type="text/javascript" src="js/ajaxsearch.js"></script>
   <script type="text/javascript" src="js/newvoyage.js"></script>
   <script type="text/javascript" src="js/mesvoyages.js"></script>
   <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <style>
    body{
      font-family: 'Public Sans', sans-serif;
    }
    .price{
      font-size: 47pt;
      color: orange;
      font-weight: 800;
    }
    .reserver{
        width: 57%;
    }
    .voyage{
      margin-top: 5px;
      margin-bottom: 5px; 
      height: 95%;
    }
    .voyages{

    }
    .profilpic{
      border-radius: 50%;
      height: 50px;
    }
   </style>
  </head>

  
  <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="monApplication.php">BipBipMontez <span class="sr-only">(current)</span></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="monApplication.php?action=rechercheVoyage">Rechercher un trajet</a>
      </li>
       <?php if($context->getSessionAttribute('user_id')) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="monApplication.php?action=mesvoyages">Mes Voyages</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="monApplication.php?action=mesreservations">Mes Reservations</a>
      </li>
      <?php } ?>
    </ul>
    <ul class="navbar-nav my-2 my-lg-0">
            <?php if(!$context->getSessionAttribute('user_id')) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="monApplication.php?action=login">Se connecter</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="monApplication.php?action=register">S'inscrire</a>
      </li>
     <?php } else{?>
        <li class="nav-item text-white">
        <span class="navbar-brand">Bonjour <?php echo $context->user->identifiant?></span>
        </li>
       <li class="nav-item">
        <a class="nav-link" href="monApplication.php?action=logout">Se deconnecter</a>
      </li>
     <?php } ?>
    </ul>
  </div>
  </nav>

    <div id="page">
      <?php if($context->error): ?>
      	<div class="alert alert-danger" role="alert">
		  <?php echo " $context->error !!!!!" ?>
		  </div>
      <?php endif; ?>
      <div id="page_maincontent">	
      	<?php include($template_view); ?>
      </div>
    </div>
      

  </body>

</html>
