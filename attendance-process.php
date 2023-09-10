<?php
    include "connect.php";
    session_start();
    date_default_timezone_set('Asia/Manila');

    if(isset($_POST['eventname']) && isset($_POST['eventdate'])){
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];

        $sqlchecker = "SELECT * FROM `events` WHERE IS_EXIST = 1 AND `eventname` = '$eventname' AND `eventdate` = '$eventdate'";
        $resultchecker = $con->query($sqlchecker);

        if($resultchecker->num_rows == 0){
            $sql = "INSERT INTO `events`(`eventname`, `eventdate`,`IS_EXIST`) VALUES ('$eventname','$eventdate','1')";
            $result = $con->query($sql);
    
            if($result){
                $eventResponse = array('status' => true, 'message' => "Event Sucessfuly Register");
            }
            else{
                $eventResponse = array('status' => false, 'message' => "Invalid Register");
            }
        }
        else{
            $eventResponse = array('status' => false, 'message' => "Event Already Exist!");
        }

        

        echo json_encode($eventResponse);exit();
    }


    // get event selector

    if(isset($_GET['getEvent'])){
        $sql = "SELECT `eventname` FROM `events` WHERE IS_EXIST = 1 AND `status` = 1";
        $result = $con->query($sql);
?>
        <option value="">--select event--</option>
<?php
        while($row = $result->fetch_assoc()){
?>
        <option value="<?php echo $row['eventname'] ?>"><?php echo $row['eventname'] ?></option>
<?php
        }
    }

    // set attendance of the student
    if(isset($_POST['attendancestudent']) && isset($_POST['studentID']) && $_POST['studentID'] != '' && isset($_POST['time']) && $_POST['time'] != '' && isset($_POST['eventname']) && $_POST['eventname'] != ''){
        $user = $_SESSION['user'];

        $studentID = $_POST['studentID'];
        $time = $_POST['time'];
        $eventname = $_POST['eventname'];
        $todaydate = date("Y/m/d");
        $thistime = date("h:i:s");

        $sqlCheckAttendanceStudent = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `date` = '$todaydate' AND `event` = '$eventname'";
        $resultCheckAttendanceStudent = $con->query($sqlCheckAttendanceStudent);

        // IF THIS STATEMENT IS TRUE , THEN THE STUDENT NOT YET ATTENDANCE
        if($resultCheckAttendanceStudent->num_rows == 0){
            if($user == "SuperAdmin"){
                $sqlStudent = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND `status` = 1 AND  `studentno` = '$studentID'";
                $resultStudent = $con->query($sqlStudent);
            }
            else{
                $useryearlevel = $_SESSION['user-yearlevel'];
                $sqlStudent = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND `status` = 1 AND `studentno` = '$studentID' AND `yearlevel` = '$useryearlevel'";
                $resultStudent = $con->query($sqlStudent);
            }
            // $sqlStudent = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND `studentno` = '$studentID'";
            // $resultStudent = $con->query($sqlStudent);

            if($resultStudent->num_rows > 0){
                $row = $resultStudent->fetch_assoc();

                $studentfullname = $row['fullname'];
                $studentyear = $row['yearlevel'];
                $studentcourse = $row['course'];

                if($time == "timeinAM"){
                    $sqlAttendance = "INSERT INTO `attendancetbl` (`studentID`, `fullname`, `event`, `yearlevel`, `course`, `timeinAM`,`date`, `IS_EXIST`) VALUES ('$studentID', '$studentfullname', '$eventname', '$studentyear','$studentcourse','$thistime','$todaydate', 1)";
                    $resultAttendance = $con->query($sqlAttendance);

                    $response = array('status' => true, 'message' => "Student ".$studentID." Successfully Recorded");
                }
                elseif($time == "timeoutAM"){
                    $sqlAttendance = "INSERT INTO `attendancetbl` (`studentID`, `fullname`, `event`, `yearlevel`, `course`, `timeoutAM`,`date`, `IS_EXIST`) VALUES ('$studentID', '$studentfullname', '$eventname', '$studentyear','$studentcourse','$thistime','$todaydate', 1)";
                    $resultAttendance = $con->query($sqlAttendance);

                    $response = array('status' => true, 'message' => "Student ".$studentID." Successfully Recorded");
                }
                elseif($time == "timeinPM"){
                    $sqlAttendance = "INSERT INTO `attendancetbl` (`studentID`, `fullname`, `event`, `yearlevel`, `course`, `timeinPM`,`date`, `IS_EXIST`) VALUES ('$studentID', '$studentfullname', '$eventname', '$studentyear','$studentcourse','$thistime','$todaydate', 1)";
                    $resultAttendance = $con->query($sqlAttendance);

                    $response = array('status' => true, 'message' => "Student ".$studentID." Successfully Recorded");
                }
                elseif($time == "timeoutPM"){
                    $sqlAttendance = "INSERT INTO `attendancetbl` (`studentID`, `fullname`, `event`, `yearlevel`, `course`, `timeoutPM`,`date`, `IS_EXIST`) VALUES ('$studentID', '$studentfullname', '$eventname','$studentyear','$studentcourse','$thistime','$todaydate', 1)";
                    $resultAttendance = $con->query($sqlAttendance);

                    $response = array('status' => true, 'message' => "Student ".$studentID." Successfully Recorded");
                }
            }
            else{
                $response = array('status' => false, 'message' => $studentID." Does not Exist");
            }
            
        }
        else{
            // CHECK WHO IS THE USER OR THE ACCOUNT LOG IN
            if($user == "SuperAdmin"){
                $sqlStudent = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND `status` = 1 AND  `studentno` = '$studentID'";
                $resultStudent = $con->query($sqlStudent);
            }
            else{
                $useryearlevel = $_SESSION['user-yearlevel'];
                $sqlStudent = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND `status` = 1 AND `studentno` = '$studentID' AND `yearlevel` = '$useryearlevel'";
                $resultStudent = $con->query($sqlStudent);
            }

            if($resultStudent->num_rows > 0){
                if($time == "timeinAM"){
                    $sqlCheckAttendanceStudentExist = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `timeinAM` != ' ' AND `date` = '$todaydate'";
                    $resultCheckAttendanceStudentExist = $con->query($sqlCheckAttendanceStudentExist);
    
                    if( $resultCheckAttendanceStudentExist->num_rows > 0){
                         $response = array('status' => false, 'message' => "Student ".$studentID." is Already Recorded");
                    }else{
                        $sqlAttendance = "UPDATE `attendancetbl` SET `timeinAM`='$thistime' WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `date` = '$todaydate'";
                        $sqlAttendance = $con->query($sqlAttendance);
    
                        $response = array('status' => true, 'message' => "Student ".$studentID." Successfully Recorded");
                    }
                }
                elseif($time == "timeoutAM"){
                    $sqlCheckAttendanceStudentExist = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `timeoutAM` != ' ' AND `date` = '$todaydate'";
                    $resultCheckAttendanceStudentExist = $con->query($sqlCheckAttendanceStudentExist);
    
                    if( $resultCheckAttendanceStudentExist->num_rows > 0){
                        $response = array('status' => false, 'message' => "Student ".$studentID." is Already Recorded");
                    }else{
                        $sqlAttendance = "UPDATE `attendancetbl` SET `timeoutAM`='$thistime' WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `date` = '$todaydate'";
                        $sqlAttendance = $con->query($sqlAttendance);
    
                        $response = array('status' => true, 'message' => "Student ".$studentID." Successfully Recorded");
                    }
                }
                elseif($time == "timeinPM"){
                    $sqlCheckAttendanceStudentExist = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `timeinPM` != ' ' AND `date` = '$todaydate'";
                    $resultCheckAttendanceStudentExist = $con->query($sqlCheckAttendanceStudentExist);
    
                    if( $resultCheckAttendanceStudentExist->num_rows > 0){
                        $response = array('status' => false, 'message' => "Student ".$studentID." is Already Recorded");
                    }else{
                        $sqlAttendance = "UPDATE `attendancetbl` SET `timeinPM`='$thistime' WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `date` = '$todaydate'";
                        $sqlAttendance = $con->query($sqlAttendance);
    
                        $response = array('status' => true, 'message' => "Student ".$studentID." Successfully Recorded");
                    }
                }
                elseif($time == "timeoutPM"){
                    $sqlCheckAttendanceStudentExist = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `timeoutPM` != ' ' AND `date` = '$todaydate'";
                    $resultCheckAttendanceStudentExist = $con->query($sqlCheckAttendanceStudentExist);
    
                    if( $resultCheckAttendanceStudentExist->num_rows > 0){
                        $response = array('status' => false, 'message' => "Student ".$studentID." is Already Recorded");
                    }else{
                        $sqlAttendance = "UPDATE `attendancetbl` SET `timeoutPM`='$thistime' WHERE IS_EXIST = 1 AND `studentID` = '$studentID' AND `date` = '$todaydate'";
                        $sqlAttendance = $con->query($sqlAttendance);
    
                        $response = array('status' => true, 'message' => "Student ".$studentID." Successfully Recorded");
                    }
                }
            }
            else{
                $response = array('status' => false, 'message' => $studentID." does not exist");
            }
        }
       
        echo json_encode($response);exit();
    }

    // getstudentattendance data
    if(isset($_POST['getstudentattendance'])){
        $user = $_SESSION['user'];

        $todaydate = date("Y/m/d");
        $eventname = $_POST['event'];
        $timetext = $_POST['time'];

        if($user == "SuperAdmin"){
            if($timetext == "timeinAM"){
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$todaydate' AND `event` = '$eventname' AND `timeinAM` != ' ' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
                
            }
            elseif($timetext == "timeoutAM"){
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$todaydate' AND `event` = '$eventname' AND `timeoutAM` != ' ' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }
            elseif($timetext == "timeinPM"){
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$todaydate' AND `event` = '$eventname' AND `timeinPM` != ' ' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }
            elseif($timetext == "timeoutPM"){
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$todaydate' AND `event` = '$eventname' AND `timeoutPM` != ' ' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }else{
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 12 AND `date` = '$todaydate' AND `event` = '$eventname' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }
        }
        else{
            $useryearlevel = $_SESSION['user-yearlevel'];
            if($timetext == "timeinAM"){
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$todaydate' AND `event` = '$eventname' AND `timeinAM` != ' ' AND `yearlevel` = '$useryearlevel' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }
            elseif($timetext == "timeoutAM"){
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$todaydate' AND `event` = '$eventname' AND `timeoutAM` != ' ' AND `yearlevel` = '$useryearlevel' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }
            elseif($timetext == "timeinPM"){
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$todaydate' AND `event` = '$eventname' AND `timeinPM` != ' ' AND `yearlevel` = '$useryearlevel' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }
            elseif($timetext == "timeoutPM"){
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$todaydate' AND `event` = '$eventname' AND `timeoutPM` != ' ' AND `yearlevel` = '$useryearlevel' ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }else{
                $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 12 AND `date` = '$todaydate' AND `event` = '$eventname'  ORDER BY `updatedAt` DESC";
                $result = $con->query($sql);
            }
        }

        if($result->num_rows >= 1){
            while($row = $result->fetch_assoc()){
            
            if($timetext == 'timeinAM'){
                $attendanceTime = $row['timeinAM'];
            }
            elseif($timetext == 'timeoutAM'){
                $attendanceTime = $row['timeoutAM'];
            }
            elseif($timetext == 'timeinPM'){
                $attendanceTime = $row['timeinPM'];
            }
            elseif($timetext == 'timeoutPM'){
                $attendanceTime = $row['timeoutPM'];
            }
?>
            <li><span><?php echo $row['studentID'] ?></span><span><?php echo $row['fullname'] ?></span> <span><?php echo $row['course']."-".$row['yearlevel'] ?></span><span><?php echo $attendanceTime ?></span></li>
<?php
            }
        }
        else{

        }
    }

    if(isset($_GET['checkuser'])){
        $user = $_SESSION['user'];

        if($user === "SuperAdmin"){
            $checkuserResult = array('status' => true, 'message'=>"ADMIN SIYA DZAI");
        }
        else{
            $checkuserResult = array('status' => false, 'message'=>"DI SIYA ADMIN DZAI");
        }

        echo json_encode($checkuserResult);exit();
    }
?>

