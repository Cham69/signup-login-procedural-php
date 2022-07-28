<?php 
    include'inc/header.php';
    if(!isset($_SESSION['name'])){
        header('location: index.php');
    }
    $name = strtoupper($_SESSION['name']);

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 shadow-sm">
            <?php echo '<h5 class="mt-4 ms-3">WELCOME BACK, <br>'. $name. '</h5>'; ?>
        </div>
        <div class="col-md-9 border">
            <h5 class="mt-4 ms-4">DASHBOARD</h5>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-3">
            <p>My Workout</p>
            <p>My Meal Plan</p>
        </div>
    </div> -->
</div>