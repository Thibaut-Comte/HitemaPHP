<?php

function GETusers($bdd,$username,$password)
{

	$requeteGetUsers=$bdd->prepare("SELECT * FROM users WHERE login=:login AND password=:password");
	$requeteGetUsers->bindParam('login', $username);
	$requeteGetUsers->bindParam('password', $password);
	$requeteGetUsers->execute();
	$dataGetUsers=$requeteGetUsers->fetch();

	return $dataGetUsers;

}



?>