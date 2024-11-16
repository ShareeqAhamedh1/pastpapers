<?php

    include "conn.php";

    $a_s_id=$_REQUEST['a_s_id'];

 

    $sql="DELETE FROM tbl_added_services WHERE a_s_id='$a_s_id'";
    $rs=$conn->query($sql);

    if($rs>0){
        echo 200;
        exit();
    }else{
        echo $sql;
        exit();
    }
    
?>