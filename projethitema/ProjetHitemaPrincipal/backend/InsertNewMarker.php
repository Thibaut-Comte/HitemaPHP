<?php
require_once('base.php');
session_start();
if(isset($_SESSION['username']))
{

	if(isset($_POST['ValidMarker']))
	{

		if($_POST['nameHotel']!="" && $_POST['villeHotel']!="" && $_POST['lat']!="" && $_POST['lng']!="")
		{	
			$name=$_POST['nameHotel'];
			$localisation=$_POST['villeHotel'];
			$Description="test description";
			$latitude=$_POST['lat'];
			$longitude=$_POST['lng'];

			echo $name.'<br>';
			echo $localisation.'<br>';
			echo $Description.'<br>';
			echo $latitude.'<br>';
			echo $longitude.'<br>';

			$requeteInsertMarker=$base->prepare("INSERT INTO `hotel`(`Localisation`, `Name`, `Description`, `latitude`, `longitude`) VALUES (:localisation,:name,:Description,:latitude,:longitude)");
			$requeteInsertMarker->bindParam(':localisation', $localisation);
			$requeteInsertMarker->bindParam(':name', $name);
			$requeteInsertMarker->bindParam(':Description', $Description);
			$requeteInsertMarker->bindParam(':latitude', $latitude);
			$requeteInsertMarker->bindParam(':longitude', $longitude);
			$requeteInsertMarker->execute();

			if($requeteInsertMarker)
			{
				header('Location: NewPoint.php');
			}
			

		}
	}

}
else
{
	header('Location: ../index.php');

}





?>