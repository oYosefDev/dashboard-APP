<?php 
   $host = "rosegroup.pt";
   $username  = "dotsieno_api_app_pnsh";
   $passwd = "dotsieno_api_app_pnsh";
   $dbname = "dotsieno_api_app_pnsh";

   //Creating a connection

   
  $con = mysqli_connect($host, $username, $passwd, $dbname);
  $con->set_charset("utf8mb4");
   /*if($con){
    print("Connection Established Successfully<br>");
   }else{
     print("Connection Failed ");
   }*/
  ?>