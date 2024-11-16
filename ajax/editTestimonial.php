<?php

include "../backend/conn.php";
$rev_id=$_REQUEST['rev_id'];
$sc_id=$_REQUEST['sc_id'];

$sql="SELECT * FROM tbl_reviews WHERE rev_id='$rev_id'";
$rs=$conn->query($sql);

if($rs->num_rows==1){
    $rows=$rs->fetch_assoc();
}
?>

<div class="container card-body">
    <h4>Edit Testimonial</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pName">Customer Name</label>
            <input type="text" name="customerName" id="customerName" value="<?= $rows['rev_name'] ?>" class="form-control" placeholder="Enter customer name" required>
            <input type="hidden" name="rev_id" id="rev_id" value="<?= $rev_id ?>" >
     
        </div>

        <div class="form-group">
                        <label for="service">Type Service</label>
                        <select name="service" id="service" class="form-control" required>
                            <?php 
                            $sqlServices = "SELECT * FROM tbl_sc_services";
                            $rsServices = $conn->query($sqlServices);

                            if($rsServices->num_rows > 0) {
                                while($rowsServices = $rsServices->fetch_assoc()) { ?> 
                                    <option value="<?= $rowsServices['sc_s_id'] ?>"><?= $rowsServices['s_name'] ?></option>
                                <?php }
                            }
                            ?>
                         </select>
          </div>

          <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" value="<?= $rows['date'] ?>" class="form-control" placeholder="Enter date" required>
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input type="textarea" name="desc" id="desc" value="<?= $rows['rev_des'] ?>" class="form-control" placeholder="Enter description" required>
        </div>
        <button type="button" class="btn btn-warning" onClick="editTestimonial(<?= $sc_id ?>)">Edit</button>
    </form>
</div>
