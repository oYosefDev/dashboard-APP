<?php 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include('config.php');
include('configAPP.php');
session_start();
$id = $_GET['id'];
$cat = $_GET['cat'];
$colorbtn= "btn-success";
    if($cat == '' or $cat == '111'){
        $cat = 111;
        $colorbtn= "btn-success";
        $colorform= "border-bottom-success";
    }
    if($cat == '123' ){
        $colorbtn= "btn-warning";
        $colorform= "border-bottom-warning";
    }
    $sqlNoticias = "SELECT `hgaqs_k2_items`.id, `hgaqs_k2_items`.title, `hgaqs_k2_items`.introtext, `hgaqs_k2_items`.fulltext, `hgaqs_k2_items`.created_by, `hgaqs_k2_users`.userName, `hgaqs_k2_items`.alias 
                FROM `hgaqs_k2_items`
                INNER JOIN hgaqs_k2_users
                ON`hgaqs_k2_items`.created_by  =`hgaqs_k2_users`.userID 
                WHERE `hgaqs_k2_items`.id='$id';";
       $novaNot= "INSERT INTO systemEstatisticas (idNoticia,nrCliques) VALUES ('$id', 1)";
       $tryNew = $con->query($novaNot);
       if($tryNew){
           // echo "FOI INSERIDO UMA NOVA ESTATISTICA"; 
       }else{
            $novaView = "UPDATE `systemEstatisticas` SET `nrCliques` = `nrCliques` + 1 WHERE `idNoticia` = '$id';";
            if(mysqli_query($con ,$novaView)){
               // echo "Foi adicionado uma novo clique";
            }else{
                //echo "erro em sql";
            }


       }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                   <?    
                        $result = $conPNSH->query($sqlNoticias);
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                            $idNot = $row[id];
                            $alias = $row[alias];
                             $image=md5('Image'.$idNot);?>
                            <div class="card mb-4 py-3 <?php echo $colorform;?>">
                                <div class="card-body">
                                  <div class="row">
                                  <img CLASS ="img1" style ="max-height: 100%; "src="https://paroquiasenhoradahora.pt/media/k2/items/cache/<?php echo $image; ?>_XL.jpg" >
                                    <div class ="txtPublicacao"> 
                                      <h5><b><?php echo $row[title]; ?></b></h5></br>
                                      <?php echo $row[introtext]; ?>
                                      <?php $text = $row[fulltext];
                                        $length = strpos($text,'[yt_social_share facebook="yes" twitter="yes" googleplus="yes" linkedin="no" pinterest="no" tumblr="no" pocket="no" ]');
                                        $row3 = substr($text, 0, $length);
                                        echo $row3;
                                         ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <?}
                        } else {
                          echo "Sem resultados de pesquisa.";
                        }?>
                    
                        <div id ="partilhaRedes">
                                <div class="row" >
                                    <!--<div class="col facebook shares"><a href= "external=true ">
                                        <i class="fa fa-facebook"></i> </a>
                                    </div>-->
                                    <div class="col facebook shares">
                                        <a href= "https://www.facebook.com/share.php?u=https://paroquiasenhoradahora.pt/index.php/noticias/item/<?php echo $id.'-'.$alias?>">
                                        <i class="fa fa-facebook"></i> </a>
                                    </div>
                                    <div class="col twitter shares">
                                        <a href="https://twitter.com/intent/tweet?url=https://paroquiasenhoradahora.pt/index.php/noticias/item/<?php echo $id.'-'.$alias?>/" >
                                        <i class="fa fa-twitter"></i> </a>
                                    </div>
                                    <div class="col whatsapp shares">
                                        <a href="https://web.whatsapp.com:/send?text=https://paroquiasenhoradahora.pt/index.php/noticias/item/<?php echo $id.'-'.$alias?>/">
                                        <i class="fa fa-whatsapp"></i> </a>
                                    </div>
                                </div>
                            </div>     
                </div>
            </div>
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
    <script src="js/adpAPP.js"></script>

</body>
</html>