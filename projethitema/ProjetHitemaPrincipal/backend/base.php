<?php


try{		$user="root";
			$pass="";	
			$base=new PDO('mysql:host=localhost;dbname=hitemaprojet;charset=utf8', $user, $pass);
}
catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}    

?>