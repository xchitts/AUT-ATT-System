<?php
    include ("connect.php");

    if(isset($_POST['eventname']) && isset($_POST['eventdate']) && $_POST['eventname'] && $_POST['eventdate']){
        $eventname = $_POST['eventname'];
        $eventdate = $_POST['eventdate'];

        $sqlEventChecker = "SELECT * FROM `events` WHERE IS_EXIST = 1 AND `eventname` = '$eventname' AND `eventdate` = '$eventdate'";

        $sql = "INSERT INTO `events`(`eventname`, `eventdate`, `status`, `IS_EXIST`) VALUES ('$eventname','$eventdate','0','1')";
        $result = $con->query($sql);

        if($result === true){
            $eventResponse = array('status' => true, 'message' => "Successfuly Added");
        }
        else{
            $eventResponse = array('status' => false, 'message' => "Event Already Exist!");
        }

        echo json_encode($eventResponse);exit();
    }

    if(isset($_POST['getallevents']) && $_POST['getallevents'] != ''){
        $sql = "SELECT * FROM `events` WHERE IS_EXIST = 1 ORDER BY eventdate DESC, eventname ASC" ;
        $result = $con->query($sql);

        while($row = $result->fetch_assoc()){
            if($row['status'] == 1){
?> 
                <tr>
                    <td><?php echo $row['eventname'] ?></td>
                    <td><?php echo $row['eventdate'] ?></td>
                    <td><input type="checkbox" class="eventstatuscheckbox" id="event-status" onclick = "changeStatus(<?php echo $row['id']; ?>)"  style = "height: 18px; width: 18px;" checked></td>
                    <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_event(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
<?php
            }
            else{
?>  
                <tr>
                    <td><?php echo $row['eventname'] ?></td>
                    <td><?php echo $row['eventdate'] ?></td>
                    <td><input type="checkbox" class="eventstatuscheckbox" id="event-status" onclick = "changeStatus(<?php echo $row['id']; ?>)" style = "height: 18px; width: 18px;"></td>
                    <td><button type="button" style="color:red; border:none; cursor:pointer; background-color: inherit;" onclick="delete_event(<?php echo $row['id']; ?>)" ><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                </tr>
<?php
            }
        }
    }

    if(isset($_GET['changestatus']) && $_GET['changestatus'] != ''){
        $eventid = $_GET['changestatus'];
        $sql = "SELECT `status` FROM `events` WHERE IS_EXIST = 1 AND `id` = '$eventid'";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();

        if($row['status']){
            $sqlStatus = "UPDATE `events` SET `status`='0' WHERE `id` = '$eventid'";
        }
        else{
            $sqlStatus = "UPDATE `events` SET `status`='1' WHERE `id` = '$eventid'";
        }
        $result = $con->query($sqlStatus);
    }

    if(isset($_POST['eventid'])){
        $eventid = $_POST['eventid'];

        $sql = "UPDATE `events` SET `IS_EXIST`='0' WHERE IS_EXIST = 1 AND `id` = '$eventid'";
        $result = $con->query($sql);
    }
?>