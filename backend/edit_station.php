<?php
include "conn.php";

$name=$_REQUEST['name'];
$address=$_REQUEST['address'];
$phoneno=$_REQUEST['phoneno'];
$province=$_REQUEST['province'];
$district=$_REQUEST['district'];
$city=$_REQUEST['city'];
$sabout=$_REQUEST['sabout'];
$sc_id=$_REQUEST['sc_id'];



    $sql = "UPDATE tbl_service_center SET s_name='$name',
                                          s_phone_number='$phoneno',
                                          s_location='$address',
                                          s_city='$city',
                                          s_district='$district',
                                          s_province='$province',
                                          s_desc='$sabout' WHERE sc_id='$sc_id'";
                                          
    $rs=$conn->query($sql);

    
$last_id = $conn->insert_id;


$logoTemp = $_FILES['logo']['tmp_name'];
$bannerTemp = $_FILES['banner']['tmp_name'];

$allowedList=array('jpg','jpeg','png','webp');
$errorLocation= '../stations.php';


if($logoTemp != ""){

    $logo=$_REQUEST['logo'];

    $filePaththumb='../assets/img/logo/';
    uploadImage('logo',$filePaththumb,$allowedList,$errorLocation);
    $logo = $GLOBALS['fileNameNew'];

    $sql = "UPDATE tbl_service_center SET s_logo='$logo' WHERE sc_id='$sc_id'";
    $rs=$conn->query($sql);
}

if($bannerTemp != ""){

    $banner=$_REQUEST['banner'];

    $filePaththumbsmall='../assets/img/banner/';
    uploadImage('banner',$filePaththumbsmall,$allowedList,$errorLocation);
    $banner = $GLOBALS['fileNameNew'];

    $sql = "UPDATE tbl_service_center SET s_banner='$banner' WHERE sc_id='$sc_id'";
    $rs=$conn->query($sql);
}

    if($rs>0){
        echo 200;
        exit();
    }else{
        echo 500;
        exit();
    }















?>