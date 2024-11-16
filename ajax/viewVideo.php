<?php 
include "../backend/conn.php";

$l_id=$_REQUEST['l_id'];

$sql="SELECT * FROM tbl_video WHERE l_id='$l_id'";
$rs=$conn->query($sql);

if($rs->num_rows>0){
    ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Caption</th>
            <th>Video</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($rows=$rs->fetch_assoc()){
                ?>
        <tr>
            <td><?= $rows['v_caption'] ?></td>
            <td><iframe 
                width="200" 
                height="100" 
                src="<?= $rows['v_link'] ?>" 
                frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                allowfullscreen>
            </iframe></td>
            <!-- D:\XAMPP\htdocs\pastpaperwebsite\assets\img\pdf\pastpaper6735e98e8ee4a6.30840422.pdf -->
            <td>
            <button type="button" class="btn btn-sm btn-warning" onclick="openEditVideo(<?= $rows['v_id'] ?>,<?= $rows['l_id'] ?>)"><i class="ri-edit-box-fill"></i></button>
            <button type="button" class="btn btn-sm btn-danger" onclick="deleteVideo(<?= $rows['v_id'] ?>,<?= $rows['l_id'] ?>)"><i class="ri-delete-bin-6-line"></i></button>
                                            
            </td>
        </tr>

        
        <?php
            }
        ?>
    </tbody>
</table>    

    <?php
}else{
    ?>
    <h4>No files Added</h4>
    <?php
}

?>