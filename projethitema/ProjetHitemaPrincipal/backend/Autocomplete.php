<?php
require_once('base.php');
session_start();
if(isset($_SESSION['username']))
{
	if(isset($_POST['AutocompleteValue']))
	{	
		//echo $_POST['AutocompleteValue'];
		$_POST['AutocompleteValue'] = $_POST['AutocompleteValue']."%";
		$requeteAutocomplete=$base->prepare(" SELECT DISTINCT Localisation FROM hotel WHERE Localisation LIKE :Localisation  ");
		$requeteAutocomplete->bindParam('Localisation', $_POST['AutocompleteValue'] );
		
		$requeteAutocomplete->execute();
		
		while($dataValueAutocomplete=$requeteAutocomplete->fetch())
		{


			echo "<li class='list-group-item' id='liAutocomplete'>".$dataValueAutocomplete[0]."</li>";

		}
	}

}
?>