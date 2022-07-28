<?php include 'inc/header.php'; ?>
<?php 

    $userEmail = $password = '';
    $userEmailErr = $passwordErr = '';

    if(isset($_POST['submit'])){
        
        //Username empty
        if(!$_POST['user-email']){
            $userEmailErr = "Please enter your username!";
        }

        //Password empty
        if(!$_POST['password']){
            $passwordErr = "Please enter your password!";
        }

        if(!$userEmailErr && !$passwordErr){
            $userEmail = $_POST['user-email'];
            $password = $_POST['password'];

            //Data retieve query
            $sql = "SELECT * FROM Users WHERE (username = '$userEmail' OR email = '$userEmail') AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            $loginErr = '';

            
            if(mysqli_num_rows($result)==1){
                $row = mysqli_fetch_assoc($result);
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['city'] = $row['city'];
                
                header('location: index.php');
            }else{
                $loginErr = "The username or password you entered is incorrect!";
            }
            
        }
    }

?>

<div class="container-fluid" >
        <div class="row justify-content-center mt-4 p-3">
                <div class="col-sm-6 col-lg-4 border border-dark p-3 pt-4 border-opacity-25 rounded-2 shadow">
                    <div>
                        <h4 style="text-align:center;">Welcome back!</h4>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class='mb-3 mt-3'>
                            <input type="text" name="user-email" placeholder="Username" 
                            class="form-control <?php echo $userEmailErr ? 'is-invalid':null ?>">
                            <div class="invalid-feedback"><?php echo $userEmailErr?></div>
                        </div>
                        <div class='mb-3'>
                            <input type="password" name="password" placeholder="Password" 
                            class="form-control <?php echo $passwordErr ? 'is-invalid':null ?>">
                            <div class="invalid-feedback"><?php echo $passwordErr?></div>
                            <?php if(isset($loginErr)){
                                echo "<p style='color:#FB5555; font-size:13px;' class='mt-2'>"
                                .$loginErr. "</p>";
                            }?>
                        </div>
                        <p style="font-size:13px; text-align:right;">
                            <a href="#">Forgot password?</a></p>
                        <div class='mb-3 d-grid d-block'>
                            <button class="btn btn-dark" type="submit" name="submit">Login</button>
                        </div>
                        <p style="text-align:center;">Not registered? <a href="signup.php">Create an account</a></p>   
                    </form>
                </div>                         
        </div>
    </div>