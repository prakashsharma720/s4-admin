<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Duralux Dashboard" />
    <meta name="keywords" content="dashboard, admin, template" />
    <meta name="author" content="flexilecode" />
    <title>Saral ERP</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo base_url()."assets/"; ?>/images/favicon.ico" type="image/x-icon" />

    <!-- CSS Files -->
    <?php $this->load->view('layout/css'); ?>
</head>

<body>
    <!-- Sidebar Navigation -->
    <?php $this->load->view('layout/navigation'); ?>

    <!-- Page Header -->
    <?php $this->load->view('layout/header'); ?>

    <!-- Main Content Wrapper -->
    <main class="nxl-container">
        <?= $contents ?>
        <!-- Footer -->
        <?php $this->load->view('layout/footer'); ?>
    </main>



    <!-- Additional Scripts or Customizer -->
    <div class="modal fade" id="addnotesmodal" tabindex="-1" data-bs-keyboard="false" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId"> Payroll Details </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <div class="emp-details p-3 border rounded bg-light shadow-sm"> -->
                    <!-- Employee and Month -->
                    <div class="row mb-3">
                        <div class="col-6">
                            <p class="mb-1"><strong>Employee:</strong></p>
                            <span id="emp_name" class="text-primary fw-semibold"></span>
                        </div>
                        <div class="col-6 text-end">
                            <p class="mb-1"><strong>Month:</strong></p>
                            <span id="month_name" class="badge bg-info text-white"></span>
                        </div>
                    </div>

                    <!-- Salary Details -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-white h-100">
                                <p class="mb-1 text-muted">Payable Days</p>
                                <h6 id="payable_days" class="mb-0 fw-bold text-success"></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-white h-100">
                                <p class="mb-1 text-muted">TDS</p>
                                <h6 id="tds" class="mb-0 fw-bold text-danger"></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-white h-100">
                                <p class="mb-1 text-muted">PF</p>
                                <h6 id="pf" class="mb-0 fw-bold text-danger"></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-white h-100">
                                <p class="mb-1 text-muted">Other Cuts</p>
                                <h6 id="other_cuts" class="mb-0 fw-bold text-danger"></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-white h-100">
                                <p class="mb-1 text-muted">ECS</p>
                                <h6 id="ecs" class="mb-0 fw-bold text-danger"></h6>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-2 border rounded bg-white h-100">
                                <p class="mb-1 text-muted">Total Salary</p>
                                <h5 id="total_salary" class="mb-0 fw-bold text-success"></h5>
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view('emailchecked'); ?>

    <?php $this->load->view('Lead_Module/Lead_Generation/editActivity'); ?>

    <?php $this->load->view('Lead_Module/Lead_Generation/markDoneModal'); ?>


    <div class="modal fade" id="addActivityModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Activity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="addActivityForm">
                        <input type="hidden" name="lead_id" id="add_activity_lead_id">
                        <input type="hidden" name="assign_to" id="add_activity_assign_to">

                        <div class="mb-3">
                            <?php
                                $activity_type = ['To-do', 'Email', 'Call', 'Meeting', 'Upload Document', 'Other'];
                            ?>
                            <div class="mb-4">
                                <label for="activity_type" class="form-label">Activity Type</label>
                                <select name="activity_type" class="form-control form-select select2 activityTypeSide"
                                    id="activityTypeSide2" data-select2-selector="default" required>
                                    <option value="">-- Select --</option>
                                    <?php foreach ($activity_type as $status): ?>
                                    <option value="<?= $status ?>"><?= $status ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Due Date<span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control" name="due_date"
                                    value="<?= !empty($due_date) ? date('Y-m-d\TH:i', strtotime($due_date)) : '' ?>"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Summary</label>
                                <textarea name="activity_summary" class="form-control" rows="3"
                                    placeholder="Enter note..."><?= $activity_summary ?? '' ?></textarea>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">Save Activity</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cancelActivityModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Cancel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to cancel this activity?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="button" class="btn btn-danger" id="confirmCancelActivityBtn">Yes, Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('to_do/update_status_modal'); ?>

    <?php $this->load->view('layout/js'); ?>
</body>

</html>