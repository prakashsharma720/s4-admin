<?php
    defined('BASEPATH') or exit('No direct script access allowed');
    $current_page = current_url();
    $data = explode('?', $current_page);

    // Check if any filter is applied
    $is_filter_applied = !empty(array_filter([
        @$filtered_value['category_name'],
        @$filtered_value['lead_code'],
        @$filtered_value['lead_status'],
        @$filtered_value['employee_id'],
        @$filtered_value['from_date'],
        @$filtered_value['upto_date']
    ]));
?>
<div id="collapseOne" class="accordion-collapse collapse <?= $is_filter_applied ? 'show' : '' ?> page-header-collapse">
    <div class="accordion-body pb-2">
        <div class="card-body">
            <form method="get">
                <div class="row">

                    <!-- Search by Services -->
                    <div class="col-lg-4 mb-4">
                        <label class="form-label"><?= $this->lang->line('search_by_services') ?></label>
                        <select class="form-control select2" name="category_name" data-select2-selector="default">
                            <option value=""><?= $this->lang->line('select_services') ?></option>

                            <?php if ($categories): ?>
                            <?php foreach ($categories as $value): ?>
                            <option value="<?= $value['category_name'] ?>"
                                <?= ($value['category_name'] == @$filtered_value['category_name']) ? 'selected' : '' ?>>
                                <?= $value['category_name'] ?>
                            </option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option value=""><?= $this->lang->line('no_services_found') ?></option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Search by Lead ID -->
                    <div class="col-lg-4 mb-4">
                        <label class="form-label"><?= $this->lang->line('search_by_id') ?></label>
                        <select name="lead_code" class="form-control select2" data-select2-selector="default">
                            <option value=""><?= $this->lang->line('select_lead_id') ?></option>
                            <?php if (!empty($leads)): ?>
                            <?php foreach ($leads as $value): ?>
                            <option value="<?= $value['lead_code']; ?>"
                                <?= ($value['lead_code'] == @$filtered_value['lead_code']) ? 'selected' : ''; ?>>
                                <?= $value['lead_code']; ?>
                            </option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option value=""><?= $this->lang->line('no_leads_found') ?></option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- Search by Status -->
                    <div class="col-lg-4 mb-4">
                        <label class="form-label"><?= $this->lang->line('search_by_status') ?></label>
                        <select name="lead_status" class="form-control select2" data-select2-selector="default">
                            <option value=""><?= $this->lang->line('select_status') ?></option>
                            <option value="Pending"
                                <?= (@$filtered_value['lead_status'] == 'Pending') ? 'selected' : '' ?>>Pending</option>
                            <option value="Approved"
                                <?= (@$filtered_value['lead_status'] == 'Approved') ? 'selected' : '' ?>>Approved
                            </option>
                            <option value="In Process"
                                <?= (@$filtered_value['lead_status'] == 'In Process') ? 'selected' : '' ?>>In Process
                            </option>
                            <option value="Converted"
                                <?= (@$filtered_value['lead_status'] == 'Converted') ? 'selected' : '' ?>>Converted
                            </option>
                            <option value="Rejected"
                                <?= (@$filtered_value['lead_status'] == 'Rejected') ? 'selected' : '' ?>>Rejected
                            </option>
                        </select>
                    </div>

                    <!-- Search by Employee -->
                    <div class="col-lg-4 mb-4">
                        <label class="form-label"><?= $this->lang->line('search_by_employee') ?></label>
                        <select name="employee_id" class="form-control select2" data-select2-selector="default">
                            <option value=""><?= $this->lang->line('select_employee') ?></option>
                            <?php if (!empty($employees)): ?>
                            <?php foreach ($employees as $value): ?>
                            <option value="<?= $value['id'] ?>"
                                <?= ($value['id'] == @$filtered_value['employee_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($value['name']) ?>
                            </option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option value=""><?= $this->lang->line('no_result') ?></option>
                            <?php endif; ?>
                        </select>
                    </div>

                    <!-- From Date -->
                    <div class="col-lg-4 mb-4">
                        <label class="form-label"><?= $this->lang->line('from_date') ?></label>
                        <input type="text" id="issueDate" name="from_date" class="form-control date-picker"
                            placeholder="<?= $this->lang->line('from_date') ?>..." data-date-format="dd-mm-yyyy"
                            autocomplete="off"
                            value="<?= isset($filtered_value['from_date']) && !empty($filtered_value['from_date']) ? date('d-m-Y', strtotime($filtered_value['from_date'])) : '' ?>">
                    </div>

                    <!-- Upto Date -->
                    <div class="col-lg-4 mb-4">
                        <label class="form-label"><?= $this->lang->line('upto_date') ?></label>
                        <input type="text" id="dueDate" name="upto_date" class="form-control date-picker"
                            placeholder="<?= $this->lang->line('upto_date') ?>..." data-date-format="dd-mm-yyyy"
                            autocomplete="off"
                            value="<?= isset($filtered_value['upto_date']) && !empty($filtered_value['upto_date']) ? date('d-m-Y', strtotime($filtered_value['upto_date'])) : '' ?>">
                    </div>

                    <!-- Buttons Row -->
                    <div class="col-12 text-end mb-2 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">
                            <i class="bi bi-filter"></i> <span class="px-1"><?= $this->lang->line('filter') ?></span>
                        </button>
                        <a href="<?= $data[0] ?>" class="btn btn-danger">
                            <i class="bi bi-x-circle"></i> <span class="px-1"><?= $this->lang->line('reset') ?></span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>