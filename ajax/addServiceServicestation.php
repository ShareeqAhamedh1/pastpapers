<?php 
include "../backend/conn.php";
$sc_id=$_REQUEST['sc_id'];
?>

<div class="container card-body">
    <form method="post" enctype="multipart/form-data">
        <h4>Add Service for station</h4>

        <div class="form-group">
            <label for="service">Services</label>
            <select name="service" id="service" class="form-control" required>
                <!-- Example options; replace with actual categories as needed -->

                <?php $sqlServices="SELECT * FROM tbl_sc_services";
                        $rsServices=$conn->query($sqlServices);

                        if($rsServices->num_rows>0){
                            while($rowsServices=$rsServices->fetch_assoc()){
                                ?> 
                     <option value="<?= $rowsServices['sc_s_id'] ?>"><?= $rowsServices['s_name'] ?></option>
                
                <?php
                            }
                        }
                    ?>
            </select>
        </div>

        <button type="button" class="btn btn-primary" onclick="addServiceForStation(<?= $sc_id ?>)">Add</button>
    </form>
</div>
