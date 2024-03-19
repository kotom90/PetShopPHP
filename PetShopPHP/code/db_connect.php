<?php
    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_pass = "";
    $mysql_db = "sidiropoulos";
    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass, $mysql_db);

    mysqli_query($conn,"SET NAMES 'utf8'");
    mysqli_query($conn,"SET CHARACTER SET 'utf8'");
    
 
    //mysqli_close($conn);
?>