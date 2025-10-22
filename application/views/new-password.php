<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<style type="text/css">
    .select2 {
        height: 45px !important;
        width: 100% !important;
    }
</style>

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10"><?= $this->lang->line('users') ?></h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $this->lang->line('home') ?></a></li>
                <li class="breadcrumb-item"><?= $this->lang->line('change_password') ?></li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <?php $this->load->view('layout/alerts'); ?>
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span><?= $this->lang->line('back') ?></span>
                    </a>
                </div>
                <!-- <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-icon btn-light-brand successAlertMessage">
                                <i class="feather-star"></i>
                            </a>
                            <a href="javascript:void(0);" class="btn btn-icon btn-light-brand">
                                <i class="feather-eye me-2"></i>
                                <span>Follow</span>
                            </a>
                            <a href="customers-create.html" class="btn btn-primary">
                                <i class="feather-plus me-2"></i>
                                <span>Create Customer</span>
                            </a>
                        </div> -->
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-xxl-4 col-xl-4">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3">
                                    <img src=<?= get_avatar_url($photo) ?> alt="" class="img-fluid">
                                </div>
                                <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 76%; right: 10px">
                                    <i class="bi bi-patch-check-fill"></i>
                                </div>
                            </div>
                            <div class="mb-4">
                                <a href="javascript:void(0);" class="fs-14 fw-bold d-block"> <?= $name ?></a>
                                <a href="javascript:void(0);" class="fs-12 fw-normal text-muted d-block"><?= $designation ?></a>
                            </div>
                            <div class="fs-12 fw-normal text-muted text-center d-flex flex-wrap gap-3 mb-4">
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder"><?= $leadsFollowups ?></h6>
                                    <p class="fs-12 text-muted mb-0"><?= $this->lang->line('followups') ?></p>
                                </div>
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder"><?= $assignLeads ?></h6>
                                    <p class="fs-12 text-muted mb-0"><?= $this->lang->line('total_assign') ?></p>
                                </div>
                                <div class="flex-fill py-3 px-4 rounded-1 d-none d-sm-block border border-dashed border-gray-5">
                                    <h6 class="fs-15 fw-bolder"><?= $totalleads ?></h6>
                                    <p class="fs-12 text-muted mb-0"><?= $this->lang->line('total_leads') ?></p>
                                </div>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-map-pin"></i><?= $this->lang->line('location') ?></span>
                                <a href="javascript:void(0);" class="float-end" style="padding-left:94px;"><?= $address ?></a>
                            </li>
                            <li class="hstack justify-content-between mb-4">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-phone"></i><?= $this->lang->line('phone') ?></span>
                                <a href="javascript:void(0);" class="float-end">+<?= $mobile_no ?></a>           
                            </li>
                            <li class="hstack justify-content-between mb-0">
                                <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i><?= $this->lang->line('email') ?></span>
                                <a href="javascript:void(0);" class="float-end"><?= $email ?></a>
                            </li>
                        </ul>
                        <div class="d-flex gap-2 text-center pt-4">
                            <!-- <a href="javascript:void(0);" class="w-50 btn btn-light-brand">
                                            <i class="feather-trash-2 me-2"></i>
                                            <span>Delete</span>
                                        </a> -->
                            <a href="<?= base_url('index.php/Employees/edit/') . $id ?>" class="w-50 btn btn-primary">
                                <i class="feather-edit me-2"></i>
                                <span><?= $this->lang->line('edit_employee') ?></span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>


            <div class="col-xxl-8 col-xl-8">
                <div class="card border-top-0">
                    <div class="card-header p-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab"><?= $this->lang->line('details') ?></a>
                                <!-- <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab">Overview</a> -->
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#timeline" role="tab"><?= $this->lang->line('bank_details') ?></a>
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#salary" role="tab"><?= $this->lang->line('salary_details') ?></a>
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#securityTab" role="tab"><?= $this->lang->line('security') ?></a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade  p-4 show active" id="overviewTab" role="tablist">
                            <div class="fs-12 fw-bold text-default">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <h5 class="fw-bold mb-0">About:</h5>
                                </div>
                                <p><?= $employee_description ?></p>
                            </div>
                            <div class="profile-details mb-5">
                                <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Name:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $name ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Role:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $role ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Department:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $department_name ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Date of Joining:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $date_of_joining ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Date of Birth:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $dob ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Gender :</div>
                                        <span class="fs-12 fw-bold text-default"><?= $gender ?></span>
                                    </div>

                                <div class="col-lg-4 mb-4">
                                    <div class="fw-bold text-dark">Email Address:</div>
                                    <span class="fs-12 fw-bold text-default">
                                        <?= $email ?>

                                        <?php if (isset($email_verified) && (int)$email_verified === 1): ?>
                                            <!-- verified badge -->
                                            <span class="ms-2 badge bg-success text-white">
                                                <i class="bi bi-check-circle-fill"></i> Verified
                                            </span>
                                        <?php else: ?>
                                            <!-- verify button -->
                                            <span id="emailVerifySection" class="ms-2">
                                                <button type="button" 
                                                        class="ms-2 badge bg-soft-success text-success" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#emailModal" 
                                                        id="openEmailVerifyBtn">
                                                    Verify
                                                </button>
                                                <span id="emailVerifiedIcon" class="text-success d-none">✔</span>
                                            </span>
                                        <?php endif; ?>
                                    </span>
                                </div>


                                <!-- Mobile -->
                                <div class="col-lg-4 mb-4">
                                    <div class="fw-bold text-dark">Mobile Number:</div>
                                    <span class="fs-12 fw-bold text-default">
                                        <?= $mobile_no ?>
                                        <!-- <span class="ms-2 badge bg-soft-success text-success">
                                            <a href="#" class="float-end" data-bs-toggle="modal" data-bs-target="#mobileModal">Verify</a>
                                            <i id="mobileVerifiedIcon" class="bi bi-check-circle-fill text-success d-none"></i>
                                        </span> -->
                                        <span id="mobileVerifySection" class="ms-2">
                                        <button type="button" class="ms-2 badge bg-soft-success text-success" data-bs-toggle="modal" data-bs-target="#mobileModal" id="openMobileVerifyBtn">
                                            Verify
                                        </button>
                                        <span id="mobileVerifiedIcon" class="text-success d-none">✔ </span>
                                        </span>
                                    </span>
                                </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Designation:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $designation ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Authorized Person:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $author_email ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Aadhaar Number:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $aadhaar_no ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">PAN Number:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $pan_no ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Daily Target:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $target ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">leave:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $leave ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Time In:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $office_time_in ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Time Out:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $office_time_out ?></span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade p-4" id="securityTab" role="tab">

                            <form action="<?php echo base_url(); ?>index.php/User_authentication/UserPasswordChange" method="post">
                                <input type="hidden" name="emp_id" value="<?= $this->session->userdata['logged_in']['id']; ?>">
                                <div class="p-4 mb-4 border border-dashed border-gray-3 rounded-1">
                                    <h6 class="fw-bolder"><a href="javascript:void(0);"><?= $this->lang->line('change_password') ?></a></h6>
                                    <div class="my-4 py-2">
                                        <input type="password" class="form-control" placeholder="<?= $this->lang->line('enter_new_password') ?>" name="password" required>
                                    </div>
                                    <div class="my-4 py-2">
                                        <input type="password" class="form-control" placeholder="<?= $this->lang->line('confirm_password') ?>" name="confirm_password" required>
                                    </div>
                                    <div class="my-4 py-2">
                                        <button type="submit" class="w-100 btn btn-primary"> <?= $this->lang->line('submit') ?></button>
                                    </div>
                                </div>
                            </form>
                            <!-- <?php if ($this->session->flashdata('success')): ?>
                                        <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-success-message" role="alert">
                                            <div class="me-4 d-none d-md-block">
                                                <i class="feather feather-check text-success fs-1"></i>
                                            </div>
                                            <div>
                                                <p class="fw-bold mb-0 text-truncate-1-line"><?php echo $this->session->flashdata('success'); ?>
                                                </p>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    <?php endif; ?>


                                <?php if ($this->session->flashdata('failed')): ?>
                                    <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-danger-message" role="alert">
                                        <div class="me-4 d-none d-md-block">
                                            <i class="feather feather-alert-triangle text-danger fs-1"></i>
                                        </div>
                                        <div>
                                            <p class="fw-bold mb-0 text-truncate-1-line"><?php echo $this->session->flashdata('failed'); ?>
                                            </p>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                <?php endif; ?> -->
                        </div>

                        <div class="tab-pane fade  p-4" id="timeline" role="tabpanel">

                            <div class="profile-details mb-5">
                                <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Account Holder Name:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $account_holder_name ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Account Number:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $account_number ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Bank Name:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $bank_name ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Address:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $address ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">UPI ID:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $upi_id ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">IFSC Code:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $ifsc_code ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Account Type:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $account_type ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade  p-4" id="salary" role="tabpanel">

                            <div class="profile-details mb-5">
                                <div class="row">
                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Basic Salary:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $salary ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">HRA:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $hra ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Conveyance Allowance:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $c_allowance ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Medical Allowance:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $m_allowance ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Other Allowance:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $o_allowance ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Total Salary:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $total_net_salary ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Emergency Name:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $ename ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">Emergency Mobile No:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $emobile_no ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">UAN No.:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $uan ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">PF No.:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $pf ?></span>
                                    </div>

                                    <div class="col-lg-4 mb-4">
                                        <div class="fw-bold text-dark">ESI No:</div>
                                        <span class="fs-12 fw-bold text-default"><?= $esi ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

<script src="<?php echo base_url() . "assets/"; ?>js/jquery/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $('#close').on('click', function(e) {
            $(this).parent('.error_mesg').remove();
        });
        $(document).on('blur', '.cpassword', function() {
            var cpassword = $('.cpassword').val();
            var password = $('.password').val();
            //var confirmPassword = document.getElementById("txtConfirmPassword").value;
            if (password != '') {
                if (password != cpassword) {
                    alert("Passwords do not match.");
                    //$(this).val();
                    $('.cpassword').val('');
                }
            }
        });

        $(document).on('blur', '.password', function() {
            var cpassword = $('.cpassword').val();
            var password = $('.password').val();
            //var confirmPassword = document.getElementById("txtConfirmPassword").value;
            if (cpassword != '') {
                if (password != cpassword) {
                    alert("Passwords do not match.");
                    //$(this).val();
                    $('.password').val('');
                }
            }
        });
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    if(localStorage.getItem('emailVerified') === 'true'){
        document.getElementById('openEmailVerifyBtn')?.classList.add('d-none');  
        document.getElementById('emailVerifiedIcon')?.classList.remove('d-none');
    }
    if(localStorage.getItem('mobileVerified') === 'true'){
        document.getElementById('openMobileVerifyBtn')?.classList.add('d-none');  
        document.getElementById('mobileVerifiedIcon')?.classList.remove('d-none');
    }
});
</script>