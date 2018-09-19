
<?php

require_once('base.php');
session_start();
if(isset($_SESSION['username']))
{
		function get_list_articles($base) {
			$requeteBase=$base->prepare("SELECT * FROM hotel");
			$requeteBase->execute();
			$Liste_article = array(); 
			while($dataBase=$requeteBase->fetch())
			{

			array_push($Liste_article, array("ID" => $dataBase['ID'], "Localisation" => $dataBase['Localisation'], "Name" => $dataBase['Name'], "Longitude" => $dataBase['longitude'], "Latitude"=> $dataBase['latitude']));

			}

			return $Liste_article; 
		}



		function get_article_by_Localisation($Localisation, $base) { //je passe en paramètre de ma fonction l'id de l'article souhaité et l'objet PDO pour exécuter la requête



			$exe = $base->prepare("SELECT * FROM hotel WHERE Localisation =:Localisation "); //j'exécute ma requête
			$exe->bindParam('Localisation', $Localisation);
			$exe->execute();
			$Detail_article = array();
			while($result = $exe->fetch())
			{
				array_push($Detail_article, array("ID" => $result['ID'], "Localisation" => $result['Localisation'], "Name" => $result['Name'], "Longitude" => $result['longitude'], "Latitude"=> $result['latitude']));//je mets le résultat de ma requête dans une variable
			}
			return $Detail_article; //je retourne l'article en question
		}




	if(isset($_GET['action']))
	{
		if($_GET['action']=="get_article_by_Localisation" && isset($_GET['Localisation']))
		{
			$valeurFonction=get_article_by_Localisation($_GET['Localisation'],$base);

		}
		else if($_GET['action']=='get_list_articles')
		{
			$valeurFonction=get_list_articles($base);


		}
		
		//var_dump($valeurFonction);	
		echo json_encode($valeurFonction);
	}

}	
?>