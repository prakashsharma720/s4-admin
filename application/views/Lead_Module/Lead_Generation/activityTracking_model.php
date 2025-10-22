<style>
    .activity_show {
        height: 40vh;
    }

    .offcanvas_width {
        width: 70% !important;
    }
</style>

<div class="offcanvas offcanvas-end offcanvas_width" tabindex="-1" id="ViewTracking<?= $obj['id']; ?>">
    <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
        <h2 class="fs-16 fw-bold text-truncate-1-line">Activity Tracking <span
                class="fw-bold text-primary"><?= $obj['lead_code'] ?? '-' ?></span> Details</h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="drive-comments" id="viewActivitiesSectionTwo<?= $obj['id']; ?>" data-lead-id="<?= $obj['id']; ?>">
            <div
                class="px-4 py-2 fw-bold text-dark border-top border-bottom  bg-gray-100 d-flex justify-content-between align-items-center">
                <h2 class="fs-16 fw-bold text-truncate-1-line mb-0">Activities</h2>
                <button type="button" class="btn btn-primary btnAddActivity" data-lead-id="<?= $obj['id']; ?>">Add New
                    Activity</button>
            </div>
            <div class="p-4 overflow-scroll">
                <ul class="list-unstyled activity-feed">
                    <?php if (!empty($activities)): ?>
                        <?php foreach ($activities as $act): ?>
                            <li class="d-flex justify-content-between feed-item feed-item-success">
                                <div class="row p-0 border-0 w-100">
                                    <div class="col-lg-6">
                                        <span class="text-truncate-1-line">
                                            <strong><?= !empty($act['employee_name']) ? $act['employee_name'] : 'Unknown Employee' ?></strong>
                                            <small>On: <?= date('M d, h:i A', strtotime($act['due_date'])) ?></small>
                                            <!-- <strong><?= $act['id'] ?></strong> -->
                                        </span>

                                        <span class="text-truncate-1-line">
                                            <?php if (!empty($act['document_file'])): ?>
                                                <strong><?= $act['activity_type'] ?></strong>
                                                <a href="<?= $act['document_file'] ?>" target="_blank">
                                                    <strong>(View Document)</strong>
                                                </a>
                                            <?php else: ?>
                                                <strong><?= $act['activity_type'] ?></strong>
                                            <?php endif; ?>
                                        </span>

                                        <div class="fs-12 text-muted mt-1"><Strong>Original Notes</Strong></div>
                                        <div class="fs-12 text-muted mt-1"><?= $act['activity_summary'] ?></div>
                                        <!-- <div class="fs-11 text-muted">Created at: <?= $act['created_at'] ?></div> -->
                                    </div>
                                    <!-- <div class="col-lg-6">
                                <strong>Feedback:</strong>
                                <div class="hstack gap-2 justify-content-start mt-4"
                                    id="feedbackAction<?= $act['id'] ?>">
                                    <a href="javascript:void(0)" onclick="openFeedbackForm(<?= $act['id'] ?>)"
                                        class="avatar-text avatar-md">
                                        <i class="feather feather-edit"></i>
                                    </a>
                                </div>
                                <form action="<?= site_url('Leads/save_feedback/' . $act['id']) ?>" method="post"
                                    id="form_feedback<?= $act['id'] ?>" style="display: none;">

                                    <input type="hidden" name="lead_id" value="<?= $act['lead_id'] ?>">

                                    <div class="row p-0 border-0 align-items-end">
                                        <div class="col-lg-8">
                                            <textarea name="activity_feedback" class="form-control"
                                                placeholder="Enter Your Feedback"></textarea>
                                        </div>
                                        <div class="col-lg-4">
                                            <button type="submit" class="btn btn-primary">Add Feedback</button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->

                                    <div class="col-lg-6">
                                        <strong>Feedback:</strong>

                                        <?php if (empty($act['activity_feedback'])): ?>
                                            <!-- Agar feedback nahi hai -->
                                            <div class="hstack gap-2 justify-content-start mt-4"
                                                id="feedbackAction<?= $act['id'] ?>">
                                                <a href="javascript:void(0)" onclick="openFeedbackForm(<?= $act['id'] ?>)"
                                                    class="avatar-text avatar-md">
                                                    <i class="feather feather-edit"></i>
                                                </a>
                                            </div>

                                            <form action="<?= site_url('Leads/save_feedback/' . $act['id']) ?>" method="post"
                                                id="form_feedback<?= $act['id'] ?>" style="display: none;">

                                                <input type="hidden" name="lead_id" value="<?= $act['lead_id'] ?>">

                                                <div class="row p-0 border-0 mt-2 align-items-stretch">
                                                    <div class="col-lg-8">
                                                        <textarea name="activity_feedback" class="form-control h-100"
                                                            placeholder="Enter Your Feedback" required></textarea>
                                                    </div>
                                                    <div class="col-lg-4 d-flex flex-column">
                                                        <button type="submit" class="btn btn-primary mb-2 w-100 flex-fill">Add
                                                            Feedback</button>
                                                        <button type="button" class="btn btn-danger w-100 flex-fill"
                                                            onclick="cancelFeedbackForm(<?= $act['id'] ?>)">Cancel</button>
                                            </form>

                                        <?php else: ?>
                                            <!-- Agar feedback already hai -->
                                            <div class="py-2">
                                                <strong><?= nl2br(htmlspecialchars($act['activity_feedback'])) ?> </strong>
                                                <small>
                                                    <?= date('M d, h:i A', strtotime($act['feedback_created_at'])) ?>
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
        <div class="drive-comments" id="addActivitySectionTwo<?= $obj['id']; ?>" data-lead-id="<?= $obj['id']; ?>"
            style="display: none;">
            <div
                class="px-4 py-2 fw-bold text-dark border-top border-bottom  bg-gray-100 d-flex justify-content-between align-items-center">
                <h2 class="fs-16 fw-bold text-truncate-1-line mb-0">Add Activity</h2>
                <button type="button" class="btn btn-primary btnViewActivity" data-lead-id="<?= $obj['id']; ?>">View
                    Activity</button>
            </div>
            <div class="row p-0 border-0">
                <form action="<?= base_url('index.php/Leads/save_activity') ?>" method="post"
                    class="form-horizontal role form" enctype="multipart/form-data">

                    <input type="hidden" name="lead_id" value="<?= $obj['id'] ?>">

                    <div id="activityContainer2">
                        <div class="row activityRow border-0">
                            <?php
                            $activity_type = ['To-do', 'Email', 'Call', 'Meeting', 'Upload Document', 'Other'];
                            ?>
                            <div class="col-lg-4 mb-4">
                                <label for="activity_type" class="form-label">Activity Type</label>
                                <select name="activity_type" class="form-control form-select select2 activityTypeSide"
                                    id="activityTypeSide" data-select2-selector="default" required>
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
                                            <option value="<?= $value['id'] ?>" <?= ($value['id'] == @$filtered_value['assign_to']) ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($value['name']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value=""><?= $this->lang->line('no_result') ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="col-lg-4 mb-4" id="documentField2" style="display:none;">
                                <label class="form-label">Upload Document</label>
                                <input type="file" name="document_file" class="form-control">
                                <?php if (!empty($activity['document_file'])): ?>
                                    <p>Current File: <strong><?= $activity['document_file'] ?></strong></p>
                                    <input type="hidden" name="existing_file" value="<?= $activity['document_file'] ?>">
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-4 mb-4" id="otherField2" style="display:none;">
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
    document.addEventListener("DOMContentLoaded", function () {
        const activityType = document.getElementById("activityTypeSide");
        const documentField = document.getElementById("documentField2");
        const otherField = document.getElementById("otherField2");

        activityType.addEventListener("change", function () {
            if (this.value === "Upload Document") {
                documentField.style.display = "block";
                otherField.style.display = "none";
            } else if (this.value === "Other") {
                otherField.style.display = "block";
                documentField.style.display = "none";
            } else {
                documentField.style.display = "none";
                otherField.style.display = "none";
            }
        });
    });
</script>


<!-- Feedback Script -->

<script>
    function openFeedbackForm(id) {
        document.getElementById("form_feedback" + id).style.display = "block";
        document.getElementById("feedbackAction" + id).style.display = "none";
    }

    function cancelFeedbackForm(id) {
        document.getElementById("form_feedback" + id).style.display = "none";
        document.getElementById("feedbackAction" + id).style.display = "block";
    }
</script>