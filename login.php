<?php
    require_once "connect.php";
    session_start();
    if(isset($_COOKIE['remembered_user']) && isset($_COOKIE['remembered_user']) != ""){
        $remebered_user = $_COOKIE['remembered_user'];

        $sql = "SELECT * FROM `users` WHERE IS_EXIST = 1 AND `remember` = 1 AND `user` = '$remebered_user'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc(); 
        if($result->num_rows == 1){
            $_SESSION['userStatus'] = true;
            $_SESSION['user'] = $row['user'];
            header('location:index.php');
        }
    }
    
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AUTO-ATT</title>
        <link rel="icon" href="img/CBA LOGO.png">
        <!-- <script src="./vendor/JQueryLib/JQuery.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <script src="./vendor/JQueryLib/jquery.js"></script>
        <link rel="stylesheet" href="vendor/font-awesome/css/all.css">
        <link rel="stylesheet" href="css/login.css">
        
    </head>
    <body>
        <div class="container">
            <div class="status" id="statusSuccess">
                <span><i class="fa-solid fa-circle"></i>success</span>
            </div>
            <div class="status" id="statusFailed">
                <span><i class="fa-solid fa-circle"></i>Invalid Login</span>
            </div>
            <form action="" method = "POST" id="loginForm">
            <div class="wrapper">
                <div class="card">
                    <div class="title">
                        <h1>AUTO-ATT SYSTEM</h1>
                        <div class="user">
                            <i class="fa-solid fa-circle-user"></i>
                        </div>
                    </div>
                    <div class="credentials">
                        <div class="signin">
                            <p>user credentials</p>
                        </div>
                        <div class="input-group">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="email" id="email" placeholder="Username" required>
                        </div>
                        <div class="input-group">
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="check-group">
                            <input type="checkbox" id="rememberChecker">
                            <span>Remember Me</span>
                        </div>
                        <button>Sign In</button>
                        <div class="forget-password">
                            <span>Forget Password</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner">
                <div class="logo">
                    <img src="./img/NDMU LOGO.png" alt="">
                </div>
                <!-- <div class="logo">
                    <img src="./img/CBA LOGO.png" alt="">
                </div>
                <div class="logo">
                    <img src="./img/JPMA LOGO.png" alt="">
                </div> -->
            </div>
            </form>
        </div>
    </body>
    <script src="./js/login.js"></script>
    </html>
<?php
?>