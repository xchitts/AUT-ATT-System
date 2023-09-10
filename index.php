<?php
    session_start();
    if($_SESSION['userStatus'] !== true){
        header('location:login.php');
    }
    $user = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/CBA LOGO.png">
    <title>AUTO-ATT</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="./vendor/JQueryLib/jquery.js"></script>
    <link rel="stylesheet" href="vendor/font-awesome/css/all.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="logo-title" id="logo-return-index">
                <img src="./img/CBA LOGO.png" alt="">
                <span>AUTO - ATT SYSTEM</span>
            </div>
            <div class="nav">
                <p>MENU</p>
                <ul>
                    <li>
                        <a href="dashboard.php">
                            <span><i class="fa-brands fa-microsoft"></i>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="student.php">
                            <span><i class="fa-solid fa-graduation-cap"></i>Student</span>
                        </a>
                    </li>
                    <li>
                        <a href="student-register.php">
                            <span><i class="fa-solid fa-user-plus"></i>Register</span>
                        </a>
                    </li>
                    <li id="eventforadminonly">
                        <a   a href="Events.php">
                            <span><i class="fa-solid fa-calendar-days"></i>Events</span>
                        </a>
                    </li>
                    <li>
                        <a href="attendance.php">
                            <span><i class="fa-solid fa-address-card"></i>Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a   a href="records.php">
                            <span><i class="fa-solid fa-floppy-disk"></i>Records</span>
                        </a>
                    </li>
                </ul>
                <p>ACCOUNT</p>
                <ul>
                    <li>
                        <a href="maintenance.php">
                            <span><i class="fa-solid fa-gear"></i>Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container-content">
            <div class="header">
                <div class="nav-header">
                <span><i class="fa-solid fa-house" id="header-return-index"></i> / <span>Home</span></span>
                </div>
                <div class="user">
                    <div class="user-profile">
                        <i class="fa-solid fa-circle-user"></i>
                        <span id="user-option-active-btn"><?php echo $_SESSION['user'] ?></span>
                        <div class="user-option" id="option">
                            <div class="user-information">
                                <i class="fa-solid fa-circle-user"></i>
                                <h4><?php echo $_SESSION['user'] ?></h4>
                                <p>College of Business Administration</p>
                            </div>
                            <div class="option-wrapper">
                                <div class="setting" id="user-profile-modalbtn">
                                    <span><i class="fa-solid fa-gear"></i>Profile</span>
                                </div>
                                <div class="logout" id="logout">
                                    <span><i class="fa-solid fa-power-off"></i>Logout</span>
                                </div>
                            </div>
                            <div class="update-user-information-modal" id="update-user-information-modal">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="title">
                                            <h4>UPDATE USER INFORMATION</h4>
                                        </div>
                                        <span id="close-userprofile-modalBtn">&times;</span>
                                    </div>
                                    <div class="modal-content-body">
                                        <form action="" method = "POST" id="userprofile_modalForm">
                                            <div class="all-input-groups">
                                                <div class="input-group">
                                                    <span>Username</span>
                                                    <input type="text" name = "user_username" id="user_username" placeholder="Username" required>
                                                    <input type="text" name = "user_id" id="user_id" style="display: none;">
                                                    <i class="fa-solid fa-user"></i>
                                                </div>
                                                <div class="input-group">
                                                    <span>Email</span>
                                                    <input type="email" name="user_email" id="user_email" placeholder="Email" required>
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                                <div class="input-group">
                                                    <span>Password</span>
                                                    <input type="password" name="user_password" id="user_password" placeholder="Password" required>
                                                    <i class="fa-solid fa-lock"></i>
                                                </div>
                                            </div>
                                            <div class="btn-group">
                                                <button type="submit">SUBMIT</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="index-body">
                    <!-- <div class="welcome-bubble">
                        <h1>Hello, </h1>
                    </div> -->
                    <div class="front-information">
                        <div class="bg-information"></div>
                        <div class="logos">
                            <img src="./img/CBA LOGO.png" alt="" draggable="false">
                            <img src="./img/NDMU LOGO.png" alt="" draggable="false">
                            <img src="./img/JPMA LOGO.png" alt="" draggable="false">
                        </div>
                        <div class="information-tagline">
                            <h1>COLLEGE OF BUSINESS ADMINISTRATION</h1>
                            <div class="underscore">
                                <img src="./img/underscore.png" alt="">
                            </div>
                            <!-- <p>Upholding a Vision...Fulfilling a Mission</p> -->
                            <p>Bleed Green, Bleed Excellence - CCCCCBBBBBAAAAAAA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bubble" id="footer-bubble">
            <img src="./img/NEXUS_LOGO.png" alt="">
            <div class="footer-content-body">
                <div class="logo-partnership">
                    <div class="logo one">
                        <img src="./img/NEXUS_LOGO_white_3d.png" alt="">
                    </div>
                    <span>In partnership with</span>
                    <div class="logo one">
                        <img src="./img/CSD_Proposed_Logo.png" alt="">
                    </div>
                </div>
                <div class="footer-creator">
                    <div class="da-creator">
                        <span>CREATOR:</span>
                        <span>Johnny A. Asumbra</span>
                        <span>Fritz L. Tuazon</span>
                    </div>
                </div>
                <div class="moral-support">
                    <span>Gil Jason Tuna</span>
                    <span>Francis Michael Solmayor</span>
                    <span>Chris Jan Dela Cruz</span>
                    <span>Earl Jake Mahilum</span>
                    <span>Marlou Antenero</span>
                    <span>Regin Ivan Montilla</span>
                    <span>Christian Esteves</span>
                    <span>Jasper Panzo</span>
                    <span>Kernel Fritz Paulo</span>
                    <span>Robert Clyde Cristobal</span>
                    <span>Mea Gwen Gulle</span>
                    <span>Spencer Emboltorio</span>
                    <span>Harvey Catulong</span>
                    <span>Johnny Delizo</span>
                    <span>Kyle Patrick Uy</span>
                    <span>Zachery Sustiguer</span>
                    <span>Louie Jie Tenecio</span>
                    <span>James Lloyd Teker</span>
                    <span>Christian Liganad</span>
                    <span>Emy Lou Passaporte</span>
                    <span>Ybonie Somogod</span>
                    <span>Jeyfrey Villasenor</span>
                </div>
                <div class="copyright">
                    <span>Copyright<i class="fa-solid fa-copyright"></i> 2022 NEXUS All rights reserved</span>
                    <div class="contact-information">
                        <div class="email">
                            <i class="fa-solid fa-envelope"></i>nexusapplert@gmail.com
                        </div>
                        <div class="facebook">
                            <i class="fa-brands fa-square-facebook"></i>www.facebook.com/nexuscheckapp
                        </div>
                        <div class="phone">
                            <i class="fa-solid fa-phone"></i>09105344829 / 09098314181
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="./js/index.js"></script>
</html>