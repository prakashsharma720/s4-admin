<?php $lead_code = $obj['lead_code'] ?? 'default_code'; ?>
<!-- <div class="offcanvas offcanvas-end" tabindex="-1" id="ViewDup<?= $lead_code; ?>">
        <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
        <h2 class="fs-16 fw-bold text-truncate-1-line"> Seems Like Duplicate with <?= $obj['lead_code']; ?></h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

			<div
				class="py-3 px-4 d-flex justify-content-between align-items-center border-bottom border-bottom-dashed border-gray-5 bg-gray-100">
				<div>
					<span class="fw-bold text-dark">Status:</span>
					<span class="fs-11 fw-medium text-muted">
						<?php
						switch ($obj['lead_status']) {
							case 'Pending':
								echo '<div class="badge bg-warning text-dark">Pending</div>';
								break;
							case 'Approved':
								echo '<div class="badge bg-success text-white">Approved</div>';
								break;
							case 'In Process':
								echo '<div class="badge bg-primary text-white">In Process</div>';
								break;
							case 'Converted':
								echo '<div class="badge bg-info text-white">Converted</div>';
								break;
							case 'Rejected':
								echo '<div class="badge bg-danger text-white">Rejected</div>';
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

			<div class="offcanvas-body">
				<div class="row">
					<div class="col-lg-6 mb-4">
						<div><strong>Date</strong></div>
						<div><?= date('d-M-Y', strtotime($obj['date'])) ?></div>
					</div>

					<div class="col-lg-6 mb-4">
						<div><strong>Services</strong></div>
						<div><?= $obj['category_name'] ?></div>
					</div>
					<div class="col-lg-6 mb-4">
						<div><strong>Title</strong></div>
						<div><?= $obj['lead_title'] ?></div>
					</div>

					<div class="col-lg-6 mb-4">
						<div><strong>Contact Person</strong></div>
						<div><?= $obj['contact_person'] ?></div>
					</div>

					<div class="col-lg-6 mb-4">
						<div><strong>Country</strong></div>
						<div><?= $obj['country'] ?></div>
					</div>

					<div class="col-lg-6 mb-4">
						<div><strong>Mobile</strong></div>
						<div><?= $obj['mobile'] ?></div>
					</div>

					<div class="col-lg-12 mb-4">
						<div><strong>Email</strong></div>
						<div><?= $obj['email'] ?></div>
					</div>

					<div class="col-lg-6 mb-4">
						<div><strong>Lead Source</strong></div>
						<div><?= $obj['lead_source'] ?></div>
					</div>

					<div class="col-lg-12 mb-4">
						<div><strong>Description</strong></div>
						<div><?= $obj['work_description'] ?></div>
					</div>
				</div>
			</div>

			<div class="px-4 gap-2 d-flex align-items-center ht-80 border border-end-0 border-gray-2">
				<a href="javascript:void(0);" class="btn btn-danger w-50" data-bs-dismiss="offcanvas">Cancel</a>
			</div>
		</div> -->


<style>
.view_offcanvas_width {
    width: 80% !important;
}
</style>

<div class="offcanvas offcanvas-end view_offcanvas_width" tabindex="-1" id="ViewDup<?= $lead_code; ?>">
    <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
        <h2 class="fs-16 fw-bold text-truncate-1-line">Seems Like Duplicate with <?= $obj['lead_code']; ?></h2>
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