<?php

    include "conn.php";

    $sc_s_id=$_REQUEST['sc_s_id'];

  
    $sqlSearch="SELECT * FROM tbl_added_services WHERE sc_s_id='$sc_s_id'";
    $rsSearch=$conn->query($sqlSearch);

    if($rsSearch->num_rows>0){
        echo 400;
        exit();

    }else{
        $sql="DELETE FROM tbl_sc_services WHERE sc_s_id='$sc_s_id'";
        $rs=$conn->query($sql);
    
        if($rs>0){
            echo 200;
            exit();
        }else{
            echo $sql;
            exit();
        }
    }

  
    
?>