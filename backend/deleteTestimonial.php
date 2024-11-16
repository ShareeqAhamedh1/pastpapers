<?php

    include "conn.php";

    $rev_id=$_REQUEST['rev_id'];

 

    $sql="DELETE FROM tbl_reviews WHERE rev_id='$rev_id'";
    $rs=$conn->query($sql);

    if($rs>0){
        echo 200;
        exit();
    }else{
        echo $sql;
        exit();
    }
    
?>