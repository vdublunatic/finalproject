<?php
    $username = "jclark_user";
    $password = "Password01";
    $hostname = "localhost";
    $database = "jclark_finalproject";
    
    $cnxn = @mysqli_connect($hostname, $username, $password, $database)
            or die("Error connecting to database: " .mysqli_connect_error());
            
    echo 'Connected to database!';
?>