<?php 
include "conn.php";

// Get POST variables
$pText = $_REQUEST['pText'];
$l_id = $_REQUEST['l_id'];
$vUrl = $_REQUEST['vUrl'];




if($pText != "" && $vUrl !=""){


    $sql="INSERT INTO tbl_video(v_link,v_caption,l_id) VALUES('$vUrl','$pText','$l_id')";
    $rs=$conn->query($sql);

    // $sql = "UPDATE tbl_hotel_edit SET h_thumb_img='$icimageOrg' WHERE h_e_id='$last_id'";
    // $rs=$conn->query($sql);
}else{
    echo 202;
    exit();
}



if($rs>0){
    echo 200;
    exit();
}else{
    echo $sql;
    exit();
}



?>
