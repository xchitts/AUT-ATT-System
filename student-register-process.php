<?php
    include "connect.php";
    session_start();

    if(isset($_POST['getAllStudent'])){
        if($_SESSION['user'] == "SuperAdmin"){
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 ORDER BY `createdAt` DESC";
        }
        else{
            $yearlevel = $_SESSION['user-yearlevel'];
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `yearlevel` = '$yearlevel' ORDER BY `createdAt` DESC";
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
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>&nbsp;
                <button type="button" style="color:#008000; border:none; cursor:pointer; background-color: inherit;" onclick="add_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-check-to-slot"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['search'])){
        $studentID = $_POST['search'];
        if($_SESSION['user'] == "SuperAdmin"){
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `studentno` = '$studentID' ORDER BY `createdAt` DESC";
        }
        else{
            $yearlevel = $_SESSION['user-yearlevel'];
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `yearlevel` = '$yearlevel' AND `studentno` = '$studentID' ORDER BY `createdAt` DESC";
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
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>&nbsp;
                <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="add_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-square-check"></i></i></button>
            </td>
        </tr>
<?php
        }
    }
    if(isset($_POST['searchYear'])){
        $studentYearLevel = $_POST['searchYear'];

        $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `yearlevel` = '$studentYearLevel' ORDER BY `yearlevel`, `fullname` DESC";

        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>&nbsp;
                <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="add_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-square-check"></i></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchCourse'])){
        $studentCourse = $_POST['searchCourse'];
        if($_SESSION['user'] == "SuperAdmin"){
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `course` = '$studentCourse' ORDER BY `yearlevel`, `fullname` DESC";
        }
        else{
            $yearlevel = $_SESSION['user-yearlevel'];
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `yearlevel` = '$yearlevel' AND `course` = '$studentCourse' ORDER BY `fullname` DESC";
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
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchYearCourse'])){
        $studentYear = $_POST['year'];
        $studentCourse = $_POST['course'];

        $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `yearlevel` = '$studentYear' AND `course` = '$studentCourse' ORDER BY `yearlevel`, `fullname` DESC";

        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>&nbsp;
                <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="add_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-square-check"></i></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchYearSearch'])){
        $studentYear = $_POST['yearlevel'];
        $studentID = $_POST['studentID'];

        $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `yearlevel` = '$studentYear' AND `studentno` = '$studentID ' ORDER BY `yearlevel`, `fullname` DESC";

        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>&nbsp;
                <button type="button" style="color:orange; border:none; cursor:pointer; background-color: inherit;" onclick="add_student_register(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-square-check"></i></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchCourseSearch'])){
        $studentCourse = $_POST['course'];
        $studentID = $_POST['studentID'];
        if($_SESSION['user'] == "SuperAdmin"){
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `course` = '$studentCourse' AND `studentno` = '$studentID' ORDER BY `yearlevel`, `fullname` DESC";
        }
        else{
            $yearlevel = $_SESSION['user-yearlevel'];
            $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `yearlevel` = '$yearlevel' AND `course` = '$studentCourse' AND `studentno` = '$studentID' ORDER BY `fullname` DESC";
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
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_POST['searchYearCourseSearch'])){
        $studentYear = $_POST['yearlevel'];
        $studentCourse = $_POST['course'];
        $studentID = $_POST['studentID'];

        $sql = "SELECT * FROM `studentlist` WHERE `IS_EXIST` = 1 AND `STATUS` = 0 AND `yearlevel` = '$studentYear' AND `course` = '$studentCourse' AND `studentno` = '$studentID ' ORDER BY `yearlevel`, `fullname` DESC";

        $result = $con->query($sql);
        while($row = $result->fetch_assoc()){
?>
        <tr>
            <td><?php echo $row['studentno'] ?></td>
            <td><?php echo $row['fullname'] ?></td>
            <td><?php echo $row['yearlevel'] ?></td>
            <td><?php echo $row['course'] ?></td>
            <td><?php echo $row['contactno'] ?></td>
            <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_student(<?php echo $row['studentno']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
            </td>
        </tr>
<?php
        }
    }

    if(isset($_GET['addStudent'])){
        $studentID = $_GET['addStudent'];
        $sql = "UPDATE `studentlist` SET `status` = 1 WHERE `studentno` = '$studentID'";
        $result = $con->query($sql);
    }

    if(isset($_GET['deleteStudent'])){
        $studentID = $_GET['deleteStudent'];
        $sql = "UPDATE `studentlist` SET `IS_EXIST` = 0 WHERE `studentno` = '$studentID'";
        $result = $con->query($sql);
    }
?>