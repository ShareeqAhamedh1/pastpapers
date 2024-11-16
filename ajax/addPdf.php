<?php 

$l_id=$_REQUEST['l_id'];
?>

<div class="container card-body">
    <h4>Add PDF</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pText">Caption</label>
            <input type="text" name="pText" id="pText" class="form-control" placeholder="Enter The Text" required>
        </div>
        <div class="form-group">
            <label for="pdf">PDF</label>
            <input type="file" name="pdf" id="pdf" class="form-control" placeholder="Enter service price" required>
        </div>
        <button type="button" class="btn btn-primary" onClick="addPdf(<?= $l_id ?>)">Add</button>
    </form>
</div>