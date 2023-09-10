<?php
    include "connect.php";
    session_start();

    if(isset($_POST['getAllStudent'])){
        if($_SESSION['user'] == "SuperAdmin"){
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 ORDER BY `yearlevel`, `fullname` ASC";
        }
        else{
            $yearlevel = $_SESSION['user-yearlevel'];
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `yearlevel` = '$yearlevel' ORDER BY `fullname` ASC";
        }
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit; margin-right: 5px" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="openmodalbtn(<?php echo $row['studentno'] ?>)" ><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['search'])){
        $studentID = $_POST['search'];
        if($_SESSION['user'] == "SuperAdmin"){
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `studentno` = '$studentID' ORDER BY `yearlevel`, `fullname` ASC";
        }
        else{
            $yearlevel = $_SESSION['user-yearlevel'];
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `yearlevel` = '$yearlevel' AND `studentno` = '$studentID' ORDER BY `fullname` ASC";
        }
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit; margin-right: 5px" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="openmodalbtn(<?php echo $row['studentno'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchYear'])){
        $studentYearLevel = $_POST['searchYear'];

        $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `yearlevel` = '$studentYearLevel' ORDER BY `yearlevel`, `fullname` ASC";

        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit; margin-right: 5px" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="openmodalbtn(<?php echo $row['studentno'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchCourse'])){
        $studentCourse = $_POST['searchCourse'];
        if($_SESSION['user'] == "SuperAdmin"){
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `course` = '$studentCourse' ORDER BY `yearlevel`, `fullname` ASC";
        }
        else{
            $yearlevel = $_SESSION['user-yearlevel'];
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `yearlevel` = '$yearlevel' AND `course` = '$studentCourse' ORDER BY `fullname` ASC";
        }
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit; margin-right: 5px" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="openmodalbtn(<?php echo $row['studentno'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchYearCourse'])){
        $studentYear = $_POST['year'];
        $studentCourse = $_POST['course'];

        $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `yearlevel` = '$studentYear' AND `course` = '$studentCourse' ORDER BY `yearlevel`, `fullname` ASC";

        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit; margin-right: 5px" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="openmodalbtn(<?php echo $row['studentno'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchYearSearch'])){
        $studentYear = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];

        $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `yearlevel` = '$studentYear' AND `studentno` = '$studentID ' ORDER BY `yearlevel`, `fullname` ASC";

        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit; margin-right: 5px" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="openmodalbtn(<?php echo $row['studentno'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchCourseSearch'])){
        $studentCourse = $_POST['course'];
        $studentID = $_POST['studentID'];
        if($_SESSION['user'] == "SuperAdmin"){
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `course` = '$studentCourse' AND `studentno` = '$studentID' ORDER BY `yearlevel`, `fullname` ASC";
        }
        else{
            $yearlevel = $_SESSION['user-yearlevel'];
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `yearlevel` = '$yearlevel' AND `course` = '$studentCourse' AND `studentno` = '$studentID' ORDER BY `fullname` ASC";
        }
        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit; margin-right: 5px" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="openmodalbtn(<?php echo $row['studentno'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchYearCourseSearch'])){
        $studentYear = $_POST['yearlevel'];
        $studentCourse = $_POST['course'];
        $studentID = $_POST['studentID'];

        $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 1 AND `yearlevel` = '$studentYear' AND `course` = '$studentCourse' AND `studentno` = '$studentID ' ORDER BY `yearlevel`, `fullname` ASC";

        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit; margin-right: 5px" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="openmodalbtn(<?php echo $row['studentno'] ?>)"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_GET['checkuser'])){
        if($_SESSION['user'] == "SuperAdmin"){
            $response = array('status' => true);
        }else{
            $response = array('status' => false);
        }
        
        echo json_encode($response);exit();
    }

    if(isset($_GET['deleteStudent'])){
        $studentID = $_GET['deleteStudent'];

        $sql = "UPDATE `studentlist` SET `IS_EXIST`= 0 WHERE `studentno` = '$studentID'";
        $result = $con->query($sql);

        echo " success";
    }

    // UPDATE STUDENT PROCESS
    if(isset($_POST['update_student_id']) && $_POST['update_student_id'] != ''){
        $studentid = $_POST['update_student_id'];

        $sql = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND `status` = 1 AND `studentno` = '$studentid' ";
        $result = $con->query($sql);
        
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $response = array ('status' => true , 'data' => $row);
        }
        else{
            $response = array ('status' => true , 'data' => $con->error);
        }

        echo json_encode($response);exit();
    }

    // UPDATE THE DATA OF THE STUDENT
    if(isset($_POST['updatestudentid']) && $_POST['updatestudentid'] != ''){
        $updatestudent_id = $_POST['updatestudentid'];
        $fullname = $_POST['fullname'];
        $yearlevel =  $_POST['yearlevel'];
        $course = $_POST['course'];
        $contactno = $_POST['contactno'];

        $sql = "UPDATE `studentlist` SET `fullname`='$fullname',`yearlevel`='$yearlevel',`course`='$course',`contactno`='$contactno' WHERE `studentno` = '$updatestudent_id' AND IS_EXIST = 1 AND `status` = 1";
        $result = $con->query($sql);

        if($result){
            $response = array('status' => true, 'sms' => "Student Successfully Updated");
        }
        else{
            $response = array('status' => true, 'sms' => "Student Successfully Updated");
        }

        echo json_encode($response);exit();
    }
?>