<?php 
    //Import header
    include 'inc/header.php';
?>
<!-- Send the new entry to the database -->
    <?php
        $name = $username = $email = $gender = $city = $telephone = $password = $rePassword = '';
        $nameErr = $usernameErr = $emailErr = $genderErr = $cityErr = $telephoneErr = $passwordErr = $rePasswordErr = '';

        if(isset($_POST['submit'])){

            //Getting name
            if(!$_POST['name']){
                $nameErr = 'Name is required!';
            }else{
                $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            //Getting username
            if(!$_POST['username']){
                $usernameErr = 'Username is required!';
            }else{
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            //Getting email
            if(!$_POST['email']){
                $emailErr = 'Email is required!';
            }else{
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            }

            //Getting username
            if($_POST['gender'] == 'Select gender'){
                $genderErr = 'Select the gender!';
            }else{
                
                $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            //Getting city
            if(!$_POST['city']){
                $cityErr = 'Please enter your city!';
            }else{
                $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            //Getting phone number
            if(!$_POST['telephone']){
                $telephoneErr = 'Telephone number is required!';
            }else{
                $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            //Getting password
            if(!$_POST['password']){
                $passwordErr = 'Pick a strong password!';
            }else{
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            //Getting re-password
            if(!$_POST['rePassword']){
                $rePasswordErr = 'Please re-enter the password!';
            }else{
                $rePassword = filter_input(INPUT_POST, 'rePassword', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }

            switch($gender){
                case 'male': $genderChar = 1;
                break;
                case 'female': $genderChar = 2;
                break;
                case 'other': $genderChar = 3;
                break;
                default: $genderChar = 0;
            }

            //Query for inserting
            $sql = "INSERT INTO 
                Users(name, username, email, gender, city, telephone, password) 
                VALUES('$name', '$username', '$email', '$genderChar', '$city', '$telephone', '$password')";

                

            //No any empty fields
            if(!$nameErr && !$usernameErr && !$emailErr && !$genderErr && !$cityErr && !$telephoneErr && !$passwordErr && !$rePasswordErr){
                
                
                //password verification
                if($password == $rePassword){
                    if(mysqli_query($conn, $sql)){
                        //Success
                        $_SESSION['name'] = $_POST['name'];
                        $_SESSION['email'] = $_post['email'];
                        $_SESSION['gender'] = $_POST['gender'];
                        $_SESSION['city'] = $_POST['city'];
                        header('location: index.php');
                    }else{
                        //Error
                        echo 'Error: '. mysqli_error($conn);
                    }
                }
            }
        }
    ?>

    <div class="container-fluid" >
        <div class="row justify-content-center mt-4 p-3">
                <div class="col-sm-6 col-lg-4 border border-dark p-3 pt-4 border-opacity-25 rounded-2 shadow">
                    <div>
                        <h4>Start your workout journey today</h4>
                    </div>
                    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class='mb-3 mt-3'>
                            <input type="text" name="name" placeholder="Full Name" 
                            class="form-control <?php echo $nameErr ? 'is-invalid':null ?>">
                            <div class="invalid-feedback"><?php echo $nameErr?></div>
                        </div>
                        <div class="row">
                            <div class='mb-3 col-md-6'>
                                <input type="text" name="username" placeholder="Pick a username" 
                                class="form-control <?php echo $usernameErr ? 'is-invalid':null ?>">
                                <div class="invalid-feedback"><?php echo $usernameErr?></div>
                            </div>
                            <div class='mb-3 col-md-6'>
                                <input type="text" name="email" placeholder="Email Address" 
                                class="form-control <?php echo $emailErr ? 'is-invalid':null ?>">
                                <div class="invalid-feedback"><?php echo $emailErr?></div>
                            </div>
                        </div>
                        
                        
                        <div class='mb-3'>
                        <select class="form-select <?php echo $genderErr ? 'is-invalid':null ?>" name='gender'>
                            <option selected>Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                        <div class="invalid-feedback"><?php echo $genderErr?></div>
                        </div>
                        <div class='mb-3'>
                            <input type="text" name="city" placeholder="City" 
                            class="form-control <?php echo $cityErr ? 'is-invalid':null ?>">
                            <div class="invalid-feedback"><?php echo $cityErr?></div>
                        </div>
                        <div class='mb-3'>
                            <input type="number" name="telephone" placeholder="Telephone" 
                            class="form-control <?php echo $telephoneErr ? 'is-invalid':null ?>">
                            <div class="invalid-feedback"><?php echo $telephoneErr?></div>
                        </div>
                        <div class="row">
                            <div class='mb-3 col-md-6'>
                                <input type="password" name="password" placeholder="Pick a password" 
                                class="form-control <?php echo $passwordErr ? 'is-invalid':null ?>">
                                <div class="invalid-feedback"><?php echo $passwordErr?></div>
                            </div>
                            <div class='mb-3 col-md-6'>
                                <input type="password" name="rePassword" placeholder="Confirm password" 
                                class="form-control <?php echo $rePasswordErr ? 'is-invalid':null ?>">
                                <div class="invalid-feedback"><?php echo $rePasswordErr?></div>
                            </div>
                        </div>
                        <p style="font-size:13px;">By clicking Sign Up, you agree to our 
                        <a href="#">Terms</a> and <a href="#">Privacy Policy</a></p>
                        <div class='mb-3 d-grid d-block'>
                            <button class="btn btn-dark" type="submit" name="submit">Sign up</button>
                        </div>
                        <p style="text-align:center;">Already a member? <a href="login.php">Login</a></p>   
                    </form>
                </div>                         
        </div>
    </div>
</body>
</html>