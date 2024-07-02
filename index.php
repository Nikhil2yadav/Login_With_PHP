<?php 
    session_start();
    require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                if(isset($_POST['btnLogin'])){
                    $email=mysqli_real_escape_string($conn,$_POST['Email']);
                    $password=mysqli_real_escape_string($conn,$_POST['password']);

                    $str="SELECT * FROM user WHERE Email='$email' AND Password='$password'" ;
                    $result=mysqli_query($conn,$str) or die("select Error");
                    $row=mysqli_fetch_assoc($result);
                    if(is_array($row) && !empty($row)){
                        $_SESSION['vaild']=$row['Email'];
                        $_SESSION['username']=$row['Username'];
                        $_SESSION['Age']=$row['Age'];
                        $_SESSION['id']=$row['id'];
                        header('Location:home.php');
                    }
                    else{
                        echo "<div class='message'>
                                <p>Wrong Username or Password</p>
                            </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button></a>";
                    }

                }
            ?>


            <header>Login</header>
            <form method="post">
                <div class="field input">
                    <label>Email:</label>
                    <input type="email" name="Email" autocomplete="off" required>
                </div>  
                <div class="field input">
                    <label>Password:</label>
                    <input type="password" name="password" autocomplete="off" required>
                </div>  
                <div class="field">
                    <input type="submit" value="Login" name="btnLogin" class="btn">
                </div>
                <div class="links">
                    Don't have an account <a href="register.php">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>