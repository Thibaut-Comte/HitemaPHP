<!DOCTYPE html>
<html>
<head>
	<title>
		Mes Commandes
	</title>


<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../css/map.css" type="text/css" />
<link rel="stylesheet" href="../css/map.css" type="text/css" />
		<link rel="stylesheet" href="../css/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/TableauData.css">    

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>    
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../javascript/TableauDatatables.js"></script>

<body>


<?php
require_once('base.php');
session_start();
if(isset($_SESSION['username']))
{
	
require_once('connectMenu.php');
echo"<br><br><br><br>";
echo"<div class='container'>";
	$requeteCommandes=$base->prepare("SELECT * FROM reservation WHERE utilisateur=:username");
	$requeteCommandes->bindParam('username', $_SESSION['username']);
	$requeteCommandes->execute();
	echo'<h2> Mes Commandes </h2><table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead><th>Hotel</th><th>Date Arrivée</th><th>Date Départ</th><th>Nombre de Personne</th><th>Date de Réservation</th></thead>
			<tfoot><th>Hotel</th><th>Date Arrivée</th><th>Date Départ</th><th>Nombre de Personne</th><th>Date de Réservation</th></tfoot>
			<tbody>';

	while($dataAfficherCommande= $requeteCommandes->fetch())
	{
		echo'<tr><td>'.$dataAfficherCommande['Hotel_Name'].'</td><td>'.$dataAfficherCommande['Arrivee'].'</td><td>'.$dataAfficherCommande['Depart'].'</td><td>'.$dataAfficherCommande['Nombre_Personne'].'</td><td>'.$dataAfficherCommande['Date_Reservation'].'</td></tr>';

	}

	echo'</tbody>
		</table>';

?>

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
			      	<form action="backend/GestionConnexion.php" method="POST">
			  		<div class="form-group">
				        <label style="color: #7f8c8d;">Identifiant</label>
				        <input class="form-control" type="text" name="username"><br>
				    	</div>
			        <div class="form-group">
				        <label style="color: #7f8c8d;">Mot de passe</label>
				        <input class="form-control" type="password" name="password">
			      	</div>
			      <div class="modal-footer">
			      	<button type="submit" class="btn btn-primary" name="submitValidation" required>Se connecter</button>
			      	</form>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal" required>Fermer</button>
			      </div>
			    </div>
			  </div>


			</div>
</div>

<?php

}
else
{
	header('Location: ../index.php');
}

?>