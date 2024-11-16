<?php

    include "conn.php";

    $p_image_id=$_REQUEST['p_image_id'];

 
    $image=getDataBack($conn,'tbl_portfolio_image','p_image_id',$p_image_id,'p_image');
    unlink('../assets/img/protfolio/'.$image);

    $sql="DELETE FROM tbl_portfolio_image WHERE p_image_id='$p_image_id'";
    $rs=$conn->query($sql);

    if($rs>0){
        echo 200;
        exit();
    }else{
        echo $sql;
        exit();
    }
    
?>