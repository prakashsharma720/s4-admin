<style>
.rating-stars i {
    font-size: 16px;
    color: #f5c518;
}

.rating-stars i.text-muted {
    color: #dcdcdc !important;
}
</style>

<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10"><?= $this->lang->line('lead_data') ?></h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a
                        href="<?php echo base_url('index.php/User_authentication/admin_dashboard'); ?>"><?= $this->lang->line('home') ?></a>
                </li>
                <li class="breadcrumb-item"><?= $this->lang->line('lead_data') ?></li>
            </ul>
        </div>

        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <!-- Collapse Filter -->
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne">
                        <i class="feather-filter"></i>
                    </a>

                    <!-- Create New Lead -->
                    <a href="<?php echo base_url('index.php/Leads/add'); ?>" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span><?= $this->lang->line('create_new_lead') ?></span>
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

    <!-- Load Filter -->
    <?php $this->load->view('Lead_Module/Lead_Generation/component/filter-model'); ?>

    <?php $this->load->view('layout/alerts'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">


                <div class="card border-top-0">
                    <div class="card-header p-0">
                        <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab"
                            role="tablist">
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#incompleteActivities" role="tab">Upcoming Activities</a>
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#completedActivities" role="tab">Past Activities</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body p-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="incompleteActivities" role="tabpanel">
                                <?php if (!empty($incompleteActivities)): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card stretch stretch-full">
                                            <div class="card-header">
                                            </div>
                                            <div class="card-body custom-card-action">

                                                <?php foreach ($incompleteActivities as $act): ?>
                                                <?php
														$dt = !empty($act['due_date']) ? $act['due_date'] : $act['created_at'];
														$time = !empty($dt) ? date('h:iA', strtotime($dt)) : '--';
														$date = !empty($dt) ? date('d M', strtotime($dt)) : '--';

														// Priority badge color
														$priority = $act['leads_priority'];
														$priorityClass = 'bg-soft-secondary text-muted';
														if ($priority == 'Low')
															$priorityClass = 'bg-soft-success text-success';
														if ($priority == 'Medium')
															$priorityClass = 'bg-soft-warning text-warning';
														if ($priority == 'High')
															$priorityClass = 'bg-soft-danger text-danger';
														if ($priority == 'Very High')
															$priorityClass = 'bg-soft-primary text-primary';

														$priority = $act['leads_priority'];
														$priorityClassBorder = 'border-secondary';
														if ($priority == 'Low')
															$priorityClassBorder = 'border-success';
														if ($priority == 'Medium')
															$priorityClassBorder = 'border-warning';
														if ($priority == 'High')
															$priorityClassBorder = 'border-danger';
														if ($priority == 'Very High')
															$priorityClassBorder = 'border-primary';
														?>

                                                <?php
														$dt = !empty($act['due_date']) ? $act['due_date'] : $act['created_at'];
														$time = !empty($dt) ? date('h:iA', strtotime($dt)) : '--';
														$date = !empty($dt) ? date('d M', strtotime($dt)) : '--';
														$dueDateTime = !empty($dt) ? date('Y-m-d H:i:s', strtotime($dt)) : null;
														?>


                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="me-4 text-center">
                                                        <h2 class="fs-16 fw-bold mb-0"><?= $time ?></h2>
                                                        <small class="fs-12 text-muted"><?= $date ?></small>
                                                    </div>
                                                    <div
                                                        class="align-items-center border-3 border-start <?= $priorityClassBorder ?> rounded w-100 p-2">
                                                        <div class="row">
                                                            <div class="col-lg-5">
                                                                <div class="mx-2">
                                                                    <div class="d-flex">
                                                                        <a href="javascript:void(0);"
                                                                            class="fw-semibold mb-1">
                                                                            <?= htmlspecialchars($act['activity_type']) ?>
                                                                            <?php if ($act['activity_type'] === 'Other'): ?>
                                                                            (<?= htmlspecialchars($act['other_text']) ?>)
                                                                            <?php endif; ?>
                                                                        </a>
                                                                        <span class="d-flex mx-2"></span>
                                                                        <a href="javascript:void(0);"
                                                                            class="badge <?= $priorityClass ?>">
                                                                            <?= $priority ?>
                                                                        </a>
                                                                    </div>
                                                                    <div class="fs-12 fw-normal text-muted">
                                                                        <?= htmlspecialchars($act['lead_code'] ?? '-') ?>
                                                                        |
                                                                        <?= htmlspecialchars($act['lead_title'] ?? '-') ?>
                                                                        |
                                                                        <?= htmlspecialchars($act['contact_person'] ?? '-') ?>
                                                                    </div>
                                                                    <div class="fs-12 text-muted mt-1">
                                                                        <strong>Original Notes:</strong>
                                                                    </div>
                                                                    <div class="fs-12 fw-normal text-muted">
                                                                        <?= nl2br(htmlspecialchars($act['activity_summary'])) ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7">
                                                                <div class="text-start">
                                                                    <div class="d-flex justify-content-between">
                                                                        <?php if (empty($act['activity_feedback'])): ?>
                                                                        <div id="feedbackAction<?= $act['id'] ?>">
                                                                            <div class="text-success mb-2">
                                                                                <strong>
                                                                                    <span class="due-in"
                                                                                        data-due="<?= $dueDateTime ?>">
                                                                                        Calculating...
                                                                                    </span>
                                                                                </strong>
                                                                            </div>
                                                                            <!-- <a href="javascript:void(0)"
																				onclick="openFeedbackForm(<?= $act['id'] ?>)"
																				class="avatar-md me-2">
																				<strong><i
																						class="feather feather-check"></i></strong>
																				Mark Done
																			</a> -->

                                                                            <a href="javascript:void(0)"
                                                                                class="avatar-md me-2 mark_done_btn"
                                                                                data-id="<?= $act['id'] ?>"
                                                                                data-lead="<?= $act['lead_id'] ?>"
                                                                                data-assign="<?= $act['assign_to'] ?>">
                                                                                <strong><i
                                                                                        class="feather feather-check"></i></strong>
                                                                                Mark Done
                                                                            </a>


                                                                            <a href="javascript:void(0);"
                                                                                class="avatar-md me-2  edit_activity"
                                                                                data-id="<?= $act['id']; ?>"
                                                                                data-type="<?= htmlspecialchars($act['activity_type'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                                                                data-date="<?= htmlspecialchars($act['due_date'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                                                                data-other_text="<?= htmlspecialchars($act['other_text'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                                                                data-document_file="<?= htmlspecialchars($act['document_file'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                                                                data-summary="<?= htmlspecialchars($act['activity_summary'] ?? '', ENT_QUOTES, 'UTF-8'); ?>"
                                                                                data-priority="<?= htmlspecialchars($act['leads_priority'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                                                                                <Strong><i
                                                                                        class="feather feather-edit"></i></Strong>
                                                                                Edit
                                                                            </a>

                                                                            <a href="javascript:void(0)"
                                                                                class="avatar-md me-2 cancel_activity_btn"
                                                                                data-id="<?= $act['id'] ?>">
                                                                                <strong><i
                                                                                        class="feather feather-x"></i></strong>
                                                                                Cancel
                                                                            </a>

                                                                        </div>


                                                                        <form
                                                                            action="<?= site_url('Leads/save_feedback_New/' . $act['id']) ?>"
                                                                            method="post"
                                                                            id="form_feedback<?= $act['id'] ?>"
                                                                            class="feedback-form w-100 me-4"
                                                                            style="display: none;">

                                                                            <input type="hidden" name="lead_id"
                                                                                value="<?= $act['lead_id'] ?>">

                                                                            <div
                                                                                class="row p-0 border-0 mt-2 align-items-stretch">
                                                                                <div class="col-lg-8">
                                                                                    <textarea name="activity_feedback"
                                                                                        class="form-control h-100"
                                                                                        placeholder="Write Feedback"
                                                                                        required></textarea>
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-4 d-flex flex-column">
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary w-100 mb-2 flex-fill">Done</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-danger w-100 flex-fill"
                                                                                        onclick="cancelFeedbackForm(<?= $act['id'] ?>)">Discard</button>
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <?php else: ?>
                                                                        <?= nl2br(htmlspecialchars($act['activity_feedback'])) ?><br>
                                                                        <small class="text-muted">
                                                                            <?= !empty($act['feedback_created_at']) ? date('d-M-Y h:i A', strtotime($act['feedback_created_at'])) : '' ?>
                                                                        </small>
                                                                        <?php endif; ?>

                                                                        <!-- <a class="avatar-text avatar-sm bg-info"
																			data-bs-toggle="offcanvas"
																			data-bs-target="#LeadDetails<?= $act['id']; ?>">
																			<i class="feather-eye text-white"></i>
																		</a> -->
                                                                        <div class="hstack gap-2 justify-content-end">
                                                                            <a class="avatar-text avatar-md"
                                                                                data-bs-toggle="offcanvas"
                                                                                data-bs-target="#LeadDetails<?php echo $act['id']; ?>">
                                                                                <i class="feather feather-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php $this->load->view('Lead_Module/Lead_Generation/component/view_leadDetail', [
																			'obj' => $act,
																		]); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <hr class="border-dashed my-3">
                                                <?php endforeach; ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-info">No incomplete activities.</div>
                                <?php endif; ?>
                            </div>

                            <div class="tab-pane" id="completedActivities" role="tabpanel">
                                <?php if (!empty($completedActivities)): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card stretch stretch-full">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <div>
                                                    <label class="form-label d-flex align-items-center gap-2">Show
                                                        <select id="entriesPerPage"
                                                            class="form-select d-inline-block w-auto form-control"
                                                            data-select2-selector="default">
                                                            <option value="5">5</option>
                                                            <option value="10" selected>10</option>
                                                            <option value="20">20</option>
                                                            <option value="50">50</option>
                                                        </select> entries
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="text" id="searchActivities" class="form-control"
                                                        placeholder="Search activities...">
                                                </div>
                                            </div>
                                            <div class="card-body custom-card-action" id="activitiesContainer">
                                                <?php foreach ($completedActivities as $act): ?>
                                                <?php
														$dt = !empty($act['due_date']) ? $act['due_date'] : $act['created_at'];
														$time = !empty($dt) ? date('h:iA', strtotime($dt)) : '--';
														$date = !empty($dt) ? date('d M', strtotime($dt)) : '--';

														// Priority badge color
														$priority = $act['leads_priority'];
														$priorityClass = 'bg-soft-secondary text-muted';
														if ($priority == 'Low')
															$priorityClass = 'bg-soft-success text-success';
														if ($priority == 'Medium')
															$priorityClass = 'bg-soft-warning text-warning';
														if ($priority == 'High')
															$priorityClass = 'bg-soft-danger text-danger';
														if ($priority == 'Very High')
															$priorityClass = 'bg-soft-primary text-primary';

														$priority = $act['leads_priority'];
														$priorityClassBorder = 'border-secondary';
														if ($priority == 'Low')
															$priorityClassBorder = 'border-success';
														if ($priority == 'Medium')
															$priorityClassBorder = 'border-warning';
														if ($priority == 'High')
															$priorityClassBorder = 'border-danger';
														if ($priority == 'Very High')
															$priorityClassBorder = 'border-primary';
														?>

                                                <div class="activity-wrapper">
                                                    <div class="activity-item w-100 d-flex align-items-center mb-3">
                                                        <!-- Left: Time + Date -->
                                                        <div class="me-4 text-center">
                                                            <h2 class="fs-16 fw-bold mb-0"><?= $time ?></h2>
                                                            <small class="fs-12 text-muted"><?= $date ?></small>
                                                        </div>

                                                        <!-- Right: Activity Details -->
                                                        <div
                                                            class="align-items-center border-3 border-start <?= $priorityClassBorder ?> rounded w-100 p-2">
                                                            <div class="row">
                                                                <div class="col-lg-5">
                                                                    <div class="mx-2">
                                                                        <div class="d-flex">
                                                                            <a href="javascript:void(0);"
                                                                                class="fw-semibold mb-1">
                                                                                <?= htmlspecialchars($act['activity_type']) ?>
                                                                                <?php if ($act['activity_type'] === 'Other'): ?>
                                                                                (<?= htmlspecialchars($act['other_text']) ?>)
                                                                                <?php endif; ?>
                                                                            </a>
                                                                            <span class="d-flex mx-2"></span>
                                                                            <a href="javascript:void(0);"
                                                                                class="badge <?= $priorityClass ?>">
                                                                                <?= $priority ?>
                                                                            </a>
                                                                        </div>
                                                                        <div class="fs-12 fw-normal text-muted">
                                                                            <?= htmlspecialchars($act['lead_code'] ?? '-') ?>
                                                                            |
                                                                            <?= htmlspecialchars($act['lead_title'] ?? '-') ?>
                                                                            |
                                                                            <?= htmlspecialchars($act['contact_person'] ?? '-') ?>
                                                                        </div>

                                                                        <div class="fs-12 text-muted mt-1">
                                                                            <strong>Original Notes:</strong>
                                                                        </div>
                                                                        <div class="fs-12 fw-normal text-muted">
                                                                            <?= nl2br(htmlspecialchars($act['activity_summary'])) ?>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Second Half: Feedback -->
                                                                <div class="col-lg-7">
                                                                    <div class="text-start">
                                                                        <div class="d-flex justify-content-between">
                                                                            <div>
                                                                                <?php if (!empty($act['activity_feedback'])): ?>
                                                                                <div class="text-success">
                                                                                    <strong>Feedback:</strong>
                                                                                </div>
                                                                                <div class="fs-12 fw-normal text-muted">
                                                                                    <?= nl2br(htmlspecialchars($act['activity_feedback'])) ?>
                                                                                </div>
                                                                                <small class="text-muted">
                                                                                    <?= !empty($act['feedback_created_at']) ? date('d-M-Y h:i A', strtotime($act['feedback_created_at'])) : '' ?>
                                                                                </small>

                                                                                <?php if (!empty($act['activity_rating'])): ?>
                                                                                <div
                                                                                    class="rating-stars d-flex align-items-center mt-1">
                                                                                    <?php
                                                                                    $rating = (int)$act['activity_rating'];
                                                                                    for ($i = 1; $i <= 5; $i++):
                                                                                        if ($i <= $rating):
                                                                                            echo '<i class="fa fa-star fs-16 me-1"></i>';
                                                                                        else:
                                                                                            echo '<i class="fa fa-star text-muted fs-16 me-1"></i>';
                                                                                        endif;
                                                                                    endfor;
                                                                                    ?>
                                                                                </div>
                                                                                <?php endif; ?>

                                                                                <?php else: ?>
                                                                                <form
                                                                                    action="<?= site_url('Leads/save_feedback_New/' . $act['id']) ?>"
                                                                                    method="post">
                                                                                    <input type="hidden" name="lead_id"
                                                                                        value="<?= $act['lead_id'] ?>">
                                                                                    <textarea name="activity_feedback"
                                                                                        class="form-control mb-2"
                                                                                        placeholder="Enter Feedback"
                                                                                        required></textarea>
                                                                                    <button type="submit"
                                                                                        class="btn btn-primary btn-sm">Save
                                                                                        Feedback</button>
                                                                                </form>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                            <div
                                                                                class="hstack gap-2 justify-content-end">
                                                                                <a class="avatar-text avatar-md"
                                                                                    data-bs-toggle="offcanvas"
                                                                                    data-bs-target="#LeadDetails<?php echo $act['id']; ?>">
                                                                                    <i class="feather feather-eye"></i>
                                                                                </a>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                    <!-- Lead Detail View -->
                                                                    <?php $this->load->view('Lead_Module/Lead_Generation/component/view_leadDetail', ['obj' => $act]); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <hr class="border-dashed my-3">
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                            <!-- Pagination Controls -->
                                            <div class="card-footer d-flex justify-content-between align-items-center">
                                                <div id="paginationInfo"></div>
                                                <div id="paginationControls" class="pagination"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-info">No completed activities.</div>
                                <?php endif; ?>
                            </div>

                            <div class="tab-pane" id="completedActivitiesOld" role="tabpanel">
                                <?php if (!empty($completedActivities)): ?>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="completeActTab">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Lead</th>
                                                <th>Activity</th>
                                                <th>Due (Date & Time)</th>
                                                <th>Assigned To</th>
                                                <th>Summary</th>
                                                <th>Priority</th>
                                                <th>Feedback</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
												foreach ($completedActivities as $act): ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <div>
                                                        <strong><?= htmlspecialchars($act['lead_code'] ?? '-') ?></strong>
                                                    </div>
                                                    <div><?= htmlspecialchars($act['lead_title'] ?? '-') ?></div>
                                                    <div class="text-muted small">
                                                        <?= htmlspecialchars($act['contact_person'] ?? '-') ?></div>
                                                </td>
                                                <!-- <td><?= htmlspecialchars($act['activity_type']) ?></td> -->
                                                <td>
                                                    <?php if ($act['activity_type'] === 'Other'): ?>
                                                    <?= htmlspecialchars($act['activity_type']) ?>
                                                    <div>(<?= htmlspecialchars($act['other_text']) ?>)</div>
                                                    <?php else: ?>
                                                    <?= htmlspecialchars($act['activity_type']) ?>
                                                    <?php endif; ?>
                                                    <div>
                                                        <?php if (!empty($act['document_file'])): ?>
                                                        <a href="<?= htmlspecialchars($act['document_file']) ?>"
                                                            target="_blank">View</a>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
																$dt = !empty($act['due_date']) ? $act['due_date'] : $act['created_at'];
																echo !empty($dt) ? date('d-M-Y', strtotime($dt)) : '-';
																?>
                                                    </div>
                                                    <div>
                                                        <?php
																$dt = !empty($act['due_date']) ? $act['due_date'] : $act['created_at'];
																echo !empty($dt) ? date('h:i A', strtotime($dt)) : '-';
																?>
                                                    </div>
                                                </td>

                                                <td class="text-wrap">
                                                    <?= nl2br(htmlspecialchars($act['activity_summary'])) ?></td>
                                                <td><?= !empty($act['employee_name']) ? htmlspecialchars($act['employee_name']) : 'Unknown' ?>
                                                </td>
                                                <!-- <td>
													<?php if (!empty($act['document_file'])): ?>
													<a href="<?= htmlspecialchars($act['document_file']) ?>"
														target="_blank">View</a>
													<?php else: ?>
													-
													<?php endif; ?>
												</td> -->

                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <?php
																$status = $act['leads_priority'];
																switch ($status) {
																	case 'Low':
																		echo '<div class="badge bg-success text-white">Low</div>';
																		break;
																	case 'Medium':
																		echo '<div class="badge bg-warning text-dark">Medium</div>';
																		break;
																	case 'High':
																		echo '<div class="badge bg-danger text-white">High</div>';
																		break;
																	case 'Very High':
																		echo '<div class="badge bg-primary text-white">Very High</div>';
																		break;
																	default:
																		echo '<div class="badge bg-secondary text-white"></div>';
																}
																?>
                                                    </div>
                                                </td>

                                                <!-- <td>
												<?php if (!empty($act['activity_feedback'])): ?>
												<?= nl2br(htmlspecialchars($act['activity_feedback'])) ?><br>
												<small
													class="text-muted"><?= !empty($act['feedback_created_at']) ? date('d-M-Y h:i A', strtotime($act['feedback_created_at'])) : '' ?></small>
												<?php else: ?>
												<span class="text-muted">No feedback</span>
												<?php endif; ?>
											</td> -->


                                                <td class="text-wrap">

                                                    <?php if (empty($act['activity_feedback'])): ?>
                                                    <div id="feedbackAction<?= $act['id'] ?>">
                                                        <a href="javascript:void(0)"
                                                            onclick="openFeedbackForm(<?= $act['id'] ?>)"
                                                            class="avatar-text avatar-md">
                                                            <i class="feather feather-edit"></i>
                                                        </a>
                                                    </div>

                                                    <form
                                                        action="<?= site_url('Leads/save_feedback_New/' . $act['id']) ?>"
                                                        method="post" id="form_feedback<?= $act['id'] ?>"
                                                        class="feedback-form" style="display: none;">

                                                        <input type="hidden" name="lead_id"
                                                            value="<?= $act['lead_id'] ?>">

                                                        <div class="row p-0 border-0 mt-2 align-items-stretch">
                                                            <div class="col-lg-12">
                                                                <textarea name="activity_feedback"
                                                                    class="form-control h-100"
                                                                    placeholder="Enter Your Feedback"
                                                                    required></textarea>
                                                            </div>
                                                            <div class="col-lg-12 d-flex flex-column">
                                                                <button type="button"
                                                                    class="btn btn-danger w-100 my-2 flex-fill"
                                                                    onclick="cancelFeedbackForm(<?= $act['id'] ?>)">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary w-100 flex-fill">Add
                                                                    Feedback</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php else: ?>
                                                    <?= nl2br(htmlspecialchars($act['activity_feedback'])) ?><br>
                                                    <small class="text-muted">
                                                        <?= !empty($act['feedback_created_at']) ? date('d-M-Y h:i A', strtotime($act['feedback_created_at'])) : '' ?>
                                                    </small>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                            data-bs-target="#LeadDetails<?php echo $act['id']; ?>">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <?php $this->load->view('Lead_Module/Lead_Generation/component/view_leadDetail', [
																	'obj' => $act,
																	// 'activities' => $act['activities']
																]); ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-info">No completed activities.</div>
                                <?php endif; ?>
                            </div>
                            <div class="tab-pane" id="oldActivities" role="tabpanel">
                                <?php if (!empty($oldActivities)): ?>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="upcomingActTab">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Lead</th>
                                                <th>Activity</th>
                                                <th>Due (Date & Time)</th>
                                                <th>Assigned To</th>
                                                <th>Summary</th>
                                                <th>Priority</th>
                                                <th>Feedback</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
												foreach ($oldActivities as $act): ?>
                                            <tr class="<?= !empty($act['activity_feedback']) ? 'text-primary' : '' ?>">
                                                <td><?= $i++ ?></td>
                                                <td>
                                                    <div>
                                                        <strong><?= htmlspecialchars($act['lead_code'] ?? '-') ?></strong>
                                                    </div>
                                                    <div><?= htmlspecialchars($act['lead_title'] ?? '-') ?></div>
                                                    <div class="text-muted small">
                                                        <?= htmlspecialchars($act['contact_person'] ?? '-') ?></div>
                                                </td>
                                                <!-- <td><?= htmlspecialchars($act['activity_type']) ?></td> -->
                                                <td>
                                                    <?php if ($act['activity_type'] === 'Other'): ?>
                                                    <?= htmlspecialchars($act['activity_type']) ?>
                                                    <div>(<?= htmlspecialchars($act['other_text']) ?>)</div>
                                                    <?php else: ?>
                                                    <?= htmlspecialchars($act['activity_type']) ?>
                                                    <?php endif; ?>
                                                    <div>
                                                        <?php if (!empty($act['document_file'])): ?>
                                                        <a href="<?= htmlspecialchars($act['document_file']) ?>"
                                                            target="_blank">View</a>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div>
                                                        <?php
																$dt = !empty($act['due_date']) ? $act['due_date'] : $act['created_at'];
																echo !empty($dt) ? date('d-M-Y', strtotime($dt)) : '-';
																?>
                                                    </div>
                                                    <div>
                                                        <?php
																$dt = !empty($act['due_date']) ? $act['due_date'] : $act['created_at'];
																echo !empty($dt) ? date('h:i A', strtotime($dt)) : '-';
																?>
                                                    </div>
                                                </td>
                                                <td><?= !empty($act['employee_name']) ? htmlspecialchars($act['employee_name']) : 'Unknown' ?>
                                                </td>
                                                <td><?= nl2br(htmlspecialchars($act['activity_summary'])) ?></td>
                                                <!-- <td>
													<?php if (!empty($act['document_file'])): ?>
													<a href="<?= htmlspecialchars($act['document_file']) ?>"
														target="_blank">View</a>
													<?php else: ?>
													-
													<?php endif; ?>
												</td> -->

                                                <td>
                                                    <div class="d-flex align-items-center gap-3">
                                                        <?php
																$status = $act['leads_priority'];
																switch ($status) {
																	case 'Low':
																		echo '<div class="badge bg-success text-white">Low</div>';
																		break;
																	case 'Medium':
																		echo '<div class="badge bg-warning text-dark">Medium</div>';
																		break;
																	case 'High':
																		echo '<div class="badge bg-danger text-white">High</div>';
																		break;
																	case 'Very High':
																		echo '<div class="badge bg-primary text-white">Very High</div>';
																		break;
																	default:
																		echo '<div class="badge bg-secondary text-white"></div>';
																}
																?>
                                                    </div>
                                                </td>

                                                <!-- <td>
												<?php if (!empty($act['activity_feedback'])): ?>
												<?= nl2br(htmlspecialchars($act['activity_feedback'])) ?><br>
												<small
													class="text-muted"><?= !empty($act['feedback_created_at']) ? date('d-M-Y h:i A', strtotime($act['feedback_created_at'])) : '' ?></small>
												<?php else: ?>
												<span class="text-muted">No feedback</span>
												<?php endif; ?>
											</td> -->

                                                <td>
                                                    <?php if (empty($act['activity_feedback'])): ?>
                                                    <div id="feedbackAction<?= $act['id'] ?>">
                                                        <a href="javascript:void(0)"
                                                            onclick="openFeedbackForm(<?= $act['id'] ?>)"
                                                            class="avatar-text avatar-md">
                                                            <i class="feather feather-edit"></i>
                                                        </a>
                                                    </div>

                                                    <form
                                                        action="<?= site_url('Leads/save_feedback_New/' . $act['id']) ?>"
                                                        method="post" id="form_feedback<?= $act['id'] ?>"
                                                        class="feedback-form" style="display: none;">

                                                        <input type="hidden" name="lead_id"
                                                            value="<?= $act['lead_id'] ?>">

                                                        <div class="row p-0 border-0 mt-2 align-items-stretch">
                                                            <div class="col-lg-12">
                                                                <textarea name="activity_feedback"
                                                                    class="form-control h-100"
                                                                    placeholder="Enter Your Feedback"
                                                                    required></textarea>
                                                            </div>
                                                            <div class="col-lg-12 d-flex flex-column">
                                                                <button type="button"
                                                                    class="btn btn-danger w-100 my-2 flex-fill"
                                                                    onclick="cancelFeedbackForm(<?= $act['id'] ?>)">Cancel</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary w-100 flex-fill">Add
                                                                    Feedback</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <?php else: ?>
                                                    <?= nl2br(htmlspecialchars($act['activity_feedback'])) ?><br>
                                                    <small class="text-muted">
                                                        <?= !empty($act['feedback_created_at']) ? date('d-M-Y h:i A', strtotime($act['feedback_created_at'])) : '' ?>
                                                    </small>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                            data-bs-target="#LeadDetails<?php echo $act['id']; ?>">
                                                            <i class="feather feather-eye"></i>
                                                        </a>
                                                        <?php $this->load->view('Lead_Module/Lead_Generation/component/view_leadDetail', [
																	'obj' => $act,
																	// 'activities' => $act['activities']
																]); ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-info">No activities assigned to you.</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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

<script>
function updateDueTimes() {
    document.querySelectorAll('.due-in').forEach(function(el) {
        let due = el.getAttribute('data-due');
        if (!due) return;

        let dueDate = new Date(due).getTime();
        let now = new Date().getTime();
        let diff = dueDate - now;

        if (diff <= 0) {
            let overdueMs = Math.abs(diff);
            let days = Math.floor(overdueMs / (1000 * 60 * 60 * 24));
            let hours = Math.floor((overdueMs % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((overdueMs % (1000 * 60 * 60)) / (1000 * 60));

            if (days > 0) {
                el.innerHTML = "Overdue by " + days + "d " + hours + "h";
            } else if (hours > 0) {
                el.innerHTML = "Overdue by " + hours + "h " + minutes + "m";
            } else {
                el.innerHTML = "Overdue by " + minutes + "m";
            }
            el.classList.add("text-danger");
            el.classList.remove("text-success");
        } else {
            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));

            if (days > 0) {
                el.innerHTML = "Due in " + days + "d " + hours + "h";
            } else if (hours > 0) {
                el.innerHTML = "Due in " + hours + "h " + minutes + "m";
            } else {
                el.innerHTML = "Due in " + minutes + "m";
            }
            el.classList.add("text-success");
            el.classList.remove("text-danger");
        }
    });
}

setInterval(updateDueTimes, 60000);
updateDueTimes();
</script>

<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
var BASE_URL = "<?= base_url(); ?>";
</script>
<script>
$(document).ready(function() {

    $(document).on("click", ".edit_activity", function() {
        // $("#id").text($(this).data("id"));
        $("#edit_id").val($(this).data("id"));
        $("#edit_activity_type").val($(this).data("type")).trigger("change");
        $("#edit_due_date").val($(this).data("date"));
        $("#edit_other_text").val($(this).data("other_text"));
        $("#edit_activity_summary").val($(this).data("summary"));
        $("#edit_leads_priority").val($(this).data("priority"));

        // Show modal
        $("#editActivityModel").modal("show");

        // Toggle buttons
        $("#btn-n-save").hide();
        $("#btn-n-add").show();
    });
})

$(document).on("submit", "#editActivityForm", function(e) {
    e.preventDefault();
    $.ajax({
        url: BASE_URL + "index.php/Leads/update_activity",
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(res) {
            if (res.status) {
                $("#editActivityModel").modal("hide");
                location.reload();
            } else {
                alert(res.message || "No changes made!");
            }
        },
        error: function() {
            toastr.error("Something went wrong!");
        }
    });
});

$(document).ready(function() {
    $("#edit_activity_type").on("change", function() {
        var value = $(this).val();

        $("#documentField4").hide();
        $("#otherField4").hide();

        if (value === "Upload Document") {
            $("#documentField4").show();
        } else if (value === "Other") {
            $("#otherField4").show();
        }
    });

    $("#edit_activity_type").trigger("change");
});
</script>

<script>
// ⭐ star click logic
$(document).on("click", ".star-rating i", function() {
    var rating = $(this).data("value");
    $("#activity_rating").val(rating);

    $(".star-rating i").removeClass("active");
    $(this).addClass("active").prevAll().addClass("active");
});

$(document).on("click", ".mark_done_btn", function() {
    let actId = $(this).data("id");
    let leadId = $(this).data("lead");
    let assignTo = $(this).data("assign");

    $("#mark_done_act_id").val(actId);
    $("#mark_done_lead_id").val(leadId);
    $("#markDoneForm").data("assign", assignTo);

    $("#markDoneForm").attr("action", BASE_URL + "index.php/Leads/save_feedback_New/" + actId);

    $("#markDoneModal").modal("show");
});

// form submit (AJAX)
$("#markDoneForm").on("submit", function(e) {
    e.preventDefault();
    var form = $(this);
    $.ajax({
        url: form.attr("action"),
        type: "POST",
        data: form.serialize(),
        dataType: "json",
        success: function(res) {
            if (res.status) {
                alert("Feedback saved successfully!");
                $("#markDoneModal").modal("hide");
            } else {
                alert("Error: " + res.message);
            }
        },
        error: function() {
            alert("Server error, please try again.");
        }
    });
});



$(document).on("submit", "#markDoneForm", function(e) {
    e.preventDefault();

    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(res) {
            if (res.status) {
                $("#markDoneModal").modal("hide");
                location.reload();
            } else {
                alert(res.message || "No changes made!");
            }
        },
        error: function() {
            alert("Something went wrong!");
        }
    });
});
</script>

<script>
$(document).on("click", "#doneAndScheduleBtn", function() {
    let form = $("#markDoneForm");
    let actionUrl = form.attr("action");

    $.ajax({
        url: actionUrl,
        type: "POST",
        data: form.serialize(),
        dataType: "json",
        success: function(res) {
            if (res.status) {
                $("#markDoneModal").modal("hide");

                let leadId = $("#mark_done_lead_id").val();
                let assignTo = $("#markDoneForm").data("assign");
                $("#add_activity_assign_to").val(assignTo);
                $("#add_activity_lead_id").val(leadId);

                $("#addActivityModal").modal("show");
            } else {
                alert(res.message || "No changes made!");
            }
        },
        error: function() {
            alert("Something went wrong while saving feedback!");
        }
    });
});

$(document).on("click", ".markDoneBtn", function() {
    let assignTo = $(this).data("assign"); // button se assign value nikali
    $("#addActivityForm").find("input[name='assign_to']").val(assignTo);
});


$(document).on("submit", "#addActivityForm", function(e) {
    e.preventDefault();

    $.ajax({
        url: BASE_URL + "index.php/Leads/save_activityNew",
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(res) {
            if (res.status) {
                $("#addActivityModal").modal("hide");
                location.reload();
            } else {
                alert(res.message || "Activity not created!");
            }
        },
        error: function() {
            alert("Something went wrong while creating activity!");
        }
    });
});
</script>

<script>
let activityToDelete = null;

$(document).on("click", ".cancel_activity_btn", function() {
    activityToDelete = $(this).data("id");
    $("#cancelActivityModal").modal("show");
});


$(document).on("click", "#confirmCancelActivityBtn", function() {
    if (!activityToDelete) return;

    $.ajax({
        url: BASE_URL + "index.php/Leads/delete_activity",
        type: "POST",
        data: {
            id: activityToDelete
        },
        dataType: "json",
        success: function(res) {
            $("#cancelActivityModal").modal("hide");
            if (res.status) {
                location.reload();
            }
        },
        error: function() {
            $("#cancelActivityModal").modal("hide");
        }
    });
});
</script>

<script>
$(document).ready(function() {
    let perPage = parseInt($("#entriesPerPage").val());
    let currentPage = 1;
    let searchValue = "";

    function getFilteredItems() {
        return $(".activity-wrapper").filter(function() {
            return $(this).text().toLowerCase().includes(searchValue);
        });
    }

    function showPage() {
        let filteredItems = getFilteredItems();
        let totalFiltered = filteredItems.length;

        // Hide all first
        $(".activity-wrapper").css('display', 'none');

        // Slice filtered items for current page
        let start = (currentPage - 1) * perPage;
        let end = start + perPage;
        filteredItems.slice(start, end).css('display', 'block'); // <-- display:flex for d-flex items

        // Update info
        let showingStart = totalFiltered === 0 ? 0 : start + 1;
        let showingEnd = Math.min(end, totalFiltered);

        $("#paginationInfo").text(
            `Showing ${showingStart} to ${showingEnd} of ${totalFiltered} entries`
        );

        renderPagination(totalFiltered);
    }

    function renderPagination(totalFiltered) {
        let totalPages = Math.ceil(totalFiltered / perPage);
        $("#paginationControls").empty();

        if (totalPages <= 1) return;

        let ul = $(
            '<ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style"></ul>');

        // Prev button
        let prevLi = $(`
		<li>
			<a href="javascript:void(0);" class="${currentPage === 1 ? 'disabled' : ''}">
				<i class="bi bi-arrow-left"></i>
			</a>
		</li>
	`);
        prevLi.click(function() {
            if (currentPage > 1) {
                currentPage--;
                showPage();
            }
        });
        ul.append(prevLi);

        // Helper to add page
        function addPage(i) {
            let li = $(`
			<li><a href="javascript:void(0);" class="${i === currentPage ? 'active' : ''}">${i}</a></li>
		`);
            li.click(function() {
                currentPage = i;
                showPage();
            });
            ul.append(li);
        }

        // Always show first page
        addPage(1);

        // If current page > 3, show "..."
        if (currentPage > 3) {
            ul.append(`<li><a href="javascript:void(0);"><i class="bi bi-dot"></i></a></li>`);
        }

        // Show middle pages (currentPage -1, currentPage, currentPage +1)
        for (let i = currentPage - 1; i <= currentPage + 1; i++) {
            if (i > 1 && i < totalPages) {
                addPage(i);
            }
        }

        // If current page < totalPages - 2, show "..."
        if (currentPage < totalPages - 2) {
            ul.append(`<li><a href="javascript:void(0);"><i class="bi bi-dot"></i></a></li>`);
        }

        // Always show last page (if more than 1)
        if (totalPages > 1) {
            addPage(totalPages);
        }

        // Next button
        let nextLi = $(`
		<li>
			<a href="javascript:void(0);" class="${currentPage === totalPages ? 'disabled' : ''}">
				<i class="bi bi-arrow-right"></i>
			</a>
		</li>
	`);
        nextLi.click(function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage();
            }
        });
        ul.append(nextLi);

        $("#paginationControls").append(ul);
    }

    // Entries per page
    $("#entriesPerPage").change(function() {
        perPage = parseInt($(this).val());
        currentPage = 1;
        showPage();
    });

    // Search filter
    $("#searchActivities").on("keyup", function() {
        searchValue = $(this).val().toLowerCase();
        currentPage = 1;
        showPage();
    });

    // Initial load
    showPage();
});
</script>