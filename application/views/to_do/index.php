<style>
.rating-stars i {
    font-size: 16px;
    color: #f5c518;
}

.rating-stars i.text-muted {
    color: #dcdcdc !important;
}
</style>

<div class="nxl-content">
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">To-Do Task</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?php echo base_url('index.php/User_authentication/admin_dashboard'); ?>">
                        <?= $this->lang->line('home') ?>
                    </a>
                </li>
                <li class="breadcrumb-item">To-Do Task</li>
            </ul>
        </div>

        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="offcanvas"
                        data-bs-target="#addToDoOffcanvas">
                        <i class="feather-plus me-2"></i>
                        <span>Add New To-Do</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('to_do/ToDoActivityModal'); ?>

    <?php $this->load->view('layout/alerts'); ?>

    <div class="main-content">
        <div class="row">
            <div class="col-lg-12">

                <div class="card border-top-0">
                    <div class="card-header p-0">
                        <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="toDoTabs"
                            role="tablist">
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#pendingToDo" role="tab">Pending To-Do</a>
                            </li>
                            <li class="nav-item flex-fill border-top" role="presentation">
                                <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#completedToDo" role="tab">Completed To-Do</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body p-0">
                        <div class="tab-content">

                            <!-- Pending -->
                            <div class="tab-pane active show" id="pendingToDo" role="tabpanel">
                                <?php if (!empty($pending_todos)): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card stretch stretch-full">
                                            <div class="card-body custom-card-action">
                                                <?php foreach ($pending_todos as $todo): ?>
                                                <?php
                                                            $date = !empty($todo->due_date) ? date('d M', strtotime($todo->due_date)) : '--';
                                                            $time = !empty($todo->due_date) ? date('h:iA', strtotime($todo->due_date)) : '--';
                                                        ?>

                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="me-4 text-center">
                                                        <h2 class="fs-16 fw-bold mb-0"><?= $time ?></h2>
                                                        <small class="fs-12 text-muted"><?= $date ?></small>
                                                    </div>

                                                    <div
                                                        class="align-items-center border-3 border-start border-warning rounded w-100 p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-6 align-items-center">
                                                                <div class="mx-2">
                                                                    <div class="d-flex gap-3">
                                                                        <span
                                                                            class="fw-semibold"><?= htmlspecialchars($todo->title) ?></span>
                                                                        <span
                                                                            class="badge bg-soft-warning text-warning"><?= htmlspecialchars($todo->status) ?></span>
                                                                    </div>
                                                                    <div class="fs-12 text-muted mt-1">
                                                                        Assigned To:
                                                                        <strong><?= htmlspecialchars($todo->employee_name) ?></strong>
                                                                    </div>
                                                                    <div class="fs-12 text-muted mt-1">
                                                                        <strong>Original Notes:</strong>
                                                                    </div>
                                                                    <div class="fs-12 fw-normal text-muted">
                                                                        <?= nl2br(htmlspecialchars($todo->to_do_description)) ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 d-flex align-items-center">
                                                                <div class="col-6">

                                                                    <?php if (!empty($todo->to_do_feedback)): ?>
                                                                    <div class="">
                                                                        <strong>Feedback:</strong>
                                                                        <div class="text-muted fs-12">
                                                                            <?= nl2br(htmlspecialchars($todo->to_do_feedback)) ?>
                                                                        </div>
                                                                    </div>
                                                                    <?php else: ?>
                                                                    <a href="javascript:void(0)"
                                                                        class="avatar-md me-2 mark_done_btn"
                                                                        data-id="<?= $todo->id ?>"
                                                                        data-assign="<?= $todo->assigned_to ?>">
                                                                        <strong><i
                                                                                class="feather feather-check"></i></strong>
                                                                        Mark Done
                                                                    </a>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="mb-3">
                                                                        <select name="status"
                                                                            class="form-control todo-status"
                                                                            data-id="<?= $todo->id ?>">
                                                                            <option value="Pending"
                                                                                <?= $todo->status == 'Pending' ? 'selected' : '' ?>>
                                                                                Pending</option>
                                                                            <option value="In Progress"
                                                                                <?= $todo->status == 'In Progress' ? 'selected' : '' ?>>
                                                                                In Progress</option>
                                                                            <option value="Completed"
                                                                                <?= $todo->status == 'Completed' ? 'selected' : '' ?>>
                                                                                Completed</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="border-dashed my-3">
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-info">No pending to-do activities.</div>
                                <?php endif; ?>
                            </div>

                            <!-- Completed -->
                            <div class="tab-pane" id="completedToDo" role="tabpanel">
                                <?php if (!empty($completed_todos)): ?>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card stretch stretch-full">
                                            <div class="card-body custom-card-action">
                                                <?php foreach ($completed_todos as $todo): ?>
                                                <?php
                                                    $date = !empty($todo->due_date) ? date('d M', strtotime($todo->due_date)) : '--';
                                                    $time = !empty($todo->due_date) ? date('h:iA', strtotime($todo->due_date)) : '--';
                                                ?>

                                                <div class="d-flex align-items-center mb-3">
                                                    <div class="me-4 text-center">
                                                        <h2 class="fs-16 fw-bold mb-0"><?= $time ?></h2>
                                                        <small class="fs-12 text-muted"><?= $date ?></small>
                                                    </div>

                                                    <div
                                                        class="align-items-center border-3 border-start border-success rounded w-100 p-2">
                                                        <div class="row align-items-center">
                                                            <div class="col-lg-6">
                                                                <div class="mx-2">
                                                                    <div class="d-flex gap-3">
                                                                        <span
                                                                            class="fw-semibold"><?= htmlspecialchars($todo->title) ?></span>
                                                                        <span
                                                                            class="badge bg-soft-success text-success"><?= htmlspecialchars($todo->status) ?></span>
                                                                    </div>
                                                                    <div class="fs-12 text-muted mt-1">
                                                                        Assigned To:
                                                                        <strong><?= htmlspecialchars($todo->employee_name) ?></strong>
                                                                    </div>
                                                                    <div class="fs-12 text-muted mt-1">
                                                                        <strong>Original Notes:</strong>
                                                                    </div>
                                                                    <div class="fs-12 fw-normal text-muted">
                                                                        <?= nl2br(htmlspecialchars($todo->to_do_description)) ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="col-lg-6 d-flex justify-content-between align-items-center gap-2">
                                                                <?php if (!empty($todo->to_do_feedback)): ?>
                                                                <div class="">
                                                                    <strong>Feedback:</strong>
                                                                    <div class="text-muted fs-12">
                                                                        <?= nl2br(htmlspecialchars($todo->to_do_feedback)) ?>
                                                                    </div>
                                                                </div>
                                                                <?php else: ?>
                                                                <div class="">
                                                                    <a href="javascript:void(0)"
                                                                        class="avatar-md me-2 mark_done_btn"
                                                                        data-id="<?= $todo->id ?>"
                                                                        data-assign="<?= $todo->assigned_to ?>">
                                                                        <strong><i
                                                                                class="feather feather-check"></i></strong>
                                                                        Mark Done
                                                                    </a>
                                                                </div>
                                                                <?php endif; ?>
                                                                <i
                                                                    class="feather feather-check-circle text-success fs-20"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr class="border-dashed my-3">
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                <div class="alert alert-info">No completed to-do activities.</div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>

<script>
var BASE_URL = "<?= base_url(); ?>";

// When user clicks "Mark Done"
$(document).on("click", ".mark_done_btn", function() {
    let todoId = $(this).data("id");
    let assignTo = $(this).data("assign");

    $("#mark_done_todo_id").val(todoId);
    $("#toDoMarkDoneForm").data("assign", assignTo);

    // form action
    $("#toDoMarkDoneForm").attr("action", BASE_URL + "index.php/To_do/save_feedback/" + todoId);

    $("#toDomarkDoneModal").modal("show");
});

// star rating logic (optional)
$(document).on("click", ".star-rating i", function() {
    var val = $(this).data("value");
    $("#activity_rating").val(val);
    $(".star-rating i").removeClass("active");
    $(this).prevAll("i").addBack().addClass("active");
});

// submit feedback
$(document).on("submit", "#toDoMarkDoneForm", function(e) {
    e.preventDefault();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        dataType: "json",
        success: function(res) {
            if (res.status) {
                $("#toDomarkDoneModal").modal("hide");
                location.reload();
            } else {
                alert(res.message || "Error saving feedback!");
            }
        },
        error: function() {
            alert("Server error, please try again!");
        }
    });
});

// change status instantly
$(document).on("change", ".todo-status", function() {
    let todoId = $(this).data("id");
    let newStatus = $(this).val();

    $.ajax({
        url: BASE_URL + "index.php/To_do/update_status_ajax/" + todoId,
        type: "POST",
        data: {
            status: newStatus
        },
        dataType: "json",
        success: function(res) {
            if (res.status) {
                // Optionally, show a toast or reload
                console.log(res.message);
                location.reload();
            } else {
                alert(res.message || "Failed to update status!");
            }
        },
        error: function() {
            alert("Server error while updating status!");
        }
    });
});
</script>