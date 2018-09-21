<!--navbar-->
         <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                    <a class="navbar-brand" href="../"><strong>Projet Hitema</strong></a>
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
                            <div class="dropdown">
                               <button class="btn btn-test dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <strong><label class="mr-2">Bienvenue <?php echo $_SESSION["username"];?></label></strong>
                             </button>
                             <div class="dropdown-menu">
                              <?php
                                if($_SESSION['username']=='admin')
                                {
                                  echo '<a class="dropdown-item" href="http://localhost/hitemaphp/projethitema/ProjetHitemaPrincipal/backend/administration.php"> Administration </a>
                                        <a class="dropdown-item" href="http://localhost/hitemaphp/projethitema/ProjetHitemaPrincipal/backend/NewPoint.php"> Gestion Map </a>';
                                }
                              ?>
                                 
                                 <a class="dropdown-item" href="http://localhost/hitemaphp/projethitema/ProjetHitemaPrincipal/backend/mesCommandes.php"> Mes commandes </a>
                                <a class="dropdown-item" href="http://localhost/hitemaphp/projethitema/ProjetHitemaPrincipal/backend/Disconnect.php">Se déconnecter</a>
                             </div>   
                            </div>
                        <?php
                         }
                        else
                        {
                            ?>
                            
                            <button  type="button" class="btn btn-test" data-toggle="modal" data-target="#exampleModal">S'identifier</button>
                            <a href="http://localhost/hitemaphp/projethitema/ProjetHitemaPrincipal/inscription.php"><button  type="button" class="btn btn-test" >S'inscrire</button></a>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </nav>