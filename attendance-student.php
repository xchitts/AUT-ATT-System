<?php
    session_start();
    if($_SESSION['userStatus'] != true){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="./vendor/JQueryLib/jquery.js"></script>
    <script type="text/javascript" src="./vendor/table-to-excel-master/dist/tableToExcel.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"> </script>  
    <link rel="stylesheet" href="css/attendance-student.css">
    <link rel="icon" href="img/CBA LOGO.png">
    <link rel="stylesheet" href="css/clock-attendance.css">
    <title>EVENT ATTENDANCE</title>

</head>
<body>
    <div class="attendance-container">
        <div class="attendance-header">
            <div class="logo one">
                <img src="img/CBA LOGO.png" alt="" id="hiddentricks">
            </div>
            <div class="title">
                <h1>AUTOMATED ATTENDANCE SYSTEM</h1>
            </div>
            <div class="logo two">
                <img src="img/NDMU LOGO.png" alt="">
            </div>
        </div>
        <div class="attendance-content-wrapper">
            <div class="attendance-input-group">
                <form action="" id="studentAttendance">
                    <div class="input-title">
                        <select name="" id="eventselector">
                            <option value="">--- SELECT EVENT ---</option>
                            <!-- <option value=""> NDMU CET WEEK DAY 1</option> -->
                        </select>
                    </div>
                    <div class="checkbox-time-group" id="time-group">
                        <div class="checkbox-group">
                            <span>Timein(AM)</span>
                            <input type="checkbox" id="timeinAM" value="timeinAM">
                        </div>
                        <div class="checkbox-group">
                            <span>Timeout(AM)</span>
                            <input type="checkbox" id="timeoutAM" value="timeoutAM">
                        </div>
                        <div class="checkbox-group">
                            <span>Timein(PM)</span>
                            <input type="checkbox" id="timeinPM" value="timeinPM">
                         </div>
                         <div class="checkbox-group">
                            <span>Timeout(PM)</span>
                            <input type="checkbox" id="timeoutPM" value="timeoutPM">
                        </div>
                    </div>
                    <div class="input-attendance-id" id="attendance_card">
                        <input type="number" id="studentID" placeholder="Enter Student ID">
                        <button type="submit">ATTENDANCE</button>
                    </div>
                </form>

                <div class="response" id="attendancecard">
                    <div class="message">
                        <span id="attendanceResponse">Successfully Attendance</span>
                    </div>
                </div>
            </div>
            <div class="date-time-indicator">
                <span id="date-time"></span>
            </div>
        </div>
    </div>
</body>
    <script src="js/attendance-student.js"></script>
    <script src="js/clock-date.js"></script>
</html>