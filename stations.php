<?php include "layout/header.php"; 

?>

		<!--APP-CONTENT START-->
		<div class="main-content app-content">
			<div class="container-fluid">

				<!-- Page Header -->
				<div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
					<!-- Button Group for Adding Icons -->
					<div class="ms-auto pageheader-btn">
						<button type="button" onclick="openModelAddServices()" class="btn btn-primary btn-wave waves-effect waves-light me-2">
							<i class="fe fe-plus mx-1 align-middle"></i>Add Services
						</button>
					</div>

				
				</div>
				<!-- Page Header Close -->


				<!-- ROW-1 OPEN -->
				
						<div class="row" id="user-profile">
                            
                        <?php 
                                        $sqlServiceCenter="SELECT * FROM tbl_service_center ORDER BY sc_id DESC";
                                        $rsServiceCenter=$conn->query($sqlServiceCenter);
                                        if($rsServiceCenter->num_rows>0){
                                           while($rowsServiceCenter=$rsServiceCenter->fetch_assoc()){
                                            ?>

                                            
                                        
							<div class="col-lg-12">

                            
								<div class="card custom-card">
									<div class="card-body position-relative">
										<div class="col-lg-8 col-md-8 col-sm-8 col-xl-8">
											<div class="d-flex btn-list">
												<!-- First Button -->
												<a class="btn btn-icon btn-warning btn-wave waves-effect waves-light me-2"
													onclick="openEditStationModel(<?= $rowsServiceCenter['sc_id'] ?>)" 
													data-bs-toggle="tooltip" 
													data-bs-original-title="Edit Station">
													<i class="ri-file-edit-line"></i>
												</a>
												<a class="btn btn-icon btn-primary btn-wave waves-effect waves-light"
															onclick="openOpenAddServiceForStation(<?= $rowsServiceCenter['sc_id'] ?>)" 
															data-bs-toggle="tooltip" 
															data-bs-original-title="Add a Service">
															<i class="ri-service-line"></i>
														</a>


														<a class="btn btn-icon btn-success btn-wave waves-effect waves-light"
															onclick="openAddAvailabilityForStation(<?= $rowsServiceCenter['sc_id'] ?>)" 
															data-bs-toggle="tooltip" 
															data-bs-original-title="Add Availability">
															<i class="ri-calendar-check-line"></i>
														</a>

														<a class="btn btn-icon btn-info btn-wave waves-effect waves-light"
															onclick="openAddPortfolioForStation(<?= $rowsServiceCenter['sc_id'] ?>)" 
															data-bs-toggle="tooltip" 
															data-bs-original-title="Add Portfolio">
															<i class="ri-information-line"></i>
														</a>

														<a class="btn btn-icon btn-secondary btn-wave waves-effect waves-light"
															onclick="openAddTestimonialsForStation(<?= $rowsServiceCenter['sc_id'] ?>)" 
															data-bs-toggle="tooltip" 
															data-bs-original-title="Add Testimonials">
															<i class="ri-feedback-line"></i>
														</a>

														<a class="btn btn-icon btn-danger btn-wave waves-effect waves-light"
															onclick="deleteStation(<?= $rowsServiceCenter['sc_id'] ?>)" 
															data-bs-toggle="tooltip" 
															data-bs-original-title="Delete Station">
															<i class="ri-delete-bin-6-line"></i>
														</a>

												<!-- Second Button (conditionally displayed) -->
											
														<!-- <a class="btn btn-icon btn-warning btn-wave waves-effect waves-light"
															onclick="openViewHotelPublishModal()" 
															data-bs-toggle="tooltip" 
															data-bs-original-title="Publish Hotel">
															<i class="ri-file-warning-line"></i>
														</a> -->
													
														<!-- <a class="btn btn-success btn-wave waves-effect waves-light"
													data-bs-toggle="tooltip" 
													data-bs-original-title="Published">
													Published
													</a> -->
														<!-- <a class="btn btn-danger btn-wave waves-effect waves-light"
													data-bs-toggle="tooltip" 
													onclick="openViewHotelPublishModalReject()"
													data-bs-original-title="Reject">
													Reject
													</a> -->
														<!-- <a class="btn btn-danger btn-wave waves-effect waves-light"
													data-bs-toggle="tooltip" 
													data-bs-original-title="Rejected">
													Rejected
													</a> -->

													<!-- <a class="btn btn-success btn-wave waves-effect waves-light"
													data-bs-toggle="tooltip" 
													onclick="openViewHotelPublishModal()"
													data-bs-original-title="Publish">
													Publish
													</a> -->
													
											</div>

											    <div class="card custom-card overflow-hidden">
													<div class="card-body">
														<div class="row align-items-center"> <!-- Align items vertically centered -->
															<div class="col-lg-2 d-flex justify-content-center"> <!-- Center the icon within its column -->
																<div class="counter-icon bg-success-gradient box-shadow-success rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
																	<img src="assets/img/logo/<?= $rowsServiceCenter['s_logo']; ?>" style="width: 60px; height: 60px; alt=">
																
                                                                </div>
															</div>
															<div class="col-lg-10 justify-content-center">
																<h3 class="number-font mb-1"><?= $rowsServiceCenter['s_name']; ?></h3>
																<h5 class="text-muted mb-0"><?= $rowsServiceCenter['s_location']; ?></h5>
                                                                <h5 class="text-muted mb-0"><?= $rowsServiceCenter['s_phone_number']; ?></h5>
																<p><?= $rowsServiceCenter['s_desc']; ?></p>
															</div>
														</div>
													</div>
												</div>

												
										</div>
									</div>

                                        
								</div>
							</div>

                            <?php
                                           }
                                        }
                                        ?>
						</div>

						


				<!-- ROW-1 CLOSED -->
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
						<div class="container">
							<div class="col-lg-12" id="load_edit_data">
								<!-- Dynamic content for editing will be loaded here -->
							</div>
							
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<div class="modal fade" id="addServices" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl" role="document">
				<div class="modal-content">
					
					<div class="modal-body">
						<div class="container">
							<div class="row">
								<!-- Add Service Section -->
								<div class="col-lg-4" id="add_service">
									<!-- Dynamic content for adding service will load here -->
								</div>
								<!-- View Service Section -->
								<div class="col-lg-8" id="view_service">
									<!-- Dynamic content for viewing service details will load here -->
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<?php include("layout/footer.php"); ?>

		<script>
			function openModelAddServices() {
				$('#addServices').modal('show');
				$('#add_service').load('ajax/addServices.php');
				$('#view_service').load('ajax/viewServices.php');

				}

				function openEditStationModel(id){
                $('#editModal').modal('show');
				$('#load_edit_data').load('ajax/editStation.php',{sc_id:id});
				}

				function editModelService(id){
				$('#addServices').modal('show');
				$('#add_service').load('ajax/editServices.php',{sc_s_id:id});
				$('#view_service').load('ajax/viewServices.php');
			}

			function openOpenAddServiceForStation(id){
                $('#addServices').modal('show');
				$('#add_service').load('ajax/addServiceServicestation.php',{sc_id:id});
				$('#view_service').load('ajax/viewAdedServices.php',{sc_id:id});
				}

				function openAddAvailabilityForStation(id){
					// alert(id)
					$('#addServices').modal('show');
					$('#add_service').load('ajax/addAvailability.php',{ sc_id: id });
                            $('#view_service').load('ajax/viewAvailability.php', { sc_id: id })
				}

				function openAddPortfolioForStation(id){
				$('#addServices').modal('show');
				$('#add_service').load('ajax/addProtfolio.php',{ sc_id:id });
				$('#view_service').load('ajax/viewAddedProtfolio.php',{ sc_id:id });
			}

			function openAddTestimonialsForStation(id){
				$('#addServices').modal('show');
				$('#add_service').load('ajax/addTestimonials.php',{ sc_id:id });
				$('#view_service').load('ajax/viewAddedTestimonials.php',{ sc_id:id });
			}

			function openModelEditTestimonial(id,sc_id){
				$('#addServices').modal('show');
				$('#add_service').load('ajax/editTestimonial.php',{rev_id:id,sc_id:sc_id});
				$('#view_service').load('ajax/viewAddedTestimonials.php',{sc_id:sc_id});
			}

			function deleteStation(id){
				alert("Please delete the station using PhpMyAdmin");
			}



				function editStation() {
				var name = document.getElementById('name').value;
				var address = document.getElementById('address').value;
				var logo = document.getElementById('logo').files[0]; // Get the first selected file
				var banner = document.getElementById('banner').files[0]; // Get the first selected file
				var phoneno = document.getElementById('phoneno').value;
				var province = document.getElementById('province').value;
				var district = document.getElementById('district').value;
				var city = document.getElementById('city').value;
				var sabout = document.getElementById('sabout').value;
				var sc_id=document.getElementById('sc_id').value;
					// Create FormData object
				var formData = new FormData();
				formData.append('name', name);
				formData.append('address', address);
				if (logo) formData.append('logo', logo); // Append image if available
				if (banner) formData.append('banner', banner); // Append image if available
				formData.append('phoneno', phoneno);
				formData.append('province', province);
				formData.append('district', district);
				formData.append('city', city);
				formData.append('sabout', sabout);
				formData.append('sc_id', sc_id);
				$.ajax({
					url: 'backend/edit_station.php',
					method: 'POST',
					data: formData,
					processData: false, // Prevent jQuery from converting the data into a query string
					contentType: false, // Prevent jQuery from setting the content type
					success: function(resp) {
						// console.log(resp);
						// return false;
						if (resp == 200) {
							swal("Changed", "Station Information Changed", "success")
								.then((value) => {
									if (value) {
										$('#editModal').modal('hide');
										window.location.reload();
									}
								});
						} else if (resp == 201) {
							swal("Warning", "Last update on process", "warning")
								.then((value) => {
									if (value) {
										$('#editModal').modal('hide');
										window.location.reload();
									}
								});
						} else {
							swal("Cancelled", "Something went wrong", "error")
								.then((value) => {
									if (value) {
										$('#editModal').modal('hide');
										window.location.reload();
									}
								});
							console.log(resp);
						}
					}
				});
			}

			function addService(){
                var serviceName = document.getElementById('serviceName').value;
				var servicePrice = document.getElementById('servicePrice').value;

                $.ajax({
			  url:'backend/addServices.php',
			  method:'POST',
			  data:{
				servicePrice:servicePrice,
				serviceName:serviceName
			  },
			  success:function(resp){
				  if(resp == 200){
					swal("Added", "Service added", "success")
					.then((value) => {
						if (value) {
							$('#add_service').load('ajax/addServices.php');
							$('#view_service').load('ajax/viewServices.php');
						}
					});
				  }
				  else {
					swal("Cancelled", "Something went wrong", "error")
					.then((value) => {
						if (value) {
							$('#addServices').modal('hide');
							window.location.reload();
						}
					});
                     console.log(resp);
				  }
			  }
		  });
			}


			function editService(id){
                var serviceName = document.getElementById('serviceName').value;
				var servicePrice = document.getElementById('servicePrice').value;

                $.ajax({
			  url:'backend/editServices.php',
			  method:'POST',
			  data:{
				servicePrice:servicePrice,
				serviceName:serviceName,
				sc_s_id:id
			  },
			  success:function(resp){
				  if(resp == 200){
					swal("Edited", "Service edited", "success")
					.then((value) => {
						if (value) {
							$('#add_service').load('ajax/addServices.php');
							$('#view_service').load('ajax/viewServices.php');
						}
					});
				  }
				  else {
					swal("Cancelled", "Something went wrong", "error")
					.then((value) => {
						if (value) {
							$('#addServices').modal('hide');
							window.location.reload();
						}
					});
                     console.log(resp);
				  }
			  }
		  });
			}

		

			function deleteService(id){
				$.ajax({
			  url:'backend/deleteService.php',
			  method:'POST',
			  data:{
				sc_s_id:id
			  },
			  success:function(resp){
				  if(resp == 200){
					swal("Deleted", "Service Deleted", "success")
					.then((value) => {
						if (value) {
							$('#add_service').load('ajax/addServices.php');
							$('#view_service').load('ajax/viewServices.php');
						}
					});
				  }else if(resp==400){
					swal("Error", "Service already using", "error");
				  }
				  else {
					swal("Cancelled", "Something went wrong", "error")
					.then((value) => {
						if (value) {
							$('#addServices').modal('hide');
							window.location.reload();
						}
					});
                     console.log(resp);
				  }
			  }
		  });
			}

			function addServiceForStation(id){
                var sc_s_id = document.getElementById('service').value;

                $.ajax({
			  url:'backend/addServicesForStation.php',
			  method:'POST',
			  data:{
				sc_s_id:sc_s_id,
				sc_id:id
			  },
			  success:function(resp){
				  if(resp == 200){
					swal("Added", "Service added", "success")
					.then((value) => {
						if (value) {
							$('#add_service').load('ajax/addServiceServicestation.php',{sc_id:id});
							$('#view_service').load('ajax/viewAdedServices.php',{sc_id:id});
						}
					});
				  }else if(resp==202){
					swal("Warning", "Service Already Added", "warning")
					.then((value) => {
						if (value) {
							$('#add_service').load('ajax/addServiceServicestation.php',{sc_id:id});
							$('#view_service').load('ajax/viewAdedServices.php',{sc_id:id});
						}
					});

				  }
				  else {
					swal("Cancelled", "Something went wrong", "error")
					.then((value) => {
						if (value) {
							$('#addServices').modal('hide');
							window.location.reload();
						}
					});
                     console.log(resp);
				  }
			  }
		  });
			}

			function deleteAddedService(id,sc_id){
				$.ajax({
					url:'backend/deleteAddedService.php',
					method:'post',
					data:{
						a_s_id:id
					},success:function(resp){
						if(resp==200){
							swal("Deleted", "Service deleted", "success")
						.then((value) => {
						if (value) {
							$('#add_service').load('ajax/addServiceServicestation.php');
							$('#view_service').load('ajax/viewAdedServices.php',{sc_id:sc_id});
						}
					});
						}else{
							swal("Cancelled", "Something went wrong", "error")
							.then((value) => {
								if (value) {
									$('#addServices').modal('hide');
									window.location.reload();
								}
							});
                     console.log(resp);
						}
					}
				})
			}

	   // Toggle All Days
	   function toggleAllDays(selectAllCheckbox) {
        const checkboxes = document.querySelectorAll('input[name="days"]');
        checkboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
            toggleTimeInputs(checkbox, true);
        });
    }

    // Enable or disable opening and closing time inputs based on day checkbox
    function toggleTimeInputs(dayCheckbox, selectAll = false) {
        const openTimeInput = dayCheckbox.nextElementSibling;
        const closeTimeInput = openTimeInput.nextElementSibling;

        if (dayCheckbox.checked) {
            openTimeInput.disabled = false;
            closeTimeInput.disabled = false;
            openTimeInput.value = "08:00"; // Set default open time to 8:00 AM
            closeTimeInput.value = "17:00"; // Set default close time to 5:00 PM
        } else {
            openTimeInput.disabled = true;
            closeTimeInput.disabled = true;
            openTimeInput.value = ''; // Clear open time if checkbox is unchecked
            closeTimeInput.value = ''; // Clear close time if checkbox is unchecked
        }
    }

    // Collect selected days with open and close times on submit
    function submitForm(id) {
    const selectedDays = [];
    document.querySelectorAll('input[name="days"]:checked').forEach(dayCheckbox => {
        const day = dayCheckbox.value;
        const openTime = dayCheckbox.nextElementSibling.value;
        const closeTime = dayCheckbox.nextElementSibling.nextElementSibling.value;
        selectedDays.push({ day, openTime, closeTime });
    });
	// alert(id);
    
    $.ajax({
        url: 'backend/addAvailability.php',
        method: 'post',
        data: {
            sc_id: id,
            selectedDays: JSON.stringify(selectedDays) // Convert to JSON string
        },
        success: function(resp) {
            if (resp == 200) {
                swal("Added", "Added available days", "success")
                    .then((value) => {
                        if (value) {
                            $('#add_service').load('ajax/addAvailability.php',{ sc_id: id });
                            $('#view_service').load('ajax/viewAvailability.php', { sc_id: id });
                        }
                    });
            } else if (resp == 202) {
                swal("Warning", "Already day is added", "warning")
                    .then((value) => {
                        if (value) {
                            $('#add_service').load('ajax/addAvailability.php',{ sc_id: id });
                            $('#view_service').load('ajax/viewAvailability.php', { sc_id: id });
                        }
                    });
            } else if (resp == 400) {
                swal("Warning", "Available days cannot be null days", "warning")
                    .then((value) => {
                        if (value) {
                            $('#add_service').load('ajax/addAvailability.php',{ sc_id: id });
                            $('#view_service').load('ajax/viewAvailability.php', { sc_id: id });
                        }
                    });
            } else{
                swal("Cancelled", "Something went wrong", "error")
                    .then((value) => {
                        if (value) {
                            $('#addServices').modal('hide');
                            window.location.reload();
                        }
                    });
                console.log(resp);
            }
        }
    });
}

	function deleteAvailability(id,sc_id){
		$.ajax({
			url:'backend/deleteAvailability.php',
			method:'POST',
			data:{
				op_cl_id:id
			},success:function(resp){
				if(resp==200){
					swal("Deleted","Deleted day","success")
				.then((value)=>{
					if (value) {
                            $('#add_service').load('ajax/addAvailability.php',{ sc_id: sc_id });
                            $('#view_service').load('ajax/viewAvailability.php', { sc_id: sc_id });
                        }
				})
				}else{
					swal("Cancelled", "Something went wrong", "error")
                    .then((value) => {
                        if (value) {
                            $('#addServices').modal('hide');
                            window.location.reload();
                        }
                    });
                console.log(resp);
				}
			}
		})
	}

	function addProtfolio(id){
				var image = document.getElementById('image').files[0]; // Get the first selected file
				var service = document.getElementById('service').value;
				var sdate = document.getElementById('sdate').value;
				var rating = document.getElementById('rating').value;
				var sc_id = document.getElementById('sc_id').value;
				// alert(sc_id);


				var formData = new FormData();
				if (image) formData.append('image', image); // Append image if available
				
				formData.append('service', service);
				formData.append('sdate', sdate);
				formData.append('rating', rating);
				formData.append('sc_id', sc_id);
				$.ajax({
					url: 'backend/addProtfolio.php',
					method: 'POST',
					data: formData,
					processData: false, // Prevent jQuery from converting the data into a query string
					contentType: false, // Prevent jQuery from setting the content type
					success: function(resp) {
						// console.log(resp);
						// return false;
						if (resp == 200) {
							swal("Added", "Added a protfolio", "success")
								.then((value) => {
									if (value) {
										$('#add_service').load('ajax/addProtfolio.php',{ sc_id:sc_id });
										$('#view_service').load('ajax/viewAddedProtfolio.php',{ sc_id:sc_id });
									}
								});
						} else if (resp == 202) {
							swal("Warning", "Empty Fields", "warning")
								.then((value) => {
									if (value) {
										$('#add_service').load('ajax/addProtfolio.php',{ sc_id:sc_id });
										$('#view_service').load('ajax/viewAddedProtfolio.php',{ sc_id:sc_id });
									}
								});
						} else{
							swal("Cancelled", "Something went wrong", "error")
								.then((value) => {
									if (value) {
										$('#editModal').modal('hide');
										window.location.reload();
									}
								});
							console.log(resp);
						}
					}
				});
				
	}

	function deleteProtfolio(id,sc_id){
		$.ajax({
			url:'backend/deletePortfolio.php',
			method:'POST',
			data:{
				p_image_id:id
			},success:function(resp){
				if(resp==200){
					swal("Deleted","Deleted Protfolio","success")
				.then((value)=>{
					if (value) {
						$('#add_service').load('ajax/addProtfolio.php',{ sc_id:sc_id });
						$('#view_service').load('ajax/viewAddedProtfolio.php',{ sc_id:sc_id });
                        }
				})
				}else{
					swal("Cancelled", "Something went wrong", "error")
                    .then((value) => {
                        if (value) {
                            $('#addServices').modal('hide');
                            window.location.reload();
                        }
                    });
                console.log(resp);
				}
			}
		})
	}




	function addTestimonial(id){

				var service = document.getElementById('service').value;
				var customerName = document.getElementById('customerName').value;
				var desc = document.getElementById('desc').value;
				var date = document.getElementById('date').value;


		$.ajax({
					url: 'backend/addTestimonials.php',
					method: 'POST',
					data: {
						service:service,
						customerName:customerName,
						desc:desc,
						date:date,
						sc_id:id
					},// Prevent jQuery from setting the content type
					success: function(resp) {
						// console.log(resp);
						// return false;
						if (resp == 200) {
							swal("Added", "Added a testimonial", "success")
								.then((value) => {
									if (value) {
										$('#add_service').load('ajax/addTestimonials.php',{ sc_id:id });
										$('#view_service').load('ajax/viewAddedTestimonials.php',{ sc_id:id });
									}
								});
						} else if (resp == 202) {
							swal("Warning", "Empty Fields", "warning")
								.then((value) => {
									if (value) {
										$('#add_service').load('ajax/addTestimonials.php',{ sc_id:id });
										$('#view_service').load('ajax/viewAddedTestimonials.php',{ sc_id:id });
									}
								});
						} else{
							swal("Cancelled", "Something went wrong", "error")
								.then((value) => {
									if (value) {
										$('#editModal').modal('hide');
										window.location.reload();
									}
								});
							console.log(resp);
						}
					}
				});

	}

	function deleteTestimonial(id,sc_id){
		$.ajax({
			url:'backend/deleteTestimonial.php',
			method:'POST',
			data:{
				rev_id:id
			},success:function(resp){
				if(resp==200){
					swal("Deleted","Deleted day","success")
				.then((value)=>{
					if (value) {
						$('#add_service').load('ajax/addTestimonials.php',{ sc_id:sc_id });
						$('#view_service').load('ajax/viewAddedTestimonials.php',{ sc_id:sc_id });
                        }
				})
				}else{
					swal("Cancelled", "Something went wrong", "error")
                    .then((value) => {
                        if (value) {
                            $('#addServices').modal('hide');
                            window.location.reload();
                        }
                    });
                console.log(resp);
				}
			}
		})
	}


	function editTestimonial(id){
				var service = document.getElementById('service').value;
				var customerName = document.getElementById('customerName').value;
				var desc = document.getElementById('desc').value;
				var date = document.getElementById('date').value;
				var rev_id=document.getElementById('rev_id').value;
				
                $.ajax({
			  url:'backend/editTestimonials.php',
			  method:'POST',
			  data:{
						service:service,
						customerName:customerName,
						desc:desc,
						date:date,
						sc_id:id,
						rev_id:rev_id
			  },success:function(resp){
				if(resp==200){
					swal("Edited","Edited Testimonials","success")
				.then((value)=>{
					if (value) {
						$('#add_service').load('ajax/addTestimonials.php',{ sc_id:id });
						$('#view_service').load('ajax/viewAddedTestimonials.php',{ sc_id:id });
                        }
					});
				  }else if (resp == 202) {
							swal("Warning", "Empty Fields", "warning")
								.then((value) => {
									if (value) {
										$('#add_service').load('ajax/addTestimonials.php',{ sc_id:id });
										$('#view_service').load('ajax/viewAddedTestimonials.php',{ sc_id:id });
									}
								});
						} 
				  else {
					swal("Cancelled", "Something went wrong", "error")
					.then((value) => {
						if (value) {
							$('#addServices').modal('hide');
							window.location.reload();
						}
					});
                     console.log(resp);
				  }
			  }
		  });
	}



		</script>