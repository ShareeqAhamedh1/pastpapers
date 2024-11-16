<?php include "layout/header.php"; 
$s_a_id=$_SESSION['s_a_id'];
?>

		<!--APP-CONTENT START-->
		<div class="main-content app-content">
			<div class="container-fluid">

				

						
					<div class="row" id="user-profile">
					<div class="col-lg-12">
						<div class="card custom-card">
							<div class="card-body">

									<?php 
										if(isset($_SESSION['lesson_added_success'])){

									?>
											<div class="alert alert-success" role="alert">
												Lesson Added
											</div>
									<?php
											unset($_SESSION['lesson_added_success']);
										}
									?>

									<?php 
										if(isset($_SESSION['lesson_added_error'])){

											?>
											<div class="alert alert-danger" role="alert">
												Something went wrong, please contact the Developer..
											</div>
											<?php
											unset($_SESSION['lesson_added_error']);
										}
									?>

									<?php 
										if(isset($_SESSION['lesson_already_added'])){

											?>
											<div class="alert alert-warning" role="alert">
												Lesson Already Added
											</div>
											<?php
											unset($_SESSION['lesson_already_added']);
										}
									?>


								<form action="backend/addLessons.php"  method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="language">Select Language</label>
										<select class="form-control" name="language" id="language">
											<option value="1">Tamil</option>
											<option value="2">Sinhala</option>
											<option value="3">English</option>
										</select>
									</div>

									<div class="form-group">
										<label for="grade">Select Grade</label>
										<select class="form-control" name="grade" id="grade">
											<?php
												$sqlGrade="SELECT * FROM tbl_grade";
												$rsGrade=$conn->query($sqlGrade);

												if($rsGrade->num_rows>0){
													while($rowsGrade=$rsGrade->fetch_assoc()){
														?>
											<option value="<?= $rowsGrade['g_id'] ?>"><?= $rowsGrade['g_name'] ?></option>
											
											<?php
													}
												}
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="thumb">Thumbnail Image</label>
										<input type="file" name="thumb" id="thumb" class="form-control" placeholder="" required>
									</div>
									<div class="form-group">
										<label for="subject">Select Subject</label>
										<select class="form-control" name="subject" id="subject">
											<?php
												$sqlSubject="SELECT * FROM tbl_subject";
												$rsSubject=$conn->query($sqlSubject);

												if($rsSubject->num_rows>0){
													while($rowsSubject=$rsSubject->fetch_assoc()){
														?>
											<option value="<?= $rowsSubject['s_id'] ?>"><?= $rowsSubject['s_name'] ?></option>
											
											<?php
													}
												}
											?>
										</select>
									</div>
									

									

									<button type="submit" class="btn btn-primary">Submit</button>
								</form>

							</div>
						</div>
					</div>
				</div>

				<!-- ROW-1 CLOSED -->

				<div class="container mt-5">
					<div class="row">
						<!-- Card 1 -->
						 <?php
						 $sqlLesons="SELECT * FROM tbl_lesson";
						 $rsLesson=$conn->query($sqlLesons);
						 if($rsLesson->num_rows>0){
							while($rowsLesson=$rsLesson->fetch_assoc()){

								$s_id=$rowsLesson['s_id'];
								?>

								<div class="col-md-2">
									<div class="card">
										<img src="assets/img/thumbnail/<?= $rowsLesson['thumbnail_img'] ?>" class="card-img-top" alt="Card Image 1">
										<div class="card-body">
											<h5 class="card-title"><?= grade($rowsLesson['g_id']) ?></h5>
											<h5 class="card-title"><?= getDataBack($conn, 'tbl_subject', 's_id', $s_id, 's_name') ?></h5>
											<p class="card-text">Medium : <?= language($rowsLesson['lang_id']) ?></p>

											<!-- Button row -->
											<div class="d-flex gap-1">
												<a class="btn btn-icon btn-primary btn-wave waves-effect waves-light"
												onclick="openAddPdf(<?= $rowsLesson['l_id'] ?>)" 
												data-bs-toggle="tooltip" 
												data-bs-original-title="Add PDF">
												<i class="ri-file-pdf-line"></i>
												</a>
												<a class="btn btn-icon btn-primary btn-wave waves-effect waves-light"
												onclick="openAddVideo(<?= $rowsLesson['l_id'] ?>)" 
												data-bs-toggle="tooltip" 
												data-bs-original-title="Add Video">
												<i class="ri-movie-line"></i>
												</a>
												<a class="btn btn-icon btn-warning btn-wave waves-effect waves-light"
												onclick="openViewPdf(<?= $rowsLesson['l_id'] ?>)" 
												data-bs-toggle="tooltip" 
												data-bs-original-title="View PDF">
												<i class="ri-file-pdf-line"></i>
												</a>
												<a class="btn btn-icon btn-warning btn-wave waves-effect waves-light"
												onclick="openViewVideo(<?= $rowsLesson['l_id'] ?>)" 
												data-bs-toggle="tooltip" 
												data-bs-original-title="View Video">
												<i class="ri-movie-line"></i>
												</a>
											</div>
										</div>
									</div>
								</div>


						<?php
							}
						 }
						 ?>
					</div>
				</div>
			</div>
		</div>

		
		<!--APP-CONTENT CLOSE-->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="input-group">
                    <a href="javascript:void(0);" class="input-group-text" id="Search-Grid"><i class="fe fe-search header-link-icon fs-18"></i></a>
                    <input type="search" class="form-control border-0 px-2" placeholder="Search" aria-label="Username">
                    <a href="javascript:void(0);" class="input-group-text" id="voice-search"><i class="fe fe-mic header-link-icon"></i></a>
                    <a href="javascript:void(0);" class="btn btn-light btn-icon" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="javascript:void(0);">Action</a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);">Another action</a></li>
                      <li><a class="dropdown-item" href="javascript:void(0);">Something else here</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="javascript:void(0);">Separated link</a></li>
                    </ul>
                  </div>
                  <div class="mt-4">
                    <p class="font-weight-semibold text-muted mb-2">Are You Looking For...</p>
                    <span class="search-tags"><i class="fe fe-user me-2"></i>People<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-file-text me-2"></i>Pages<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-align-left me-2"></i>Articles<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                    <span class="search-tags"><i class="fe fe-server me-2"></i>Tags<a href="javascript:void(0)" class="tag-addon"><i class="fe fe-x"></i></a></span>
                  </div>
                  <div class="my-4">
                    <p class="font-weight-semibold text-muted mb-2">Recent Search :</p>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                      <a href="notifications.html"><span>Notifications</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-2 alert">
                      <a href="alerts.html"><span>Alerts</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                    <div class="p-2 border br-5 d-flex align-items-center text-muted mb-0 alert">
                      <a href="mail.html"><span>Mail</span></a>
                      <a class="ms-auto lh-1" href="javascript:void(0);" data-bs-dismiss="alert" aria-label="Close"><i class="fe fe-x text-muted"></i></a>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div class="btn-group ms-auto">
                    <button class="btn btn-sm btn-primary-light">Search</button>
                    <button class="btn btn-sm btn-primary">Clear Recents</button>
                  </div>
                </div>
              </div>
            </div>
        </div>

		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					
					<div class="modal-body ">
						<div class="row">
							<div class="col-lg-6" id="load_edit_data">
								<!-- Dynamic content for editing will be loaded here -->
							</div>
							<div class="col-lg-6" id="load_data">
								<!-- Additional dynamic content will be loaded here -->
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<!-- Modal Structure -->
		<div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					
					<div class="modal-body">
						<div class="row">
							<div class="col-lg-12 mb-3" id="add_data">
								<!-- Additional dynamic content will be loaded here -->
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>


		<?php include("layout/footer.php"); ?>

		<script>

			
			function openAddPdf(id){
					$('#addModal').modal('show');
					$('#add_data').load('ajax/addPdf.php',{l_id:id});
				}
			
				function openViewPdf(id){
					$('#addModal').modal('show');
					$('#add_data').load('ajax/viewPdf.php',{l_id:id});
				}

				function openEditPdf(id,l_id){
					$('#addModal').modal('show');
					$('#add_data').load('ajax/editPdf.php',{f_id:id,l_id:l_id});
				}

				function openAddVideo(id){
					$('#addModal').modal('show');
					$('#add_data').load('ajax/addVideo.php',{l_id:id});
				}

				function openViewVideo(id){
					$('#addModal').modal('show');
					$('#add_data').load('ajax/viewVideo.php',{l_id:id});
				}

				function openEditVideo(id,l_id){
					$('#addModal').modal('show');
					$('#add_data').load('ajax/editVideo.php',{v_id:id,l_id:l_id});
				}


			function addPdf(id){
				var pText = document.getElementById('pText').value;
				var pdf = document.getElementById('pdf').files[0]; 
				// var l_id = document.getElementById('id').value;
				
				
				var formData = new FormData();
				if (pdf) formData.append('pdf', pdf);
				formData.append('pText', pText);
				formData.append('l_id', id);

				$.ajax({
					url: 'backend/addPdf.php',
					method: 'POST',
					data: formData,
					processData: false, // Prevent jQuery from converting the data into a query string
					contentType: false, // Prevent jQuery from setting the content type
					success: function(resp) {
						// console.log(resp);
						// return false;
						if (resp == 200) {
							swal("Added", "Added the File", "success")
								.then((value) => {
									if (value) {
										$('#add_data').load('ajax/addPdf.php',{l_id:id});
									}
								});
						} else if (resp == 202) {
							swal("Warning", "Empty Fields", "warning")
								.then((value) => {
									if (value) {
										$('#add_data').load('ajax/addPdf.php',{l_id:id});
										}
								});
						} else{
							swal("Cancelled", "Something went wrong", "error")
								.then((value) => {
									if (value) {
										$('#addModal').modal('hide');
										window.location.reload();
									}
								});
							console.log(resp);
						}
					}
				});

			}

			
			function editPdf(id,l_id){

				var pText = document.getElementById('pText').value;
				var pdf = document.getElementById('pdf').files[0]; 
				// var l_id = document.getElementById('id').value;
				
				
				var formData = new FormData();
				if (pdf) formData.append('pdf', pdf);
				formData.append('pText', pText);
				formData.append('l_id', l_id);
				formData.append('f_id', id);

				$.ajax({
					url: 'backend/editPdf.php',
					method: 'POST',
					data: formData,
					processData: false, // Prevent jQuery from converting the data into a query string
					contentType: false, // Prevent jQuery from setting the content type
					success: function(resp) {
						// console.log(resp);
						// return false;
						if (resp == 200) {
							swal("Edited", "Edited the File", "success")
								.then((value) => {
									if (value) {
										$('#add_data').load('ajax/viewPdf.php',{l_id:l_id});
									}
								});
						} else if (resp == 202) {
							swal("Warning", "Empty Fields", "warning")
								.then((value) => {
									if (value) {
										$('#add_data').load('ajax/editPdf.php',{f_id:id,l_id:l_id});
										}
								});
						} else{
							swal("Cancelled", "Something went wrong", "error")
								.then((value) => {
									if (value) {
										$('#addModal').modal('hide');
										window.location.reload();
									}
								});
							console.log(resp);
						}
					}
				});
		
	}

	 

	function deleteFile(id,l_id){

		$.ajax({
			url:'backend/deletePdf.php',
			method:'POST',
			data:{
				f_id:id,
				l_id:l_id
			},
			success:function(resp){
				if(resp == 200){
					swal("Deleted", "File Deleted", "success")
					.then((value) => {
						if (value) {
							$('#add_data').load('ajax/viewPdf.php',{l_id:l_id});}
					});
				} 
				else {
					swal("Cancelled", "Something went wrong", "error")
					.then((value) => {
						if (value) {
							$('#addModal').modal('hide');
							window.location.reload();
						}
					});
					console.log(resp);
				}
			}

		});
		}

		function adVideo(id){
				var pText = document.getElementById('pText').value;
				var vUrl = document.getElementById('vUrl').value; 
				
				
				var formData = new FormData();
			
				formData.append('pText', pText);
				formData.append('vUrl', vUrl);
				formData.append('l_id', id);

				$.ajax({
					url: 'backend/adVideo.php',
					method: 'POST',
					data: formData,
					processData: false, // Prevent jQuery from converting the data into a query string
					contentType: false, // Prevent jQuery from setting the content type
					success: function(resp) {
						// console.log(resp);
						// return false;
						if (resp == 200) {
							swal("Added", "Added the Video", "success")
								.then((value) => {
									if (value) {
										$('#add_data').load('ajax/addVideo.php',{l_id:id});
									}
								});
						} else if (resp == 202) {
							swal("Warning", "Empty Fields", "warning")
								.then((value) => {
									if (value) {
										$('#add_data').load('ajax/adVideo.php',{l_id:id});
										}
								});
						} else{
							swal("Cancelled", "Something went wrong", "error")
								.then((value) => {
									if (value) {
										$('#addModal').modal('hide');
										window.location.reload();
									}
								});
							console.log(resp);
						}
					}
				});

			}

	

	  function editVideo(id,l_id){

var pText = document.getElementById('pText').value;
var vUrl = document.getElementById('vUrl').value;
// var l_id = document.getElementById('id').value;


var formData = new FormData();
// if (pdf) formData.append('pdf', pdf);
formData.append('pText', pText);
formData.append('l_id', l_id);
formData.append('vUrl', vUrl);
formData.append('v_id', id);

$.ajax({
	url: 'backend/editVideo.php',
	method: 'POST',
	data: formData,
	processData: false, // Prevent jQuery from converting the data into a query string
	contentType: false, // Prevent jQuery from setting the content type
	success: function(resp) {
		// console.log(resp);
		// return false;
		if (resp == 200) {
			swal("Edited", "Edited the Video", "success")
				.then((value) => {
					if (value) {
						$('#add_data').load('ajax/viewVideo.php',{l_id:l_id});
					}
				});
		} else if (resp == 202) {
			swal("Warning", "Empty Fields", "warning")
				.then((value) => {
					if (value) {
						$('#add_data').load('ajax/editVideo.php',{v_id:id,l_id:l_id});
						}
				});
		} else{
			swal("Cancelled", "Something went wrong", "error")
				.then((value) => {
					if (value) {
						$('#addModal').modal('hide');
						window.location.reload();
					}
				});
			console.log(resp);
		}
	}
});

}


function deleteVideo(id,l_id){

$.ajax({
	url:'backend/deleteVideo.php',
	method:'POST',
	data:{
		v_id:id,
		l_id:l_id
	},
	success:function(resp){
		if(resp == 200){
			swal("Deleted", "Video Deleted", "success")
			.then((value) => {
				if (value) {
					$('#add_data').load('ajax/viewVideo.php',{l_id:l_id});}
			});
		} 
		else {
			swal("Cancelled", "Something went wrong", "error")
			.then((value) => {
				if (value) {
					$('#addModal').modal('hide');
					window.location.reload();
				}
			});
			console.log(resp);
		}
	}

});
}


	  
 </script>