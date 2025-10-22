<style>
    .control-label {
margin: 0.7rem
}
</style>

	  
<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
               <h5> <a href="<?php echo base_url('index.php/Workers/add'); ?>"><?= $this->lang->line('workers') ?></a></h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url('index.php/User_authentication/admin_dashboard'); ?>"><?= $this->lang->line('home') ?></a>
                </li>
                <li class="breadcrumb-item"><?= $this->lang->line('add_new_worker') ?>
                </li>
            </ul>
        </div>
<div class="page-header-right ms-auto d-flex align-items-center">
      <!-- Placeholder for additional actions -->
      <?php $this->load->view('layout/alerts'); ?>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                   
                </div>
            </div>

            <!-- Mobile Toggle -->
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
</div>	

	 <div class="main-content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                    <div class="row">
                    <div class="col-lg-12">
<form class="form-horizontal" role="form" method="post"
						action="<?php echo base_url(); ?>index.php/Workers/add_new_worker"
						enctype="multipart/form-data">

						<div class="form-group">
							<div class="row col-md-12">
								<div class="col-md-4 col-sm-4 ">
									<label class="control-label"> <?= $this->lang->line('worker_name') ?> *</label>
									<div class="input-group">
										<div class="input-group-text"><i class="feather-user"></i></div>
									<input type="text" placeholder=" <?= $this->lang->line('worker_name') ?>" name="name" class="form-control"
										required autofocus>
								</div>
								</div>
								<div class="col-md-4 col-sm-4 ">
									<label class="control-label"> <?= $this->lang->line('code') ?> *</label>
									<div class="input-group">
										<div class="input-group-text"><i class="feather-code"></i></div>
									<input type="text" name="wc_code" class="form-control" value=""
										placeholder="<?= $this->lang->line('code') ?> " autofocus required="required">
									<!-- <input type="hidden" name="worker_code" value="<?php //echo $wc_code; ?>"> -->
								</div>
								</div>
								<!-- <div class="col-md-4 col-sm-4 ">
										<label  class="control-label"> Role</label>
									   <?php
									   echo form_dropdown('role_id', $roles)
									   	?>
									</div>-->

							</div>
						</div>
						<div class="form-group">
							<div class="row col-md-12">
								<div class="col-md-4 col-sm-4 ">
									<label class="control-label"> <?= $this->lang->line('mobile_no') ?> </label>
									<div class="input-group">
										<div class="input-group-text"><i class="feather-phone"></i></div>
									<input type="text" placeholder="<?= $this->lang->line('enter_mobile_no') ?>" name="mobile_no"
										class="form-control mobile" minlenght="10" maxlength="10"
										oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
										value="" autofocus>
										</div>
								</div>

								<div class="col-md-4 col-sm-4 ">
									<label class="control-label"><?= $this->lang->line('department') ?></label>
									<div class="input-group">
										<div class="input-group-text"><i class="feather-users"></i></div>
									<?php
									echo form_dropdown('department_id', $departments, '', 'required="required"')
										?>
										</div>
								</div>
								<div class="col-md-4 col-sm-4">
								<label class="control-label"><?= $this->lang->line('gender') ?> </label>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="gender" value="Male" checked>
										<?= $this->lang->line('male') ?>
									</label>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="gender" value="Female">
										<?= $this->lang->line('female') ?>
									</label>
								</div>
							</div>

							</div>
						</div>
						<div class="form-group">
							<div class="row col-md-12">
								<!-- <div class="col-md-4 col-sm-4 ">
										<label class="control-label"> PAN No </label>
										   <input type="text" placeholder="Enter PAN No" name="pan_no" class="form-control pan_no"  
										 value="" autofocus>
									</div> -->
								<div class="col-md-4 col-sm-4 ">
									<label class="control-label"><?= $this->lang->line('aadhaar_no') ?></label>
									<div class="input-group">
										<div class="input-group-text"><i class="feather-dollar-sign"></i></div>
									<input type="text" placeholder="<?= $this->lang->line('enter_aadhaar_no') ?>" name="aadhaar_no"
										class="form-control aadhaar_no" minlenght="12" maxlength="12"
										oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
										value="" autofocus required="required">
										</div>
								</div>
								<div class="col-md-4 col-sm-4">
									<label class="control-label"><?= $this->lang->line('dob') ?></label>
									<div class="input-group">
										<div class="input-group-text"><i class="feather-calendar"></i></div>
									<input type="text" data-date-formate="dd-mm-yyyy" name="dob"
										class="form-control date-picker" id="startDate" value="" placeholder="<?= $this->lang->line('dd_mm_yyyy') ?>" autofocus>
									</div>
								</div>
								<div class="col-md-4 col-sm-4 ">
									<label class="control-label"><?= $this->lang->line('upload_photo') ?></label>
									 <div class="mb-4 mb-md-0 d-flex gap-4 your-brand">
                                                <div class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                    <img src="<?php echo base_url() ?>/assets/images/avatar/1.png"
                                                        class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                                    <div
                                                        class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                                        <i class="feather feather-camera" aria-hidden="true"></i>
                                                    </div>
                                                    <input class="file-upload" type="file" name="photo" accept="image/*">
                                                </div>
                                                <div class="d-flex flex-column gap-1">
                                                    <div class="fs-11 text-gray-500 mt-2"># Upload your prifile</div>
                                                    <div class="fs-11 text-gray-500"># Avatar size 150x150</div>
                                                    <div class="fs-11 text-gray-500"># Max upload size 2mb</div>
                                                    <div class="fs-11 text-gray-500"># Allowed file types: png, jpg, jpeg</div>
                                                </div>
                                            </div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row col-md-12">
								<div class="col-md-4 col-sm-4 ">
									<label class="control-label"> <?= $this->lang->line('medical_test') ?> </label>
									<div class="form-check">
											<label class="form-check-label">
												<input class="form-check-input medical_status" type="radio" name="medical_status" value="Yes" checked="checked" />
												<?= $this->lang->line('yes') ?>
											</label>
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
											<label class="form-check-label">
												<input class="form-check-input medical_status" type="radio" name="medical_status" value="No" />
												<?= $this->lang->line('no') ?>
											</label>
										</div>

								</div>
								<div class="col-md-8 col-sm-8 report_div">
									<label class="control-label"><?= $this->lang->line('report_number') ?></label>
									<div class="input-group">
										<div class="input-group-text"><i class="feather-hash"></i></div>
									<input type="text" id="firstName" placeholder="<?= $this->lang->line('enter_report_number') ?>" name="report_no"
										class="form-control report_no" value="" autofocus autocomplete="off"
										required="required">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row col-md-12">
								<div class="col-md-8 col-sm-8 ">
									<label class="control-label"><?= $this->lang->line('address') ?> </label>
									<div class="input-group">
										<div class="input-group-text"><i class="feather-map-pin"></i></div>
									<textarea class="form-control address" rows="3" placeholder="<?= $this->lang->line('enter_address') ?> "
										name="address" value=""></textarea>
										</div>
								</div>
								<div class="col-md-4">
									<label class="control-label" style="visibility: hidden;"> Photo View </label>
									<div>
										<img id="blah" src="#" alt="your image" class="hide" width="100px"
											height="100px" />
									</div>
								</div>

							</div>
						</div>
						<div class="row col-md-12">
							<div class="col-md-12 col-sm-12 ">
								<label class="control-label" style="visibility: hidden;"> Name</label><br>
								<button type="submit"
									class="btn btn-primary btn-block"><?= $this->lang->line('submit') ?></button>
							</div>
						</div>
					</form>					</div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script src="<?php echo base_url() . "assets/"; ?>plugins/jquery/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		function readURL(input) {

			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#blah').removeClass('hide');
					$('#blah').addClass('show');
					$('#blah').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}
		$(".upload").change(function () {
			var file = this.files[0];
			var fileType = file["type"];
			var size = parseInt(file["size"] / 1024);
			//alert(size);
			var validImageTypes = ["image/jpeg", "image/png"];
			if ($.inArray(fileType, validImageTypes) < 0) {
				alert('Invalid file type , please select jpg/png file only !');
				$(this).val('');
			}
			if (size > 5000) {
				alert('Image size exceed , please select < 5MB file only !');
				$(this).val('');
			}

			readURL(this);
		});
		$("input[type='radio']").click(function () {
			var medical_status = $("input[name='medical_status']:checked").val();
			if (medical_status == 'Yes') {
				$(".report_div").css('visibility', 'visible');
				$(".report_no").attr('required', 'required');
			}
			else {
				$(".report_div").css('visibility', 'hidden');
				$(".report_no").removeAttr('required');
			}
		});
	});
</script>