<link rel="stylesheet" type="text/css" href="css/inscription.css">

<div class="container">
	<div class="box" id="sign-up">
		<a class="back" href="index.php"><span class="back-arrow">Accueil</span></a>
		<div class="brand">
			<div class="logo">
				<div class="square"></div>
				<div class="square"></div>
				<div class="square"></div>
			</div>
			<h2 class="title">Inscrivez vous</h2>
		</div>
		<div class="form">
			<form action="backend/GestionInscription.php" method="post">
				<input type="text" name="Login" placeholder="Login" required>
				
					<input type="password" name="Password" placeholder="Mot de passe" required>
					<input type="password" name="ConfirmPassword" placeholder="Confirmation mot de passe" required>	
				
				
				<button type="submit" name="ValidInscription">S'inscrire</button>
			</form>
		</div>
	</div>
</div>