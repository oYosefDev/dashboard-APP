<?php
include('configAPP.php');
$sqlLinks = "SELECT * FROM systemLinks";
$result = $con->query($sqlLinks);
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
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
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
                <div class="row">
                   <div class="col">
                        <div class="card shadow">
                            <div class="card-header">
                                Redes Sociais Paróquia
                            </div>                    
                            <?php
                                if ($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                           ?>
                            <div class="card-body">
                                <a href="<?php echo $row['urlLink']; ?>" class="btn fld100" style="color:<?php echo $row['colorTLink']; ?>; background-color:<?php echo $row['colorLink']; ?>;">
                                    <span class="icon text-white-50">
                                        <i class="<?php echo $row['iconLink']; ?>" style="color:<?php echo $row['colorIcon']; ?>"></i>
                                    </span>
                                   <b> <span class="text">&nbsp;&nbsp;<?php echo $row['nomeLink']; ?></span></b>
                                </a>
                            </div> 

                            <?php
                                    }
                                } else {
                                  echo "Sem informações.";
                                }

                            ?>
                                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!--
                  
                        


    -->
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