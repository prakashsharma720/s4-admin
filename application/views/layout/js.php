<!-- <div class="modal fade" id="addnotesmodal" tabindex="-1" data-bs-keyboard="false" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Add Notes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form action="javascript:void(0);" id="addnotesmodalTitle">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title">
                                        <label class="form-label">Note Title</label>
                                        <input type="text" id="note-has-title" class="form-control" minlength="25" placeholder="Title">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="note-description">
                                        <label class="form-label">Note Description</label>
                                        <textarea id="note-has-description" class="form-control" minlength="60" placeholder="Description" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="btn-n-save" class="float-left btn btn-success">Save</button>
                <button class="btn btn-danger" data-dismiss="modal">Discard</button>
                <button id="btn-n-add" class="btn btn-success" disabled="disabled">Add Note</button>
            </div>
        </div>
    </div>
</div> -->
<script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- BEGIN: Core Vendor Scripts -->
<script src="<?= base_url('assets/vendors/js/vendors.min.js'); ?>"></script>
  <script src="<?= base_url('assets/vendors/js/jquery.print.min.js');?> "></script>


<script src="<?= base_url('assets/vendors/js/circle-progress.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/dataTables.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/dataTables.bs5.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/daterangepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/datepicker.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/cleave.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/apexcharts.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/tagify.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/tagify-data.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/select2.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/select2-active.min.js'); ?>"></script>
<script src="<?= base_url('assets/vendors/js/jquery.steps.min.js'); ?>"></script>
<!-- END: Core Vendor Scripts -->

<!-- BEGIN: Application Initialization -->
<script src="<?= base_url('assets/js/common-init.min.js'); ?>"></script>
<script src="<?php echo base_url()."assets/"; ?>js/apps-email-init.min.js"></script>
<script src="<?= base_url('assets/vendors/js/quill.min.js'); ?>"></script>

<script src="<?= base_url('assets/js/dashboard-init.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/proposal-create-init.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/proposal-init.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/projects-create-init.min.js'); ?>"></script>
    
<script src="<?= base_url('assets/js/invoice-create-init.min.js'); ?>"></script>
 <script src="<?= base_url('assets/js/invoice-view-init.min.js'); ?> "></script>

<!-- END: Application Initialization -->

<!-- BEGIN: Theme Customizer -->
<script src="<?= base_url('assets/js/theme-customizer-init.min.js'); ?>"></script>
