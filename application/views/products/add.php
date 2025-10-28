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
    <?php //$this->load->view('Lead_Module/Lead_Generation/component/filter-model'); ?>
    <?php $this->load->view('layout/alerts'); ?>
  <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="form-group m-2">
                        <div class="card-body custom-card-action p-0">
                            <?php
                            $form_action = !empty($id)
                                ? base_url("index.php/Products/edit/$id")
                                : base_url("index.php/Products/add");

                            echo form_open($form_action, [
                                'class' => 'form-horizontal',
                                'role' => 'form',
                                'enctype' => 'multipart/form-data'
                            ]);
                            ?>

                            <?php if (!empty($id)): ?>
                                <input type="hidden" name="product_id" value="<?= $id ?>">
                            <?php endif; ?>

                            <div class="row">
                                <!-- Category -->
                                <!-- <div class="col-lg-4 mb-4">
                                    <label class="form-label">
                                        <?= $this->lang->line('category') ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                        <?php echo form_dropdown('category_id',$categories,!empty($product['category_id']) ? $product['category_id'] : '',
                                            'class="form-select form-control" data-select2-selector="default" required="required"'
                                        ) ?>
                                    </div>
                                </div> -->
                                 <div class="col-lg-4 mb-4">
                                    <label class="form-label">
                                       <?= $this->lang->line('category') ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                        <!-- <input type="text" name="product_name"
                                            value="<?= !empty($product['name']) ? $product['name'] : '' ?>"
                                            class="form-control"
                                            placeholder="<?= $this->lang->line('product_name') ?>" required> -->
                                            <?php echo form_dropdown('category_id',$categories,!empty($product['category_id']) ? $product['category_id'] : '',
                                            'class="form-select form-control" data-select2-selector="default" required="required"'
                                        ) ?>
                                    </div>
                                </div>

                                <!-- Product Name -->
                                <div class="col-lg-4 mb-4">
                                    <label class="form-label">
                                        <?= $this->lang->line('product_name')?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-user"></i></div>
                                        <input type="text" name="product_name"
                                            value="<?= !empty($product['name']) ? $product['name'] : '' ?>"
                                            class="form-control"
                                            placeholder="<?= $this->lang->line('product_name') ?>" required>
                                    </div>
                                </div>

                                <!-- Price -->
                                <div class="col-lg-4 mb-4">
                                    <label class="form-label">
                                        <?= $this->lang->line('price')?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-user"></i></div>
                                        <input type="text" name="price"
                                            value="<?= !empty($product['price']) ? $product['price'] : '' ?>"
                                            class="form-control"
                                            placeholder="<?= $this->lang->line('item_price') ?>"
                                            maxlength="10"
                                            oninput="this.value = this.value.replace(/[^+0-9.]/g, '');">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Description -->
                                <div class="col-lg-8 mb-4">
                                    <label class="form-label">
                                        <?= $this->lang->line('description')?> <span class="text-danger">*</span>
                                    </label>
                                    <textarea name="description" id="description" style="display:none;">
                                        <?= !empty($product['description']) ? $product['description'] : '' ?>
                                    </textarea>
                                    <div class="editor w-100 m-0">
                                        <div class="ht-300 border-bottom-0" id="mailEditorModal"></div>
                                    </div>
                                </div>

                                <!-- Photo -->
                                <div class="col-lg-4 mb-4">
                                    <label class="form-label">
                                        <?= $this->lang->line('photo') ?> <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-image"></i></div>
                                        <input type="file" name="featured_photo" class="form-control file-upload-main">
                                    </div>

                                    <?php if (!empty($product['feature_img'])): ?>
                                        <input type="hidden" name="old_image" value="<?= $product['feature_img'] ?>">
                                        <div class="mt-2">
                                            <img src="<?= base_url('uploads/products/'.$product['feature_img']); ?>" width="100">
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-success">
                                        <?= !empty($id)
                                            ? $this->lang->line('update_lead')
                                            : $this->lang->line('create_lead') ?>
                                    </button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
$(document).ready(function() {
    // Initialize Quill
    var quill = new Quill("#mailEditorModal", {
        placeholder: "Write product description here...",
        theme: "snow"
    });

    // 🟢 Load existing description from textarea into Quill
    var existingDescription = $('#description').val().trim();
    if (existingDescription !== '') {
        quill.root.innerHTML = existingDescription;
    }

    // 🟢 Before form submit, copy back to textarea
    $('.form-horizontal').on('submit', function(e) {
        $('#description').val(quill.root.innerHTML);
        return true; // allow form submission
    });
});
</script>