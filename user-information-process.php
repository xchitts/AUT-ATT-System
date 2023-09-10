<?php 
    session_start();
    include "connect.php";

    if(isset($_POST['user_information'])){
        $user = $_SESSION['user'];
        $sql = "SELECT * FROM `users` WHERE IS_EXIST = 1 AND `user` = '$user'";
        $result = $con->query($sql);

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $response = array('status' => true, 'data' => $row);
        }
        else{
            $response = array('status' => true, 'data' => $row);
        }

        echo json_encode($response);
    }

    if(isset($_POST['user_id']) && $_POST['user_id'] != ''){
        $user_id = $_POST['user_id'];
        $username = $_POST['user_username'];
        $email = $_POST['user_email'];
        $password = $_POST['user_password'];

        $sql = "";
        $result = $con->query($sql);

        if($result->num_rows > 0){

        }
        else{
            
        }
    }
?>