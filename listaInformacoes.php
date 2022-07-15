<?php 
include('getSession.php');
include("configAPP.php");
include('func.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>dashboard.Painel</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper"> 
        <!-- NavBAR -->
        <?php include('navbar.php')?>
       <!-- NavBAR -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                </nav>
            
                <div class="container-fluid">
                    <h1 class="h3 mb-4 text-gray-800">Listar Informações</h1>
                    <div class="row">
                        
  
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nome Local</th>
                                      <th scope="col">Alterar</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php 
                                        $sql = "SELECT * FROM `systemLocais`";
                                        $result = $con->query($sql);
                                        if ($result->num_rows > 0) {
                                          // output data of each row
                                            while($row = $result->fetch_assoc()) {
                                                echo '<tr><th scope="row">'.$row['idLocal'].'</th><td>'.$row['nomeLocal'].'</td><td>
                                               <a data-target="#a'.$row['idLocal'].'" data-toggle="modal"  href="#"> <i class="fas fa-pen"></i> </a></td><tr>';
                                                ?> 
                         <div class="modal fade" id="a<?php echo $row['idLocal']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modificação: <?php echo $row['nomeLocal']?>.</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                         <form method="POST" action="salvarInformacoes.php">
                                                            <input type="text" name="nomeLocal" value="<?php echo  $row['nomeLocal']?>"><br>
                                                            <textarea name="obs" rows="4" cols="50">
                                                                <?php echo  $row['obs']?>
                                                            </textarea>





                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                            <input type="submit" value="Alterar">
                                                        </div>
                                                     </form>
                                                    </div>
                                                </div>
        <?php
                                            }
                                        }else{
                                            echo '<tr><th scope="row">N/A</th><td>N/A</td><tr>';
                                        }


                                     ?>
                                   
                                  </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
   
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>