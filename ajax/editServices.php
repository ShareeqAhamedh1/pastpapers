<?php

include "../backend/conn.php";
$sc_s_id=$_REQUEST['sc_s_id'];

$sql="SELECT * FROM tbl_sc_services WHERE sc_s_id='$sc_s_id'";
$rs=$conn->query($sql);

if($rs->num_rows==1){
    $rows=$rs->fetch_assoc();
}
?>

<div class="container card-body">
    <h4>Edit Services</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pName">Services Name</label>
            <!-- <input type="text" name="serviceName" id="serviceName"> -->
            <input type="text" name="serviceName" id="serviceName" class="form-control" value="<?= $rows['s_name'] ?>" placeholder="Enter service name" required>
        </div>
        <div class="form-group">
            <label for="pName">Service Price Range</label>
            <input type="text" name="servicePrice" id="servicePrice" class="form-control" value="<?= $rows['s_price_range'] ?>" placeholder="Enter service price" required>
        </div>
        <button type="button" class="btn btn-warning" onClick="editService(<?= $sc_s_id ?>)">Edit</button>
    </form>
</div>
