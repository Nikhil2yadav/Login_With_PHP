<?php 
    require "connection.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                 if(isset($_POST['btnLogin'])){
                    $username=$_POST['username'];
                    $email=$_POST['Email'];
                    $Age=$_POST['Age'];
                    $password=$_POST['password'];
            
            
                    $verify=mysqli_query($conn,"SELECT Email FROM user WHERE Email='$email'");
                    if(mysqli_num_rows($verify)!=0){
                        echo "<div class='message'>
                                <p>This Email is used ,Try another One Please</p>
                            </div> <br>";
                            echo "<a href='register.php'><button class='btn'>Go Back</button></a>";
                    }else{
                        $str= "INSERT INTO user(Username,Email,Age,Password) VALUES('$username','$email','$Age','$password')";
                        mysqli_query($conn,$str) or die('Error Occured');
            
                        echo "<div class='message'>
                                <p>Register successfully</p>
                            </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
                    }
                }   else{
            
            ?>
            <header>Sign Up</header>
            <form method="post">
                <div class="field input">
                    <label>Username:</label>
                    <input type="text" name="username" autocomplete="off" required>
                </div> 
                <div class="field input">
                    <label>Email:</label>
                    <input type="email" name="Email" autocomplete="off" required>
                </div>  
                <div class="field input">
                    <label>Age:</label>
                    <input type="number" name="Age" autocomplete="off" required>
                </div> 
                <div class="field input">
                    <label>Password:</label>
                    <input type="password" name="password" autocomplete="off" required>
                </div>  
                <div class="field">
                    <input type="submit" value="Register" name="btnLogin" class="btn">
                </div>
                <div class="links">
                    Have An Account <a href="index.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>
    <?php }?>
</body>
</html>