<style>
.view_offcanvas_width {
    width: 80% !important;
}
</style>

<div class="offcanvas offcanvas-end view_offcanvas_width" tabindex="-1" id="ViewLeave<?php echo $obj['id']; ?>">
    <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
        <h2 class="fs-16 fw-bold text-truncate-1-line">Lead Details</h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div
        class="py-3 px-4 d-flex justify-content-between align-items-center border-bottom border-bottom-dashed border-gray-5 bg-gray-100">
        <div>
            <span class="fw-bold text-dark">Status:</span>
            <span class="fs-11 fw-medium text-muted">
                <?php
                switch ($obj['lead_status']) {
                    case 'Qualify':
                        echo '<div class="badge bg-warning text-dark">Qualify</div>';
                        break;
                    case 'Won':
                        echo '<div class="badge bg-success text-white">Won</div>';
                        break;
                    case 'In Process':
                        echo '<div class="badge bg-primary text-white">In Process</div>';
                        break;
                    case 'Converted':
                        echo '<div class="badge bg-info text-white">Converted</div>';
                        break;
                    case 'Loss':
                        echo '<div class="badge bg-danger text-white">Loss</div>';
                        break;
                    default:
                        echo '<div class="badge bg-secondary text-white">Unknown</div>';
                }
                ?>
            </span>
        </div>

        <div>
            <span class="fw-bold text-dark">Lead Code:</span>
            <span class="fs-12 fw-bold text-primary c-pointer"><?= $obj['lead_code'] ?? '-' ?></span>
        </div>
    </div>

    <div class="offcanvas-body p-0">
        <div class="p-0">
            <div class="row p-3">
                <!-- <div class="col-lg-3 mb-4">
                <div><strong>Date</strong></div>
                <div class="text-wrap"><?= date('d-M-Y', strtotime($obj['date'])) ?></div>
            </div> -->

                <div class="col-lg-3 mb-4">
                    <div><strong>Services</strong></div>
                    <div class="text-wrap"><?= $obj['category_name'] ?></div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div><strong>Title</strong></div>
                    <div class="text-wrap"><?= $obj['lead_title'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div><strong>Contact Person</strong></div>
                    <div class="text-wrap"><?= $obj['contact_person'] ?></div>
                </div>

                <!-- <div class="col-lg-4 mb-4">
                <div><strong>Country</strong></div>
                <div class="text-wrap"><?= $obj['country'] ?></div>
            </div> -->

                <div class="col-lg-3 mb-4">
                    <div><strong>Email</strong></div>
                    <div class="text-wrap"><?= $obj['email'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div><strong>Mobile</strong></div>
                    <div class="text-wrap"><?= $obj['mobile'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div class="d-flex justify-content-between">
                        <strong>Location</strong>
                        <span class="text-primary"><strong><a class="text-primary" href="<?= $obj['map_link'] ?>"
                                    target="_blank">View On
                                    Map</a></strong></span>
                    </div>
                    <div class="text-wrap"><?= $obj['current_location'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div><strong>Lead Assigned To</strong></div>
                    <div class="text-wrap">
                        <?= !empty($obj['employee_name']) ? $obj['employee_name'] : 'Unknown Employee' ?>
                    </div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div><strong>Priority</strong></div>
                    <div class="text-wrap"><?= $obj['leads_priority'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div><strong>Region</strong></div>
                    <div class="text-wrap"><?= $obj['region_selection'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div class="row p-0 border-0">
                        <div class="col-6">
                            <div><strong>Site Photo</strong></div>
                            <div class="text-wrap">
                                <a href="<?= $obj['lead_site_file'] ?>" target="_blank">View Document</a>
                            </div>
                        </div>
                        <div class="col-6">
                            <?php 
                                $lead_site_file = isset($obj['lead_site_file']) ? $obj['lead_site_file'] : '';
                                $preview_src = !empty($lead_site_file) 
                                    ? $lead_site_file
                                    : base_url('assets/images/icons/1.png');
                            ?>
                            <div class="col-6">
                                <div class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded"
                                    style="border: 1px #80808029 solid !important;">
                                    <a href="<?= $preview_src ?>" target="_blank">
                                        <img src="<?= $preview_src ?>" class="upload-pic img-fluid rounded h-100 w-100"
                                            alt="Preview">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-4">

                </div>


                <!-- <div class="col-lg-3 mb-4">
                    <div><strong>Lead Source</strong></div>
                    <div class="text-wrap"><?= $obj['lead_source'] ?></div>
                </div> -->

                <!-- <div class="col-lg-4 mb-4">
                <div><strong>Description</strong></div>
                <div class="text-wrap"><?= $obj['work_description'] ?></div>
            </div> -->
            </div>

            <div class="offcanvas-header p-0">
                <div class="w-100 bg-light p-3 rounded-0">
                    <h2 class="fs-16 fw-bold text-truncate-1-line mb-0">Reference Detail</h2>
                </div>
            </div>

            <div class="row p-3">
                <div class="col-lg-3 mb-4">
                    <div><strong>Firm Type</strong></div>
                    <div class="text-wrap"><?= $obj['lead_architect'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div><strong>Firm Name</strong></div>
                    <div class="text-wrap"><?= $obj['firm_name'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div><strong>Reference Mobile No.</strong></div>
                    <div class="text-wrap"><?= $obj['mediator_mobile_no'] ?></div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div><strong>Reference Address</strong></div>
                    <div class="text-wrap"><?= $obj['mediator_address'] ?></div>
                </div>
            </div>
        </div>
        <div class="drive-comments" id="viewActivitiesSection<?php echo $obj['id']; ?>"
            data-lead-id="<?php echo $obj['id']; ?>">
            <div
                class="px-4 py-2 fw-bold text-dark border-top border-bottom  bg-gray-100 d-flex justify-content-between align-items-center">
                <h2 class="fs-16 fw-bold text-truncate-1-line mb-0">Activities</h2>
                <button type="button" class="btn btn-primary btnAddActivityOne"
                    data-lead-id="<?php echo $obj['id']; ?>">Add
                    New Activity</button>
            </div>
            <div class="p-4">
                <ul class="list-unstyled activity-feed">
                    <?php if (!empty($activities)): ?>
                    <?php foreach ($activities as $obj1): ?>
                    <li class="d-flex justify-content-between feed-item feed-item-success">
                        <div class="row p-0 border-0 w-100">
                            <div class="col-lg-6">
                                <span class="text-truncate-1-line">
                                    <strong><?= !empty($obj1['employee_name']) ? $obj1['employee_name'] : 'Unknown Employee' ?></strong>
                                    <small>On: <?= date('M d, h:i A', strtotime($obj1['due_date'])) ?></small>
                                    <!-- <strong><?= $obj['id'] ?></strong> -->
                                </span>

                                <span class="text-truncate-1-line">
                                    <?php if (!empty($obj1['document_file'])): ?>
                                    <strong><?= $obj1['activity_type'] ?></strong>
                                    <a href="<?= $obj1['document_file'] ?>" target="_blank">
                                        <strong>(View Document)</strong>
                                    </a>
                                    <?php else: ?>
                                    <strong><?= $obj1['activity_type'] ?></strong>
                                    <?php endif; ?>
                                </span>

                                <div class="fs-12 text-muted mt-1"><Strong>Original Notes</Strong></div>
                                <div class="fs-12 text-muted mt-1 text-wrap"><?= $obj1['activity_summary'] ?></div>
                                <!-- <div class="fs-11 text-muted">Created at: <?= $obj['created_at'] ?></div> -->
                            </div>

                            <div class="col-lg-6">
                                <strong>Feedback:</strong>

                                <?php if (empty($obj1['activity_feedback'])): ?>
                                <!-- Agar feedback nahi hai -->
                                <div class="hstack gap-2 justify-content-start mt-4"
                                    id="lead_feedbackAction<?= $obj1['id'] ?>">
                                    <a href="javascript:void(0)" onclick="openFeedbackFormLead(<?= $obj1['id'] ?>)"
                                        class="avatar-text avatar-md">
                                        <i class="feather feather-edit"></i>
                                    </a>
                                </div>

                                <form action="<?= site_url('Leads/save_feedback/' . $obj1['id']) ?>" method="post"
                                    id="lead_form_feedback<?= $obj1['id'] ?>" style="display: none;">

                                    <input type="hidden" name="lead_id" value="<?= $obj1['lead_id'] ?>">

                                    <div class="row p-0 border-0 mt-2 align-items-stretch">
                                        <div class="col-lg-8">
                                            <textarea name="activity_feedback" class="form-control h-100"
                                                placeholder="Enter Your Feedback" required></textarea>
                                        </div>
                                        <div class="col-lg-4 d-flex flex-column">
                                            <button type="submit" class="btn btn-primary w-100 mb-2 flex-fill">Add
                                                Feedback</button>
                                            <button type="button" class="btn btn-danger w-100 flex-fill"
                                                onclick="cancelFeedbackFormLead(<?= $obj1['id'] ?>)">Cancel</button>
                                </form>

                                <?php else: ?>
                                <!-- Agar feedback already hai -->
                                <div class="py-2 text-wrap">
                                    <strong><?= nl2br(htmlspecialchars($obj1['activity_feedback'])) ?> </strong>
                                    <small>
                                        <?= date('M d, h:i A', strtotime($obj1['feedback_created_at'])) ?>
                                    </small>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                    <?php else: ?>
                    <li>No activities found for this lead.</li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>

        <div class="add-activity" id="addActivitySection<?php echo $obj['id']; ?>"
            data-lead-id="<?php echo $obj['id']; ?>" style="display: none;">
            <div
                class="px-4 py-2 fw-bold text-dark border-top border-bottom  bg-gray-100 d-flex justify-content-between align-items-center">
                <h2 class="fs-16 fw-bold text-truncate-1-line mb-0">Add Activity</h2>
                <button type="button" class="btn btn-primary btnViewActivityOne"
                    data-lead-id="<?php echo $obj['id']; ?>">View
                    Activity</button>
            </div>
            <div class="row p-0 border-0">
                <form action="<?= base_url('index.php/Leads/save_activity') ?>" method="post"
                    class="form-horizontal role form" enctype="multipart/form-data">

                    <input type="hidden" name="lead_id" value="<?php echo $obj['id']; ?>">

                    <div id="activityContainer3">
                        <div class="row activityRow border-0">
                            <?php
							$activity_type = ['To-do', 'Email', 'Call', 'Meeting', 'Upload Document', 'Other'];
							?>
                            <div class="col-lg-4 mb-4">
                                <label for="activity_type" class="form-label">Activity Type</label>
                                <select name="activity_type" class="form-control form-select select2 activityTypeSide"
                                    id="activityTypeSide2" data-select2-selector="default" required>
                                    <option value="">-- Select --</option>
                                    <?php foreach ($activity_type as $status): ?>
                                    <option value="<?= $status ?>"><?= $status ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <label class="form-label">Due Date<span class="text-danger">*</span></label>
                                <input type="datetime-local" class="form-control" name="due_date"
                                    value="<?= !empty($due_date) ? date('Y-m-d\TH:i', strtotime($due_date)) : '' ?>"
                                    required>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <label class="form-label">Assigned To <span class="text-danger">*</span></label>
                                <!-- <?= form_dropdown(
									'assign_to',
									$employees,
									set_value('assign_to'),
									'class="form-select form-control" data-select2-selector="default" required="required"'
								) ?> -->

                                <select name="assign_to" class="form-control select2" data-select2-selector="default">
                                    <option value=""><?= $this->lang->line('select_employee') ?></option>
                                    <?php if (!empty($employees)): ?>
                                    <?php foreach ($employees as $value): ?>
                                    <option value="<?= $value['id'] ?>"
                                        <?= ($value['id'] == @$filtered_value['assign_to']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($value['name']) ?>
                                    </option>
                                    <?php endforeach; ?>
                                    <?php else: ?>
                                    <option value=""><?= $this->lang->line('no_result') ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-lg-4 mb-4" id="documentField3" style="display:none;">
                                <label class="form-label">Upload Document</label>
                                <input type="file" name="document_file" class="form-control">
                                <?php if (!empty($activity['document_file'])): ?>
                                <p>Current File: <strong><?= $activity['document_file'] ?></strong></p>
                                <input type="hidden" name="existing_file" value="<?= $activity['document_file'] ?>">
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-4 mb-4" id="otherField3" style="display:none;">
                                <label class="form-label">Please Specify</label>
                                <input type="text" name="other_text" class="form-control"
                                    placeholder="Enter activity details">
                            </div>

                            <div class="col-lg-8 mb-4">
                                <label class="form-label">Summary</label>
                                <textarea name="activity_summary" class="form-control" rows="3"
                                    placeholder="Enter note..."><?= $activity_summary ?? '' ?></textarea>
                            </div>

                            <div class="col-lg-4 mb-4 align-items-end d-flex">
                                <button type="submit" class="btn btn-primary">Add Activity</button>
                            </div>

                        </div>
                    </div>


                </form>
                <!-- <?php echo form_close(); ?> -->
            </div>
        </div>
    </div>





    <!-- <div class="px-4 gap-2 d-flex align-items-center ht-80 border border-end-0 border-gray-2">
        <a href="javascript:void(0);" class="btn btn-danger w-50" data-bs-dismiss="offcanvas">Cancel</a>
    </div> -->
</div>

<script>
function openFeedbackFormLead(id) {
    document.getElementById("lead_form_feedback" + id).style.display = "block";
    document.getElementById("lead_feedbackAction" + id).style.display = "none";
}

function cancelFeedbackFormLead(id) {
    document.getElementById("lead_form_feedback" + id).style.display = "none";
    document.getElementById("lead_feedbackAction" + id).style.display = "block";
}
</script>