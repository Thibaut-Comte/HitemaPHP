<?php
session_start();
require_once('base.php');



if(isset($_POST['ValidInscription']))
{
	if($_POST['Login']!="" && $_POST['Password']!="" && $_POST['ConfirmPassword']!="")
	{
		$requetLoginExist=$base->prepare("SELECT login FROM users WHERE login=:Login");
		$requetLoginExist->bindParam('Login', $_POST['Login']);
		$requetLoginExist->execute();
		$dataLoginExist=$requetLoginExist->fetch();

		if($dataLoginExist!="")
		{
			?><script type="text/javascript"> alert('Ce nom d\'utilisateur existe déja');window.location = "../inscription.php";</script><?php
			
		}
		else
		{
			if($_POST['Password']==$_POST['ConfirmPassword'])
			{
				$login=$_POST['Login'];
				$password=hash('sha256', $_POST['Password']);
				$time=time();

				$requeteInsertion=$base->prepare("INSERT INTO `users`(`login`, `password`, `signup_date`) VALUES (:Login,:Password,:Time)");
				$requeteInsertion->bindParam(':Login', $login);
				$requeteInsertion->bindParam(':Password', $password);
				$requeteInsertion->bindParam(':Time', $time);
				$requeteInsertion->execute();

				if($requeteInsertion)
				{
					header('Location: ../index.php');
				}

			}
			else
			{
				?><script type="text/javascript"> alert('Les mots de passes ne correspondent pas');window.location = "../inscription.php";</script><?php
			}

		}


	}

}


?>