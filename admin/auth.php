<?php 

session_start();
include 'login.php';

if($_POST) {
    testLogin($login, $password);
    // log in using hash
    $login = $_POST['username'];
    $password = $_POST['password'];
    $res = testLogin($login, sha1($password)); // SHA1 of the password
        if($res){
            $_SESSION["username"] = $_POST["username"];  
            $_SESSION['lgd'] = 1;
            header("location: admin.php");
              }
            else {  
                echo '<script type="text/javascript">alert("Please Check Your Information and Try Again!");</script>';
               
        } 
                        
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Cinema | Login </title> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="switch.css">
    <link rel="icon" href="../img/logo.png" type="image/png" sizes="16x16">
</head>

<body>
    <!-- div container start -->
    <div class="container">
        <!-- left side div start  -->
        <div class="left"></div>
        <!-- left side div end  -->

        <!-- right side div start-->
        <div class="right">
            <!-- form switch links start -->
            <div class="switchs">
            <button class="switchlink" onclick="openForm(event, 'LogIn')" id="defaultOpen">Login In</button>
                       
            </div>
            <div class="switchs">
            <a href="../php/index.php"><button class="switchlink">Clients Area</button></a>
            </div>
            <!-- form switch links end -->

            <!-- switch content container start -->
            <div class="switch-container">

                <!-- login form start -->
                <div id="LogIn" class="switchcontent">
                    <h1 class="title">Welcome Back Admin!</h1>
                    <form method='POST' name='login' action="auth.php"><input type='hidden' name='form-name' value='login' />
                        <div class="field-wrap">
                            <input name="username" type="username" id="signInEmail" required autocomplete="off" />
                            <label for="signInEmail">Username</label>
                        </div>
                        <div class="field-wrap">
                            <input name="password" type="password" id="signInPswd" required autocomplete="off" />
                            <label for="signInPswd">Password</label>
                        </div>
                        <p class="forgot"><a href="#">Forgot Password?</a></p>
                        <button type="submit" class="actionbtn">Log In</button>
                    </form>
                </div>
                <!-- login form end -->

            </div>
            <!-- switch content container end -->
        </div>
        <!-- right side div end  -->
    </div>
    <!-- div container end -->
    <script src="script.js"></script>
</body>

</html>