<?php

include "../backend/conn.php";

$v_id=$_REQUEST['v_id'];
$l_id=$_REQUEST['l_id'];

$sql="SELECT * FROM tbl_video WHERE v_id='$v_id'";
$rs=$conn->query($sql);

if($rs->num_rows==1){
    $rows=$rs->fetch_assoc();
}
?>

<?php 

?>

<div class="container card-body">
    <h4>Edit Video</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pText">Caption</label>
            <input type="text" name="pText" id="pText" class="form-control" placeholder="Enter The Caption" value="<?= $rows['v_caption'] ?>" required>
        </div>
        <div class="form-group">
            <label for="vUrl">URL</label>
            <input type="text" name="vUrl" id="vUrl" class="form-control" placeholder="Enter service price" value="<?= $rows['v_link'] ?>" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="editVideo(<?= $v_id ?>,<?= $l_id ?>)">Edit</button>
    </form>
</div>