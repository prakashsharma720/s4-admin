<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

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
                     <button type="button" class="btn btn-icon btn-light-brand delete_all" data-toggle="tooltip"
                                    title="Bulk Delete"><i class="feather feather-trash "></i></button>
                    <!-- Collapse Filter -->
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne">
                        <i class="feather-filter"></i>
                        
                    </a>

                    <!-- Download CSV -->
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse"
                        data-bs-target="#UploadCsvs">
                        <i class="feather-upload me-2"></i>
                        <span><?= $this->lang->line('upload_csv') ?></span>
                    </a>
                    <?php $qs = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? ('?'.$_SERVER['QUERY_STRING']) : ''; ?>
                    <a href="<?php echo base_url('index.php/Leads/export'.$qs); ?>" class="btn btn-primary"
                        id="exportCsvAll">
                        <i class="feather-download me-2"></i>
                        <span><?= $this->lang->line('download_csv') ?></span>
                    </a>

                    <!-- Create New Lead -->
                    <a href="<?php echo site_url('products/add'); ?>" class="btn btn-primary">
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
  <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="form-group m-2">
                        <div class="card-body custom-card-action p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="proposalList">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                   <tbody>
                                        <?php foreach($products as $p): ?>
                                            <tr>
                                                <td><?= $p['id']; ?></td>
                                                <td><?= htmlspecialchars($p['name']); ?></td>
                                                <td><?= htmlspecialchars($p['category_name']); ?></td>
                                                <td>₹ <?= number_format($p['price'], 2); ?></td>
                                                <td>
                                                    <?php if(!empty($p['feature_img'])): ?>
                                                        <img src="<?= base_url('uploads/products/'.$p['feature_img']); ?>" class="img-thumbnail" style="width: 80px; height: auto;">
                                                    <?php else: ?>
                                                        <span class="text-muted">No Image</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <div class="text-truncate" style="max-width: 200px;" data-bs-toggle="tooltip" title="<?= htmlspecialchars(strip_tags($p['description'])); ?>">
                                                        <?= word_limiter(strip_tags($p['description']), 15); ?>
                                                    </div>
                                                </td>
                                                <td>
                                                     <div class="hstack gap-2 justify-content-end">
                                                     <a href="<?php echo base_url(); ?>index.php/Products/edit/<?php echo $p['id']; ?>"
                                                        class="avatar-text avatar-md">
                                                        <i class="feather feather-edit-3 "></i>
                                                    </a>
                                                     <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                        data-bs-target="#deleteEmployees<?php echo $p['id']; ?>">
                                                        <i class="feather feather-trash"></i>
                                                    </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <div class="offcanvas offcanvas-end" tabindex="-1" id="deleteEmployees<?= $p['id']; ?>">
                                                <form method="post" action="<?= base_url('index.php/products/deleteEmployee/' . $p['id']); ?>">

                                                    <!-- Header -->
                                                    <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
                                                        <h2 class="fs-16 fw-bold mb-0"><?= $this->lang->line('confirm') ?></h2>
                                                        <button type="button" class="btn-close btn-close-gray ms-auto"
                                                            data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                    </div>

                                                    <!-- Body -->
                                                    <div class="offcanvas-body">
                                                        <p class="fs-15">
                                                            <?= $this->lang->line('confirm_delete') ?>:
                                                            <strong><?= !empty($p['name']) ? $p['name'] : 'Unnamed Product'; ?></strong>?
                                                        </p>
                                                    </div>

                                                    <!-- Footer -->
                                                    <div class="px-4 gap-2 d-flex align-items-center justify-content-between ht-80 border-top border-gray-2">
                                                        <button type="submit" class="btn btn-primary w-50">
                                                            <?= $this->lang->line('yes') ?>
                                                        </button>
                                                        <button type="button" class="btn btn-danger w-50" data-bs-dismiss="offcanvas">
                                                            <?= $this->lang->line('cancel') ?>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        <?php endforeach; ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
