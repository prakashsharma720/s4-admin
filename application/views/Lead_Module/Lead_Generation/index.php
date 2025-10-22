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


                    <!-- Download CSV -->
                    <!-- <a href="<?php echo base_url('uploads/Lead_csv_MO_ERP.xlsx'); ?>" class="btn btn-primary" download>
                        <i class="feather-download me-2"></i>
                        <span>Download CSV</span>
                    </a> -->

                    <?php $qs = isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] !== '' ? ('?'.$_SERVER['QUERY_STRING']) : ''; ?>
                    <a href="<?php echo base_url('index.php/Leads/export'.$qs); ?>" class="btn btn-primary"
                        id="exportCsvAll">
                        <i class="feather-download me-2"></i>
                        <span><?= $this->lang->line('download_csv') ?></span>
                    </a>

                    <!-- Create New Lead -->
                    <a href="<?php echo base_url('index.php/Products/add'); ?>" class="btn btn-primary">
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
    <?php $this->load->view('Lead_Module/Lead_Generation/component/upload-csv-model'); ?>

    <?php $this->load->view('layout/alerts'); ?>

    <!-- Main Content -->
    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="form-group m-2">
                        <form method="get" action="<?php echo base_url(); ?>index.php/Leads/approveall">
                            <div class="row">
                                <div class="col-4">
                                    <select id="selectestimateid" class="form-control" data-select2-selector="default"
                                        name="approveaction">
                                        <option class="white" value=""><?= $this->lang->line('select_action') ?>
                                        </option>
                                        <option class="white" value="Approved">Approve</option>
                                        <option class="white" value="Rejected">Rejected</option>
                                        <option class="white" value="delete_all">Delete</option>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary me-2 bulk_action">
                                        <i class="bi bi-filter"></i> <?= $this->lang->line('apply') ?>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="card-body custom-card-action p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="proposalList">
                                    <thead>
                                        <tr>
                                            <th class="wd-30">
                                                <div class="custom-control custom-checkbox ms-1">
                                                <input type="checkbox" id="master"></th>
                                                </div>
                                            </th>
                                            <!-- <th><?= $this->lang->line('sr_no') ?></th> -->
                                            <!-- <th><?= $this->lang->line('duplicate_lead') ?></th> -->
                                            <th><?= $this->lang->line('title') ?></th>

                                            <th><?= $this->lang->line('estimate_no') ?></th>

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
                                            <th class="text-center"><?= $this->lang->line('actions') ?></th>
                                        </tr>
                                    </thead>

                                    <!-- Load tbody Partial -->
                                    <?php $this->load->view('Lead_Module/Lead_Generation/component/tbody'); ?>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="<?php echo base_url() . "assets/"; ?>js/jquery/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    // alert("hy");
    $(document).on("click", ".view-duplicate", function() {
        let leadId = $(this).data("id");
        $.ajax({
            url: "<?php echo base_url(); ?>index.php/Leads/get_duplicate_details", // create this controller method
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
  $('.delete_all').on('click', function() {
    var allVals = [];
    $(".sub_chk:checked").each(function() {
        allVals.push($(this).val());
    });

    if (allVals.length <= 0) {
        alert("Please select row.");
        return;
    }

    if (confirm("Are you sure you want to delete all selected records?")) {
        var join_selected_values = allVals.join(",");
        // alert (join_selected_values);
        // return false;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('index.php/Leads/deleteItem'); ?>", // Updated URL
            data: { ids: join_selected_values },
                


            success: function(response) {
                alert("Deleted successfully");
                location.reload();
            },
            error: function(xhr, status, error) {
                alert("Something went wrong: " + error);
            }
        });
    }
});

});
</script>

<script>
var BASE_URL = "<?php echo base_url(); ?>";
</script>