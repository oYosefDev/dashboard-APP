<?php
function Conexaobd(){
  $host = "rosegroup.pt";
  $username  = "dotsieno_api_app_pnsh";
  $passwd = "dotsieno_api_app_pnsh";
  $dbname = "dotsieno_api_app_pnsh"; 
  $con = mysqli_connect($host, $username, $passwd, $dbname);
  $con->set_charset("utf8mb4");
  return $con;
}

function createHASH($senha){
	$senhaFinal = hash('sha256',$senha);
	return $senhaFinal;
}

function ContarEstatisticas(){
	$con = Conexaobd();
	$sql = "SELECT SUM(`nrCliques`) FROM `systemEstatisticas`";
	$execSoma = $con->query($sql);
	$coluna = mysqli_fetch_array($execSoma);
    $soma = $coluna[0];
	return $soma;
}


function ContarInstalacoes(){
	$con = Conexaobd();
	$sql = "SELECT count(`idToken`) FROM `systemToken`";
	$execSoma = $con->query($sql);
	$coluna = mysqli_fetch_array($execSoma);
    $soma = $coluna[0];
	return $soma;
}

function ContarContas(){
	$con = Conexaobd();
	$sql = "SELECT count(`idConta`) FROM `systemContas`";
	$execSoma = $con->query($sql);
	$coluna = mysqli_fetch_array($execSoma);
    $soma = $coluna[0];
	return $soma;
}

function ContarGrupos(){
	$con = Conexaobd();
	$sql = "SELECT count(`idGroup`) FROM `systemGroups`";
	$execSoma = $con->query($sql);
	$coluna = mysqli_fetch_array($execSoma);
    $soma = $coluna[0];
	return $soma;
}


function updateLocal($id,$name,$obs){


}



