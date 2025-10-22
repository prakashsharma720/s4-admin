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
                <li class="breadcrumb-item"><?= $this->lang->line('attendance_list') ?>
                </li>
                <!-- <h5 class="mb-0"> <?= $this->lang->line('total_employee') ?> <strong><?= $totalemployees; ?></strong></h5> -->

            </ul>

        </div>
        <div class="page-header-right ms-auto d-flex align-items-center">
            <!-- Placeholder for additional actions -->
            <?php $this->load->view('layout/alerts'); ?>
            
            <div class="page-header-right ms-auto">

            

                <a href="<?php echo base_url(); ?>index.php/PayrollController/add/"
                    class="btn btn-icon btn-light-brand"><i class="feather feather-plus"></i>
                    <?= $this->lang->line('add_employee') ?></a>

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
                        <div class="table-responsive">
                            <!-- Attendance Date List -->
                            <table class="table table-hover" id="customerList">
                                <thead>
                                    <tr>
                                        <th><?= $this->lang->line('date') ?></th>
                                        <th><?= $this->lang->line('attendance_history') ?></th>
                                        <th><?= $this->lang->line('action') ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($AttendanceDates)) {
                                        foreach ($AttendanceDates as $obj) { ?>
                                    <tr>
                                        <td>
                                            <div
                                                class="wd-50 ht-50 bg-soft-primary text-primary lh-1 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date">
                                                <span
                                                    class="fs-18 fw-bold mb-1 d-block"><?= date("d", strtotime($obj['date'])); ?></span>
                                                <span
                                                    class="fs-10 fw-semibold text-uppercase d-block"><?= date("M", strtotime($obj['date'])); ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="me-4">
                                                <!-- <a href="javascript:void(0);" class="fw-bold text-truncate-1-line">Attendance History</a> -->
                                                <div class="d-flex">
                                                    <p class="fs-12 fw-medium text-muted mb-2"> <a
                                                            href="javascript:void(0);"
                                                            class="badge bg-soft-success text-success">Present:
                                                            <?= $obj['present_count'] ?></a>
                                                    </p>
                                                    <p class="fs-12 fw-medium text-muted mb-2 ms-2"> <a
                                                            href="javascript:void(0);"
                                                            class="badge bg-soft-danger text-danger">Absent:
                                                            <?= $obj['absent_count'] ?></a></p>
                                                    <p class="fs-12 fw-medium text-muted mb-2 ms-2"> <a
                                                            href="javascript:void(0);"
                                                            class="badge bg-soft-warning text-warning">Leave:
                                                            <?= $obj['leave_count'] ?></a></p>
                                                </div>
                                        </td>
                                        <!-- Display formatted date -->
                                        <td>
                                            <div class=" ht-50 hstack gap-2 ">
                                                <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                    data-bs-target="#attendanceModal<?php echo $obj['id']; ?>">
                                                    <i class="feather feather-eye"></i>
                                                </a>
                                                <a href="<?php echo base_url(); ?>index.php/PayrollController/edit/<?php echo $obj['date']; ?>"
                                                    class="avatar-text avatar-md" data-bs-toggle="tooltip" title=""
                                                    data-bs-original-title="Edit Attendance">
                                                    <i class="feather feather-edit-3"></i>
                                                </a>
                                                <div class="offcanvas offcanvas-end w-50" tabindex="-1"
                                                    id="attendanceModal<?= $obj['id']; ?>" style="visibility: visible;"
                                                    aria-modal="true" role="dialog">


                                                    <div
                                                        class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
                                                        <h2 class="fs-16 fw-bold text-truncate-1-line">Attendance
                                                            Details of
                                                            <span
                                                                class="ms-2 badge bg-soft-primary text-primary "><?= date("d M Y", strtotime($obj['date'])); ?></span>
                                                        </h2>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                    </div>
                                                    <div class="offcanvas-body">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th><?= $this->lang->line('sr_no') ?></th>
                                                                    <th><?= $this->lang->line('employee_name') ?>
                                                                    </th>
                                                                    <th><?= $this->lang->line('check_in') ?></th>
                                                                    <th><?= $this->lang->line('check_out') ?></th>
                                                                    <th><?= $this->lang->line('status') ?></th>
                                                                    <th> Late Arrival</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($obj['dateil'] as $index => $list) { ?>
                                                                <tr>
                                                                    <td><?= $index + 1; ?></td>
                                                                    <td><?= $list['emp_name'] ?></td>
                                                                    <td>
                                                                        <?php if ($list['status'] == 'Present') {
                                                                        echo date('H:i A', strtotime($list['check_in']));
                                                                        } else {
                                                                        echo "--";
                                                                        } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($list['status'] == 'Present') {
                                                                    echo date('H:i A', strtotime($list['check_out']));
                                                                    } else {
                                                                    echo "--";
                                                                    } ?>
                                                                    </td>

                                                                    <td>
                                                                        <?php if ($list['status'] == 'Absent') { ?>
                                                                        <span
                                                                            class="ms-2 badge bg-soft-danger text-danger "><?= $list['status']; ?></span>
                                                                        <?php } else if ($list['status'] == 'Present') { ?>
                                                                        <span
                                                                            class="ms-2 badge bg-soft-primary text-primary "><?= $list['status']; ?></span>
                                                                        <?php } else if ($list['status'] == 'Leave') { ?>
                                                                        <span
                                                                            class="ms-2 badge bg-soft-warning text-warning "><?= $list['status']; ?></span>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                    <?php
                                                                        if ($list['status'] == 'Present') {
                                                                        if (!empty($list['check_in']) && !empty($list['shift_intime'])) {
                                                                        $today = $list['date'];
                                                                        $shift_start = DateTime::createFromFormat('Y-m-d H:i:s', $today . ' ' . $list['shift_intime']);
                                                                        $check_in = DateTime::createFromFormat('Y-m-d H:i:s', $today . ' ' . $list['check_in']);
                                                                        if ($shift_start && $check_in) {
                                                                            if ($check_in > $shift_start) {
                                                                                $interval = $shift_start->diff($check_in);
                                                                                $lateMinutes = ($interval->h * 60) + $interval->i;
                                                                                echo "<span class='text-danger'>Late by {$lateMinutes} min</span>";
                                                                            } else {
                                                                                echo "<span class='text-success'>On Time</span>";
                                                                            }
                                                                        } else {
                                                                            echo date('h:i A', strtotime($list['check_in'])); // fallback
                                                                        }
                                                                    } else {
                                                                        echo date('h:i A', strtotime($list['check_in'])); // fallback
                                                                    }
                                                                } else {
                                                                    echo "--";
                                                                }
                                                                        ?>

                                                                    </td>



                                                                </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <!-- <div class="px-4 gap-2 d-flex align-items-center ht-80 border border-end-0 border-gray-2">
                                                        <a href="javascript:void(0);" class="btn btn-danger w-50" data-bs-dismiss="offcanvas">Cancel</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                    <?php }
                                    } else { ?>
                                    <tr>
                                        <td colspan="4" class="text-center">No Attendance Records</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="<?php echo base_url() . "assets/"; ?>js/jquery/jquery.min.js"></script>

    <script type="text/javascript">
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
    });



    document.addEventListener("DOMContentLoaded", function() {
        let today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

        // Select all elements with class 'dateInput' and set today's date
        document.querySelectorAll(".dateInput").forEach(function(input) {
            input.value = today;
        });
    });
    </script>