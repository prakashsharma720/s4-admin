<style>
.hidden-payslip {
    position: absolute;
    left: -9999px;
    /* pushes content outside visible area */
    top: 0;
    height: auto;
    width: auto;
}

.payslip-container {
    background: #fff;
    border: 1px solid #e5e5e5;
    border-radius: 12px;
    padding: 20px 30px;
    max-width: 900px;
    margin: auto;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    font-family: "Segoe UI", Tahoma, sans-serif;
}

.payslip-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 15px;
    margin-bottom: 20px;
}

.payslip-header img {
    max-width: 180px;
}

.company-info {
    text-align: right;
    font-size: 13px;
    color: #555;
}

.sub-header {
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    margin: 15px 0;
    color: #333;
}

.details-table,
.earnings-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 25px;
}

.details-table td,
.earnings-table td {
    padding: 10px;
    font-size: 14px;
    border: 1px solid #e0e0e0;
}

.earnings-table th {
    text-align: center;
    background: #f7f9fc;
    padding: 10px;
    font-size: 15px;
    border: 1px solid #e0e0e0;
}

.net-salary {
    background: #f3f7ff;
    font-weight: bold;
    font-size: 16px;
    padding: 12px;
    text-align: right;
    border-radius: 8px;
}

.footer-note {
    font-size: 12px;
    color: #777;
    margin-top: 30px;
}

.signatory {
    text-align: right;
    margin-top: 40px;
    font-size: 14px;
    font-weight: bold;
}
</style>

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
            <div class="page-header-right ms-auto  d-flex gap-2">
                <?php $qs = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? ('?'.$_SERVER['QUERY_STRING']) : ''; ?>
                <a href="<?php echo base_url('index.php/PayrollController/export'.$qs); ?>" class="btn btn-primary"
                    id="exportCsvAll">
                    <i class="feather-download me-2"></i>
                    <span><?= $this->lang->line('export_data') ?></span>
                </a>

                <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" data-toggle="tooltip" title="Filter">
                    <i class="feather-filter"></i>
                </a>
                <a class="btn btn-icon btn-light-brand" data-bs-toggle="offcanvas" data-bs-target="#viewPayroll"><i
                        class="feather feather-plus"></i> <?= $this->lang->line('add_employee') ?></a>

                <!-- Mobile Toggle -->
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('leave-module/component/attendancefilter'); ?>


    <div class="main-content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"></div>

                    <div class="table-responsive" style="width:100%">
                        <table id="example1" class="table table-bordered " style="width:100%">
                            <thead>
                                <tr>
                                    <th> <?= $this->lang->line('sr_no') ?></th>
                                    <th> <?= $this->lang->line('employee_name') ?></th>
                                    <th> <?= $this->lang->line('month') ?></th>
                                    <th> <?= $this->lang->line('payable_days') ?></th>
                                    <th> <?= $this->lang->line('gross_salary') ?></th>
                                    <th> <?= $this->lang->line('deductions') ?></th>
                                    <th> <?= $this->lang->line('net_salary') ?></th>
                                    <th><?= $this->lang->line('status') ?></th>
                                    <th><?= $this->lang->line('action') ?></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($salaries)) {
                                    $i = 1;
                                    foreach ($salaries as $obj) { ?>
                                <tr>
                                    <td><?= $i ?></td>

                                    <td><?= $obj['emp_name'] ?></td>
                                    <td><?= $obj['month_name'].'-'. $obj['year'] ?></td>
                                    <td><?= $obj['payable_days'] ?></td>
                                    <td><?= $obj['total_net_salary'] ?></td>
                                    <td><?= $obj['tds'] + $obj['pf'] + $obj['other_cuts'] + $obj['ecs'] ?></td>
                                    <td><?= $obj['total_salary'] ?></td>
                                    <td><?= $obj['status'] ?></td>
                                    <td class="d-flex">
                                        <a href="javascript:void(0);" class="avatar-text avatar-md me-1  add-notes"
                                            data-emp_name="<?= $obj['emp_name'] ?>"
                                            data-month="<?= $obj['month_name'] . '-' . $obj['year'] ?>"
                                            data-days="<?= $obj['payable_days'] ?>" data-tds="<?= $obj['tds'] ?>"
                                            data-pf="<?= $obj['pf'] ?>" data-cuts="<?= $obj['other_cuts'] ?>"
                                            data-ecs="<?= $obj['ecs'] ?>" data-salary="<?= $obj['total_salary'] ?>"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                                            data-bs-original-title="View Details">
                                            <i class="feather feather-eye"></i>
                                        </a>

                                        <button class="avatar-text avatar-md downloadBtn" data-bs-toggle="tooltip"
                                            title="Download Payslip" data-payslip-id="<?= $obj['id'] ?>"><i
                                                class="feather feather-download"></i> </button>

                                        <div id="payslip_<?= $obj['id'] ?>" class="hidden-payslip">
                                            <div class="payslip-container">
                                                <!-- Header -->
                                                <div class="payslip-header">
                                                    <div>
                                                        <img src="<?php echo base_url(); ?>uploads/user_media/cropped.png"
                                                            alt="Company Logo">
                                                    </div>
                                                    <div class="company-info">
                                                        <strong>MuskOwl LLP</strong><br>
                                                        Pacific Hills, Debari, Udaipur, Rajasthan, 313001 India <br>
                                                        info@muskowl.com | www.muskowl.com <br>
                                                        +91 9352842625
                                                    </div>
                                                </div>
                                                <div>
                                                    <h4>Muskowl LLP</h4>
                                                </div>
                                                <!-- Title -->
                                                <div class="sub-header">
                                                    Salary Slip for <?= $obj['month_name'] ?> <?= $obj['year'] ?>
                                                </div>
                                                <!-- Employee & Bank Details -->
                                                <table class="details-table">
                                                    <tr>
                                                        <td><b>Employee ID:</b> <?= $obj['employee_code'] ?></td>
                                                        <td><b>Name:</b> <?= $obj['emp_name'] ?></td>
                                                        <td><b>Designation:</b> <?= $obj['designation_name'] ?></td>
                                                        <td><b>Department:</b> <?= $obj['department_name'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Bank:</b> <?= $obj['bank_name'] ?></td>
                                                        <td><b>Branch:</b> <?= $obj['branch_name'] ?></td>
                                                        <td><b>Account No.:</b> <?= $obj['account_number'] ?></td>
                                                        <td><b>IFSC:</b> <?= $obj['ifsc_code'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Gross Salary:</b> ₹<?= $obj['total_net_salary'] ?></td>
                                                        <td><b>Net Salary:</b> ₹<?= $obj['total_salary'] ?></td>
                                                        <td><b>PAN:</b> <?= $obj['pan_no'] ?></td>
                                                        <td><b>Processing Month:</b> <?= $obj['month_name'] ?>
                                                            <?= $obj['year'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Total Days:</b> <?= $obj['total_days'] ?></td>
                                                        <td><b>Paid Days:</b> <?= $obj['payable_days'] ?></td>
                                                        <td><b>Leaves:</b> <?= $obj['absent_days'] ?></td>
                                                        <td></td>
                                                    </tr>
                                                </table>

                                                <!-- Earnings & Deductions -->
                                                <table class="earnings-table">
                                                    <tr>
                                                        <th colspan="2">Earnings</th>
                                                        <th colspan="2">Deductions</th>
                                                    </tr>
                                                    <tr>
                                                        <td>Basic</td>
                                                        <td>₹<?= $obj['salary'] ?></td>
                                                        <td>TDS</td>
                                                        <td>₹<?= $obj['tds'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>HRA</td>
                                                        <td>₹<?= $obj['hra'] ?></td>
                                                        <td>PF</td>
                                                        <td>₹<?= $obj['pf'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Medical Allowance</td>
                                                        <td>₹<?= $obj['m_allowance'] ?></td>
                                                        <td>ECS</td>
                                                        <td>₹<?= $obj['ecs'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Other Allowances</td>
                                                        <td>₹<?= $obj['o_allowance'] ?></td>
                                                        <td>Other Cuts</td>
                                                        <td>₹<?= $obj['other_cuts'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Conveyance Allowance</td>
                                                        <td>₹<?= $obj['c_allowance'] ?></td>
                                                        <td><b>Total Deduction</b></td>
                                                        <?php $total_deduction
                                                            = $obj['tds'] + $obj['pf'] + $obj['other_cuts'] + $obj['ecs'] ?>
                                                        <td><b>₹<?= number_format($total_deduction, 2) ?></b></td>
                                                    </tr>
                                                    <tr>
                                                        <td><b>Total Earnings</b></td>
                                                        <td><b>₹<?= $obj['total_net_salary'] ?></b></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                </table>

                                                <!-- Net Salary -->
                                                <div class="net-salary">
                                                    Net Payment: ₹<?= $obj['total_salary'] ?>
                                                </div>

                                                <!-- Footer -->
                                                <div class="footer-note">
                                                    * Net salary payable is subject to deductions as per Income Tax Law.
                                                </div>

                                                <div class="signatory">
                                                    For MuskOwl LLP <br><br>
                                                    Authorized Signatory
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                </tr>
                                <?php $i++;
                                    }
                                } else { ?>
                                <tr>
                                    <td colspan="100">
                                        <h5 style="text-align: center;"> <?= $this->lang->line('no_records') ?>
                                        </h5>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="viewPayroll"
                        style="visibility: visible;" aria-modal="true" role="dialog">
                        <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
                            <h3 class="card-title mb-0"> <?= $this->lang->line('attendance_calculation') ?></h3>
                            </h2>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <form id="salaryForm">
                                <div class="row mb-3">
                                    <div class="col-md-4">
                                        <label
                                            class="control-label fw-semibold"><?= $this->lang->line('select_month') ?></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-calendar"></i></div>
                                            <select class="form-control" id="month_id" name="month_id"
                                                required="required">
                                                <option value=""><?= $this->lang->line('select_employee') ?></option>
                                                <?php foreach($months as $month){ ?>
                                                <option value="<?= $month['id'] ?>"><?= $month['month_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                            <!-- <?php echo form_dropdown('month_id', $months, '', 'id="month_id" required="required" class="form-control"'); ?> -->
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label
                                            class="control-label fw-semibold"><?= $this->lang->line('select_employee') ?></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="feather-user"></i></div>
                                            <select class="form-control" id="emp_id" name="emp_id" required="required">
                                                <option value=""><?= $this->lang->line('select_employee') ?></option>
                                                <?php foreach($employees as $emp){ ?>
                                                <option value="<?= $emp['id'] ?>"><?= $emp['name'] ?></option>
                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label fw-semibold " style="visibility: hidden;">
                                            <?= $this->lang->line('select_employee') ?></label>
                                        <button type="submit" class="btn btn-primary w-60">
                                            <b><?= $this->lang->line('calculate') ?></b>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- Display Results -->
                            <div id="salaryResult">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- container-fluid -->
</div>
<script src="<?php echo base_url() . "assets/"; ?>js/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<!-- Display Results -->
<script>
$(document).ready(function() {

    $(document).on("click", ".add-notes", function() {
        // Get values from button
        $("#emp_name").text($(this).data("emp_name"));
        $("#month_name").text($(this).data("month"));
        $("#payable_days").text($(this).data("days"));
        $("#tds").text($(this).data("tds"));
        $("#pf").text($(this).data("pf"));
        $("#other_cuts").text($(this).data("cuts"));
        $("#ecs").text($(this).data("ecs"));
        $("#total_salary").text($(this).data("salary"));

        // Show modal
        $("#addnotesmodal").modal("show");

        // Toggle buttons
        $("#btn-n-save").hide();
        $("#btn-n-add").show();
    });



    // Fetch and calculate salary
    $("#salaryForm").submit(function(e) {
        e.preventDefault();
        let month_id = $("#month_id").val();
        let emp_id = $("#emp_id").val();

        $.ajax({
            url: "<?= base_url('index.php/PayrollController/calculate_salary') ?>",
            type: "POST",
            data: {
                month_id: month_id,
                emp_id: emp_id
            },
            success: function(response) {
                $("#salaryResult").html(response);
            }
        });
    });


    // Deduction inputs affect only Final Salary
    // Deduction inputs affect only Final Salary
    $(document).on("input", "#tds,#payable_days,#pf,#ecs,#other_cuts", function() {
        calculateFinalSalary();
    });

    function calculateFinalSalary() {
        let payableDays = parseFloat($("#payable_days").val()) || 0;
        let totalSalary = parseFloat($("#total_salary").val()) || 0;
        let totalDays = parseInt($("#total_days").val()) || 30;

        let tdsInput = $("#tds").val().trim();
        let otherCuts = parseFloat($("#other_cuts").val()) || 0;
        let basic_salary = parseFloat($("#basic_salary").val()) || 0;
        let ecs_amount_per_day = parseFloat($("#ecs_amount_per_day").val()) || 0;

        // ✅ Convert TDS input (accept "1" or "1%")
        let tdsPercent = parseFloat(tdsInput.replace("%", "")) || 0;

        // ✅ Salary per day & Gross salary (based on payable days)
        let salaryPerDay = totalSalary / totalDays;
        let grossSalary = salaryPerDay * payableDays;
        grossSalary = parseFloat(grossSalary.toFixed(2));

        // ✅ PF & ECS Calculations
        let pf_amount_per_day = (basic_salary * 0.12) / totalDays;
        let pf_amount = pf_amount_per_day * payableDays;
        let ecs_amount = ecs_amount_per_day * payableDays;

        // ✅ TDS calculation (percentage of gross)
        let tdsAmount = (grossSalary * tdsPercent) / 100;

        // ✅ Subtract TDS from Gross to get new gross after TDS
        let grossAfterTds = grossSalary - tdsAmount;

        // ✅ Total deductions (PF + ECS + Other Cuts)
        let totalDeductions = pf_amount + ecs_amount + otherCuts + tdsAmount;

        // ✅ Final Net Payable Salary
        let finalSalary = grossSalary - totalDeductions;

        // Round off values
        tdsAmount = parseFloat(tdsAmount.toFixed(2));
        grossAfterTds = parseFloat(grossAfterTds.toFixed(2));
        totalDeductions = parseFloat(totalDeductions.toFixed(2));
        finalSalary = parseFloat(finalSalary.toFixed(2));

        // ✅ Update UI
        $("#gross_salary").val(grossSalary.toFixed(2));
        $("#pf").val(pf_amount.toFixed(2));
        $("#ecs").val(ecs_amount.toFixed(2));
        $("#total_deductions").val(totalDeductions.toFixed(2));
        $("#final_salary").val(finalSalary);

        // Optional: show computed TDS value somewhere if needed
        console.log("TDS Amount:", tdsAmount);
    }



    // Prevent entering more than total days
    $("#payable_days").on("change", function() {
        let totalDays = parseInt($("#total_days").val()) || 30;
        let enteredDays = parseInt($(this).val()) || 0;

        if (enteredDays > totalDays) {
            alert("Payable days cannot exceed total days in the month!");
            $(this).val(totalDays);
        }
        calculateFinalSalary();
    });


    // Save salary after editing
    $(document).on("click", "#saveSalary", function() {
        var emp_id = $("#emp_id").val();
        var month_id = $("#month_id").val();
        var total_days = $("#total_days").val();
        var payable_days = $("#payable_days").val();
        var absent_days = $("#absent_days").val();
        var gross_salary = $("#gross_salary").val();
        var tds = $("#tds").val();
        var pf = $("#pf").val();
        var other_cuts = $("#other_cuts").val();
        var ecs = $("#ecs").val();
        var total_salary = $("#final_salary").val();

        $.ajax({
            url: "<?= base_url('index.php/PayrollController/save_salary') ?>",
            type: "POST",
            data: {
                emp_id: emp_id,
                month_id: month_id,
                total_days: total_days,
                payable_days: payable_days,
                absent_days: absent_days,
                gross_salary: gross_salary,
                tds: tds,
                pf: pf,
                other_cuts: other_cuts,
                ecs: ecs,
                total_salary: total_salary
            },
            success: function(response) {
                alert("Salary saved successfully!");
                window.location.href =
                    "<?= base_url('index.php/PayrollController/show_calculation') ?>";
            }
        });
    });
});
</script>

<script>
$(document).on("click", ".downloadBtn", function() {
    var payslipId = $(this).data("payslip-id");
    var element = document.getElementById("payslip_" + payslipId);

    html2canvas(element, {
        scale: 2,
        useCORS: true
    }).then(canvas => {
        const {
            jsPDF
        } = window.jspdf;
        const pdf = new jsPDF("p", "mm", "a4");

        const imgData = canvas.toDataURL("image/png");
        const imgProps = pdf.getImageProperties(imgData);
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

        pdf.addImage(imgData, "PNG", 0, 0, pdfWidth, pdfHeight);
        pdf.save("payslip_" + payslipId + ".pdf");
    }).catch(err => {
        console.error("Error generating PDF:", err);
    });
});
</script>