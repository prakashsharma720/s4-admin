<style>
.control-label fw-semibold {
    margin: 0.7rem
}

.required {
    color: red;
}
</style>


<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5> <a
                        href="<?php echo base_url('index.php/Employees/add'); ?>"><?= $this->lang->line('employee') ?></a>
                </h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a
                        href="<?php echo base_url('index.php/User_authentication/admin_dashboard'); ?>"><?= $this->lang->line('home') ?></a>
                </li>
                <li class="breadcrumb-item"><?= $this->lang->line('add') ?>
                </li>
            </ul>
        </div>
        <div class="page-header-right ms-auto d-flex align-items-center">
            <!-- Placeholder for additional actions -->
            <div class="page-header-right ms-auto d-flex align-items-center">
                <!-- Placeholder for additional actions -->
                <?php $this->load->view('layout/alerts'); ?>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-light-brand "> <span>Employee Code</span>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-primary">
                                <span><?php echo $employee_code; ?></span>
                            </a>
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
    </div>


    <div class="main-content">
        <form class="form-horizontal" role="form" method="post"
            action="<?php echo base_url(); ?>index.php/Employees/editemployee/<?= $id ?>" enctype="multipart/form-data">
            <input type="hidden" name="employee_code" value="<?php echo $emp_code;?>" required>
            <input type="hidden" name="employees_id" value="<?= $id?>">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0">
                        <div class="card-header p-0">
                            <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab"
                                role="tablist">
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#activity"
                                        role="tab"><?= $this->lang->line('personal_details') ?></a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link " data-bs-toggle="tab"
                                        data-bs-target="#timeline"
                                        role="tab"><?= $this->lang->line('bank_details') ?></a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link " data-bs-toggle="tab"
                                        data-bs-target="#salary"
                                        role="tab"><?= $this->lang->line('salary_details') ?></a>
                                </li>
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link " data-bs-toggle="tab"
                                        data-bs-target="#settings"
                                        role="tab"><?= $this->lang->line('other_details') ?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="activity" role="tabpanel">
                                    <div class="form-group">
                                        <div class="row mb-3 align-items-center">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <input type="hidden" name="employee_code"
                                                    value="<?php echo $emp_code; ?>" required>
                                                <label class="control-label fw-semibold fw-semibold">
                                                    <?= $this->lang->line('name') ?> <span class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="name" class="form-control"
                                                        id="fullnameInput"
                                                        placeholder="<?= $this->lang->line('enter_employee_name') ?>"
                                                        value="<?= $name?>">
                                                </div>
                                            </div>

                                            <div class="col-lg-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('email') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('enter_email') ?>"
                                                        name="email" class="form-control email" value="<?= $email?>"
                                                        required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('daily_target') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-target"></i></div>
                                                    <input class="form-control"
                                                        placeholder="<?= $this->lang->line('enter_zero_if_not_applicable') ?>"
                                                        name="target" value="<?= $target ?>" required />
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3 align-items-center">
                                            <div class="col-lg-4 col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold fw-semibold">
                                                    <?= $this->lang->line('role') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                                    <?php  
                                                            echo form_dropdown('role_id', $roles,$role_id)
                                                        ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('mobile_no') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('enter_mobile_no') ?>"
                                                        name="mobile_no" class="form-control mobile" minlenght="10"
                                                        maxlength="10"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                                        value="<?= $mobile_no?>" required autofocus>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('department') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-users"></i></div>
                                                    <?php  
                                                echo form_dropdown('department_id', $departments, $department_id)
                                            ?>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('designation') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-users"></i></div>
                                                    <?php  
                                                echo form_dropdown('designation_id', $designations, $designation_id)
                                            ?>
                                                </div>
                                            </div> -->
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <!-- <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('date_of_joining') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <input type="text" data-date-formate="dd-mm-yyyy" name="doj"
                                                        class="form-control date-picker" id="startDate"
                                                        value="<?php echo $date_of_joining?>"
                                                        placeholder="<?= $this->lang->line('dd_mm_yyyy') ?>" autofocus>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('date_of_birth') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <input type="text" data-date-formate="dd-mm-yyyy" name="dob"
                                                        id="dueDate" class="form-control date-picker"
                                                        value="<?php echo $dob?>"
                                                        placeholder="<?= $this->lang->line('dd_mm_yyyy') ?>" autofocus>
                                                </div>
                                            </div> -->
                                            <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('gender') ?>
                                                </label><br>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            value="Male" checked>
                                                        <?= $this->lang->line('male') ?>
                                                    </label>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="gender"
                                                            value="Female">
                                                        <?= $this->lang->line('female') ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('username') ?> <span class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-key"></i></div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('username') ?>"
                                                        name="username" class="form-control" value="<?= $username?>"
                                                        required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('aadhaar_no') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-dollar-sign"></i>
                                                    </div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('enter_aadhaar_no') ?>"
                                                        name="aadhaar_no" class="form-control aadhaar_no" minlenght="12"
                                                        maxlength="12"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                                        value="<?= $aadhaar_no?>" autofocus required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <!-- <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">Select
                                                    <?= $this->lang->line('authority_person') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user-check"></i>
                                                    </div>
                                                    <?php  
                                                        echo form_dropdown('author_id', $employees, $author_id)
                                                    ?>
                                                </div>
                                            </div> -->



                                            <div class="col-md-4 col-sm-4 ">
                                                <b> <?= $this->lang->line('pan_no') ?> </b>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-dollar-sign"></i>
                                                    </div>
                                                    <input type="text" placeholder="<?= $this->lang->line('pan_no') ?>"
                                                        name="pan_no" class="form-control pan_no" value="<?= $pan_no?>"
                                                        autofocus maxlength="10" minlength="10"
                                                        style="text-transform: uppercase;">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('office_time_in') ?> Time In <span
                                                        class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-clock"></i></div>
                                                    <input type="time" name="office_time_in" class="form-control"
                                                        value="<?= $office_time_in ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('office_time_out') ?> Time Out <span
                                                        class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-clock"></i></div>
                                                    <input type="time" name="office_time_out" class="form-control"
                                                        value="<?= $office_time_out ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-3 ">


                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('leave') ?>Leave
                                                    <span class="required"></span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <select name="leave" class="form-control">
                                                        <option value=""><?= $this->lang->line('select') ?></option>
                                                        <option value="0" <?= ($leave == '0') ? 'selected' : ''; ?>>
                                                            0</option>
                                                        <option value="1" <?= ($leave == '1') ? 'selected' : ''; ?>>
                                                            1</option>
                                                        <option value="2" <?= ($leave == '2') ? 'selected' : ''; ?>>
                                                            2</option>
                                                        <option value="3" <?= ($leave == '3') ? 'selected' : ''; ?>>
                                                            3</option>
                                                        <option value="4" <?= ($leave == '4') ? 'selected' : ''; ?>>
                                                            4</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <?php
                                                $time_in = '';
                                                $time_out = '';
                                                
                                                if (!empty($office_hours)) {
                                                    $parts = explode('--', $office_hours);
                                                    if (count($parts) === 2) {
                                                        $time_in = date("H:i", strtotime(trim($parts[0])));
                                                        $time_out = date("H:i", strtotime(trim($parts[1])));
                                                    }
                                                }
                                            ?>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('address') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <textarea class="form-control address" rows="3"
                                                        placeholder="<?= $this->lang->line('enter_address') ?> "
                                                        name="address" value="<?= $address ?>"
                                                        requireds><?= $address ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('upload_photo') ?> </label>
                                                <div class="mb-3 mb-md-0 d-flex gap-4 your-brand">
                                                    <div
                                                        class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                        <img src="<?php echo !empty($photo) ? base_url().$photo : base_url('assets/images/avatar/1.png'); ?>"
                                                            class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                                        <div
                                                            class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                                            <i class="feather feather-camera" aria-hidden="true"></i>
                                                        </div>
                                                        <input class="file-upload" type="file" name="photo"
                                                            accept="image/*">
                                                    </div>
                                                    <div class="d-flex flex-column gap-1">
                                                        <div class="fs-11 text-gray-500 mt-2"># Upload your prifile
                                                        </div>
                                                        <div class="fs-11 text-gray-500"># Avatar size 150x150</div>
                                                        <div class="fs-11 text-gray-500"># Max upload size 2mb</div>
                                                        <div class="fs-11 text-gray-500"># Allowed file types: png, jpg,
                                                            jpeg</div>
                                                    </div>
                                                </div>
                                                <!-- Hidden field to keep old image -->
                                                <input type="hidden" name="old_image"
                                                    value="<?= !empty($photo) ? $photo : '' ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-4 mt-4">
                                            <div class="form-check form-switch form-switch-sm ps-5">
                                                <input class="form-check-input" type="checkbox" id="commentSwitch"
                                                    name="eligible_esi_pf" value="1"
                                                    <?= ($eligible_esi_pf == 1) ? 'checked' : '' ?>>

                                                    <label class="form-check-label fw-500 text-dark c-pointer"
                                                        for="commentSwitch">Eligible For ESI and PF</label>
                                            </div>
                                        </div>

                                        <div class="row mb-3 ">
                                            <!-- <div class="col-md-4 col-sm-4">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('description') ?><span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-type"></i></div>
                                                    <textarea name="employee_description"
                                                        value="<?= $employee_description ?>" class="form-control"
                                                        rows="3" placeholder="<?= $this->lang->line('description') ?>"
                                                        required><?= $employee_description ?></textarea>
                                                </div>
                                            </div> -->

                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="timeline" role="tabpanel">
                                    <div class="form-group">
                                        <div class="row mb-3 col-md-12">
                                            <!-- <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('account_holder_name') ?><span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="account_holder_name" class="form-control "
                                                        value="<?= $account_holder_name; ?>"
                                                        placeholder="<?= $this->lang->line('account_holder_name') ?> "
                                                        autofocus>
                                                </div>
                                            </div> -->
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('bank_name') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-home"></i></div>
                                                    <input type="text" name="bank_name" class="form-control "
                                                        value="<?= $bank_name; ?>"
                                                        placeholder="<?= $this->lang->line('bank_name') ?> " autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('account_number') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-hash"></i></div>
                                                    <input type="text" name="account_number" class="form-control "
                                                        value="<?= $account_number; ?>"
                                                        placeholder="<?= $this->lang->line('account_number') ?> "
                                                        autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('ifsc') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-key"></i></div>
                                                    <input type="text" name="ifsc_code" class="form-control "
                                                        value="<?= $ifsc_code; ?>"
                                                        placeholder="<?= $this->lang->line('ifsc') ?>" autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row mb-3 col-md-12">
                                            
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('branch_name') ?><span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <input type="text" name="branch_name" class="form-control"
                                                        value="<?= $branch_name; ?>"
                                                        placeholder="<?= $this->lang->line('branch_name') ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('account_type') ?><span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-layers"></i></div>
                                                    <select name="account_type" class="form-control">
                                                        <option value=""><?= $this->lang->line('select_type') ?>
                                                        </option>
                                                        <option value="savings"
                                                            <?= ($account_type == 'savings') ? 'selected' : ''; ?>>
                                                            <?= $this->lang->line('savings') ?></option>
                                                        <option value="current"
                                                            <?= ($account_type == 'current') ? 'selected' : ''; ?>>
                                                            <?= $this->lang->line('current') ?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 col-md-12">

                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('upi_id') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-smartphone"></i>
                                                    </div>
                                                    <input type="text" name="upi_id" class="form-control "
                                                        value="<?= $upi_id?>"
                                                        placeholder="<?= $this->lang->line('upi_id') ?>" autofocus>
                                                </div>
                                            </div>

                                        </div> -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="salary" role="tabpanel">
                                    <div class="form-group">
                                        <div class="row mb-3 col-md-12">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('basic_salary') ?><span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-dollar-sign"></i>
                                                    </div>
                                                    <input type="text" id="basic_salary" name="salary"
                                                        class="form-control" value="<?= $salary ?>"
                                                        placeholder="<?= $this->lang->line('basic_salary') ?>"
                                                        oninput="calculateTotal()" autofocus>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('hra') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-home"></i></div>
                                                    <input type="text" id="hra" name="hra" class="form-control"
                                                        value="<?= $hra ?>"
                                                        placeholder="<?= $this->lang->line('hra') ?>"
                                                        oninput="calculateTotal()">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('conveyance_allowance') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-truck"></i></div>
                                                    <input type="text" id="c_allowance" name="c_allowance"
                                                        class="form-control" value="<?= $c_allowance ?>"
                                                        placeholder="<?= $this->lang->line('conveyance_allowance') ?>"
                                                        oninput="calculateTotal()">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 col-md-12">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('medical_allowance') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-activity"></i></div>
                                                    <input type="text" id="m_allowance" name="m_allowance"
                                                        class="form-control" value="<?= $m_allowance ?>"
                                                        placeholder="<?= $this->lang->line('medical_allowance') ?>"
                                                        oninput="calculateTotal()">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('other_allowance') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-gift"></i></div>
                                                    <input type="text" id="o_allowance" name="o_allowance"
                                                        class="form-control" value="<?= $o_allowance ?>"
                                                        placeholder="<?= $this->lang->line('other_allowance') ?>"
                                                        oninput="calculateTotal()">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('total_net_salary') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-credit-card"></i>
                                                    </div>
                                                    <input type="text" id="total_net_salary" name="total_net_salary"
                                                        class="form-control" value="<?= $total_net_salary ?>"
                                                        placeholder="<?= $this->lang->line('total_net_salary') ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="settings" role="tabpanel">
                                    <div class="form-group">
                                        <div class="row mb-3 col-md-12">
                                            <!-- <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('emergency_mobile_no') ?>
                                                    <span class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone-call"></i>
                                                    </div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('emergency_mobile_no') ?>"
                                                        name="emobile_no" class="form-control mobile" minlenght="10"
                                                        maxlength="10"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                                        value="<?= $emobile_no?>" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold fw-semibold">
                                                    <?= $this->lang->line('emergency_name') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user-check"></i>
                                                    </div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('emergency_name') ?>"
                                                        name="ename" class="form-control" value="<?= $ename?>" required
                                                        autofocus>
                                                </div>
                                            </div> -->
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold fw-semibold">
                                                    <?= $this->lang->line('uan_no') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-hash"></i></div>
                                                    <input type="text" placeholder="<?= $this->lang->line('uan_no') ?> "
                                                        name="uan" class="form-control" value="<?= $uan?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold fw-semibold">
                                                    <?= $this->lang->line('pf_no') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-briefcase"></i>
                                                    </div>
                                                    <input type="text" placeholder="<?= $this->lang->line('pf_no') ?>"
                                                        name="pf" class="form-control" value="<?= $pf?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold fw-semibold">
                                                    <?= $this->lang->line('esi_no') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-shield"></i></div>
                                                    <input type="text" placeholder=" <?= $this->lang->line('esi_no') ?>"
                                                        name="esi" class="form-control" value="<?= $esi?>" autofocus>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 col-md-12">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="row col-md-12">
                                <div class="col-md-12 col-sm-12">
                                    <label class="control-label" style="visibility: hidden;"> Name</label>
                                    <div class="d-flex gap-2">
                                        <button type="submit" id="updateBtns" class="btn btn-primary">
                                            <?= $this->lang->line('update') ?>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo base_url()."assets/"; ?>plugins/jquery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').removeClass('hide');
                $('#blah').addClass('show');
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".upload").change(function() {
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
            alert('Image size exceed , please select < 5 MB file only !');
            $(this).val('');
        }

        readURL(this);
    });
    var medical_status = $("input[name='medical_status']:checked").val();
    if (medical_status == 'Yes') {
        $(".report_div").css('visibility', 'visible');
        $(".report_no").attr('required', 'required');
    } else {
        $(".report_div").css('visibility', 'hidden');
        $(".report_no").removeAttr('required');
    }

    $("input[type='radio']").click(function() {
        var medical_status = $("input[name='medical_status']:checked").val();
        if (medical_status == 'Yes') {
            $(".report_div").css('visibility', 'visible');
            $(".report_no").attr('required', 'required');
        } else {
            $(".report_div").css('visibility', 'hidden');
            $(".report_no").removeAttr('required');
        }
    });

});
</script>
<script>
function calculateProfileCompletion() {
    const fields = [
        // Personal Details
        'name', 'email', 'role_id', 'mobile_no', 'doj', 'dob',
        'username', 'aadhaar_no', 'pan_no', 'address', 'designation_id', 'department_id',

        // Bank Details
        'account_holder_name', 'bank_name', 'account_number', 'ifsc_code',
        'branch_name', 'account_type', 'upi_id',

        // Salary Details
        'salary', 'hra', 'c_allowance', 'total_net_salary',

        // Other Details (Settings)
        'emobile_no', 'ename', 'uan', 'pf', 'esi', 'old_image'
    ];

    let filled = 0;

    fields.forEach(name => {
        const field = document.querySelector(`[name="${name}"]`);
        if (field) {
            if (field.tagName === 'SELECT') {
                if (field.value && field.value !== '') filled++;
            } else {
                if (field.value.trim() !== '') filled++;
            }
        }
    });

    const total = fields.length;
    console.log('total:' + total);
    console.log('filled:' + filled);
    const percent = Math.round((filled / total) * 100);
    setProgress(percent);
}

function setProgress(percent) {
    const fill = document.querySelector('.top-progress-fill');
    const text = document.querySelector('.progress-text');
    fill.style.width = percent + '%';
    text.textContent = `Profile Complete: ${percent}%`;
}

// Run on page load
document.addEventListener('DOMContentLoaded', calculateProfileCompletion);

// Run when any field changes
/* document.querySelectorAll('input, select, textarea').forEach(el => {
    el.addEventListener('input', calculateProfileCompletion);
    el.addEventListener('change', calculateProfileCompletion);
}); */
</script>
<script>
function calculateTotal() {
    const salary = parseFloat(document.getElementById('basic_salary').value) || 0;
    const hra = parseFloat(document.getElementById('hra').value) || 0;
    const c_allowance = parseFloat(document.getElementById('c_allowance').value) || 0;
    const m_allowance = parseFloat(document.getElementById('m_allowance').value) || 0;
    const o_allowance = parseFloat(document.getElementById('o_allowance').value) || 0;

    const total = salary + hra + c_allowance + m_allowance + o_allowance;

    document.getElementById('total_net_salary').value = total.toFixed(2);
}
</script>