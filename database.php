<?php
    $db_server = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "customerdb";
    $connection = "";


    $connection = mysqli_connect($db_server,
    $db_user,
    $db_password,
    $db_name );
  if(mysqli_connect_error()){
    echo "You are not connected";
  }
  

?>