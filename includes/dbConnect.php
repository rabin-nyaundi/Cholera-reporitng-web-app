<?php

    $serverName = "localhost";
    $user = "root";
    $password = "";
    $database = "zeta_cholera-app";

    $conn = new mysqli($serverName, $user, $password, $database);

    if($conn == false){
        die("Error, could not connect to MySQL. " .$conn->connect_error);
    }
    else{
        // echo "Database Connected successfully";
    }

?>