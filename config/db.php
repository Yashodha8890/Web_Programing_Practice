<?php
    $serverName = "web-dev-env-main-db-1";   
    $userName = "root";
    $password = "password";
    $dbName = "web_programing_project_db";

    //create the connection with the Database

    $conn = new mysqli($serverName,$userName,$password,$dbName);

    //Checking the connection established correctly
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

?>