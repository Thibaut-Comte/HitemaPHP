<?php
session_start();
require_once('base.php');
if(isset($_SESSION['username']))
{

	if(isset($_POST['Reservation']) && isset($_POST['ID']) && isset($_POST['Hotel']) && isset($_POST['dateArrivee']) && isset($_POST['dateDepart']) && isset($_POST['nbVoyageurs']))
	{
		

		 $requeteHotel=$base->prepare("SELECT * FROM Hotel WHERE ID=:id AND Name=:name ");
		 $requeteHotel->bindParam('id', $_POST['ID']);
		 $requeteHotel->bindParam('name', $_POST['Hotel']);
		 $requeteHotel->execute();

		 $dataHotel=$requeteHotel->fetch();
		 $time=time();
		 if($dataHotel!="")
		 {
		 	echo "Salut2";
		 	$requetInsertionHotel=$base->prepare("INSERT INTO `reservation`(`Hotel_ID`,`utilisateur`, `Hotel_Name`, `Arrivee`, `Depart`, `Nombre_Personne`,`Date_Reservation`) VALUES (:HotelId,:username,:HotelName,:Arrivee,:Depart,:Nombre_Personne,:Date_Reservation)");	
		 	$requetInsertionHotel->bindParam(':HotelId', $_POST['ID']);
		 	$requetInsertionHotel->bindParam(':username', $_SESSION['username']);
		 	$requetInsertionHotel->bindParam(':HotelName', $_POST['Hotel']);
		 	$requetInsertionHotel->bindParam(':Arrivee', $_POST['dateArrivee']);
		 	$requetInsertionHotel->bindParam(':Depart', $_POST['dateDepart']);
		 	$requetInsertionHotel->bindParam(':Nombre_Personne', $_POST['nbVoyageurs']);
		 	$requetInsertionHotel->bindParam(':Date_Reservation', $time);

		 	$inserted=$requetInsertionHotel->execute();
		 	print_r($requetInsertionHotel);
		 	if($inserted)
		 	{

		 		header('Location: mesCommandes.php');
		 	}
		 }

	}
	else
	{
		header('Location: map.php');
	}


}
else
{
	header('Location: ../index.php');
}

?>