<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5> <a
                        href="<?php echo base_url('index.php/PayrollController/index'); ?>"><?= $this->lang->line('payroll_module') ?></a>
                </h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a
                        href="<?php echo base_url('index.php/User_authentication/admin_dashboard'); ?>"><?= $this->lang->line('home') ?></a>
                </li>
                <li class="breadcrumb-item"><?= $this->lang->line('add_attendance') ?>
                </li>
            </ul>
    
        </div>
        <div class="page-header-right ms-auto d-flex align-items-center">
            <!-- Placeholder for additional actions -->
            <?php $this->load->view('layout/alerts'); ?>
    
            <!-- Placeholder for additional actions -->
            <?php $this->load->view('layout/alerts'); ?>
            <div class="page-header-right ms-auto">
                <!-- <a href="<?php echo base_url(); ?>index.php/PayrollController/add/" class="btn btn-icon btn-light-brand"><i
                        class="feather feather-plus"></i>
                    <?= $this->lang->line('add_employee') ?></a> -->
    
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
        <!-- form start -->
        <form class="form-horizontal" role="form" method="post"
            action="<?php echo base_url(); ?>index.php/PayrollController/add_attendance">
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"> <?= $this->lang->line('add_attendance') ?> </h3>
                        <div class="page-header-right ms-auto d-flex align-items-center">
                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4">
                                    <label for="dateofBirth" class="fw-semibold"><?= $this->lang->line('attendance_date') ?>: </label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-calendar"></i></div>
                                        <input class="form-control" id="startDate" placeholder="Pick date of birth" value="<?php echo date("d-m-Y"); ?>"
                                        name="date">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- closed card-header -->
                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card stretch stretch-full">
                                    <div class="card-body p-0">   
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr class="border-top">
                                                        <th ><?= $this->lang->line('employee_name') ?>  </th>
                                                        <th > <?= $this->lang->line('check_in') ?> </th>
                                                        <th > <?= $this->lang->line('check_out') ?>  </th>
                                                        <th > <?= $this->lang->line('status') ?>  </th>
                                                        <!-- <th><?= $this->lang->line('action') ?> </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1;foreach($employees as $obj) { ?>
                                                    <tr class="single-item">
                                                        <td>
                                                            <?php echo $obj['name']; ?>
                                                            <input type="hidden" name="emp_id[]" value="<?php echo $obj['id']; ?>"
                                                                class="form-control" readonly>
                                                        </td>
                                                        <!-- <td>
                                                                <input type="date" name="date[]" class="form-control dateInput" readonly>

                                                                </td> -->
                                                       <td>
                                                            <input type="time" name="check_in[]" class="form-control checkInInput" value="09:30"
                                                            data-shift="<?php echo $obj['office_time_in']; ?>">
                                                            <small class="text-danger late-text"></small>
                                                        </td>
                                                        <td>
                                                            <input type="time" name="check_out[]" class="form-control" value="18:00">
                                                        </td>
                                                        <td>
                                                            <select class="form-control" data-select2-selector="status" name="status[]">
                                                                <option value="Present" data-bg="bg-primary" selected>Present</option>
                                                                <option value="Absent" data-bg="bg-danger">Absent</option>
                                                                <option value="Leave" data-bg="bg-warning">On Leave</option>
                                                            </select>
                                                        </td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- table-responsive -->
                                </div>
                            </div> <!-- card-body closed -->
                        </div> <!-- card-outline closed -->
                        <div class="row ">
                            <div class="col-md-12 align-items-center" >
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="feather-user-plus me-2"></i>
                                    <span> Save Attendance</span>
                                </button> 
                                </div>
                        </div>
                    </div> <!-- container-fluid -->
                </div>
            </div>
        </form>
    </div>
</div>


<script src="<?php echo base_url()."assets/"; ?>/js/jquery/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('body').on('click', '.deleterow', function() {
        var table = $(this).closest('table');
        var rowCount = $("#sample_table1 tbody tr.main_tr1").length;
        // alert(rowCount);
        if (rowCount > 1) {
            if (confirm("Are you sure to remove row ?") == true) {
                $(this).closest("tr").remove();
                // rename_rows();
                // calculate_total(table);
            }
        }
    });

    $(document).on("change", ".checkInInput", function () {
        var shift = $(this).data("shift");   // e.g. "09:30"
        var checkIn = $(this).val();         // user entered check in
        var $lateText = $(this).siblings(".late-text");
        console.log("Shift:", shift, "Check-In:", checkIn);
        if (shift && checkIn) {
            var shiftTime = new Date("1970-01-01T" + shift + ":00");
            var checkInTime = new Date("1970-01-01T" + checkIn + ":00");

            if (checkInTime > shiftTime) {
                var diff = (checkInTime - shiftTime) / 60000; // minutes
                $lateText.text("Late by " + diff + " min");
            } else {
                $lateText.text("On Time");
            }
        }
    });

});



    document.addEventListener("DOMContentLoaded", function() {
    let today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

    // Select all elements with class 'dateInput' and set today's date
    document.querySelectorAll(".dateInput").forEach(function(input) {
        input.value = today;
    });
});
</script>