<?php 
    include "connect.php";
    session_start();

    if(isset($_POST['email']) && isset($_POST['password'])){
        $password = $_POST['password'];
        $email = $_POST['email'];
        $statusChecker = $_POST['checker'];
        $sql = "SELECT * FROM `users` WHERE IS_EXIST = 1 AND `email` = '$email'";
        $result = $con->query($sql);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();

            if(password_verify($password, $row['password'])){
                if($statusChecker == "1"){
                    $sqlRemember = "UPDATE `users` SET `remember` = 1 WHERE `email` = '$email' AND IS_EXIST = 1";
                    $resultRemember = $con->query($sqlRemember);

                    $remembered_user = $row['user'];
                    setcookie("remembered_user", $remembered_user, time() + 86400);
                }
                else{
                    $sqlRemember = "UPDATE `users` SET `remember` = 0 WHERE `email` = '$email' AND IS_EXIST = 1";
                    $resultRemember = $con->query($sqlRemember);
                }

                $_SESSION['user'] = $row['user'];
                $_SESSION['userStatus'] = true;
                $_SESSION['user-yearlevel'] = $row['yearlevel'];
                $_SESSION['user-type'] = $row['user_type'];
                $loginResult = array('status' => true, 'message' => "Successfully Login");
                
            }
            else{
                $loginResult = array('status' => false, 'message' => "Invalid Login");
            }
        }
        else{
            $loginResult = array('status' => false, 'message' => "Invalid Login");
        }
        echo json_encode($loginResult);exit();
    }
?>