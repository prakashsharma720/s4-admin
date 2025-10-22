<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// echo"<pre>";print_r($employees);exit;
?>

<style type="text/css">
.btnEdit {
    width: 25%;
    border-radius: 5px;
    margin: 1px;
    padding: 1px;
}

.col-sm-6,
.col-md-6 {
    float: left;
}
</style>

<?php if($this->session->flashdata('success')): ?>
<div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fa fa-check"></i> Success!</h5>
    <?php echo $this->session->flashdata('success'); ?>
</div>
<!-- <span class="successs_mesg"><?php echo $this->session->flashdata('success'); ?></span> -->
<?php endif; ?>

<?php if($this->session->flashdata('failed')): ?>
<div class="alert alert-error alert-dismissible ">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fa fa-check"></i> Alert!</h5>
    <?php echo $this->session->flashdata('failed'); ?>
</div>
<?php endif; ?>
<div class="nxl-content">

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Quotation</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Create</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">


            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="table-responsive">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><?= $this->lang->line('sr_no') ?></th>
                        <th> <?= $this->lang->line('estimate_no') ?> </th>
                        <th> <?= $this->lang->line('name') ?> </th>
                        <th> <?= $this->lang->line('action') ?> </th>


                    </tr>
                </thead>

                <tbody>
                    <?php $i = 1;
						foreach ($leads as $obj) {
						?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $obj['estimate_no']; ?></td>
                        <td><?php echo $obj['lead_title']; ?></td>
                        <td>
                            <a href="<?php echo base_url(); ?>index.php/Leads/print_preview/<?php echo $obj['id'];?>" class="btn btn-icon avatar-text avatar-md" data-toggle="tooltip" title="New Employee"><i class="feather-file-text"></i></a>
                        </td>

                    </tr>
                    <?php  $i++; } ?>
                </tbody>
            </table>




        </div>
    </div>








</div>