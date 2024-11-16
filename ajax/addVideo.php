<?php 

$l_id=$_REQUEST['l_id'];
?>

<div class="container card-body">
    <h4>Add Video</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pText">Caption</label>
            <input type="text" name="pText" id="pText" class="form-control" placeholder="Enter The Text" required>
        </div>
        <div class="form-group">
            <label for="vUrl">URL</label>
            <input type="text" name="vUrl" id="vUrl" class="form-control" placeholder="Enter The URL" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="adVideo(<?= $l_id ?>)">Add</button>
    </form>
</div>