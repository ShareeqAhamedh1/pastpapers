
<?php 
include "../backend/conn.php";

// $h_a_id=$_SESSION['h_a_id'];
$sc_id=$_REQUEST['sc_id'];

$sqlTesti="SELECT * FROM tbl_reviews WHERE sc_id='$sc_id'";
$rsTesti=$conn->query($sqlTesti);

if($rsTesti->num_rows>0){

   
?> 

<div class="col-lg-12 mt-4">
    <div class="card custom-card">
        <div class="card-body">
            <h4 class="card-title">Added Testimonials</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Service Name</th>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($rowsTesti = $rsTesti->fetch_assoc()) { ?>
                            <tr>
                                <td><?= $rowsTesti['rev_name'] ?></td>
                                <td><?= $rowsTesti['services'] ?></td>
                                <td><?= $rowsTesti['date'] ?></td>
                                <td><?= $rowsTesti['rev_des'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-warning d-inline-block mx-1" onclick="openModelEditTestimonial(<?= $rowsTesti['rev_id'] ?>, <?= $sc_id ?>)">
                                        <i class="ri-edit-box-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-danger d-inline-block mx-1" onclick="deleteTestimonial(<?= $rowsTesti['rev_id'] ?>, <?= $sc_id ?>)">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
}
?>
