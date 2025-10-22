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
            <?php $this->load->view('layout/alerts'); ?>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <a href="javascript:void(0);" class="btn btn-light-brand "> <span>Employee Code</span>
                        </a>
                        <a href="javascript:void(0);" class="btn btn-primary">

                            <span><?= $employee_code ?></span>
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
    <div class="main-content">
        <form class="form-horizontal" role="form" method="post"
            action="<?php echo base_url(); ?>index.php/Employees/add_new_employee" enctype="multipart/form-data">
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

                                            <div class="col-lg-4 col-md-4 col-sm-4 ">
                                                <input type="hidden" name="employee_code"
                                                    value="<?php echo $emp_code; ?>" required>

                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('name') ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="name" class="form-control"
                                                        id="fullnameInput"
                                                        placeholder="<?= $this->lang->line('enter_employee_name') ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('email') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('enter_email') ?>"
                                                        name="email" class="form-control email" value="" required
                                                        autofocus>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold fw-semibold">
                                                    <?= $this->lang->line('daily_target') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map"></i></div>
                                                    <input type="text" class="form-control" value="20"
                                                        placeholder="Enter Daily Leads Target" name="target" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-3 align-items-center">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('select_role') ?><span
                                                        class="required"> *</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                                    <?php echo form_dropdown('role_id', $roles, '', )?>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('mobile_no') ?><span
                                                        class="required"> *</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('enter_mobile_no') ?>"
                                                        name="mobile_no" class="form-control mobile" minlenght="10"
                                                        maxlength="10"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                                        value="" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('select_department') ?>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-users"></i></div>
                                                    <?php
                                                    echo form_dropdown('department_id', $departments, '', )
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row mb-3 align-items-center">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold"> <?= $this->lang->line('select_designation') ?> <span >*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-users"></i></div>
                                                    <?php  
                                                        echo form_dropdown('designation_id', $designations, '', )
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold"> <?= $this->lang->line('date_of_joining') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <input type="text" class="form-control date1" id="startDate" name="doj" placeholder="Pick date of Joining">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold"> <?= $this->lang->line('date_of_birth') ?> </label>
                                                    <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <input type="text" class="form-control date1" id="dueDate" name="dob" placeholder="Pick date of birth">
                                                </div>
                                            </div>
                                        </div> -->
                                        <div class="row mb-3 align-items-center">
                                            <!-- <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold"><?= $this->lang->line('select_authority_person') ?> <span
                                                        ></span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <?php
                                                    echo form_dropdown('author_id', $employees, '')
                                                        ?>
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
                                                        name="username" class="form-control" value="" required
                                                        autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('password') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-lock"></i></div>
                                                    <input type="password"
                                                        placeholder="<?= $this->lang->line('password') ?>"
                                                        name="password" class="form-control" value="" required
                                                        autofocus>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-3 align-items-center">

                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('aadhaar_no') ?> <span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-dollar-sign"></i>
                                                    </div>
                                                    <input type="text"
                                                        placeholder=" <?= $this->lang->line('enter_aadhaar_no') ?>"
                                                        name="aadhaar_no" class="form-control aadhaar_no" minlenght="12"
                                                        maxlength="12"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                                        value="" autofocus required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <span><?= $this->lang->line('pan_no') ?></span>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-dollar-sign"></i>
                                                    </div>
                                                    <input type="text"
                                                        placeholder=" <?= $this->lang->line('pan_placeholder') ?>"
                                                        name="pan_no" class="form-control pan_no" value="" autofocus
                                                        maxlength="10" minlength="10"
                                                        style="text-transform: uppercase;">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('address') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <textarea class="form-control address" rows="3"
                                                        placeholder=" <?= $this->lang->line('enter_address') ?>"
                                                        name="address" value="" requireds></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row col-md-12">
                                            <!-- Time In -->
                                            <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('office_time_in') ?> Time In <span
                                                        class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-clock"></i></div>
                                                    <input type="time" name="office_time_in" class="form-control"
                                                        required value="09:00">
                                                </div>
                                            </div>

                                            <!-- Time Out -->
                                            <div class="col-md-4 col-sm-4">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('office_time_out') ?> Time Out <span
                                                        class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-clock"></i></div>
                                                    <input type="time" name="office_time_out" class="form-control"
                                                        required value="19:00">

                                                </div>
                                            </div>

                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('leave') ?>Leave
                                                    <span class="required"></span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                                    <select name="leave" class="form-control">
                                                        <option value=""><?= $this->lang->line('select') ?></option>
                                                        <option value="0" selected>
                                                            0</option>
                                                        <option value="1">
                                                            1</option>
                                                        <option value="2">
                                                            2</option>
                                                        <option value="3">
                                                            3</option>
                                                        <option value="4">
                                                            4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row col-md-12" style="margin-top: 20px;">

                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('upload_photo') ?></label>
                                                <div class="mb-3 mb-md-0 d-flex gap-4 your-brand">
                                                    <div
                                                        class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                        <img src="<?php echo base_url() ?>/assets/images/avatar/1.png"
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

                                            </div>
                                            <div class="col-md-4 col-sm-4 mt-4">
                                                <div class="form-check form-switch form-switch-sm ps-5">
                                                    <input class="form-check-input c-pointer" type="checkbox"
                                                        id="commentSwitch" name="eligible_esi_pf" value="1">
                                                    <label class="form-check-label fw-500 text-dark c-pointer"
                                                        for="commentSwitch">Eligible For ESI and PF</label>
                                                </div>
                                            </div>

                                            <!-- <div class="col-md-4 col-sm-4">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('description') ?><span
                                                        class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-type"></i></div>
                                                    <textarea name="employee_description" class="form-control" rows="3"
                                                        placeholder="<?= $this->lang->line('description') ?>"></textarea>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="row col-md-12">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label class="control-label fw-semibold" style="visibility: hidden;">
                                                    <?= $this->lang->line('name') ?></label><br>
                                                <button type="submit"
                                                    class="btn btn-primary btn-block"><?= $this->lang->line('submit') ?></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="timeline" role="tabpanel">
                                    <div class="form-group">
                                        <div class="row mb-3 col-md-12">
                                            <!-- <div class="col-lg-4 col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('account_holder_name') ?>
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                                    <input type="text" name="account_holder_name" class="form-control"
                                                        placeholder="<?= $this->lang->line('account_holder_name') ?>">
                                                </div>
                                            </div> -->
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('bank_name') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-home"></i></div>
                                                    <input type="text" name="bank_name" class="form-control " value=""
                                                        placeholder="<?= $this->lang->line('bank_name') ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('account_number') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-hash"></i></div>
                                                    <input type="text" name="account_number" class="form-control "
                                                        value=""
                                                        placeholder="<?= $this->lang->line('account_number') ?>"
                                                        autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('ifsc_code') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-key"></i></div>
                                                    <input type="text" name="ifsc_code" class="form-control " value=""
                                                        placeholder="<?= $this->lang->line('ifsc_code') ?>" autofocus>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- <div class="form-group">
                                        <div class="row col-md-12">

                                          
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('branch_name') ?><span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                                    <input type="text" name="branch_name" class="form-control" value=""
                                                        placeholder="<?= $this->lang->line('branch_name') ?>" autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('account_type') ?><span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-layers"></i></div>
                                                    <select name="account_type" class="form-control">
                                                        <option value=""><?= $this->lang->line('select_type') ?>
                                                        </option>
                                                        <option value="savings"><?= $this->lang->line('savings') ?>
                                                        </option>
                                                        <option value="current"><?= $this->lang->line('current') ?>
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
                                        <!-- <div class="form-group">
                                        <div class="row col-md-12">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('upi_id') ?>
                                                </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-smartphone"></i>
                                                    </div>
                                                    <input type="text" name="upi_id" class="form-control " value=""
                                                        placeholder="<?= $this->lang->line('upi_id') ?>" autofocus>
                                                </div>
                                            </div>
                                        </div>

                                    </div> -->
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label class="control-label fw-semibold" style="visibility: hidden;">
                                                <?= $this->lang->line('name') ?></label><br>
                                            <button type="submit"
                                                class="btn btn-primary btn-block"><?= $this->lang->line('submit') ?></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <!-- /.tab-pane -->
                                <div class="tab-pane fade" id="salary" role="tabpanel">
                                    <div class="form-group">
                                        <div class="row mb-3 col-md-12">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('basic_salary') ?><span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-dollar-sign"></i>
                                                    </div>
                                                    <input type="text" name="salary" id="basic_salary"
                                                        class="form-control " value=""
                                                        placeholder="<?= $this->lang->line('basic_salary') ?>" autofocus
                                                        oninput="calculateTotal()">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('hra') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-home"></i></div>
                                                    <input type="text" name="hra" id="hra" class="form-control "
                                                        value="" placeholder="<?= $this->lang->line('hra') ?>" autofocus
                                                        oninput="calculateTotal()">
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('conveyance_allowance') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-truck"></i>
                                                    </div>
                                                    <input type="text" name="c_allowance" id="c_allowance"
                                                        class="form-control " value=""
                                                        placeholder="<?= $this->lang->line('conveyance_allowance') ?>"
                                                        autofocus oninput="calculateTotal()">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row mb-3 col-md-12">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('medical_allowance') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-activity"></i>
                                                    </div>
                                                    <input type="text" name="m_allowance" id="m_allowance"
                                                        class="form-control " value=""
                                                        placeholder="<?= $this->lang->line('medical_allowance') ?>"
                                                        autofocus oninput="calculateTotal()">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('other_allowance') ?>
                                                    (Cash)</label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-gift"></i></div>
                                                    <input type="text" name="o_allowance" id="o_allowance"
                                                        class="form-control " value=""
                                                        placeholder="<?= $this->lang->line('other_allowance') ?>"
                                                        autofocus oninput="calculateTotal()">
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold fw-semibold"><?= $this->lang->line('total_net_salary') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-credit-card"></i>
                                                    </div>
                                                    <input type="text" id="total_net_salary" name="total_net_salary"
                                                        class="form-control" value="0.00"
                                                        placeholder="<?= $this->lang->line('total_net_salary') ?>"
                                                        readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="col-md-12 col-sm-12 ">
                                                <label class="control-label fw-semibold" style="visibility: hidden;">
                                                    <?= $this->lang->line('name') ?></label><br>
                                                <button type="submit"
                                                    class="btn btn-primary btn-block"><?= $this->lang->line('submit') ?></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane fade" id="settings" role="tabpanel">
                                    <!-- <div class="form-group">
                                        <div class="row col-md-12 mb-3">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('emergency_mobile_no') ?>
                                                    <span class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-phone-call"></i>
                                                    </div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('emergency_mobile_no') ?>"
                                                        name="emobile_no" class="form-control mobile" minlenght="10"
                                                        maxlength="10"
                                                        oninput="this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"
                                                        value="" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label
                                                    class="control-label fw-semibold"><?= $this->lang->line('emergency_name') ?><span
                                                        class="required">*</span></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-user-check"></i>
                                                    </div>
                                                    <input type="text"
                                                        placeholder="<?= $this->lang->line('emergency_name') ?>"
                                                        name="ename" class="form-control" required autofocus>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div> -->
                                    <div class="form-group">
                                        <div class="row mb-3 col-md-12">
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('uan_no') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-hash"></i></div>
                                                    <input type="text" placeholder="<?= $this->lang->line('uan_no') ?> "
                                                        name="uan" class="form-control" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('pf_no') ?> </label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-briefcase"></i>
                                                    </div>
                                                    <input type="text" placeholder=" <?= $this->lang->line('pf_no') ?> "
                                                        name="pf" class="form-control" required autofocus>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-4 ">
                                                <label class="control-label fw-semibold">
                                                    <?= $this->lang->line('esi_no') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-shield"></i>
                                                    </div>
                                                    <input type="text" placeholder=" <?= $this->lang->line('esi_no') ?>"
                                                        name="esi" class="form-control" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row col-md-12">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label class="control-label fw-semibold" style="visibility: hidden;">
                                                <?= $this->lang->line('name') ?></label><br>
                                            <button type="submit"
                                                class="btn btn-primary btn-block"><?= $this->lang->line('submit') ?></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?php echo base_url() . "assets/"; ?>js/jquery/jquery.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->


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
            alert('Image size exceed , please select < 5MB file only !');
            $(this).val('');
        }

        readURL(this);
    });

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