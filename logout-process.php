<?php
    include "connect.php";
    session_start();

    if(isset($_GET['logout']) && isset($_GET['logout']) != ''){
        session_destroy();
        $user = $_SESSION['user'];
        $sqlRemember = "UPDATE `users` SET `remember` = 0 WHERE `user` = '$user' AND IS_EXIST = 1";
        $resultRemember = $con->query($sqlRemember);

        $remembered_user = "";
        setcookie("remembered_user", $remembered_user, time() -3600);

        $logoutResult = array('status' => true);
        
        echo json_encode($logoutResult);exit();
    }
?>