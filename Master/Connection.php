<?php
    $servername = "localhost:3308"; //Enter address for database location (localhost for running on local machine)
    $user = "root"; //Enter user information for SQL connection to database here (root is default)
    $pass = ""; //Enter password for SQL connection to database here
    $db = "capstone"; //Database name will be capstone if running the sql file as is. If changing database, change this field

    $conn = new mysqli($servername, $user, $pass, $db);

    if($conn->connect_error){
        die($conn->connect_error);
        echo '<script type="text/javascript">
            var error = "', $conn->connect_error, '";
            console.error("CONNECTION FAILED...", error);</script>';
    }
?>