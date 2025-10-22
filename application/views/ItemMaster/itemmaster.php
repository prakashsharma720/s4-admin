<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5> <a
                        href="<?php echo base_url('index.php/ItemMasterController/index'); ?>"><?= $this->lang->line('item_master') ?></a>
                </h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a
                        href="<?php echo base_url('index.php/User_authentication/admin_dashboard'); ?>"><?= $this->lang->line('home') ?></a>
                </li>
                <li class="breadcrumb-item"><?= $this->lang->line('view_list') ?>
                </li>
            </ul>
        </div>
        <div class="page-header-right ms-auto d-flex align-items-center">
            <?php $this->load->view('layout/alerts'); ?>
            <!-- <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">

                        <div class="pull-right d-flex">
                            <div class="button-group float-right d-flex gap-2">
                               
                                <a href="javascript:void(0);" class="btn btn-icon btn-light-brand"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" data-toggle="tooltip"
                                    title="Filter">
                                    <i class="feather-filter"></i>
                                </a>

                                <a href="<?php echo base_url(); ?>index.php/Employees/add"
                                    class="btn btn-icon btn-light-brand" data-toggle="tooltip" title="New Employee"><i
                                        class="feather feather-plus"></i></a>
                                <button class="btn btn-icon btn-light-brand" data-toggle="tooltip" title="Refresh"
                                    onclick="location.reload();"><i class="fa fa-refresh"></i></button>

                                <button type="button" class="btn btn-icon btn-light-brand delete_all"
                                    data-toggle="tooltip" title="Bulk Delete"><i
                                        class="feather feather-trash "></i></button>

                            </div>
                        </div>
                    </div>
                </div>

               
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div> -->
        </div>
       
    </div>

    <div class="main-content">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <?php  //echo $title; exit; ?>
                        <?php if(!empty($id)) { ?>
                        <form class="form-horizontal" role="form" method="post"
                            action="<?php echo base_url(); ?>index.php/ItemMasterController/editproducts/<?= $id ?>">
                            <input type="hidden" name="product_id" value="<?= $id?>">
                            <?php } else { ?>
                            <form class="form-horizontal" role="form" method="post"
                                action="<?php echo base_url(); ?>index.php/ItemMasterController/add_products/">
                                <?php } ?>
                                <div class="form-group">
                                    <div class="row col-md-18">
                                        <div class="col-md-12 col-sm-12 mb-2 ">
                                            <label class="control-label">
                                                <?= $this->lang->line('item_name') ?></label>
                                            <input type="text"
                                                placeholder="<?= $this->lang->line('enter_item_name') ?> "
                                                name="product_name" class="form-control" value="<?= $product_name?>"
                                                required autofocus>
                                        </div>

                                         <div class="col-md-12 col-sm-12 mb-2 ">
                                            <label class="control-label">
                                                <?= $this->lang->line('hsn_code') ?></label>
                                            <input type="text"
                                                placeholder="<?= $this->lang->line('enter_hsn') ?> "
                                                name="hsn_code" class="form-control" value="<?= $hsn_code?>"
                                                required autofocus>
                                        </div>

                                         <div class="col-md-12 col-sm-12 mb-2 ">
                                            <label class="control-label">
                                                <?= $this->lang->line('unit') ?></label>
                                            <input type="text"
                                                placeholder="<?= $this->lang->line('enter_unit') ?> "
                                                name="unit" class="form-control" value="<?= $unit?>"
                                                required autofocus>
                                        </div>
                                  
                                     



                                    </div>

                                    <div class="row col-md-14">
                                        <div class="col-md-12 col-sm-12 ">
                                            <label class="control-label" style="visibility: hidden;"> Name</label><br>
                                            <button type="submit"
                                                class="btn btn-primary btn-block"><?= $this->lang->line('submit') ?></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                    </div>
                    <!-- /form -->

                    <div class=" col-md-8 col-sm-8">
                        <h5><?= $this->lang->line('item_list') ?></h5>
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th><?= $this->lang->line('sr_no') ?></th>
                                        <th style="width: 90%;"><?= $this->lang->line('item_name') ?></th>
                                        <th><?= $this->lang->line('hsn_code') ?></th>
                                        <th><?= $this->lang->line('unit') ?></th>
                                       
                                        <th><?= $this->lang->line('action') ?></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1;foreach($projects as $project) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $project['product_name']?></td>
                                        <td><?= $project['hsn_code']?></td>
                                        <td><?= $project['unit']?></td>
                                       





                                        <td> <a class="btn btn-xs btn-info btnEdit"
                                                href="<?php echo base_url(); ?>index.php/ItemMasterController/index/<?php echo $project['id'];?>"><i
                                                    class="fa fa-edit"></i></a></td>
                                    </tr>
                                    <?php $i++;} ?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>