<?php 
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'my-gym');

    //MySQL connection
    $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

    //Verify connecton
    if(!$conn){
        die('Database connection error'. mysqli_connect_error());
    }
?>