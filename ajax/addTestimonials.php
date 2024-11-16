<?php 
include "../backend/conn.php";

$sc_id = $_REQUEST['sc_id'];
?>


<div class="container card-body">
    <h4>Add Testimonials</h4>
    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="pName">Customer Name</label>
            <input type="text" name="customerName" id="customerName" class="form-control" placeholder="Enter customer name" required>
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
            <input type="date" name="date" id="date" class="form-control" placeholder="Enter date" required>
        </div>
        <div class="form-group">
            <label for="desc">Description</label>
            <input type="textarea" name="desc" id="desc" class="form-control" placeholder="Enter description" required>
        </div>
        <button type="button" class="btn btn-primary" onClick="addTestimonial(<?= $sc_id ?>)">Add</button>
    </form>
</div>
