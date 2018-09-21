<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administration</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<?php
session_start();
require_once('base.php');
if($_SESSION['username']=='admin')
{
    // REQUETE AFFICHAG DES COMMANDES
    $requeteCommandes=$base->prepare("SELECT * FROM reservation ORDER BY utilisateur ");
    $requeteCommandes->execute();
    // REQUETE AFFICHAGE DES UTILISATEURS
    $requeteUsers=$base->prepare("SELECT * FROM users ORDER BY signup_date ");
    $requeteUsers->execute();

    //REQUETE COMPTER LES COMMANDES
    $requeteCountCommandes=$base->prepare("SELECT COUNT(ID) FROM reservation ");
    $requeteCountCommandes->execute();
    $dataCountCommandes=$requeteCountCommandes->fetch();

    //REQUETE COMPTER LES UTILISATEURS
    $requeteCountUsers=$base->prepare("SELECT COUNT(id_user) FROM users ");
    $requeteCountUsers->execute();
    $dataCountUsers=$requeteCountUsers->fetch();
  ?>
  <body class="hold-transition skin-blue sidebar-mini">
    <style type="text/css">
      .dataTables_length{
        display: none;
      }
      .dataTables_filter{
        display: none;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
      }
    </style>
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
     
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
      
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
           
            
              <ul class="dropdown-menu">
               
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="#" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
       
        <!-- search form -->
        
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de Navigation</li><br>
          <a href="../index.php" >
            <li class="active treeview" style="margin-left: 10px;">
             <i class="fa fa-home"></i> <span>Accueil</span>        
         </li></a> <br>
         <a href="administration.php">
          <li class="treeview" style="margin-left: 10px;">
             <i class="fa fa-dashboard"></i> <span>DashBoard</span>       
         </li></a><br>

          <a href="NewPoint.php"><li class="treeview" style="margin-left: 10px;"> 
            
              <i class="fa fa-table"></i> <span>Gérer la map</span>
            
            
          </li></a>
         

      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Administration de l'application
          <small>Panneau de control</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="../index.php"><i class="fa fa-dashboard"></i> Accueil</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3><?php  echo $dataCountCommandes[0] ?></h3>

                <p>Nouvelles commandes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
              <div class="inner">
                <h3>93<sup style="font-size: 20px">%</sup></h3>

                <p>Réservations abouties</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
              <div class="inner">
                <h3><?php  echo $dataCountUsers[0];   ?></h3>

                <p>Utilisateurs</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3>2</h3>

                <p>Réservations annulées</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="nav-tabs-custom">
              <!-- Tabs within a box -->
              <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                <li class="pull-left header"><i class="fa fa-inbox"></i> Réservation</li>
              </ul>
              <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 400px;"></div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 400px;"></div>
              </div>
            </div>
        

           

          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

            <!-- Map box -->
            <div class="box box-solid bg-light-blue-gradient">
              <div class="box-header">
                <!-- tools box -->
                <div class="pull-right box-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip"
                          title="Date range">
                    <i class="fa fa-calendar"></i></button>
                  <button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse"
                          data-toggle="tooltip" title="Collapse" style="margin-right: 5px;">
                    <i class="fa fa-minus"></i></button>
                </div>
                <!-- /. tools -->

                <i class="fa fa-map-marker"></i>

                <h3 class="box-title">
                  Localisation des utilisateurs
                </h3>
              </div>
              <div class="box-body">
                <div id="world-map" style="height: 300px; width: 100%;"></div>
              </div>
              <!-- /.box-body-->
              <div class="box-footer no-border">
                <div class="row">
                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-1"></div>
                    <div class="knob-label">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                    <div id="sparkline-2"></div>
                    <div class="knob-label">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-xs-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="knob-label">Exists</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->

      </section>
      <!-- /.content -->
    
    
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title" style="margin-left: 520px;font-weight: bold;"><u>Liste des commandes</u></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead><th>Identifiant </th><th>Hotel</th><th>Date Arrivée</th><th>Date Départ</th><th>Nombre de Personne</th><th>Date de Réservation</th></thead>
                  
                  <tbody>
                    <?php
                      while($dataAfficherCommande= $requeteCommandes->fetch())
                      {

                        $DateReservation=  date("Y-m-d", $dataAfficherCommande['Date_Reservation']);
                       echo'<tr><td>'.htmlspecialchars($dataAfficherCommande['utilisateur']).'</td><td>'.htmlspecialchars($dataAfficherCommande['Hotel_Name']).'</td><td>'.htmlspecialchars($dataAfficherCommande['Arrivee']).'</td><td>'.htmlspecialchars($dataAfficherCommande['Depart']).'</td><td>'.htmlspecialchars($dataAfficherCommande['Nombre_Personne']).'</td><td>'.htmlspecialchars($DateReservation).'</td></tr>';
                      }
                    ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box">
              <div class="box-header">
                <h3 class="box-title" style="margin-left: 520px;font-weight: bold;"><u>Liste des utilisateurs</u></h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id_user</th>
                    <th>login</th>
                    <th>Inscription</th>
      
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                      while($dataAfficherUsers= $requeteUsers->fetch())
                      {
                       echo'<tr><td>'.htmlspecialchars($dataAfficherUsers['id_user']).'</td><td>'.htmlspecialchars($dataAfficherUsers['login']).'</td><td>'.htmlspecialchars($dataAfficherUsers['signup_date']).'</td></tr>';
                      }
                    ?>
                  
                  </tbody>
              
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
              <!-- /.box-body -->
    <!-- /.content-wrapper -->
  </div>

    <!-- Control Sidebar -->
    
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery 3 -->
  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="bower_components/raphael/raphael.min.js"></script>
  <script src="bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

  <script>
    $(function () {
      $('#example1').DataTable()
      $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
<?php
}
else
{
  header('Location: ../index.php');
}
?>
</body>
</html>
