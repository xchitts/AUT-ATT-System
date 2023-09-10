
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/CBA LOGO.png">
    <title>AUTO-ATT Student</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    <script src="./vendor/JQueryLib/jquery.js"></script>
    <link rel="stylesheet" href="vendor/font-awesome/css/all.css">
    <link rel="stylesheet" href="css/studentRegistration.css">

</head>
<body>
    <div class="container">

        <div class="status" id="statusSuccess">
            <span><i class="fa-solid fa-circle"></i>Successful Registration</span>
        </div>
        <div class="status" id="statusFailed">
            <span><i class="fa-solid fa-circle"></i>Student Number is already taken</span>
        </div>

        <div class="wrapper">
            <div class="card">
                <form action="" method = "POST" id="studentRegForm">
                    <div class="title">
                        <span>STUDENT REGISTRATION</span>
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-hashtag"></i>
                        <input type="number" name="studentnumber" placeholder = "Ex. 2018954" required>
                        <span>Student Number</span>
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-address-card"></i>
                        <input type="text" name="fullname" placeholder = "Ex. DelaCruz, Juan A." required>
                        <span>Full Name</span>
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-layer-group"></i>
                        <!-- <input type="number" name="yearlevel" min="1" max="4" maxlength ="1" placeholder = "Ex. 1/2/3/4" required> -->
                        <select name="yearlevel">
                            <option value="" disabled selected hidden>Ex. 1st Year</option>
                            <option value="1">1st Year</option>
                            <option value="2">2nd Year</option>
                            <option value="3">3rd Year</option>
                            <option value="4">4th Year</option>
                        </select>
                        <span>Year Level</span>
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-layer-group"></i>
                        <!-- <input type="number" name="contactnumber" placeholder="ex. BSBA" required> -->
                        <select name="course" required>
                            <option value="" disabled selected hidden>Ex. BSA</option>
                            <option value="BSBA-FM">BSBA-FM</option>
                            <option value="BSBA-MM">BSBA-MM</option>
                            <option value="BSBA-HRDM">BSBA-HRDM</option>
                            <option value="BSA">BSA</option>
                            <option value="BSMA">BSMA</option>
                            <option value="BSHM">BSHM</option>
                        </select>
                        <span>Course</span>
                    </div>
                    <div class="input-group">
                        <i class="fa-solid fa-mobile"></i>
                        <input type="number" name="contactnumber" placeholder="Ex. 09098314181" required>
                        <span>Contact Number</span>
                    </div>
                    <div class="btn-group">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="js/studentReg.js"></script>
</html>