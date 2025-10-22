<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10"><?= $this->lang->line('leads_marketing') ?></h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a
                        href="<?php echo base_url('index.php/User_authentication/admin_dashboard'); ?>"><?= $this->lang->line('home') ?></a>
                </li>
                <li class="breadcrumb-item"><?= $this->lang->line('leads_marketing') ?></li>
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

                    <!-- Download CSV -->
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse"
                        data-bs-target="#UploadCsvs">
                        <i class="feather-upload me-2"></i>
                        <span>Upload CSV</span>
                    </a>


                    <!-- Download CSV -->
                    <!-- <a href="<?php echo base_url('uploads/Lead_csv_MO_ERP.xlsx'); ?>" class="btn btn-primary" download>
                        <i class="feather-download me-2"></i>
                        <span>Download CSV</span>
                    </a> -->

                    <?php $qs = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? ('?'.$_SERVER['QUERY_STRING']) : ''; ?>
                    <a href="<?php echo base_url('index.php/Leads/export'.$qs); ?>" class="btn btn-primary"
                        id="exportCsvAll">
                        <i class="feather-download me-2"></i>
                        <span>Download CSV</span>
                    </a>

                    <!-- Create New Lead -->
                    <a href="<?php echo base_url('index.php/Leads/add'); ?>" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Create New Lead</span>
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
    <?php $this->load->view('Lead Module/Lead Generation/component/filter-model'); ?>
    <?php $this->load->view('Lead Module/Lead Generation/component/upload-csv-model'); ?>

    <!-- Flash Success Message -->
    <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible">
        <h5><i class="icon fa fa-check"></i> Success!</h5>
        <?php echo $this->session->flashdata('success'); ?>
    </div>
    <?php endif; ?>

    <!-- Flash Error Message -->
    <?php if ($this->session->flashdata('failed')): ?>
    <div class="alert alert-error alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fa fa-check"></i> Alert!</h5>
        <?php echo $this->session->flashdata('failed'); ?>
    </div>
    <?php endif; ?>
    <!-- <div class="pull-right" style="margin-left:20px;">
         <a class="btn btn-xs btn-danger " href="<?php echo base_url(); ?>uploads/Lead_SCV_import__MO_ERP_-_Sheet1_(2)18.xlsx">
          <i class="fa fa-plus"></i> Download Csv Format</a>
      </div> -->
    <!-- <div class="pull-right">
         <a class="btn btn-xs btn-primary " href="<?php echo base_url(); ?>index.php/Leads_marketing/add">
          <i class="fa fa-plus"></i> Create New Lead</a>
      </div> -->

    <form action="<?php echo base_url(); ?>index.php/Leads/importdata" enctype="multipart/form-data" method="post"
        role="form">
        <div class="row">
            <!-- <div class="col-md-12">
              <div class="col-md-6">
                  <label class="control-label"> Upload File</label><span class="required"> (Only Excel/CSV File Import. in given format)</span>
                  <input type="file" name="uploadFile" value="" required="required" />
              </div>
              <div class="col-md-6">
                <button type="submit" class="btn btn-success" name="submit" value="submit">Upload Excel/CSV File Here</button>
              </div>
          </div>   -->
        </div>
    </form>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">

                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="proposalList">
                                <thead>
                                    <tr>
                                        <th class="wd-30">
                                            <div class="custom-control custom-checkbox ms-1">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="checkAllProposal">
                                                <label class="custom-control-label" for="checkAllProposal"></label>
                                            </div>
                                        </th>
                                        <th><?= $this->lang->line('sr_no') ?></th>
                                        <th><?= $this->lang->line('status') ?></th>
                                        <th><?= $this->lang->line('code') ?></th>
                                        <th><?= $this->lang->line('date') ?></th>
                                        <th><?= $this->lang->line('services') ?></th>
                                        <th><?= $this->lang->line('title') ?></th>
                                        <th><?= $this->lang->line('contact_person') ?></th>
                                        <th><?= $this->lang->line('mobile') ?></th>
                                        <th><?= $this->lang->line('email') ?></th>
                                        <th><?= $this->lang->line('assign_to') ?></th>
                                        <th><?= $this->lang->line('assign_by') ?></th>
                                        <th><?= $this->lang->line('reject_reason') ?></th>
                                        <th><?= $this->lang->line('last_update') ?></th>
                                        <th class="text-end"><?= $this->lang->line('actions') ?></th>
                                    </tr>
                                </thead>

                                <tbody> <?php if(!empty($leads)) {
									 $i=1;
									 foreach($leads as $obj) { ?>
                                    <tr>
                                        <td>
                                            <div class="item-checkbox ms-1">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input checkbox sub_chk"
                                                        name="sub_chk[]" id="checkBox_<?= $i ?>"
                                                        value="<?= $obj['id'] ?>">
                                                    <label class="custom-control-label"
                                                        for="checkBox_<?= $i ?>"></label>
                                                </div>
                                            </div>
                                        </td>
                                        <td> <?= $i ?> </td>
                                        <!-- <td>
															<?php  
																if($obj['is_duplicate']== 0){
																	echo "-";
																}
																else if($obj['is_duplicate']== 1){
																	echo "<p style='color:red';>Seems Like  Duplicate </p>";
																}
															?>
														</td> -->

                                        <?php 
														if($obj['lead_status'] == 'Pending'){
															$btn_class='btn-pending';
														}else if($obj['lead_status'] == 'Approved'){
															$btn_class='btn-approved';
														}else if($obj['lead_status'] == 'In Process'){
															$btn_class='btn-inprocess';
														}else if($obj['lead_status'] == 'Converted'){ $btn_class='btn-converted';
														}else if($obj['lead_status'] == 'Rejected'){ $btn_class='btn-rejected';
														}
														else if($obj['lead_status'] == 'Approve but no action'){
															$btn_class='btn-converted';
														}
													?>

                                        <td>
                                            <!-- <button class="btn btn-sm <?php echo $btn_class; ?>"
                                                style="pointer-events: none;">
                                                <?php
															if($obj['lead_status'] == 'Approved'){?>
                                                <span <?php echo $btn_class; ?>>Converted</span>
                                                <?php  } else if($obj['lead_status'] == 'Rejected') { ?>
                                                <span <?php echo $btn_class; ?>>Declined</span>
                                                <?php }
															else if($obj['lead_status']=='In Process'){?>
                                                <span <?php echo $btn_class; ?>>Inprocess</span>
                                                <?php }
																else {
																	echo $obj['lead_status'];
																	?>

                                                <?php }?>
                                            </button> -->

                                            <?php
											$status = $obj['lead_status'];
											switch ($status) {
												case 'Pending':
													echo '<div class="badge bg-warning text-dark">Pending</div>';
													break;
												case 'Approve but no action':
													echo '<div class="badge bg-success text-white">Approve but no action</div>';
													break;
												case 'In Process':
													echo '<div class="badge bg-primary text-white">Inprocess</div>';
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
                                        </td>

                                        <td><?= $obj['lead_code']?></td>

                                        <td style="white-space: nowrap;">
                                            <?= date('d-M-Y',strtotime($obj['date']))?>
                                        </td>

                                        <td><?= $obj['category_name']?></td>

                                        <td
                                            style="max-width:250px;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;">
                                            <?= $obj['lead_title']?> </td>
                                        <td><?= $obj['contact_person']?></td>
                                        <td><a href="tel:<?= $obj['mobile']?>"><?= $obj['mobile']?></a></td>
                                        <td><a href="mailto:<?= $obj['email']?>"><?= $obj['email']?></a>
                                        </td>
                                        <td> <?= $obj['person_name']?></td>
                                        <td> <?= $obj['assign_name']?></td>
                                        <td>
                                            <?php if($obj['lead_status']=='Rejecetd'){ ?>
                                            <?= $obj['reject_reason']?>
                                            <?php }else {?>
                                            <span align="center" style="color:red;">Lead is In
                                                Process</span>
                                            <?php }?>
                                        </td>
                                        <td> <?php if($obj['last_update']=='0000-00-00 00:00:00'){?>
                                            <span align="center" style="color:red;">No Followup Taken</span>
                                            <?php }else{

															$curr_time=$obj['last_update'];
															// print_r($curr_time);
															
															$timea=strtotime($curr_time);
															echo time_Ago($timea); 
														}?>
                                        </td>

                                        <td>

                                            <!-- <a class="btn btn-xs btn-primary btnEdit" href="<?php echo base_url(); ?>index.php/Leads_marketing/add/<?php echo $obj['id'];?>"><i class="fa fa-edit"></i></a> -->
                                            <!-- <a class="btn btn-xs btn-danger btnEdit" data-toggle="modal" data-target="#delete<?php echo $obj['id'];?>"><i style="color:#fff;"class="fa fa-trash"></i> </a> -->
                                            <div class="hstack gap-2 justify-content-end">
                                                <a class="avatar-text avatar-md"
                                                    href="<?php echo base_url(); ?>index.php/Leads_marketing/followups/<?php echo $obj['id'];?>"
                                                    title=" Lead Followup"><i class="fa fa-comment"></i></a>
                                                <a class="avatar-text avatar-md" data-toggle="modal"
                                                    data-target="#reminder<?php echo $obj['id'];?>"
                                                    title=" Reminder Alert"><i class="fa fa-bell"></i></a>

                                                <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                    data-bs-target="#ViewLeave<?php echo $obj['id']; ?>">
                                                    <i class="feather feather-eye"></i>
                                                </a>
                                                <?php $this->load->view('Lead Module/Lead Generation/component/view-leave', ['obj' => $obj]); ?>
                                            </div>
                                            <!-- <a class="btn btn-xs btn-primary btnEdit" data-toggle="modal" data-target="#assign<?php echo $obj['id'];?>" title="Assign Lead"><i style="color:#fff;"class="fa fa-user"></i> </a> -->

                                        </td>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="delete<?php echo $obj['id'];?>" role="dialog">
                                            <div class="modal-dialog">
                                                <form class="form-horizontal" role="form" method="post"
                                                    action="<?php echo base_url(); ?>index.php/Leads_marketing/deleteItem/<?php echo $obj['id'];?>">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"> Delete Lead </h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure, you want to delete Lead
                                                                <b><?php echo $obj['lead_code'];?> </b>?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary delete_submit">
                                                                Yes
                                                            </button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">
                                                                No
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Delete Modal -->
                                        <!-- Assign Modal -->
                                        <div class="modal fade" id="assign<?php echo $obj['id'];?>" role="dialog">
                                            <div class="modal-dialog">

                                                <form class="form-horizontal" role="form" method="post"
                                                    action="<?php echo base_url(); ?>index.php/Leads_marketing/assignto/<?php echo $obj['id'];?>">

                                                    <input type="hidden" name="lead_id" value="<?=  $obj['id']?>">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"> Assign Lead </h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-md-8 col-sm-8 ">

                                                                <label class="control-label">Search By
                                                                    Employee
                                                                </label>
                                                                <select name="employee_id"
                                                                    class="form-control select2 ">
                                                                    <option value="">Select employee
                                                                    </option>
                                                                    <?php
																if ($employees): ?>
                                                                    <?php 
																	foreach ($employees as $value) : ?>
                                                                    <?php 
																		if ($value['id'] == $filtered_value['employee_id']): ?>
                                                                    <option value="<?= $value['id'] ?>" selected>
                                                                        <?= $value['name'] ?>
                                                                    </option>
                                                                    <?php else: ?>
                                                                    <option value="<?= $value['id'] ?>">
                                                                        <?= $value['name'] ?>
                                                                    </option>
                                                                    <?php endif; ?>
                                                                    <?php endforeach; ?>
                                                                    <?php else: ?>
                                                                    <option value="">No result</option>
                                                                    <?php endif; ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">
                                                                Submit </button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">
                                                                Cancel </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- Assign Modal -->
                                        <!-- Reminder Modal -->
                                        <div class="modal fade" id="reminder<?php echo $obj['id'];?>" role="dialog">
                                            <div class="modal-dialog">

                                                <form class="form-horizontal" role="form" method="post"
                                                    action="<?php echo base_url(); ?>index.php/Leads_marketing/reminder/<?php echo $obj['id'];?>">

                                                    <input type="hidden" name="lead_id" value="<?= $obj["id"]?>">

                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"> Set Reminder </h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="row col-md-12">
                                                            <div class="col-md-12">
                                                                <label class="control-label">Reminder Title
                                                                </label><span class="required">*</span>


                                                                <input type="text" class="form-control reminder"
                                                                    name="reminder_title" required="required" value="">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label class="control-label">Select Date
                                                                </label> <span class="required">*</span>
                                                                <input type="date" class="form-control reminder"
                                                                    id="gatepass_date" name="reminder_date" value="">
                                                                <!-- <input type="date" class="form-control reminder" id="reminder_date" name="reminder_date" required="required"> -->
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="control-label">
                                                                    Time</label><span class="required">*</span>

                                                                <input type="time" id="reminder_time"
                                                                    name="reminder_time" min="10`:00" max="18:00"
                                                                    class="form-control" required="required">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">
                                                                Submit </button>
                                                            <button type="button" class="btn btn-danger"
                                                                data-dismiss="modal">
                                                                Cancel </button>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                        <!-- Reminder Modal -->

                                    </tr>
                                    <?php  $i++;} }else{ ?>
                                    <tr>
                                        <td colspan="100">
                                            <h5 style="text-align: center;"> No Leads Found</h5>
                                        </td>
                                    </tr>
                                    <?php  }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$("#filter_hide").hide();

$(document).ready(function() {

    $(".content").hide();
    $(".show_hide").on("click", function() {
        var txt = $(".content").is(':visible') ? 'Read More' : 'Read Less';
        $(".show_hide").text(txt);
        $(this).next('.content').slideToggle(200);
    });

    $(".filter_show").on("click", function() {
        $("#filter_hide").show();
    });

});
</script>