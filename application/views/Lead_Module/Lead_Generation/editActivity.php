<div class="modal fade" id="editActivityModel" tabindex="-1" data-bs-keyboard="false" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Activity</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editActivityForm">
                    <input type="hidden" name="id" id="edit_id">
                    <?php
						$activity_type = ['To-do', 'Email', 'Call', 'Meeting', 'Other'];
					?>
                    <div class="mb-3">
                        <label for="edit_activity_type" class="form-label">Activity Type</label>
                        <select name="activity_type" class="form-control form-select select2" id="edit_activity_type"
                            data-select2-selector="default" required>
                            <option value="">-- Select --</option>
                            <?php foreach ($activity_type as $status): ?>
                            <option value="<?= $status ?>"><?= $status ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="col-lg-12 mb-4" id="otherField4" style="display:none;">
                        <label class="form-label">Please Specify</label>
                        <input type="text" name="other_text" id="edit_other_text" class="form-control"
                            placeholder="Enter activity details">
                    </div>

                    <div class="mb-3">
                        <label>Due Date</label>
                        <input type="datetime-local" name="due_date" id="edit_due_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Summary</label>
                        <textarea name="activity_summary" id="edit_activity_summary" class="form-control"
                            required></textarea>
                    </div>

                    <div class="modal-footer px-0">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">Discard</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>