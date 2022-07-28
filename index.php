<?php 

    include('inc/header.php');
    

    if(isset($_SESSION['name'])){
        echo "Welcome ". $_SESSION['name'] . " <br>We know you are from ". $_SESSION['city'] ;
    }else{
        echo "Please sign in!";
    }


    

?>