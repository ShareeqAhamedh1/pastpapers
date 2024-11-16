<?php 
include "../backend/conn.php";

$sc_id = $_REQUEST['sc_id'];
?>

<div class="row" id="user-profile">
    <div class="col-lg-12">
        <div class="modal-header modal-header-primary">
            <h3><i class="fa fa-pencil m-r-5"></i> Add Protfolio</h3>
            <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
        </div>
        <div class="card custom-card">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="service">Services</label>
                        <select name="service" id="service" class="form-control" required>
                            <?php 
                            $sqlAdded="SELECT * FROM tbl_added_services WHERE sc_id='$sc_id'";
                            $rsAdded=$conn->query($sqlAdded);

                            while($rowsAdded=$rsAdded->fetch_assoc()){
                                $sc_s_id=$rowsAdded['sc_s_id'];
                            
                            $sqlServices = "SELECT * FROM tbl_sc_services WHERE sc_s_id='$sc_s_id'";
                            $rsServices = $conn->query($sqlServices);

                            if($rsServices->num_rows ==1) {
                               $rowsServices = $rsServices->fetch_assoc();?> 
                                    <option value="<?= $rowsServices['sc_s_id'] ?>"><?= $rowsServices['s_name'] ?></option>
                                <?php 
                            }

                        }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="image">Add image of the service</label>
                        <input type="file" name="image" id="image" class="form-control" placeholder="Add Image" required>
                    </div>

                    <div class="form-group">
                        <label for="sdate">Service Date</label>
                        <input type="date" name="sdate" id="sdate" class="form-control" placeholder="Date" required>
                    </div>

                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <input type="number" name="rating" id="rating" class="form-control" placeholder="Rating (1-5)" min="1" max="5" required>
                        <input type="hidden" name="sc_id" id="sc_id" value="<?= $sc_id ?>">
                   
                    </div>

                    <button type="button" class="btn btn-primary" onclick="addProtfolio()">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
