<?php
    include "connect.php";

    if(isset($_GET['getTotal'])){
        $sql1st = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND status = 1 AND yearlevel = '1'";
        $result1st = $con->query($sql1st); 

        $sql2nd = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND status = 1 AND yearlevel = '2'";
        $result2nd = $con->query($sql2nd); 

        $sql3rd = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND status = 1 AND yearlevel = '3'";
        $result3rd = $con->query($sql3rd); 

        $sql4th = "SELECT * FROM `studentlist` WHERE IS_EXIST = 1 AND status = 1 AND yearlevel = '4'";
        $result4th = $con->query($sql4th); 

        $one = $result1st->num_rows;
        $two = $result2nd->num_rows;
        $three = $result3rd->num_rows;
        $four = $result4th->num_rows;

        $response = array('status' => true, 'one' => "$one", 'two' => "$two", 'three' => "$three", 'four' => "$four");

        echo json_encode($response);exit();
    }
?>