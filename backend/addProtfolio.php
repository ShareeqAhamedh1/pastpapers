<?php 
include "conn.php";

// Get POST variables
$sc_id = $_REQUEST['sc_id'];
$sdate = $_REQUEST['sdate'];
$rating = $_REQUEST['rating'];
$service = $_REQUEST['service'];

$image = $_FILES['image']['tmp_name'];

$allowedList=array('jpg','jpeg','png','webp');
$errorLocation= '../stations.php';

$sqlService="SELECT * FROM tbl_sc_services WHERE sc_s_id='$service'";
$rsService=$conn->query($sqlService);

    if($rsService->num_rows==1){
        $rowService=$rsService->fetch_assoc();
        $serviceName=$rowService['s_name'];
    }


if($image != "" && $sdate !="" && $rating !=""){

    $imageOrg=$_REQUEST['image'];

    $filePathtMoreImg='../assets/img/protfolio/';
    uploadImage('image',$filePathtMoreImg,$allowedList,$errorLocation);
    $imageOrg = $GLOBALS['fileNameNew'];

    $sql="INSERT INTO tbl_portfolio_image(p_image,p_service_name,sc_id,s_date,s_rating) VALUES('$imageOrg','$serviceName','$sc_id','$sdate','$rating')";
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
