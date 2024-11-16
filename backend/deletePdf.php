<?php

    include "conn.php";

    $f_id=$_REQUEST['f_id'];

 
    
    $deletePdf=getDataBack($conn,'tbl_files','f_id',$f_id,'f_thumb');
    unlink('../assets/img/pdf/'.$deletePdf);
 

    $sql="DELETE FROM tbl_files WHERE f_id='$f_id'";
    $rs=$conn->query($sql);

    if($rs>0){
        echo 200;
        exit();
    }else{
        echo $sql;
        exit();
    }
    
?>