<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*=======================================================*/
//Includes
include('db.php');
include('func.php');

/*=======================================================*/
//POST & GET
$UtilizadorR = $_POST['Utilizador'];
$PasswordR = $_POST['Password'];
/*=======================================================*/
$sqlLogin = "SELECT COUNT(*) AS idConta FROM systemContas WHERE utilizadorConta = '$UtilizadorR' and passwordConta = SHA2('$PasswordR',256)";
$sqlLoginINFO = "SELECT * FROM systemContas WHERE utilizadorConta = '$UtilizadorR' and passwordConta = SHA2('$PasswordR',256)";
/*=======================================================*/
	  $sInfo = $con->query($sqlLoginINFO);
      $result = mysqli_query($con,$sqlLogin);
      $row = mysqli_fetch_array($result);
      $contar = $row['idConta'];
	      if($contar == 1) {
	      	while($row = $sInfo->fetch_assoc()) {
	      		$_SESSION['id'] = $row['idConta'];
	      		$_SESSION['perm'] = $row['idIdentificacao'];
	      	}
	         //echo "Seja bem vindo ".$UtilizadorR."<br>Vamos redirecionar para a dashboard";
	         header("Location: painel.php");
	      }else {
	         //echo "O utilizador ou a Senha estão incorretos.";
	         $con->error();
	      }
?>