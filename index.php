<html>
	<header>
		<!-- Titre -->
		<title>
			Projet-Hitema
		</title>
		<!-- style bootstrap -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<!-- Feuille de style -->
		<link rel="stylesheet" href="style.css" type="text/css" />
	</header>
	<body>
		<!--navbar-->
		 <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                    <a class="navbar-brand" href="#"><strong>Projet Hitema</strong></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                 	<div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">  
                            </li>
                        </ul>
                        <?php
                        if(!empty($_SESSION["username"]))
                        {
	                        ?>
	                        <label>Bienvenue <?php echo $_SESSION["username"];?></label>
	                        <?php
                        }
                        else
                        {
	                       	?>
	                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							  S'identifier
							</button>
							<?php
						}
						?>
                    </div>
                </div>
            </nav>
            <!--Intro Section-->
            <section class="view intro-2 hm-gradient">
                <div class="full-bg-img test">
                    <div class="container">
                        <div class="row">
                        	<div class="col-md-4 offset-md-4 text-center mt-5">
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4 offset-md-4 text-center mt-5">
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4 offset-md-4 text-center mt-5">
                        	</div>
                        </div>
                        <div class="row">
                        	<div class="col-md-4 offset-md-4 text-center mt-5">
                        		<h1>TEST</h1>
                        	</div>
                        </div>
                    </div>
                </div>
            </section>
			<!--Popup modal-->
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
				        <label>Identifiant</label>
				        <input class="form-control" type="text" name="username"><br>
				    	</div>
			        <div class="form-group">
				        <label>Mot de passe</label>
				        <input class="form-control" type="password" name="password">
			      	</div>
			      <div class="modal-footer">
			      	<button type="button" class="btn btn-primary" name="submitValidation">Se connecter</button>
			      	</form>
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
			      </div>
			    </div>
			  </div>
			</div>
	</body>
	<footer>
		<script type="text/javascript">
			$('#myModal').on('shown.bs.modal', function () {
 			$('#myInput').trigger('focus')
			})
			// Animations init
			new WOW().init();
		</script>

	</footer>
</html>