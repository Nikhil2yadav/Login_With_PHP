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
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p>Logo</p>
        </div>
        <div class="right-links">


            <?php 
                $id=$_SESSION['id'];
                $str="SELECT * FROM user WHERE id='$id'";
                $query=mysqli_query($conn,$str);

                while($result=mysqli_fetch_array($query)){
                    $res_Uname=$result['Username'];
                    $res_Email=$result['Email'];
                    $res_age=$result['Age'];
                    $res_id=$result['id'];

                }

                echo "<a href='edit.php?id=$res_id'>Change Profile</a>";
            ?>

            <a href="logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>
    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Hello <b><?php echo $res_Uname;?></b></p>
                </div>
                <div class="box">
                    <p>your email <b><?php echo $res_Email;?></b></p>
                </div>
            </div>
            <div class="bottom">
                <div class="box">
                    <p>And your are <b><?php echo $res_age;?></b></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>