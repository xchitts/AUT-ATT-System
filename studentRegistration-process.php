<?php
    include "connect.php";

    if(isset($_POST['studentnumber']) != '' && isset($_POST['fullname']) != '' && isset($_POST['yearlevel']) != '' && isset($_POST['contactnumber']) != '' && isset($_POST['course']) != ''){
        
        $studentnumber = $_POST['studentnumber'];
        $fullname = $_POST['fullname'];
        $yearlevel = $_POST['yearlevel'];
        $course = $_POST['course'];
        $contactnumber = $_POST['contactnumber'];

        $sqlSNchecker = "SELECT `studentno` FROM `studentlist` WHERE IS_EXIST = 1 AND `studentno` = '$studentnumber'";
        $resultchecker = $con->query($sqlSNchecker);

        if($resultchecker->num_rows == 0){
            $sql = "INSERT INTO `studentlist`(`studentno`, `fullname`, `yearlevel`, `course`, `contactno`, `status`, `IS_EXIST`) VALUES ('$studentnumber','$fullname','$yearlevel', '$course', '$contactnumber','0','1')";
            $result = $con->query($sql);

            if($result){
                $registerResult = array('status' => true, 'message' => "Sucessfuly Login");
            }
            else{
                $registerResult = array('status' => false, 'message' => "Invalid Login");
            }
        }else{
            $registerResult = array('status' => false, 'message' => "Invalid Login");
        }

        echo json_encode($registerResult);exit();
    }
?>