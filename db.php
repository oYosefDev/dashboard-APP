<?php 
include('config.php');

session_start();

  //$conPNSH = mysqli_connect($hostPNSH, $usernamePNSH, $passwdPNSH, $dbnamePNSH);
  //$conPNSH->set_charset("utf8mb4");     


  $con = mysqli_connect($hostMaquina, $userMaquina, $pawdMaquina, $MaquinaDB);
  $con->set_charset("utf8mb4");
?>