<?php

    $server = "localhost";
    /*$user = "id14502518_root";
    $pass = "sVjM$rav<Po0D#6e";
    $dbname = "id14502518_ams_db";*/

    // For localhost
    $user = "root";
    $pass = "";
    $dbname = "ams_db";

    $con = new MySQLi($server, $user, $pass, $dbname);

    if($con->connect_error)
    {
        echo "<script>alert('not connected')</script>";
        echo "Error: ".$con->connect_error;
    }
    else
    {
        //echo "<script> alert('Successfully connected to AMS Database')</script>";
    }