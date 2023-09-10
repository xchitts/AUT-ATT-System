<?php
    session_start();
    if($_SESSION['userStatus'] !== true){
        header('location:login.php');
    }
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
    <link rel="stylesheet" href="css/student.css">
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
                    <li class="active">
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
                        <a href="records.php">
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
                <span><i class="fa-solid fa-house" id="header-return-index"></i> / <span>Student List</span></span>
                </div>
                <div class="user">
                    <div class="user-profile">
                        <i class="fa-solid fa-circle-user"></i>
                        <span id="user-option-active-btn"><?php echo $_SESSION['user']?></span>
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
                <div class="student-body">
                    <div class="response-sms-bubble" id="sms-bubble">
                        <span id="sms">Successfully Updated</span>
                    </div>
                    <div class="search-filter">
                        <div class="search-select-group">
                            <div class="select-group">
                                <select name="" id="selectbyYL">
                                    <option value="">-- Select Year Level --</option>
                                    <option value="1">1st Year</option>
                                    <option value="2">2nd Year</option>
                                    <option value="3">3rd Year</option>
                                    <option value="4">4th Year</option>
                                </select>
                            </div>
                            <div class="select-group">
                                <select name="" id="selectbyCOURSE">
                                    <option value="">-- Select Course --</option>
                                    <option value="BSBA-FM">BSBA-FM</option>
                                    <option value="BSBA-MM">BSBA-MM</option>
                                    <option value="BSBA-HRDM">BSBA-HRDM</option>
                                    <option value="BSA">BSA</option>
                                    <option value="BSMA">BSMA</option>
                                    <option value="BSHM">BSHM</option>
                                </select>
                            </div>
                        </div>
                        <div class="search-input-group">
                            <div class="input-group">
                                <i class="fa fa-search"></i>
                                <input type="number" placeholder = "Search student" id="searchStudentId">
                            </div>
                        </div>
                    </div>
                    <div class="student-table">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Full Name</th>
                                    <th>Year Level</th>
                                    <th>Course</th>
                                    <th>Contact Number</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="studentlisttbl">
                                
                            </tbody>
                        </table>
                    </div>
                    <!-- MODAL -->
                    <div class="update-student-information-modal" id="update-student-modal">
                        <div class="modal-content">
                            <div class="modal-header">
                                <div class="title">
                                    <h4>UPDATE STUDENT INFORMATION</h4>
                                </div>
                                <span id="close-modalbtn">&times;</span>
                            </div>
                            <div class="modal-content-body">
                                <form action="" method = "POST" id="update-studentForm">
                                    <div class="all-input-groups">
                                        <div class="input-group">
                                            <span>Student Number</span>
                                            <input type="text" name="studentid" id="studentid" placeholder="Ex. 2018954" required>
                                            <input type="text" name="updatestudentid" id="updatestudentid" style="display:none;">
                                            <i class="fa-solid fa-hashtag"></i>
                                        </div>
                                        <div class="input-group">
                                            <span>Full Name</span>
                                            <input type="text" name="fullname" id="fullname" placeholder= "ex. Dela Cruz Juan B." required>
                                            <i class="fa-solid fa-address-card"></i>
                                        </div>
                                        <div class="select-group">
                                            <span>Year Level</span>
                                            <select name="yearlevel" id="yearlevel" required>
                                                <option value="" disabled selected hidden>Ex. 1st Year</option>
                                                <option value="1">1st Year</option>
                                                <option value="2">2nd Year</option>
                                                <option value="3">3rd Year</option>
                                                <option value="4">4th Year</option>
                                            </select>
                                            <i class="fa-solid fa-layer-group"></i>
                                        </div>
                                        <div class="select-group">
                                            <span>Course</span>
                                            <select name="course" id="course" required>
                                                <option value="" disabled selected hidden>Ex. BSA</option>
                                                <option value="BSBA-FM">BSBA-FM</option>
                                                <option value="BSBA-MM">BSBA-MM</option>
                                                <option value="BSBA-HRDM">BSBA-HRDM</option>
                                                <option value="BSA">BSA</option>
                                                <option value="BSMA">BSMA</option>
                                                <option value="BSHM">BSHM</option>
                                            </select>
                                            <i class="fa-solid fa-layer-group"></i>
                                        </div>
                                        <div class="input-group">
                                            <span>Contact Number</span>
                                            <input type="number" name="contactno" id="contactno" placeholder="Ex. 09098314181" required>
                                            <i class="fa-solid fa-mobile"></i>
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
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<script src="./js/index.js"></script>
<script src="./js/student.js"></script>
</html>