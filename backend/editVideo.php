<?php
include "conn.php";

$pText=$_REQUEST['pText'];
$l_id=$_REQUEST['l_id'];
$v_id=$_REQUEST['v_id'];
$vUrl=$_REQUEST['vUrl'];

if($vUrl!="" && $pText!=""){

    $sql = "UPDATE tbl_video SET v_caption='$pText',
    l_id='$l_id',
    v_link='$vUrl'
    WHERE v_id='$v_id'";
    
$rs=$conn->query($sql);



  






    if($rs>0){
        echo 200;
        exit();
    }else{
        echo 500;
        exit();
    }
}else{
    echo 202;
        exit();
}














?>