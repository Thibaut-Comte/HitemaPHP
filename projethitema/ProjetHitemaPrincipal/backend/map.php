
<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>TestsMap</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- Feuille de style -->
		<link rel="stylesheet" href="../css/map.css" type="text/css" />
		<link rel="stylesheet" href="../css/style.css" type="text/css" />
		<link rel="stylesheet" type="text/css" href="../css/slider.css">
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>

		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
		integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
		crossorigin=""/>

		<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"></script>

		<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
		integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
		crossorigin=""></script>
		<script type="text/javascript" src="../javascript/Autocomplete.js"></script>
	
</head>	
<body>
<style type="text/css">
	.leaflet-popup-content-wrapper{

		min-width: 110%;
	}
input{
	text-align: center;
}

</style>
<?php
session_start();
require_once('connectMenu.php');
?>
	
            <!--Intro Section-->
            <section class="view intro-2 hm-gradient">
                <div class="full-bg-img test">
                    <div class="container">
                        <div class="row">
                        	<div class="col-md-4 offset-md-4 text-center mt-5">
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4 offset-md-4 text-center mt-5">
                        	</div>
                        </div>
                        

                        
	                        	<?php

	                        	if(isset($_SESSION['username']))
	                        	{
	                        	?>
	                        	<div class="container" style="width:560px;">
					    	
									<form class="form-inline">
									  
									  <div class="form-group mx-sm-3 mb-2">
									    <label for="inputPassword2" class="sr-only">Cherchez une ville</label>
									    <input type="text" class="form-control" id="Ville" autocomplete="off" placeholder="Saisissez une ville">
									  </div>
									  <button type="submit" id="ValidationRequete" class="btn btn-primary mb-2" style="background-color: #3c8dbc">Rechercher</button>
									 
									</form>
									 <ul class="list-group" id="ulAutocomplete" style="display: none;margin-bottom: 20px;">
							
									</ul>
								</div>

		                        <div class="row">
		                        	<div class="col-md-12 test2 shadow-lg mb-2">
									<div id="mapid" ></div>
		                        	
	                        	<?php
	                        	}
	                        	 else
	                        	{
	                        	?>
	                        		<div class="row">
		                        	<div class="col-md-12 test2 shadow-lg mb-2">

	                        		<div class="jumbotron">
									  <h1 style="font-family: Neucha, Arial, sans serif;">En attente de connexion!</h1>
									  <p class="lead">Vous devez être connecté pour accéder à notre carte</p>
									  <hr class="my-4">
									  <p>Cliquez sur le bouton ci-dessous et remplissez vos informations de connexions.</p>
 									  <a  type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal" style="background-color: #3c8dbc; text-decoration: none;color: #fff;">S'identifier</a>
                            		</div>
	                        	<?php
	                        	}
	                        	?>
                        	</div>
                        </div>
                    </div>
                </div>
            </section>

			<!--Popup modal-->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Identification</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      	<form action="GestionConnexion.php" method="POST">
			  		<div class="form-group">
				        <label>Identifiant</label>
				        <input class="form-control" type="text" name="username"><br>
				    	</div>
			        <div class="form-group">
				        <label>Mot de passe</label>
				        <input class="form-control" type="password" name="password">
			      	</div>
			      <div class="modal-footer">
			      	<button type="submit" class="btn btn-primary" name="submitValidation">Se connecter</button>
			      	</form>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>

	<script   src="../javascript/map.js"></script>
	<script type="text/javascript"> GetNameMap()</script>
	<script type="text/javascript"> Autocomplete()</script>

</body>
</html>