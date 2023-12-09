<?php
//error_reporting(0);
    $servername = "localhost";
    $username = "root";
    $passwork = "";
    $dbname = "crudapp";

    $connection = mysqli_connect($servername,$username,$passwork,$dbname);
    if($connection)
    {
        //echo "Connection done";
    }
    else 
    {
        echo "Connection failed".mysqli_connect_error();
    }
?>