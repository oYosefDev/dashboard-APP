<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('config.php');
include('configAPP.php');
session_start();
$sqlHorario = "SELECT * FROM `systemLocais`";
?>
<!DOCTYPE html>
<html lang="pt_PT">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="APP PAROQUIA SENHORADAHORA">
    <meta name="author" content="Leandro Carvalho">
    <title>dashboard.APP</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper"> 
        <!-- NavBAR -->
        <?php include('navbarapp.php')?>
       <!-- NavBAR -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <center><h6><b>Paróquia Nossa Senhora da Hora</b> </h6></center>
                </nav>
          
            <div class="container-fluid">
                <?php 
                    $result = $con->query($sqlHorario);
                    if ($result->num_rows > 0) {
                      // output data of each row
                        while($row = $result->fetch_assoc()) { 
                        $idLocal =  $row['idLocal'];
                    ?>
                  <div class="card shadow mb-4">
                        <!-- Card Header - Accordion -->
                        <a href="#A<?php echo $idLocal; ?>" class="d-block card-header py-3 collapsed" data-toggle="collapse"
                            role="button" aria-expanded="false" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['nomeLocal']; ?></h6>
                        </a>
                        <!-- Card Content - Collapse -->
                        <div class="collapse" id="A<?php echo $idLocal ; ?>">
                            <div class="card-body">
                               <?php echo $row['obs'];?>
                           </div>
                        </div>
                    </div>
                        <?php }
                    }else{
                        echo "Sem informação encontrada.";
                    }?>
                           
            </div>
        </div>
   
            <?php include('footer.php'); ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>