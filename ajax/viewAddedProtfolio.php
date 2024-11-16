
<?php 
include "../backend/conn.php";

// $h_a_id=$_SESSION['h_a_id'];
$sc_id=$_REQUEST['sc_id'];

$sqlProtfolio="SELECT * FROM tbl_portfolio_image WHERE sc_id='$sc_id'";
$rsProtfolio=$conn->query($sqlProtfolio);

if($rsProtfolio->num_rows>0){

   
?> 

<div class="col-lg-12 mt-4">
    <div class="card custom-card">
        <div class="card-body">
            <h4 class="card-title">Added Protfolio Status</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                       
                        <th>Image</th>
                        <th>Service Name</th>
                        <th>Date</th>
                        <th>Rating</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($rowsProtfolio=$rsProtfolio->fetch_assoc()){
                            
                          
                            ?>
                            <tr>
                             
                                <td><img src="assets/img/protfolio/<?= $rowsProtfolio['p_image'] ?>" alt="" style="width:60px"></td>
                                <td><?= $rowsProtfolio['p_service_name'] ?></td>
                                <td><?= $rowsProtfolio['s_date'] ?></td>
                                <td><?= $rowsProtfolio['s_rating'] ?></td>
                                <td>
                                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteProtfolio(<?= $rowsProtfolio['p_image_id'] ?>,<?= $sc_id ?>)"><i class="ri-delete-bin-line"></i></button>
                                    </td>
                            </tr>

                            <?php
                        }
                    ?>
                  
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
}
?>
