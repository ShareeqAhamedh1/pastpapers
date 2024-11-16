<?php
include "../backend/conn.php";
$sc_id=$_REQUEST['sc_id'];
?>

<?php 
                $sql="SELECT * FROM tbl_open_close_time WHERE sc_id='$sc_id'";
                $rs=$conn->query($sql);

                if($rs->num_rows>0){
                    ?>
<table class="table table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>Day</th>
                        <th>Opening Time</th>
                        <th>Closing Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="selectedDaysTableBody">

             
                    <?php
                    while($rows=$rs->fetch_assoc()){
                        ?>
                       
                    <tr>
                        <td><?= $rows['op_cl_day'] ?></td>
                        <td><?= $rows['open_time'] ?></td>
                        <td><?= $rows['close_time'] ?></td>
                        <td>
                        <button type="button" class="btn btn-sm btn-danger" onclick="deleteAvailability(<?= $rows['op_cl_id'] ?>,<?= $sc_id ?>)"><i class="ri-delete-bin-6-line"></i></button>
                                            
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