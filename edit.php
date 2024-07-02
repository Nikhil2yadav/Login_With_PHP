<?php 

    session_start();
    include 'connection.php';
    if(isset($_SESSION['valid'])){
        header('location:index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chnage Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a></p>
        </div>
        <div class="right-links">
            <a href="#">Check Profile</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">

            <?php 
                if(isset($_POST['btnLogin'])){
                   $username=$_POST['username'];
                   $email=$_POST['Email']; 
                   $Age=$_POST['Age']; 

                   $id=$_SESSION['id'];
                   $str="UPDATE user SET Username='$username',Email='$email',Age='$Age' WHERE id='$id'";

                   $edit_query=mysqli_query($conn,$str) or die("error ");

                   if($edit_query){
                    echo "<div class='message'>
                                <p>Profile Updated</p>
                        </div> <br>";
                    echo "<a href='index.php'><button class='btn'>Login Now</button></a>";
                   }

                }else{
                    $id=$_SESSION['id'];
                    $sql="SELECT * FROM user WHERE id='$id'";
                    $query=mysqli_query($conn,$sql) or die("error");
                    while($result=mysqli_fetch_array($query)){
                        $res_Uname=$result['Username'];
                        $res_Email=$result['Email'];
                        $res_age=$result['Age'];
                    }
                    // $row=mysqli_fetch_array($query);
                
            ?>

            <header>Change Profile</header>
            <form method="post">
                <div class="field input">
                    <label>Username:</label>
                    <input type="text" name="username" value="<?php echo $res_Uname;?>"  required>
                </div> 
                <div class="field input">
                    <label>Email:</label>
                    <input type="email" name="Email" value="<?php echo $res_Email;?>"  required>
                </div>  
                <div class="field input">
                    <label>Age:</label>
                    <input type="number" name="Age" value="<?php echo $res_age;?>"  required>
                </div> 
                
                <div class="field">
                    <input type="submit" value="Update" name="btnLogin" class="btn">
                </div>
                
            </form>
        </div>
        <?php }?>
    </div>
</body>
</html>