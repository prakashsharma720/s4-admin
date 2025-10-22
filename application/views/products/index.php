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
                                            <th>SKU</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($products as $p): ?>
                                            <tr>
                                                <td><?= $p->id; ?></td>
                                                <td><?= $p->product_name; ?></td>
                                                <td><?= $p->sku; ?></td>
                                                <td><?= $p->price; ?></td>
                                                <td><?= $p->stock; ?></td>
                                                <td><?= $p->status ? 'Active' : 'Inactive'; ?></td>
                                                <td>
                                                    <a href="<?= site_url('products/edit/'.$p->id); ?>">Edit</a> |
                                                    <a href="<?= site_url('products/delete/'.$p->id); ?>" onclick="return confirm('Delete this product?')">Delete</a>
                                                </td>
                                            </tr>
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
