<?php
session_start();
if(isset($_POST['submitValidation']))
{
	require_once('requeteSQL.php');
	require_once('base.php');

	if($_POST['username']!="" && $_POST['password']!="")
	{
		$_POST['password']=hash('sha256', $_POST['password']);
		$ValueUser=GETusers($base,$_POST['username'],$_POST['password']);
		if($ValueUser>0)
		{
			if(isset($_SESSION['username']))
			{
				session_destroy();
			}	
			
			$_SESSION['username']=$_POST['username'];
			header('Location: ../index.php');

		}
		else
		{

			header('Location: ../index.php');
		}
	}
	else
		{

			header('Location: ../index.php');
		}

}


?>