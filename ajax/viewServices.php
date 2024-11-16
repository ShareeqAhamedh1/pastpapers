<?php 
include "../backend/conn.php";

$sql="SELECT * FROM tbl_sc_services";
$rs=$conn->query($sql);

if($rs->num_rows>0){
    ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Service Name</th>
            <th>Service Price Range</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($rows=$rs->fetch_assoc()){
                ?>
        <tr>
            <td><?= $rows['s_name'] ?></td>
            <td><?= $rows['s_price_range'] ?></td>
            <td>
            <button type="button" class="btn btn-sm btn-danger" onclick="deleteService(<?= $rows['sc_s_id'] ?>)"><i class="ri-delete-bin-6-line"></i></button>
            <button type="button" class="btn btn-sm btn-warning" onclick="editModelService(<?= $rows['sc_s_id'] ?>)"><i class="ri-edit-box-fill"></i></button>
                                            
            </td>
        </tr>

        
        <?php
            }
        ?>
    </tbody>
</table>    

    <?php
}
?>