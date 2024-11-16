<?php 
include "../backend/conn.php";

$sc_id=$_REQUEST['sc_id'];

$sqlAddedServices="SELECT * FROM tbl_added_services WHERE sc_id='$sc_id'";
$rsAddedServices=$conn->query($sqlAddedServices);

if($rsAddedServices->num_rows>0){
    ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Service Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            while($rowsAddedServices=$rsAddedServices->fetch_assoc()){
                $sc_s_id=$rowsAddedServices['sc_s_id'];

                $sqlService="SELECT * FROM tbl_sc_services WHERE sc_s_id='$sc_s_id'";
                $rsService=$conn->query($sqlService);
                if($rsService->num_rows==1){
                   $rowsServices=$rsService->fetch_assoc();
                        ?>
                        
                     
        <tr>
            <td><?= $rowsServices['s_name'] ?></td>
            <td>
            <button type="button" class="btn btn-sm btn-danger" onclick="deleteAddedService(<?= $rowsAddedServices['a_s_id'] ?>)"><i class="ri-delete-bin-6-line"></i></button>
            <!-- <button type="button" class="btn btn-sm btn-warning" ><i class="ri-edit-box-fill"></i></button> -->
                                            
            </td>
        </tr>
        <?php
                    
                }
                ?>
        
        <?php
            }
        ?>
    </tbody>
</table>    

    <?php
}
?>