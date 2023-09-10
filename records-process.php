<?php
    include "connect.php";
    session_start();

    $user = $_SESSION['user'];
    if($user == "SuperAdmin"){

    }
    else{
        $useryearlevel = $_SESSION['user-yearlevel'];
    }

    if(isset($_GET['getEventList'])){
        $sql = "SELECT * FROM `events` WHERE IS_EXIST = 1";
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

    // GET ALL ATTENDANCE IN TABLE
    if(isset($_POST['getAttendanceList'])){
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME YEARLEVEL
    if(isset($_POST['getAttendanceYearLevel'])){
        $yearlevel = $_POST['getAttendanceYearLevel'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE
    if(isset($_POST['getAttendanceCourse'])){
        $course = $_POST['getAttendanceCourse'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME EVENT NAME
    if(isset($_POST['getAttendanceEventName'])){
        $eventname = $_POST['getAttendanceEventName'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `event` = '$eventname' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME EVENT DATE
    if(isset($_POST['getAttendanceEventDate'])){
        $eventdate = $_POST['getAttendanceEventDate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$eventdate' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }
    
     // GET ALL ATTENDANCE IN TABLE SAME STUDENT ID
     if(isset($_POST['getAttendanceStudentID'])){
        $studentID = $_POST['getAttendanceStudentID'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `studentID` LIKE '%$studentID%' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `studentID` LIKE '%$studentID%' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE AND YEAR LEVEL
    if(isset($_POST['getAttendanceYearLevelCourse'])){
        $course = $_POST['course'];
        $yearlevel = $_POST['yearlevel'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$yearlevel'ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
       
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE AND YEAR LEVEL AND STUDENT ID
    if(isset($_POST['getAttendanceYearLevelCourseStudentID'])){
        $course = $_POST['course'];
        $yearlevel = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$yearlevel' AND `studentID` LIKE '%$studentID%'ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$useryearlevel' AND `studentID` LIKE '%$studentID%'ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
       
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE AND YEAR LEVEL AND STUDENT ID AND EVENT NAME
    if(isset($_POST['getAttendanceYearLevelCourseStudentIDEventName'])){
        $course = $_POST['course'];
        $yearlevel = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];
        $eventname = $_POST['eventname'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$yearlevel' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$useryearlevel' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE AND YEAR LEVEL AND STUDENT ID AND EVENT NAME AND EVENTDATE
    if(isset($_POST['getAttendanceYearLevelCourseStudentIDEventNameEventDate'])){
        $course = $_POST['course'];
        $yearlevel = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$yearlevel' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$useryearlevel' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME YEARLEVEL COURSE EVENTNAME
    if(isset($_POST['getAttendanceYearLevelCourseEventName'])){
        $course = $_POST['course'];
        $yearlevel = $_POST['yearlevel'];
        $eventname = $_POST['eventname'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$yearlevel' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$useryearlevel' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME YEARLEVEL COURSE EVENTNAME EVENTDATE
    if(isset($_POST['getAttendanceYearLevelCourseEventNameEventDate'])){
        $course = $_POST['course'];
        $yearlevel = $_POST['yearlevel'];
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$yearlevel' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `yearlevel` = '$useryearlevel' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME YEARLEVEL EVENTNAME
    if(isset($_POST['getAttendanceYearLevelEventName'])){
        $yearlevel = $_POST['yearlevel'];
        $eventname = $_POST['eventname'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$useryearlevel' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
           <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME YEARLEVEL EVENTDATE
    if(isset($_POST['getAttendanceYearLevelEventDate'])){
        $yearlevel = $_POST['yearlevel'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$useryearlevel' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME YEARLEVEL EVENTDATE
    if(isset($_POST['getAttendanceYearLevelEventNameEventDate'])){
        $yearlevel = $_POST['yearlevel'];
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$useryearlevel' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTNAME
    if(isset($_POST['getAttendanceCourseEventName'])){
        $course = $_POST['course'];
        $eventname = $_POST['eventname'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `event` = '$eventname' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceCourseEventDate'])){
        $course = $_POST['course'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `date` = '$eventdate' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceCourseEventNameEventDate'])){
        $course = $_POST['course'];
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `event` = '$eventname' AND `date` = '$eventdate' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceCourseStudentID'])){
        $course = $_POST['course'];
        $studentID = $_POST['studentID'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `studentID` LIKE '%$studentID%' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `studentID` LIKE '%$studentID%' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }
    
    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceEventNameStudentID'])){
        $eventname = $_POST['eventname'];
        $studentID = $_POST['studentID'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `event` = '$eventname' AND `studentID` LIKE '%$studentID%' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `event` = '$eventname' AND `studentID` LIKE '%$studentID%' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceEventDateStudentID'])){
        $eventdate = $_POST['eventdate'];
        $studentID = $_POST['studentID'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$eventdate' AND `studentID` LIKE '%$studentID%' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `date` = '$eventdate' AND `studentID` LIKE '%$studentID%' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceYearLevelStudentID'])){
        $yearlevel = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' AND `studentID` LIKE '%$studentID%' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' AND `studentID` LIKE '%$studentID%' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceYearLevelStudentIDEventName'])){
        $yearlevel = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];
        $eventname = $_POST['eventname'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$useryearlevel' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceYearLevelStudentIDEventNameEventDate'])){
        $yearlevel = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$useryearlevel' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceYearLevelStudentIDEventDate'])){
        $yearlevel = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$yearlevel' AND `studentID` LIKE '%$studentID%' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `yearlevel` = '$useryearlevel' AND `studentID` LIKE '%$studentID%' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceCourseStudentIDEventDate'])){
        $course = $_POST['course'];
        $studentID = $_POST['studentID'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `studentID` LIKE '%$studentID%' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `studentID` LIKE '%$studentID%' AND `date` = '$eventdate' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
       
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
             <td style="display:none;"><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceCourseStudentIDEventName'])){
        $course = $_POST['course'];
        $studentID = $_POST['studentID'];
        $eventname = $_POST['eventname'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `studentID` LIKE '%$studentID%' AND `event` = '$eventname' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    // GET ALL ATTENDANCE IN TABLE SAME COURSE EVENTDATE
    if(isset($_POST['getAttendanceCourseStudentIDEventNameEventDate'])){
        $course = $_POST['course'];
        $studentID = $_POST['studentID'];
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `studentID` = '$studentID' AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `course` = '$course' AND `studentID` = '$studentID' AND `event` = '$eventname' AND `date` = '$eventdate' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['getAttendanceEventNameEventDate'])){
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];
        if($user == "SuperAdmin"){
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `event` = '$eventname' AND `date` = '$eventdate' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        else{
            $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `event` = '$eventname' AND `date` = '$eventdate' AND `yearlevel` = '$useryearlevel' ORDER BY `yearlevel`,`event`,`fullname` DESC";
        }
        
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentID'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['course']." - ".$row['yearlevel']?></td>
            <td><?php echo $row['event'] ?></td>
            <td><?php echo $row['timeinAM'] ?></td>
            <td><?php echo $row['timeoutAM'] ?></td>
            <td><?php echo $row['timeinPM'] ?></td>
            <td><?php echo $row['timeoutPM'] ?></td>
            <td><?php echo $row['date'] ?></td>
            <td style="display:none;">
                <button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_attendance(<?php echo $row['studentID']; ?>)" id="button-td"><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }


    // DELETE STUDENT ATTENDANCE
    if(isset($_POST['deleteStudentAttendance'])){
        $studentID = $_POST['studentID_delete'];

        $sql = "UPDATE `attendancetbl` SET `IS_EXIST` = 0 WHERE `studentID` = '$studentID'";
        $result = $con->query($sql);

        if($result){
            $deleteAttendanceResult = array('status' => true, 'message' => "delete dzai");
        }
        else{
            $deleteAttendanceResult = array('status' => false, 'message' => "wa na delete dzai");
        }
        

        echo json_encode($deleteAttendanceResult);exit();
        
    }

    // CHECK WHO IS THE USER
    if(isset($_GET['checkuser'])){
        if($user == "SuperAdmin"){
            $userResponse = array('status' => true, 'user'=>$user);
        }
        else{
            $userResponse = array('status' => false, 'user'=>$user);
        }

        echo json_encode($userResponse);exit();
    }


    // // EXPORT EXCEL
    // if(isset($_GET['exportdata']) && $_GET['exportdata'] != ''){
    //     $output = '';
    //     $exportdata = $_GET['exportdata'];
    //     $sql = "SELECT * FROM `attendancetbl` WHERE IS_EXIST = 1 AND `event` = '$exportdata' ORDER BY `date`,`event`,`course`,`yearlevel`,fullname";
    //     $result = $con->query($sql);

    //     if($result->num_rows > 0 ){
    //         $output .='
    //             <table class="table" border="1">
    //                 <tr>
    //                     <th>StudentID</th>
    //                     <th>Fullname</th>
    //                     <th>Course-YearLevel</th>
    //                     <th>EventName</th>
    //                     <th>Timein-AM</th>
    //                     <th>Timeout-AM</th>
    //                     <th>Timein-PM</th>
    //                     <th>Timeout-PM</th>
    //                     <th>Date</th>
    //                 </tr>
    //         ';
    //         while($row = $result->fetch_assoc()){
    //             $output .= '
    //                 <tr>
    //                     <td>'.$row["studentID"].'</td>
    //                     <td>'.$row["fullname"].'</td>
    //                     <td>'.$row["course"]."-".$row["yearlevel"].'</td>
    //                     <td>'.$row["event"].'</td>
    //                     <td>'.$row["timeinAM"].'</td>
    //                     <td>'.$row["timeoutAM"].'</td>
    //                     <td>'.$row["timeinPM"].'</td>
    //                     <td>'.$row["timeoutPM"].'</td>
    //                     <td>'.$row["date"].'</td>
    //                 </tr>
    //             ';
    //         }
    //         $output .= '</table>';
    //         header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
    //         header("Content-Disposition: attachment;filename=\"filename.xlsx\"");
    //         echo $output;
    //     }
    // }
?>