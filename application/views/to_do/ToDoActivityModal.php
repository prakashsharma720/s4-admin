<div class="offcanvas offcanvas-end" tabindex="-1" id="addToDoOffcanvas">
    <div class="offcanvas-header ht-80 px-4 border-bottom border-gray-5">
        <h2 class="fs-16 fw-bold text-truncate-1-line">To-Do Task</h2>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>

    <div
        class="py-3 px-4 d-flex justify-content-between align-items-center border-bottom border-bottom-dashed border-gray-5 bg-gray-100">
        <div>
            <span class="fw-bold text-dark">Add New To-Do Task:</span>

        </div>
    </div>

    <div class="offcanvas-body">
        <form method="post" action="<?= base_url('index.php/to_do/add') ?>" class="modal-content">
            <div class="modal-body">
                <input type="hidden" name="title" value="To-Do Task">
                <div class="mb-3">
                    <label>Summery:</label>
                    <textarea name="to_do_description" class="form-control" rows="3"
                        placeholder="Write Your Summery"></textarea>
                </div>
                <div class="mb-3">
                    <label>Assign To</label>
                    <select name="assigned_to" class="form-control select2" data-select2-selector="default">
                        <option value=""><?= $this->lang->line('select_employee') ?></option>
                        <?php if (!empty($employees)): ?>
                        <?php foreach ($employees as $value): ?>
                        <option value="<?= $value['id'] ?>"
                            <?= ($value['id'] == $this->session->userdata['logged_in']['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($value['name']) ?>
                        </option>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <option value=""><?= $this->lang->line('no_result') ?></option>
                        <?php endif; ?>
                    </select>
                </div>

                <!-- <div class="mb-4">
                    <label class="form-label"><?= $this->lang->line('assign_to') ?> <span
                            class="text-danger">*</span></label>
                    <div class="input-group">
                        <?= form_dropdown('assigned_to', $employees, set_value('assigned_to'), 'class="form-select form-control" data-select2-selector="default" required="required"') ?>
                    </div>

                </div> -->
                <div class="mb-3">
                    <label>Due Date</label>
                    <input type="datetime-local" name="due_date" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save To-Do</button>
            </div>
        </form>
    </div>
</div>