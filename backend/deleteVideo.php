<?php

    include "conn.php";

    $v_id=$_REQUEST['v_id'];

 

    $sql="DELETE FROM tbl_video WHERE v_id='$v_id'";
    $rs=$conn->query($sql);

    if($rs>0){
        echo 200;
        exit();
    }else{
        echo $sql;
        exit();
    }
    
?>