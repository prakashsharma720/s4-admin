<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$lead['leads_priority'] ='Low';
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
                                       10/20
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
                                    <span class="fs-12 text-dark">20 Total</span>
                                    <span class="fs-11 text-muted">(50%)</span>
                                </div>
                            </div>
                            <div class="progress mt-2 ht-3">
                                <div class="progress-bar bg-primary" role="progressbar"
                                    style="width: <?php echo "50"; ?>%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Total Leads] end -->
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
                                    'Total Leads' => ['value'=>10, 'color'=>'#3454d1'],
                                    'Won Leads' => ['value'=>5, 'color'=>'#42a5f5'],
                                    'Loss Leads' => ['value'=>1, 'color'=>'#e53935'],
                                    'Qualified Leads' => ['value'=>4, 'color'=>'#00b894']
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
                                     
                                        <th><?= $this->lang->line('order_id') ?></th>
                                        <th><?= $this->lang->line('registration_date') ?></th>
                                        <th><?= $this->lang->line('user') ?></th>
                                        <th><?= $this->lang->line('product_name') ?></th>
                                        <th><?= $this->lang->line('price') ?></th>
                                        <th><?= $this->lang->line('reference_name') ?></th>
                                        <th><?= $this->lang->line('status') ?></th>
                                        <th class="text-end"><?= $this->lang->line('actions') ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                   
                                    <tr>
                                        <td>
                                        </td>
                                        <td
                                            style="max-width:250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            <div> S4-1000102</div>
                                        </td>
                                        <td>25-10-2025</td>
                                        <td> Yash Menariya</td>
                                        <td> S4 Smart Combo Pack 1 - White and Black</td>
                                        <td> &#8377;799</td>
                                        <td> Prakash Sharma</td>
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
                                             <div class="hstack gap-2 justify-content-end">
                                                <a href="<?php echo base_url(); ?>index.php/Leads/add/"
                                                    class="avatar-text avatar-md">
                                                    <i class="feather feather-edit-3 "></i>
                                                </a>
                                                <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                    data-bs-target="#ViewLeave">
                                                    <i class="feather feather-eye"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>            
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Latest Leads] end -->
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

<script src="<?php echo base_url() . "assets/"; ?>js/jquery/jquery.min.js"></script>

