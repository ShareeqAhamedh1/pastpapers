<?php 
include "conn.php";

// Get POST variables
$pText = $_REQUEST['pText'];
$l_id = $_REQUEST['l_id'];

$pdf = $_FILES['pdf']['tmp_name'];

$allowedList=array('jpg','jpeg','png','webp','pdf');
$errorLocation= '../addlessons.php';



if($pdf != "" && $pText !=""){

    $pdfOrg=$_REQUEST['pdf'];

    $filePathtpdf='../assets/img/pdf/';
    uploadImage('pdf',$filePathtpdf,$allowedList,$errorLocation);
    $pdfOrg = $GLOBALS['fileNameNew'];

    $sql="INSERT INTO tbl_files(f_thumb,f_caption,l_id) VALUES('$pdfOrg','$pText','$l_id')";
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
