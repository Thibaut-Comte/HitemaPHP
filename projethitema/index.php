<html>
<header>
    <!-- Titre -->
    <title>
        Projet-Hitema
    </title>
    <!-- style bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    <!-- Feuille de style -->
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="css/slider.css">

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</header>
<body class="intro-2">

<?php
session_start();
require_once('backend/connectMenu.php');
?>


<br><br>
<div id="wrapper">

    <h1>Bienvenue à vous,</h1>
    <h2> ce projet à pour but la création d'une application de location de logements entre particuliers.</h2>

    <div id="slider-wrap">
        <ul id="slider">
            <li data-color="#1abc9c">
                <div>
                    <h3>Bruxelles</h3>
                    <span>A Partir de 99€</span>
                </div>
                <img src="imgHotel/BruxellesPicture.jpg" height="100%" width="100%">
            </li>

            <li data-color="#3498db">
                <div>
                    <h3>Paris</h3>
                    <span>A Partir de 120€</span>
                </div>
                <img src="imgHotel/Paris1Picture.jpg" height="100%" width="100%">
            </li>

            <li data-color="#9b59b6">
                <div>
                    <h3>Madrid</h3>
                    <span>A Partir de 90€</span>
                </div>
                <img src="imgHotel/EspagnePicture.jpg" height="100%" width="100%">
            </li>

            <li data-color="#34495e">
                <div>
                    <h3>Munich</h3>
                    <span>A Partir de 75€</span>
                </div>
                <img src="imgHotel/AllemandPicture.jpg" height="100%" width="100%">
            </li>

            <li data-color="#e74c3c">
                <div>
                    <h3>Marseille</h3>
                    <span>A partir de 82€</span>
                </div>
                <img src="imgHotel/PauPicture.jpg" height="100%" width="100%">
            </li>


        </ul>

        <!--controls-->
        <div class="btns" id="next"><i class="fa fa-arrow-right" style="margin-top: 20px;"></i></div>
        <div class="btns" id="previous"><i class="fa fa-arrow-left" style="margin-top: 20px;"></i></div>
        <div id="counter"></div>

        <div id="pagination-wrap">
            <ul>
            </ul>
        </div>
        <!--controls-->

    </div>
    <br>
    <center><a class="btn btn-primary btn-lg mb-2" href="backend/map.php" style="background-color:#3c8dbc;"
               role="button">Recherche</a></center>
</div>


<!--Popup modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
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
                        <button type="submit" class="btn btn-primary" name="submitValidation" required>Se connecter
                        </button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal" required>Fermer</button>
            </div>
        </div>
    </div>


</div>
</body>
<footer>
    <script type="text/javascript" src="javascript/slider.js"></script>
    <script src="style/javascriptaccueil.js"></script>
</footer>
</html>