<?php
    session_start();

    if(isset($_GET['checkuser'])){
        $user = $_SESSION['user'];

        if($user == "SuperAdmin"){
            $response = array('status' => true , 'sms'=> "admin sita dzau");
        }
        else{
            $response = array('status' => false , 'sms'=> "di siya adminsdazui");
        }

        echo json_encode($response);exit();
    }
?>