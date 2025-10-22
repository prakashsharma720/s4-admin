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
                    <div class="col-lg-2 mb-2">
                        <label class="form-label"><?= $this->lang->line('search_by_year') ?></label>
                        <select name="year" class="form-control select2" data-select2-selector="default">
                            <option value=""><?= $this->lang->line('select_year') ?></option>
                            <?php 
                        $currentYear = date('Y');
                        for ($year = $currentYear; $year >= ($currentYear - 5); $year--): ?>
                            <option value="<?= $year ?>" <?= ($year == @$filtered_value['year']) ? 'selected' : '' ?>>
                                <?= $year ?>
                            </option>
                            <?php endfor; ?>
                        </select>
                    </div>

                    <div class="col-lg-2 mb-2">
                        <label class="form-label"><?= $this->lang->line('search_by_month') ?></label>
                        <select name="month_id" class="form-control select2" data-select2-selector="default">
                            <option value=""><?= $this->lang->line('select_month') ?></option>
                            <?php if (!empty($employees)): ?>
                            <?php foreach ($months as $value): ?>
                            <option value="<?= $value['id'] ?>"
                                <?= ($value['id'] == @$filtered_value['month_id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($value['month_name']) ?>
                            </option>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <option value=""><?= $this->lang->line('no_result') ?></option>
                            <?php endif; ?>
                        </select>

                    </div>


                    <!-- Search by Employee -->
                    <div class="col-lg-4 mb-2">
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