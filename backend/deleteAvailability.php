<?php

    include "conn.php";

    $op_cl_id=$_REQUEST['op_cl_id'];

 

    $sql="DELETE FROM tbl_open_close_time WHERE op_cl_id='$op_cl_id'";
    $rs=$conn->query($sql);

    if($rs>0){
        echo 200;
        exit();
    }else{
        echo $sql;
        exit();
    }
    
?>