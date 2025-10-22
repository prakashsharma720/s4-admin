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
                <li class="breadcrumb-item"><?= $this->lang->line('edit_attendance') ?>
                </li>
            </ul>
        </div>
        <!-- Placeholder for additional actions -->
        <?php $this->load->view('layout/alerts'); ?>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">

            </div>

            <!-- Mobile Toggle -->
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <form class="form-horizontal" role="form" method="post"
            action="<?php echo base_url(); ?>index.php/PayrollController/update_attendance">
            <!-- <input type="hidden" name="date" value="<?php echo $attendanceRecords[0]['date']; ?>"> -->
            <div class="container-fluid">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title"> <?= $this->lang->line('edit_attendance') ?> </h3>
                        <div class="page-header-right ms-auto d-flex align-items-center">
                            <div class="row mb-4 align-items-center">
                                <div class="col-lg-4">
                                    <label for="dateofBirth" class="fw-semibold"><?= $this->lang->line('attendance_date') ?>: </label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-calendar"></i></div>
                                        <input class="form-control" id="startDate" placeholder="Pick date of birth" value="<?php echo date('d-m-Y',strtotime($attendanceRecords[0]['date'])); ?>"
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
                            <div class="col-lg-12">
                                <div class="card stretch stretch-full">
                                    <div class="card-body p-0">   
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr class="border-top">
                                                        <th><?= $this->lang->line('employee_name') ?></th>
                                                        <th><?= $this->lang->line('check_in') ?></th>
                                                        <th><?= $this->lang->line('check_out') ?></th>
                                                        <th><?= $this->lang->line('status') ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($attendanceRecords as $record) { ?>
                                                        <tr>
                                                            <td><?php echo $record['emp_name']; ?>
                                                                <input type="hidden" name="emp_id[<?php echo $record['id']; ?>]"
                                                                    value="<?php echo $record['emp_id']; ?>" class="form-control" readonly>
                                                            </td>
                                                            <td>
                                                                <input type="time" name="check_in[<?php echo $record['id']; ?>]"
                                                                    value="<?php echo $record['check_in']; ?>" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="time" name="check_out[<?php echo $record['id']; ?>]"
                                                                    value="<?php echo $record['check_out']; ?>" class="form-control">
                                                            </td>
                                                            <td>
                                                                <select class="form-control" data-select2-selector="status" name="status[]">
                                                                    <option value="Present" <?php if ($record['status'] == 'Present')
                                                                        echo 'selected'; ?> data-bg="bg-primary" selected>Present</option>
                                                                    <option value="Absent" <?php if ($record['status'] == 'Absent')
                                                                        echo 'selected'; ?> data-bg="bg-danger">Absent</option>
                                                                    <option value="Leave" <?php if ($record['status'] == 'Leave')
                                                                        echo 'selected'; ?> data-bg="bg-warning">On Leave</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="row ">
                            <div class="col-md-12 align-items-center" >
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="feather-user-plus me-2"></i>
                                    <span> <?= $this->lang->line('update_attendance') ?></span>
                                </button> 
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>


<script src="<?php echo base_url() . "assets/"; ?>plugins/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('body').on('click', '.deleterow', function () {
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
</script>