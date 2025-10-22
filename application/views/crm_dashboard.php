<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$monthdata=[];

$date=[];
    foreach($getAll as $all){
    $monthdata[]= $all['date'];
    
        // $data=implode(',',$monthdata);
        $result="'".date('M',strtotime($all['date']))."'";
        $hh=implode(',',(array)$result);
        
    }
?>

<style>
.circle-progress {
    width: 50px;
    height: 50px;
}

.circle-progress-text {
    font-size: 24px;
}

.circle-progress-circle {
    stroke: #e9ecef;
    stroke-width: 3px;
}

.circle-progress-value {
    /* stroke: #17c666; */
    stroke-width: 6px;
    stroke-linecap: round;
}

.team-progressbar-1 .circle-progress-value {
    stroke: #3454d1;
}

.team-progressbar-2 .circle-progress-value {
    stroke: #17c666;
}

.team-progressbar-3 .circle-progress-value {
    stroke: #ffa21d;
}

.team-progressbar-4 .circle-progress-value {
    stroke: #6610f2;
}

.team-progressbar-5 .circle-progress-value {
    stroke: #41b2c4;
}

.right-arrow-dash {
    width: 30px;
    height: 30px;
    color: #283c50;
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 100%;
    transition: all .3s ease;
    border: 1px solid #e8eaf2;
}
</style>



<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10"><?= $this->lang->line('dashboard') ?></h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html"><?= $this->lang->line('home') ?></a></li>
                <li class="breadcrumb-item"><?= $this->lang->line('dashboard') ?></li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span><?= $this->lang->line('back') ?></span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper d-none">
                    <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                        <span class="reportrange-picker-field"></span>
                    </div>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>

            <!-- Create New Lead -->
            <a href="<?php echo base_url('index.php/Leads/add'); ?>" class="btn btn-primary">
                <i class="feather-plus me-2"></i>
                <span><?= $this->lang->line('create_new_lead') ?></span>
            </a>
        </div>
    </div>

    <?php $this->load->view('layout/alerts'); ?>
    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <!-- [Total Leads] start -->
            <div class="col-lg-4 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-users"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark">
                                        <?= $leadsSummary['total']; ?>/<?= $leadsSummary['total']; ?>
                                    </div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Leads</h3>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">
                                    Total Leads
                                </a>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark"><?= $leadsSummary['total']; ?> Total</span>
                                    <span class="fs-11 text-muted">(<?= $leadsSummary['total_percent']; ?>%)</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: <?= $leadsSummary['total_percent']; ?>%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Total Leads] end -->
            <!-- [Won Leads] start -->
            <div class="col-lg-4 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-success">
                                    <i class="feather-thumbs-up text-white"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark">
                                        <?= $leadsSummary['won']; ?>/<?= $leadsSummary['total']; ?>
                                    </div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Won Leads</h3>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">
                                    Won Leads
                                </a>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark"><?= $leadsSummary['won']; ?> Won</span>
                                    <span class="fs-11 text-muted">(<?= $leadsSummary['won_percent']; ?>%)</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-success" role="progressbar"
                                    style="width: <?= $leadsSummary['won_percent']; ?>%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Won Leads] end -->
            <!-- [Loss Leads] start -->
            <div class="col-lg-4 col-md-6">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-4">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-danger">
                                    <i class="feather-thumbs-down text-white"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark">
                                        <?= $leadsSummary['loss']; ?>/<?= $leadsSummary['total']; ?>
                                    </div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Loss Leads</h3>
                                </div>
                            </div>
                        </div>
                        <div class="pt-4">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="javascript:void(0);" class="fs-12 fw-medium text-muted text-truncate-1-line">
                                    Loss Leads
                                </a>
                                <div class="w-100 text-end">
                                    <span class="fs-12 text-dark"><?= $leadsSummary['loss']; ?> Loss</span>
                                    <span class="fs-11 text-muted">(<?= $leadsSummary['loss_percent']; ?>%)</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-danger" role="progressbar"
                                    style="width: <?= $leadsSummary['loss_percent']; ?>%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Loss Leads] end -->

            <!-- [Leads Records] start -->
            <div class="col-xxl-8">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Leads Record</h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                                <div data-bs-toggle="tooltip" title="Delete">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                        data-bs-toggle="remove"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Refresh">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                        data-bs-toggle="refresh"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                        data-bs-toggle="expand"> </a>
                                </div>
                            </div>
                            <div class="dropdown d-none">
                                <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                    data-bs-offset="25, 25">
                                    <div data-bs-toggle="tooltip" title="Options">
                                        <i class="feather-more-vertical"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-at-sign"></i>New</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-calendar"></i>Event</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-bell"></i>Snoozed</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-trash-2"></i>Deleted</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-settings"></i>Settings</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-life-buoy"></i>Tips & Tricks</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <!-- <div id="leads-monthly-chart"></div> -->
                        <!-- <div id="leads-chart"></div> -->
                        <div id="lead-records-chart"></div>
                    </div>
                    <div class="card-footer">
                        <div class="row g-4">
                            <div class="col-lg-3">
                                <div class="p-3 border border-dashed rounded">
                                    <div class="fs-12 text-muted mb-1">Total Leads</div>
                                    <h6 id="total-leads" class="fw-bold text-dark">0</h6>
                                    <div class="progress mt-2 ht-3">
                                        <div id="total-progress" class="progress-bar bg-primary" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="p-3 border border-dashed rounded">
                                    <div class="fs-12 text-muted mb-1">Won Leads</div>
                                    <h6 id="won-leads" class="fw-bold text-dark">0</h6>
                                    <div class="progress mt-2 ht-3">
                                        <div id="won-progress" class="progress-bar bg-success" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="p-3 border border-dashed rounded">
                                    <div class="fs-12 text-muted mb-1">Loss Leads</div>
                                    <h6 id="loss-leads" class="fw-bold text-dark">0</h6>
                                    <div class="progress mt-2 ht-3">
                                        <div id="loss-progress" class="progress-bar bg-danger" role="progressbar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="p-3 border border-dashed rounded">
                                    <div class="fs-12 text-muted mb-1">Qualify Leads</div>
                                    <h6 id="qualify-leads" class="fw-bold text-dark">0</h6>
                                    <div class="progress mt-2 ht-3">
                                        <div id="qualify-progress" class="progress-bar bg-dark" role="progressbar">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Leads Records] end -->

            <!-- [Leads Overview] start -->
            <div class="col-xxl-4">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Leads Overview</h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                                <div data-bs-toggle="tooltip" title="Delete">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                        data-bs-toggle="remove"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Refresh">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                        data-bs-toggle="refresh"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                        data-bs-toggle="expand"> </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                    data-bs-offset="25, 25">
                                    <div data-bs-toggle="tooltip" title="Options">
                                        <i class="feather-more-vertical"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-at-sign"></i>New</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-calendar"></i>Event</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-bell"></i>Snoozed</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-trash-2"></i>Deleted</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-settings"></i>Settings</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-life-buoy"></i>Tips & Tricks</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body custom-card-action">
                        <div id="leads-overview-dash"></div>
                        <div class="row g-2">
                            <?php 
                                $labels = [
                                    'Total Leads' => ['value'=>$leads_overview['total'], 'color'=>'#3454d1'],
                                    'Won Leads' => ['value'=>$leads_overview['won'], 'color'=>'#42a5f5'],
                                    'Loss Leads' => ['value'=>$leads_overview['loss'], 'color'=>'#e53935'],
                                    'Qualified Leads' => ['value'=>$leads_overview['qualify'], 'color'=>'#00b894']
                                ];
                                foreach($labels as $name=>$info): ?>
                            <div class="col-12 mb-2">
                                <a href="javascript:void(0);"
                                    class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <span class="wd-7 ht-7 rounded-circle d-inline-block"
                                        style="background-color: <?= $info['color'] ?>"></span>
                                    <span><?= $name ?><span
                                            class="fs-10 text-muted ms-1">(<?= $info['value'] ?>)</span></span>
                                </a>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Leads Overview] end -->

            <!-- [Mini] start -->
            <!-- <div class="col-lg-4">
                <div class="card mb-4 stretch stretch-full">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="avatar-text">
                                <i class="feather feather-star"></i>
                            </div>
                            <div>
                                <div class="fw-semibold text-dark">Tasks Completed</div>
                                <div class="fs-12 text-muted">22/35 completed</div>
                            </div>
                        </div>
                        <div class="fs-4 fw-bold text-dark">22/35</div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between gap-4">
                        <div id="task-completed-area-chart"></div>
                        <div class="fs-12 text-muted text-nowrap">
                            <span class="fw-semibold text-primary">28% more</span><br />
                            <span>from last week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4 stretch stretch-full">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="avatar-text">
                                <i class="feather feather-file-text"></i>
                            </div>
                            <div>
                                <div class="fw-semibold text-dark">New Tasks</div>
                                <div class="fs-12 text-muted">0/20 tasks</div>
                            </div>
                        </div>
                        <div class="fs-4 fw-bold text-dark">5/20</div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between gap-4">
                        <div id="new-tasks-area-chart"></div>
                        <div class="fs-12 text-muted text-nowrap">
                            <span class="fw-semibold text-success">34% more</span><br />
                            <span>from last week</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4 stretch stretch-full">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="avatar-text">
                                <i class="feather feather-airplay"></i>
                            </div>
                            <div>
                                <div class="fw-semibold text-dark">Project Done</div>
                                <div class="fs-12 text-muted">20/30 project</div>
                            </div>
                        </div>
                        <div class="fs-4 fw-bold text-dark">20/30</div>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-between gap-4">
                        <div id="project-done-area-chart"></div>
                        <div class="fs-12 text-muted text-nowrap">
                            <span class="fw-semibold text-danger">42% more</span><br />
                            <span>from last week</span>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- [Mini] end ! -->

            <!-- [Latest Leads] start -->
            <div class="col-xxl-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Latest Leads</h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                                <div data-bs-toggle="tooltip" title="Delete">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                        data-bs-toggle="remove"></a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Refresh">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                        data-bs-toggle="refresh"></a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                        data-bs-toggle="expand"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="proposalList">
                                <thead>
                                    <tr>
                                        <th class="wd-30">
                                            <div class="custom-control custom-checkbox ms-1">
                                                <input type="checkbox" class="custom-control-input" id="master">
                                                <label class="custom-control-label" for="checkAllProposal"></label>
                                            </div>
                                        </th>
                                        <!-- <th><?= $this->lang->line('sr_no') ?></th> -->
                                        <!-- <th><?= $this->lang->line('duplicate_lead') ?></th> -->
                                        <th><?= $this->lang->line('title') ?></th>
                                        <th><?= $this->lang->line('contact_person') ?></th>
                                        <th><?= $this->lang->line('mobile') ?></th>
                                        <th><?= $this->lang->line('city') ?></th>
                                        <th><?= $this->lang->line('status') ?></th>
                                        <!-- <th><?= $this->lang->line('contact_person') ?></th> -->

                                        <!-- <th><?= $this->lang->line('mobile') ?></th> -->
                                        <th><?= $this->lang->line('priority') ?></th>

                                        <th><?= $this->lang->line('assigned_to') ?></th>

                                        <!-- <th><?= $this->lang->line('services') ?></th> -->



                                        <!-- <th><?= $this->lang->line('email') ?></th> -->
                                        <th><?= $this->lang->line('date') ?></th>
                                        <th class="text-end"><?= $this->lang->line('actions') ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if (!empty($latestLeads)) {
                                        $i = 1;
                                        foreach ($latestLeads as $lead) {     
                                    ?>
                                    <tr>
                                        <td>
                                            <div class="item-checkbox ms-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkbox sub_chk"
                                                        name="sub_chk[]" id="checkBox_<?= $i ?>"
                                                        value="<?= $lead['id'] ?>">
                                                    <label class="custom-control-label"
                                                        for="checkBox_<?= $i ?>"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            style="max-width:250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            <div><strong><?= $lead['lead_title'] ?? '-' ?></strong></div>
                                            <div><?= $lead['lead_code'] ?? '-' ?></div>
                                        </td>

                                        <td><?= $lead['contact_person'] ?? '-' ?></td>

                                        <td>
                                            <a href="tel:<?= $lead['mobile'] ?>"><?= $lead['mobile'] ?? '-' ?></a>
                                        </td>

                                        <td><?= $lead['city'] ?? '-' ?></td>


                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <select class="form-select lead-status" data-id="<?= $lead['id']; ?>"
                                                    data-select2-selector="status">
                                                    <option value="Qualify"
                                                        <?= ($lead['lead_status'] == 'Qualify') ? 'selected' : '' ?>
                                                        data-bg="bg-secondary">Qualify</option>
                                                    <option value="Won"
                                                        <?= ($lead['lead_status'] == 'Won') ? 'selected' : '' ?>
                                                        data-bg="bg-success">Won
                                                    </option>
                                                    <option value="Loss"
                                                        <?= ($lead['lead_status'] == 'Loss') ? 'selected' : '' ?>
                                                        data-bg="bg-danger">
                                                        Loss
                                                    </option>
                                                </select>
                                                <div class="hstack gap-2 justify-content-end">

                                                    <?php if (!empty($lead['is_duplicate']) && $lead['is_duplicate'] == 1) {
                                                    $dcode = $lead['duplicate_lead_code']; ?>
                                                    <a class="avatar-text avatar-md view-duplicate"
                                                        data-id="<?= $lead['duplicate_lead_code']; ?>"
                                                        href="javascript:void(0);">
                                                        <i class="feather feather-info"></i>
                                                    </a>
                                                    <div id="leadOffcanvasContainer"></div>
                                                    <?php $this->load->view('Lead_Module/Lead_Generation/component/view-duplicate', $lead['duplicate_lead_code']); ?>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                <select class="form-select lead-priority" data-id="<?= $lead['id']; ?>"
                                                    data-select2-selector="priority">
                                                    <option value="Low"
                                                        <?= ($lead['leads_priority'] == 'Low') ? 'selected' : '' ?>
                                                        data-bg="bg-primary">
                                                        Low</option>
                                                    <option value="Medium"
                                                        <?= ($lead['leads_priority'] == 'Medium') ? 'selected' : '' ?>
                                                        data-bg="bg-success">Medium</option>
                                                    <option value="High"
                                                        <?= ($lead['leads_priority'] == 'High') ? 'selected' : '' ?>
                                                        data-bg="bg-warning">High</option>
                                                    <option value="Very High"
                                                        <?= ($lead['leads_priority'] == 'Very High') ? 'selected' : '' ?>
                                                        data-bg="bg-danger">Very High
                                                    </option>
                                                </select>
                                            </div>
                                        </td>

                                        <td>
                                            <select name="employee_id" class="form-control select2 lead-employee"
                                                data-id="<?= htmlspecialchars($lead['id'], ENT_QUOTES, 'UTF-8'); ?>"
                                                data-select2-selector="default">
                                                <option value=""><?= $this->lang->line('select_employee') ?></option>

                                                <?php if (!empty($target) && is_array($target)): ?>
                                                <?php foreach ($target as $value): 
                                                    $selected = (isset($lead['lead_assign']) && $value['id'] == $lead['lead_assign']) ? 'selected' : '';
                                                ?>
                                                <option
                                                    value="<?= htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8') ?>"
                                                    <?= $selected ?>>
                                                    <?= htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8') ?>
                                                </option>
                                                <?php endforeach; ?>
                                                <?php else: ?>
                                                <option value=""><?= $this->lang->line('no_result') ?></option>
                                                <?php endif; ?>
                                            </select>
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <?= !empty($lead['date']) ? date('d-M-Y', strtotime($lead['date'])) : '-' ?>
                                        </td>
                                        <td>
                                            <div class="hstack gap-2 justify-content-end">
                                                <a href="<?php echo base_url(); ?>index.php/Leads/add/<?php echo $lead['id']; ?>"
                                                    class="avatar-text avatar-md">
                                                    <i class="feather feather-edit-3 "></i>
                                                </a>
                                                <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                    data-bs-target="#ViewLeave<?php echo $lead['id']; ?>">
                                                    <i class="feather feather-eye"></i>
                                                </a>

                                                <?php $this->load->view('Lead_Module/Lead_Generation/component/dash-view-leads', [
                                                'obj' => $lead,
                                                ]); ?>

                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++;
            
                                        }
                                    } else { ?>
                                    <tr>
                                        <td colspan="100">
                                            <h5 style="text-align: center;">No Leads Found</h5>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Latest Leads] end -->

            <!--! BEGIN: [Team Progress] !-->
            <div class="col-xxl-4">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Team Progress</h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                                <div data-bs-toggle="tooltip" title="Delete">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                        data-bs-toggle="remove"></a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Refresh">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                        data-bs-toggle="refresh"></a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                        data-bs-toggle="expand"></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-body custom-card-action">
                        <?php if (!empty($target)): ?>
                        <?php foreach (array_slice($target, 0, 4) as $key => $emp): ?>
                        <div class="hstack justify-content-between border border-dashed rounded-3 p-3 mb-3">
                            <div class="hstack gap-3">
                                <div class="avatar-image">
                                    <img src="<?= !empty($emp['photo']) ? base_url($emp['photo']) : base_url('assets/images/avatar/1.png'); ?>"
                                        alt="" class="img-fluid" />
                                </div>
                                <div>
                                    <a
                                        href="javascript:void(0);"><?= htmlspecialchars($emp['name'], ENT_QUOTES, 'UTF-8') ?></a>
                                    <div class="fs-11 text-muted">
                                        <?= !empty($emp['designation_name']) ? htmlspecialchars($emp['designation_name'], ENT_QUOTES, 'UTF-8') : 'No designation' ?>
                                    </div>
                                    <div class="fs-11 text-muted mt-1"><?= $emp['assigned_leads'] ?> Leads Assigned
                                    </div>
                                </div>
                            </div>
                            <div class="team-progressbar-<?= $key+1 ?>" data-progress="<?= $emp['progress_percent'] ?>">
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <div class="text-center text-muted">No employees found</div>
                        <?php endif; ?>
                    </div>
                    <a href="<?= base_url() ?>index.php/Employees/index"
                        class="card-footer fs-11 fw-bold text-uppercase text-center">View All
                        Employee</a>
                </div>
            </div>
            <!--! END: [Team Progress] !-->

            <!--! BEGIN: [Upcoming Activities] !-->
            <div class="col-xxl-4">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Upcoming Activities</h5>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($latest_activities)) { ?>
                        <?php foreach ($latest_activities as $activity) { ?>

                        <?php
							// Priority badge color
							$leads_priority = $activity['leads_priority'];
							$priorityClass = 'bg-soft-secondary text-muted';
							if ($leads_priority == 'Low')
								$priorityClass = 'bg-soft-success text-success';
							if ($leads_priority == 'Medium')
								$priorityClass = 'bg-soft-warning text-warning';
							if ($leads_priority == 'High')
								$priorityClass = 'bg-soft-danger text-danger';
							if ($leads_priority == 'Very High')
								$priorityClass = 'bg-soft-primary text-primary';

							$priority = $activity['leads_priority'];
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
                        <div class="p-3 border border-dashed rounded-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <div
                                        class="wd-50 ht-50 d-flex align-items-center justify-content-center flex-column rounded-2 schedule-date <?= $priorityClassBorder ?> <?= $priorityClass ?>">
                                        <span class="fs-14 fw-bold d-block">
                                            <?= date("d", strtotime($activity['due_date'])) ?>
                                        </span>
                                        <span class="fs-10 fw-semibold text-uppercase d-block">
                                            <?= date("M", strtotime($activity['due_date'])) ?>
                                        </span>
                                    </div>
                                    <div class="text-dark">
                                        <div class="fw-bold mb-1">
                                            <a href="<?= base_url() ?>index.php/Leads/leads_activity"
                                                class="fw-semibold mb-1 me-2">
                                                <?= $activity['activity_type'] ?>
                                            </a>
                                            <a href="<?= base_url() ?>index.php/Leads/leads_activity"
                                                class="badge <?= $priorityClass ?>">
                                                <?= $leads_priority ?>
                                            </a>
                                        </div>
                                        <div class="fs-11 text-muted"><?= $activity['lead_code'] ?>
                                            | <?= $activity['contact_person'] ?></div>
                                        <span class="fs-11 fw-normal text-muted">
                                            <?= date("h:i A", strtotime($activity['due_date'])) ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <a href="<?= base_url() ?>index.php/Leads/leads_activity" class="right-arrow-dash">
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } else { ?>
                        <p>No upcoming activities found.</p>
                        <?php } ?>
                    </div>
                    <a href="<?= base_url() ?>index.php/Leads/leads_activity"
                        class="card-footer fs-11 fw-bold text-uppercase text-center py-4">View All Activities</a>
                </div>
            </div>
            <!--! END: [Upcoming Activities] !-->

            <!-- [Total Sales] start -->
            <div class="col-xxl-4">
                <div class="card stretch stretch-full overflow-hidden">
                    <div class="bg-primary text-white">
                        <div class="p-4">
                            <span class="badge bg-light text-primary text-dark float-end">12%</span>
                            <div class="text-start">
                                <h4 class="text-reset">30,569</h4>
                                <p class="text-reset m-0">Total Sales</p>
                            </div>
                        </div>
                        <div id="total-sales-color-graph"></div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="hstack gap-3">
                                <div class="avatar-image avatar-lg p-2 rounded">
                                    <img class="img-fluid" src="assets/images/brand/shopify.png" alt="" />
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="d-block">Shopify eCommerce Store</a>
                                    <span class="fs-12 text-muted">Development</span>
                                </div>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">$1200</div>
                                <div class="fs-12 text-end">6 Projects</div>
                            </div>
                        </div>
                        <hr class="border-dashed my-3" />
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="hstack gap-3">
                                <div class="avatar-image avatar-lg p-2 rounded">
                                    <img class="img-fluid" src="assets/images/brand/app-store.png" alt="" />
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="d-block">iOS Apps Development</a>
                                    <span class="fs-12 text-muted">Development</span>
                                </div>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">$1450</div>
                                <div class="fs-12 text-end">3 Projects</div>
                            </div>
                        </div>
                        <hr class="border-dashed my-3" />
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="hstack gap-3">
                                <div class="avatar-image avatar-lg p-2 rounded">
                                    <img class="img-fluid" src="assets/images/brand/figma.png" alt="" />
                                </div>
                                <div>
                                    <a href="javascript:void(0);" class="d-block">Figma Dashboard Design</a>
                                    <span class="fs-12 text-muted">UI/UX Design</span>
                                </div>
                            </div>
                            <div>
                                <div class="fw-bold text-dark">$1250</div>
                                <div class="fs-12 text-end">5 Projects</div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center py-4">Full
                        Details</a>
                </div>
            </div>
            <!-- [Total Sales] end !-->






            <!--! BEGIN: [Project Status] !-->
            <div class="col-xxl-4">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Project Status</h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                                <div data-bs-toggle="tooltip" title="Delete">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-danger"
                                        data-bs-toggle="remove"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Refresh">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning"
                                        data-bs-toggle="refresh"> </a>
                                </div>
                                <div data-bs-toggle="tooltip" title="Maximize/Minimize">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-success"
                                        data-bs-toggle="expand"> </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown"
                                    data-bs-offset="25, 25">
                                    <div data-bs-toggle="tooltip" title="Options">
                                        <i class="feather-more-vertical"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-at-sign"></i>New</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-calendar"></i>Event</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-bell"></i>Snoozed</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-trash-2"></i>Deleted</a>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-settings"></i>Settings</a>
                                    <a href="javascript:void(0);" class="dropdown-item"><i
                                            class="feather-life-buoy"></i>Tips & Tricks</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body custom-card-action">
                        <div class="mb-3">
                            <div class="mb-4 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="assets/images/brand/app-store.png" alt="laravel-logo" class="me-3"
                                        width="35" />
                                    <div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line">Apps Development</a>
                                        <div class="fs-11 text-muted">Applications</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3 ht-5">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 54%"
                                            aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">54%</span>
                                </div>
                            </div>
                            <hr class="border-dashed my-3" />
                            <div class="mb-4 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="assets/images/brand/figma.png" alt="figma-logo" class="me-3" width="35" />
                                    <div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line">Dashboard Design</a>
                                        <div class="fs-11 text-muted">App UI Kit</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3 ht-5">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 86%"
                                            aria-valuenow="86" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">86%</span>
                                </div>
                            </div>
                            <hr class="border-dashed my-3" />
                            <div class="mb-4 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="assets/images/brand/facebook.png" alt="vue-logo" class="me-3"
                                        width="35" />
                                    <div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line">Facebook
                                            Marketing</a>
                                        <div class="fs-11 text-muted">Marketing</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3 ht-5">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 90%"
                                            aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">90%</span>
                                </div>
                            </div>
                            <hr class="border-dashed my-3" />
                            <div class="mb-4 pb-1 d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="assets/images/brand/github.png" alt="react-logo" class="me-3"
                                        width="35" />
                                    <div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line">React Dashboard
                                            Github</a>
                                        <div class="fs-11 text-muted">Dashboard</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3 ht-5">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 37%"
                                            aria-valuenow="37" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">37%</span>
                                </div>
                            </div>
                            <hr class="border-dashed my-3" />
                            <div class="d-flex">
                                <div class="d-flex w-50 align-items-center me-3">
                                    <img src="assets/images/brand/paypal.png" alt="sketch-logo" class="me-3"
                                        width="35" />
                                    <div>
                                        <a href="javascript:void(0);" class="text-truncate-1-line">Paypal Payment
                                            Gateway</a>
                                        <div class="fs-11 text-muted">Payment</div>
                                    </div>
                                </div>
                                <div class="d-flex flex-grow-1 align-items-center">
                                    <div class="progress w-100 me-3 ht-5">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 29%"
                                            aria-valuenow="29" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="text-muted">29%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0);" class="card-footer fs-11 fw-bold text-uppercase text-center">Upcomming
                        Projects</a>
                </div>
            </div>
            <!--! END: [Project Status] !-->
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

<script src="<?php echo base_url() . "assets/"; ?>js/jquery/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var base_url = '<?php echo base_url(); ?>';
    //alert(base_url);
    $(document).on('change', '.category', function() {
        var category_id = $('.category').find('option:selected').val();
        //var aa= base_url+"index.php/Meenus/rolewisedata/"+role_id;
        //alert(category_id);
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/Suppliers/getSupplierByCategory/') ?>" +
                category_id,
            //data: {id:role_id},
            dataType: 'html',
            success: function(response) {
                //alert(response);
                $(".suppliers").html(response);
                $('.select2').select2();
            }
        });
    });

    jQuery('#master').on('click', function(e) {
        if ($(this).is(':checked', true)) {
            $(".sub_chk").prop('checked', true);
        } else {
            $(".sub_chk").prop('checked', false);
        }
    });

    jQuery('.bulk_action').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).val());
        });
        //alert(allVals.length); return false;  
        if (allVals.length <= 0) {
            alert("Please select row.");
            return false;
        }
    });
    jQuery('#delete').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).val());
        });
        //alert(allVals.length); return false;  
        if (allVals.length <= 0) {
            alert("Please select row.");
            return false;
        } else {
            WRN_PROFILE_DELETE = "Are you sure you want to delete  selected records?";
            var check = confirm(WRN_PROFILE_DELETE);
            if (check == true) {
                var join_selected_values = allVals.join(",");

                $(".all_selected_ids").val(join_selected_values);
                // $.ajax({   
                //   type: "POST",  
                //   url: "<?php echo base_url(); ?>index.php/Leads/deleteItem",  
                //   cache:false,  
                //   data: 'ids='+join_selected_values,  
                //   success: function(response)  
                //   {   
                //     $(".successs_mesg").html(response);
                //     location.reload();
                //   }   
                // });

            }
        }
    });
});
</script>

<script>
var BASE_URL = "<?php echo base_url(); ?>";
</script>

<script>
$(document).ready(function() {
    $("[class^='team-progressbar-']").each(function() {
        let percent = $(this).data("progress");
        let className = $(this).attr("class");

        let color = "#17c666";
        if (className.includes("team-progressbar-1")) color = "#0d6efd";
        if (className.includes("team-progressbar-2")) color = "#6c757d";
        if (className.includes("team-progressbar-3")) color = "#198754";
        if (className.includes("team-progressbar-4")) color = "#dc3545";

        $(this).circleProgress({
            max: 100,
            value: percent,
            textFormat: "percent",
            colors: [color, color] // stroke color
        });
    });
});
</script>

<script>
var months = <?= json_encode(array_column($monthly_leads, 'month')) ?>;
var counts = <?= json_encode(array_column($monthly_leads, 'total')) ?>;

var options = {
    chart: {
        type: 'bar',
        height: 350
    },
    series: [{
        name: 'Leads',
        data: counts
    }],
    xaxis: {
        categories: months
    },
    colors: ['#3454d1'],
    dataLabels: {
        enabled: true
    }
};

var chart = new ApexCharts(document.querySelector("#leads-chart"), options);
chart.render();
</script>

<?php
$total = $leads_overview['won'] + $leads_overview['loss'] + $leads_overview['qualify'];

$leadsData = [
    round(($leads_overview['won'])),
    round(($leads_overview['loss'])),
    round(($leads_overview['qualify'])),
];
?>

<script>
$(document).ready(function() {

    fetch("<?= base_url('index.php/User_authentication/get_monthly_leads') ?>")
        .then(res => res.json())
        .then(data => {
            let months = data.map(d => d.month);
            let totals = data.map(d => parseInt(d.total));
            let won = data.map(d => parseInt(d.won));
            let loss = data.map(d => parseInt(d.loss));

            // find highest value among all series
            let highest = Math.max(
                Math.max(...totals),
                Math.max(...won),
                Math.max(...loss)
            );

            // function to calculate nice step
            function getNiceStep(max) {
                if (max <= 10) return 2;
                if (max <= 50) return 5;
                if (max <= 100) return 10;
                if (max <= 500) return 50;
                if (max <= 1000) return 100;
                if (max <= 5000) return 500;
                if (max <= 10000) return 1000;
                return Math.ceil(max / 10);
            }

            let step = getNiceStep(highest);
            let maxY = Math.ceil(highest / step) * step;
            let ticks = Math.ceil(maxY / step);

            new ApexCharts(document.querySelector("#lead-records-chart"), {
                chart: {
                    height: 380,
                    width: "100%",
                    stacked: !1,
                    toolbar: {
                        show: !1
                    }
                },
                stroke: {
                    width: [1, 2, 1, 1],
                    curve: "smooth",
                    lineCap: "round"
                },
                plotOptions: {
                    bar: {
                        endingShape: "rounded",
                        columnWidth: "30%"
                    }
                },
                colors: ["#3454d1", "#17c666", "#17c666", "#ea4d4d"],
                series: [{
                        name: "Total Leads",
                        type: "bar",
                        data: totals
                    },
                    {
                        name: "Won Leads",
                        type: "line",
                        data: won
                    },
                    {
                        name: "Won Leads bar",
                        type: "bar",
                        data: won
                    },
                    {
                        name: "Loss Leads",
                        type: "bar",
                        data: loss
                    }
                ],
                fill: {
                    opacity: [.85, .25, 1, 1],
                    gradient: {
                        inverseColors: !1,
                        shade: "light",
                        type: "vertical",
                        opacityFrom: .5,
                        opacityTo: .1,
                        stops: [0, 100, 100, 100]
                    }
                },
                markers: {
                    size: 0
                },
                xaxis: {
                    categories: months,
                    axisBorder: {
                        show: !1
                    },
                    axisTicks: {
                        show: !1
                    },
                    labels: {
                        style: {
                            fontSize: "10px",
                            colors: "#A0ACBB"
                        }
                    }
                },
                yaxis: {
                    min: 0,
                    max: maxY,
                    tickAmount: ticks,
                    forceNiceScale: true,
                    labels: {
                        formatter: function(val) {
                            return parseInt(val);
                        },
                        style: {
                            color: "#A0ACBB",
                            fontSize: "10px"
                        }
                    },
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    }
                },
                grid: {
                    xaxis: {
                        lines: {
                            show: !1
                        }
                    },
                    yaxis: {
                        lines: {
                            show: !1
                        }
                    }
                },
                dataLabels: {
                    enabled: !1
                },
                tooltip: {
                    shared: true,
                    intersect: false,
                    y: {
                        formatter: function(val, opts) {
                            let seriesName = opts.w.globals.seriesNames[opts.seriesIndex];
                            // Won Leads bar ko skip karo
                            if (seriesName === "Won Leads bar") return null;
                            return val;
                        }
                    },
                    style: {
                        fontSize: "12px",
                        fontFamily: "Inter"
                    }
                },
                legend: {
                    show: !1,
                    labels: {
                        fontSize: "12px",
                        colors: "#A0ACBB"
                    },
                    fontSize: "12px",
                    fontFamily: "Inter"
                }
            }).render();
        });
});

$(document).ready(function() {
    var leadsData = <?= json_encode($leadsData); ?>;
    var totalLeads = leadsData.reduce((a, b) => a + b, 0);

    new ApexCharts(document.querySelector("#leads-overview-dash"), {
        chart: {
            width: 328,
            type: "donut"
        },
        dataLabels: {
            enabled: !1
        },
        series: leadsData,
        labels: ["Won Leads", "Loss Leads", "Qualified Leads"],
        colors: ["#3454d1", "#e53935", "#42a5f5"],
        stroke: {
            width: 0,
            lineCap: "round"
        },
        legend: {
            show: !1,
            position: "bottom",
            fontFamily: "Inter",
            fontWeight: 500,
            labels: {
                colors: "#A0ACBB",
                fontFamily: "Inter"
            },
            markers: {
                width: 10,
                height: 10
            },
            itemMargin: {
                horizontal: 20,
                vertical: 5
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: "85%",
                    labels: {
                        show: 1,
                        name: {
                            show: 1
                        },
                        value: {
                            show: 1,
                            fontSize: "30px",
                            fontFamily: "Inter",
                            color: "#A0ACBB",
                            formatter: function(e) {
                                return e
                            }
                        },
                        total: {
                            show: true,
                            showAlways: true,
                            label: "Total Leads",
                            fontSize: "16px",
                            color: "#A0ACBB",
                            formatter: function() {
                                return totalLeads;
                            }
                        }
                    }
                }
            }
        },
        responsive: [{
            breakpoint: 380,
            options: {
                chart: {
                    width: 280
                },
                legend: {
                    show: !1
                }
            }
        }],
        tooltip: {
            y: {
                formatter: function(e) {
                    return +e
                }
            },
            style: {
                colors: "#A0ACBB",
                fontFamily: "Inter"
            }
        }
    }).render();
});
</script>

<script>
$(document).ready(function() {
    fetch("<?= base_url('index.php/User_authentication/get_leads_summary') ?>")
        .then(res => res.json())
        .then(data => {
            $("#total-leads").text(data.total);
            $("#won-leads").text(data.won);
            $("#loss-leads").text(data.loss);
            $("#qualify-leads").text(data.qualify);

            let wonPerc = data.total ? (data.won / data.total * 100).toFixed(1) : 0;
            let lossPerc = data.total ? (data.loss / data.total * 100).toFixed(1) : 0;
            let qualifyPerc = data.total ? (data.qualify / data.total * 100).toFixed(1) : 0;

            $("#won-progress").css("width", wonPerc + "%");
            $("#loss-progress").css("width", lossPerc + "%");
            $("#qualify-progress").css("width", qualifyPerc + "%");
            $("#total-progress").css("width", "100%");
        });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    // alert("hy");
    $(document).on("click", ".view-duplicate", function() {
        let leadId = $(this).data("id");
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/User_authentication/get_duplicate_details",
            type: "GET",
            data: {
                id: leadId
            },
            success: function(html) {
                // Insert the modal HTML into container
                $("#leadOffcanvasContainer").html(html);

                // Open the Bootstrap offcanvas
                let myOffcanvas = new bootstrap.Offcanvas(
                    document.getElementById("ViewDup" + leadId)
                );
                myOffcanvas.show();
            },
            error: function() {
                alert("Failed to load details. Please try again.");
            }
        });
    });
});
</script>