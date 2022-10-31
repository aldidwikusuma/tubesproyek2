<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "apm";

    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true );
    define( 'WP_DEBUG_DISPLAY', false );


    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed : " . mysqli_connect_error());
    }

    
?>