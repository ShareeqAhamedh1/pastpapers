<?php 
include "../backend/conn.php";
?>

<div class="container">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sqlCategory="SELECT * FROM categories";
                                            $rsCategory=$conn->query($sqlCategory);

                                            if($rsCategory->num_rows>0){
                                                while ($rowsCategory=$rsCategory->fetch_assoc()) {
                                                  ?> 
                                        <tr>
                                            <td><?= $rowsCategory['category_name'] ?></td>
                                            <td><button type="button" class="btn btn-sm btn-danger" onclick="deleteCategory(<?= $rowsCategory['category_id'] ?>)"><i class="ri-delete-bin-6-line"></i></button>
                                            <button type="button" class="btn btn-sm btn-warning" onclick="OpenEditCategory(<?= $rowsCategory['category_id'] ?>)"><i class="ri-edit-box-fill"></i></button>
                                            </td>
                                        </tr>

                                        <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>