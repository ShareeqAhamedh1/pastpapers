<?php
include "conn.php";

$pText=$_REQUEST['pText'];
$l_id=$_REQUEST['l_id'];
$f_id=$_REQUEST['f_id'];



    $sql = "UPDATE tbl_files SET f_caption='$pText',
                                          l_id='$l_id'
                                          WHERE f_id='$f_id'";
                                          
    $rs=$conn->query($sql);

    
$last_id = $conn->insert_id;


$pdfTemp = $_FILES['pdf']['tmp_name'];

$allowedList=array('jpg','jpeg','png','webp','pdf');
$errorLocation= '../addlessons.php';


if($pdfTemp != ""){

    $pdf=$_REQUEST['pdf'];

    $deletePdf=getDataBack($conn,'tbl_files','f_id',$f_id,'f_thumb');
    unlink('../assets/img/pdf/'.$deletePdf);

    $filePathpdf='../assets/img/pdf/';
    uploadImage('pdf',$filePathpdf,$allowedList,$errorLocation);
    $pdf = $GLOBALS['fileNameNew'];

    $sql = "UPDATE tbl_files SET f_thumb='$pdf' WHERE f_id='$f_id'";
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