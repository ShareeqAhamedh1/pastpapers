<?php
include "conn.php";

if (isset($_REQUEST['sc_id']) && isset($_REQUEST['selectedDays'])) {
    $sc_id = $_REQUEST['sc_id'];
    $selectedDays = json_decode($_REQUEST['selectedDays'], true); // Decode JSON

    foreach ($selectedDays as $availability) {
        $day = $availability['day'];
        $openTime = $availability['openTime'];
        $closeTime = $availability['closeTime'];

        $sqlSelect="SELECT * FROM tbl_open_close_time WHERE sc_id='$sc_id' AND op_cl_day='$day'";
        $rsSelect=$conn->query($sqlSelect);
        if($rsSelect->num_rows==0){
            
        

        $sql = "INSERT INTO tbl_open_close_time (sc_id, op_cl_day, open_time, close_time) VALUES ('$sc_id','$day','$openTime','$closeTime')";
        $rs = $conn->query($sql);

        }else{
            echo 202;
            exit();
        }
        
    }
    if($rs>0){
        echo 200; // Success response code
        exit();
    }else{
        echo 400;
        exit();
    }

    
} else {
    echo 300;
    exit(); // Bad request response code
}
?>
