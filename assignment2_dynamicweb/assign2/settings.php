<?php
    $host = "feenix-mariadb.swin.edu.au";
    $user = "s104977412";
    $password = "230505";
    $sql_db = "s104977412_db";

    $conn = mysqli_connect($host, $user, $password, $sql_db);
    if(!$conn) {
        echo "Could not connect!";
    }
   
?>