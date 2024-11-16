<?php

include "../backend/conn.php";

$f_id=$_REQUEST['f_id'];
$l_id=$_REQUEST['l_id'];

$sql="SELECT * FROM tbl_files WHERE f_id='$f_id'";
$rs=$conn->query($sql);

if($rs->num_rows==1){
    $rows=$rs->fetch_assoc();
}
?>

<?php 

?>

<div class="container card-body">
    <h4>Edit PDF</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pText">Caption</label>
            <input type="text" name="pText" id="pText" class="form-control" placeholder="Enter The Caption" value="<?= $rows['f_caption'] ?>" required>
        </div>
        <div class="form-group">
            <label for="pdf">PDF</label>
            <input type="file" name="pdf" id="pdf" class="form-control" placeholder="Enter service price" value="<?= $rows['f_thumb'] ?>" required>
        </div>
        <button type="button" class="btn btn-primary" onClick="editPdf(<?= $f_id ?>,<?= $l_id ?>)">Edit</button>
    </form>
</div>