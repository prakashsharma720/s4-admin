<style>
    .chat-container {
        display: flex;
        flex-direction: column;
        gap: 15px;
        padding: 15px;
    }

    .chat-message {
        display: flex;
        align-items: flex-end;
        max-width: 70%;
    }

    .chat-message.left {
        flex-direction: row;
        justify-content: flex-start;
    }

    .chat-message.right {
        flex-direction: row-reverse;
        justify-content: flex-end;
        margin-left: auto;
    }

    .chat-avatar img {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        object-fit: cover;
    }

    .chat-bubble {
        background: #f1f1f1;
        border-radius: 15px;
        padding: 10px 15px;
        margin: 0 10px;
        font-size: 14px;
        position: relative;
    }

    .chat-message.left .chat-bubble {
        background: #e2e6f0;
        border-bottom-left-radius: 0;
    }

    .chat-message.right .chat-bubble {
        background: #d1f7d6;
        border-bottom-right-radius: 0;
    }

    .chat-time {
        display: block;
        font-size: 11px;
        color: #777;
        margin-top: 5px;
    }
</style>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
get_instance()->load->helper('MY_array');

$allnotifications = $allnotifications ?? [];

// echo "<pre>"; print_r($allnotifications); exit;
?>

<?php $this->load->view('layout/alerts'); ?>

<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10"><?= $this->lang->line('notification') ?></h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a
                        href="<?php echo base_url('index.php/User_authentication/admin_dashboard'); ?>"><?= $this->lang->line('home') ?></a>
                </li>
                <li class="breadcrumb-item"><?= $this->lang->line('notification') ?></li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <?php $this->load->view('layout/alerts'); ?>
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span><?= $this->lang->line('back') ?></span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse"
                        data-bs-target="#collapseOne">
                        <i class="feather-filter"></i>
                    </a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>

        <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
            <div class="accordion-body pb-2">
                <div class="card-body">
                    <form method="get" action="<?= base_url('index.php/Notifications/index') ?>">
                        <div class="row">
                            <!-- From Date -->
                                <div class="col-lg-4 mb-4">
                                    <label class="form-label"><?= $this->lang->line('from_date') ?></label>
                                    <input type="text" id="issueDate" name="from_date" class="form-control date-picker"
                                        placeholder="<?= $this->lang->line('from_date') ?>..." data-date-format="dd-mm-yyyy"autocomplete="off"
                                        value="<?= isset($from_date) ? htmlspecialchars($from_date) : '' ?>">
                                </div>
                            
                            <!-- Upto Date -->
                                <div class="col-lg-4 mb-4">
                                    <label class="form-label"><?= $this->lang->line('upto_date') ?></label>
                                    <input type="text" id="dueDate" name="upto_date" class="form-control date-picker"
                                        placeholder="<?= $this->lang->line('upto_date') ?>..." data-date-format="dd-mm-yyyy"autocomplete="off"
                                        value="<?= isset($upto_date) ? htmlspecialchars($upto_date) : '' ?>">
                                </div>
                            <div class="col-lg-4 mb-3 d-flex align-items-end justify-content-end">
                                <button type="submit" class="btn btn-primary me-2">Filter</button>
                                    <?php if (!empty($filter_applied)): ?>
                                        <a href="<?= base_url('index.php/Notifications/index') ?>" class="btn btn-secondary">Reset</a>
                                    <?php endif; ?>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

    <div class="main-content">
        <div class="row">
            <div class="col-xxl-12 col-lg-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title"><?= $this->lang->line('all_notifications') ?></h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                              <form id="deleteAllForm" action="<?php echo base_url('index.php/Notifications/index'); ?>" method="post">
                                <!-- <button type="submit" class="btn btn-danger btn-sm mt-3" 
                                        onclick="return confirm('Are you sure you want to delete ALL notifications?')" title="Delete All">
                                    <i class="feather-trash-2"></i>
                                </button> -->
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- START: Notifications Form -->

                    <form id="deleteAllForm" action="<?= base_url('index.php/Notifications/deleteAll') ?>" method="post">
                        <div class="card-body pb-3">
                            <ul class="list-unstyled mb-0">
                                <?php if (!empty($allnotifications) && is_array($allnotifications)): ?>
                                    <?php foreach ($allnotifications as $notification): ?>
                                        <?php
                                            $message  = $notification['message'] ?? 'No message';
                                            $subject  = $notification['subject'] ?? '';
                                            $datetime = $notification['datetime'] ?? '';
                                            $id       = $notification['id'] ?? '---';
                                        ?>
                                        <li class="d-flex align-items-center justify-content-between py-3 border-bottom">
                                            <div class="me-3 flex-shrink-0">
                                                <img src="<?= !empty($notification['creator_photo']) 
                                                            ? base_url($notification['creator_photo']) 
                                                            : base_url('assets/images/avatar/1.png'); ?>" 
                                                    class="rounded mx-auto d-block"  style="width: 45px; height: 45px;"
                                                    alt="<?= !empty($notification['creator']) ? htmlspecialchars($notification['creator']) : 'Default Avatar'; ?>">
                                            </div>

                                            <div class="flex-grow-1 d-flex align-items-center justify-content-between">
                                                <div class="d-flex flex-column me-2">
                                                    <?php if (!empty($notification['lead_code'])): ?>
                                                        <small class="fw-semibold" style="font-size: 0.95rem; color:#283C50;">
                                                            <?= htmlspecialchars($notification['lead_code']) ?>
                                                        </small>
                                                    <?php endif; ?>

                                                    <div class="text-muted"><?= htmlspecialchars($message) ?></div>
                                                    <small class="text-muted"><?= time_elapsed_string($notification['datetime']) ?></small>
                                                </div>

                                                <div class="flex-shrink-0 ms-2" style="margin-right: 330px;">
                                                    <img src="<?= !empty($notification['employee_photo']) 
                                                                ? base_url($notification['employee_photo']) 
                                                                : base_url('assets/images/avatar/1.png'); ?>" 
                                                        class="rounded mx-auto d-block"  style="width: 35px; height: 35px;"
                                                        alt="<?= !empty($notification['employee']) ? htmlspecialchars($notification['employee']) : 'Default Avatar'; ?>">
                                                </div>
                                            </div>

                                            <div class="ms-3 flex-shrink-0">
                                                <a href="<?= base_url('index.php/Notifications/deleteNotification/' . $id) ?>"
                                                class="btn-sm d-flex align-items-center justify-content-center"
                                                style="width: 36px; height: 36px; border-radius: 50%;"
                                                onclick="return confirm('Are you sure you want to delete this notification?')"
                                                data-bs-toggle="tooltip" title="Delete">
                                                    <i class="feather-trash-2"></i>
                                                </a>
                                            </div>
                                        </li>
                                       <?php endforeach; ?>
                                      <?php else: ?>
                                    <li class="py-3 text-center text-muted">No notifications found.</li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo form_close(); ?>

<script src="<?= base_url("index.php/assets/js/jquery/jquery.min.js"); ?>"></script>
<!-- <script type="text/javascript">
$(document).ready(function() {
    // Master checkbox check/uncheck
    $('#master').on('click', function() {
        $(".sub_chk").prop('checked', $(this).is(':checked'));
    });

    // Confirm delete before submitting form
    $('#deleteForm').on('submit', function(e) {
        if ($('.sub_chk:checked').length == 0) {
            alert("Please select at least one notification to delete.");
            e.preventDefault();
        } else {
            if (!confirm("Are you sure you want to delete selected notifications?")) {
                e.preventDefault();
            }
        }
    });

    // Bulk delete
    jQuery('.delete_all').on('click', function(e) {
        var allVals = [];
        $(".sub_chk:checked").each(function() {
            allVals.push($(this).val());
        });

        if (allVals.length <= 0) {
            alert("Please select row.");
        } else {
            WRN_PROFILE_DELETE = "Are you sure you want to delete selected records?";
            var check = confirm(WRN_PROFILE_DELETE);
            if (check == true) {
                var join_selected_values = allVals.join(",");
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('index.php/Notifications/') ?>",
                    cache: false,
                    data: 'ids=' + join_selected_values,
                    success: function(response) {
                        $(".successs_mesg").html(response);
                        location.reload();
                    }
                });
            }
        }
    });
});
</script> -->


<script>
function submitDeleteForm() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You are about to delete notifications in this date range!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('deleteAllForm').submit();
        }
    });
}
</script>
<!-- <script>
$('.delete-single-btn').on('click', function() {
    console.log('heko');
    const id = $(this).data('id');
    alert(id);

    if (confirm('Are you sure you want to delete this notification?')) {
        $.ajax({
            url: '<?= base_url("index.php/Notifications/") ?>',
            type: 'POST',
            data: {
                ids: id
            },
            success: function(response) {
                alert("Notification deleted successfully!");
                location.reload();
            },
            error: function() {
                alert("Failed to delete notification.");
            }
        });
    }
});
</script> -->