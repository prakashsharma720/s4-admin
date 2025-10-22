<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<style>
.input-group>span.select2.select2-container {
    width: auto !important;
}

.card-input-element:checked+.card::after {
    font-size: 13px;
}

.firm_check {
    padding: 12px 10px;
}

.cursor-pointer {
    cursor: pointer;
}
</style>

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">
                    <?= !empty($id) ? $this->lang->line('lead_edit') : $this->lang->line('add_new_lead') ?></h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>"><?= $this->lang->line('home') ?></a></li>
                <li class="breadcrumb-item">
                    <?= !empty($id) ? $this->lang->line('lead_edit') : $this->lang->line('add_lead') ?></li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i><span>Back</span>
                    </a>
                </div>
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a class="btn btn-light-brand"><span><?= $this->lang->line('lead_code') ?></span></a>
                    <a class="btn btn-primary"><span><?= $lead_code ?></span></a>
                </div>
            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-xl-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">

                        <?php
                        $form_action = !empty($id)
                            ? base_url("index.php/Leads/edititem/$id")
                            : base_url("index.php/Leads/add_new_item");

                        echo form_open($form_action, ['class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']);
                        ?>

                        <input type="hidden" name="lead_code" value="<?= $lead_code ?>">
                        <?php if (!empty($id)): ?>
                        <input type="hidden" name="old_lead_id" value="<?= $id ?>">
                        <?php endif; ?>

                        <?php
                        $date = !empty($generation_date)
                            ? date('Y-m-d', strtotime($generation_date))
                            : date('Y-m-d');
                        ?>

                        <div class="row">
                            <div class="col-lg-4 mb-4 d-none">
                                <label class="form-label"
                                    style="display: none;"><?= $this->lang->line('lead_generation_date') ?><span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-calendar"></i></div>
                                    <input type="hidden" class="form-control" name="generation_date"
                                        value="<?= $date ?>" required>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('services') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                    <?= form_dropdown('category_name', $categories, $category_name, 'class="form-select form-control" data-select2-selector="default" required="required"') ?>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('title') ?> <span
                                        class="text-danger">*</span></label>
                                <!-- <div><?= $title ?></div> -->
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-info"></i></div>
                                    <input type="text" name="title" value="<?php echo $title; ?>" class="form-control"
                                        placeholder="Title" required>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('contact_person_name')?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-user"></i></div>
                                    <input type="text" name="contact_person" value="<?= $contact_person ?>"
                                        class="form-control"
                                        placeholder="<?= $this->lang->line('contact_person_name') ?>" required>
                                </div>
                            </div>

                            <!-- <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('country') ?> <span
                                        class="text-danger">*</span></label>
                                <?php
                                    echo form_dropdown(
                                        'country',
                                        $countrylist,
                                        set_value('country'),
                                        'class="form-select form-control" data-select2-selector="default" required="required"',
                                    );
                                ?>
                            </div> -->

                            <!-- <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('country') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-globe"></i></div>
                                    <?= form_dropdown('country', $countrylist, $country, 'class="form-select form-control" data-select2-selector="default" required="required"') ?>
                                </div>
                            </div> -->

                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('mobile_no') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-phone"></i></div>
                                    <input type="text" name="mobile" value="<?= $mobile ?>" class="form-control"
                                        placeholder="<?= $this->lang->line('mobile_no') ?>" maxlength="10"
                                        oninput="this.value = this.value.replace(/[^+0-9]/g, '');">
                                </div>
                            </div>

                            <!-- <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('city') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                    <input type="text" name="city" value="<?= $city ?>" class="form-control"
                                        placeholder="<?= $this->lang->line('city') ?>" required>
                                </div>
                            </div> -->

                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('email') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-mail"></i></div>
                                    <input type="email" name="email" value="<?= $email ?>" class="form-control"
                                        placeholder="<?= $this->lang->line('email') ?>" required>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label">Current Location<span class="text-danger">*</span></label>
                                    <div>
                                        <a class="cursor-pointer text-primary" onclick="getCurrentLocation()">Click Get
                                            Address - <i class="feather-map-pin"></i></a>
                                        <span id="geoSpinner" style="display:none;margin-left:8px;">
                                            <i class="spinner-border spinner-border-sm" role="status"
                                                aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                    <input type="text" id="currentLocation" name="current_location" class="form-control"
                                        value="<?= $current_location ?>" placeholder="Tap Get Address" readonly
                                        required>
                                </div>

                                <!-- Hidden / visible fields to fill -->
                                <input type="hidden" id="city" name="city" value="<?= $city ?? '' ?>">
                                <input type="hidden" id="state" name="state" value="<?= $state ?? '' ?>">
                                <input type="hidden" id="pincode" name="pincode" value="<?= $pincode ?? '' ?>">
                                <input type="hidden" id="country" name="country" value="<?= $country ?? '' ?>">
                                <input type="hidden" id="map_link" name="map_link" value="<?= $map_link ?>">
                            </div>

                            <!-- <input type="hidden" name="city" value="<?= $city ?>"> -->
                            <!-- <input type="hidden" name="state" value="<?= $state ?>"> -->

                            <div class="col-lg-4 mb-4 d-none">
                                <label class="form-label" style="display: none;"><?= $this->lang->line('lead_source') ?>
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="hidden" name="lead_source" value="Field" class="form-control"
                                        placeholder="<?= $this->lang->line('lead_source') ?>">
                                </div>
                            </div>




                            <!-- <?php
                                $architect = ['Architect', 'Interior Designer', 'Contractor']; 
                            ?>
                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('architect_interior') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <select name="lead_architect" class="form-select form-control"
                                        data-select2-selector="default" required="required">
                                        <option value="">Select Any One *</option>
                                        <?php foreach ($architect as $lead_architects): ?>

                                        <option value="<?= $lead_architects ?>"
                                            <?= ($lead_architect == $lead_architects) ? 'selected' : '' ?>>
                                            <?= $lead_architects ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> -->


                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('lead_assigned_to') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-users"></i></div>
                                    <?= form_dropdown('lead_assign', $employees, set_value('lead_assign', $lead_assign), 'class="form-select form-control" data-select2-selector="default" required="required"') ?>
                                </div>

                            </div>

                            <!-- <?php
                                $priority = ['north', 'south', 'east', 'west']; 
                            ?>
                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('region_selection') ?>
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-map"></i></div>
                                    <select name="region_selection" class="form-select form-control"
                                        data-select2-selector="default" required="required">
                                        <option value="">Select Any One *</option>
                                        <?php foreach ($priority as $region_selections): ?>

                                        <option value="<?= $region_selections ?>"
                                            <?= ($region_selection == $region_selections) ? 'selected' : '' ?>>
                                            <?= $this->lang->line($region_selections) ?>

                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div> -->

                            <!-- <div class="col-lg-6 mb-4">
                                <label class="form-label"><?= $this->lang->line('description') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-file-text"></i></div>
                                    <textarea name="description" class="form-control" rows="3"
                                        placeholder="<?= $this->lang->line('lead_description') ?>"><?= $description ?></textarea>
                                </div>
                            </div> -->

                            <!-- <div class="col-lg-6 mb-4">
                                <label class="form-label"><?= $this->lang->line('project_address') ?> <span
                                        class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-map-pin"></i></div>
                                    <textarea name="project_address" class="form-control" rows="3"
                                        placeholder="<?= $this->lang->line('enter_project_address') ?>"
                                        required><?= $project_address ?></textarea>
                                </div>
                            </div> -->

                            <?php if (!empty($id)) :
                                $status_options = ['Qualify', 'Won', 'Loss']; ?>
                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('lead_status') ?></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-flag"></i></div>
                                    <select name="lead_status" class="form-select form-control"
                                        data-select2-selector="default" required="required">
                                        <?php foreach ($status_options as $status): ?>
                                        <option value="<?= $status ?>"
                                            <?= ($lead_status == $status) ? 'selected' : '' ?>>
                                            <?= $status ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <?php endif; ?>

                            <?php
                                $priority = ['Low', 'Medium', 'High', 'Very High'];
                                $priority_classes = [
                                    'Low'       => 'bg-success',
                                    'Medium'    => 'bg-warning',
                                    'High'      => 'bg-danger',
                                    'Very High' => 'bg-primary'
                                ];
                            ?>

                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('priority') ?></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-alert-circle"></i></div>
                                    <select name="leads_priority" class="form-select form-control"
                                        data-select2-selector="city" required="required">
                                        <option value="">Select Any One*</option>
                                        <?php foreach ($priority as $priority_status): 
                                            $class = isset($priority_classes[$priority_status]) ? $priority_classes[$priority_status] : 'bg-secondary';
                                        ?>
                                        <option value="<?= $priority_status ?>"
                                            <?= ($leads_priority == $priority_status) ? 'selected' : '' ?>
                                            data-city="<?= $class ?>">
                                            <?= $priority_status ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 mb-4">
                                <label class="form-label"><?= $this->lang->line('upload_site_photo') ?>
                                    <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text"><i class="feather-image"></i></div>
                                    <input type="file" name="lead_site_file" class="form-control file-upload-main"
                                        accept="image/*">
                                </div>
                            </div>

                            <?php
                                $priority = ['north', 'south', 'east', 'west']; 
                            ?>
                            <fieldset class="col-lg-8">
                                <label for="" class="form-label w-100"><?= $this->lang->line('region_selection') ?>
                                    <span class="text-danger">*</span></label>
                                <div class="row">
                                    <?php foreach ($priority as $region_selections): ?>

                                    <div class="col-lg-3 mb-4">
                                        <label class="w-100" for="region_<?= $region_selections ?>">
                                            <input class="card-input-element d-none" type="radio"
                                                name="region_selection" id="region_<?= $region_selections ?>"
                                                value="<?= $this->lang->line($region_selections) ?>"
                                                <?= ($region_selection == $this->lang->line($region_selections)) ? 'checked' : '' ?>
                                                required>
                                            <span
                                                class="card card-body firm_check d-flex flex-row justify-content-between align-items-center m-0">
                                                <span class="hstack gap-3">
                                                    <span>
                                                        <span class="d-block fs-13 fw-bold text-dark">
                                                            <?= ucfirst($this->lang->line($region_selections)) ?>
                                                        </span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>
                                    </div>

                                    <?php endforeach; ?>
                                </div>
                            </fieldset>


                            <div class="col-lg-4 mb-4 d-flex gap-4 your-brand">
                                <div
                                    class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                    <!-- Image Preview -->
                                    <?php 
                                        $preview_src = !empty($lead_site_file) 
                                            ? $lead_site_file 
                                            : base_url('assets/images/icons/1.png'); 
                                        ?>

                                    <img id="previewImage" src="<?= $preview_src ?>"
                                        class="upload-pic img-fluid rounded h-100 w-100" alt="Preview">
                                    <input type="hidden" name="old_lead_site_file" value="<?= $preview_src ?>">
                                    <!-- Camera Icon Overlay -->
                                    <div
                                        class="position-absolute start-50 top-50 translate-middle hstack align-items-center justify-content-center c-pointer upload-button">
                                        <i class="feather feather-camera" aria-hidden="true"></i>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-1">
                                    <div class="fs-11 text-gray-500 mt-2"># Upload photo</div>
                                    <div class="fs-11 text-gray-500"># Avatar max size 1000*1000</div>
                                    <div class="fs-11 text-gray-500"># Max upload size 2MB</div>
                                    <div class="fs-11 text-gray-500"># Allowed file types: png, jpg, jpeg</div>
                                </div>
                            </div>



                            <div class="row">
                                <div
                                    class="d-flex d-flex justify-content-between py-4 align-items-center border-top border-bottom mb-4">
                                    <h5 class="flex m-0">
                                        <strong>Mediator</strong>
                                    </h5>
                                </div>

                                <div class="col-lg-8">
                                    <fieldset class="row">
                                        <label for="" class="form-label">Select Any One <span
                                                class="text-danger">*</span></label>

                                        <label class="col-lg-3 mb-4" for="architect">
                                            <input class="card-input-element d-none" type="radio" name="lead_architect"
                                                id="architect" value="Architect"
                                                <?= ($lead_architect == 'Architect') ? 'checked' : '' ?>>
                                            <span
                                                class="card card-body firm_check d-flex flex-row justify-content-between align-items-center m-0">
                                                <span class="hstack gap-3">
                                                    <span>
                                                        <span class="d-block fs-13 fw-bold text-dark">Architect</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>

                                        <label class="col-lg-3 mb-4" for="interior_designer">
                                            <input class="card-input-element d-none" type="radio" name="lead_architect"
                                                id="interior_designer" value="Interior Designer"
                                                <?= ($lead_architect == 'Interior Designer') ? 'checked' : '' ?>>
                                            <span
                                                class="card card-body firm_check d-flex flex-row justify-content-between align-items-center m-0">
                                                <span class="hstack gap-3">
                                                    <span>
                                                        <span class="d-block fs-13 fw-bold text-dark">Interior
                                                            Designer</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>

                                        <label class="col-lg-3 mb-4" for="contractor">
                                            <input class="card-input-element d-none" type="radio" name="lead_architect"
                                                id="contractor" value="Contractor"
                                                <?= ($lead_architect == 'Contractor') ? 'checked' : '' ?>>
                                            <span
                                                class="card card-body firm_check d-flex flex-row justify-content-between align-items-center m-0">
                                                <span class="hstack gap-3">
                                                    <span>
                                                        <span class="d-block fs-13 fw-bold text-dark">Contractor</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>

                                        <label class="col-lg-3 mb-4" for="tiles_designer">
                                            <input class="card-input-element d-none" type="radio" name="lead_architect"
                                                id="tiles_designer" value="Tiles Designer"
                                                <?= ($lead_architect == 'Tiles Designer') ? 'checked' : '' ?>>
                                            <span
                                                class="card card-body firm_check d-flex flex-row justify-content-between align-items-center m-0">
                                                <span class="hstack gap-3">
                                                    <span>
                                                        <span class="d-block fs-13 fw-bold text-dark">Tiles
                                                            Designer</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </label>

                                    </fieldset>

                                    <div class="row">
                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Firm Name <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-briefcase"></i></div>
                                                <input type="text" name="firm_name" value="<?= $firm_name ?>"
                                                    class="form-control" placeholder="Enter Firm Name">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-4">
                                            <label class="form-label">Mediator Mobile No. <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-phone"></i></div>
                                                <input type="text" name="mediator_mobile_no"
                                                    value="<?= $mediator_mobile_no ?>" class="form-control"
                                                    placeholder="Enter Mobile Number" maxlength="10"
                                                    oninput="this.value = this.value.replace(/[^+0-9]/g, '');">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mb-4">
                                    <label class="form-label">Mediator Address <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="feather-map-pin"></i></div>

                                        <textarea name="mediator_address" class="form-control" rows="6"
                                            placeholder="Enter Address"><?= $mediator_address ?></textarea>
                                    </div>
                                </div>




                            </div>


                            <?php if (empty($id)) : '' ?>

                            <div class="row">
                                <div
                                    class="d-flex d-flex justify-content-between py-4 align-items-center border-top border-bottom mb-4">
                                    <h5 class="flex m-0">
                                        <strong><?= $this->lang->line('schedule_activity') ?></strong>
                                    </h5>
                                </div>
                                <div id="activityContainer">
                                    <div class="row activityRow">
                                        <?php 
                                            $activity_type = ['To-do', 'Email', 'Call', 'Meeting', 'Upload Document', 'Other']; 
                                        ?>
                                        <div class="col-lg-4 mb-4">
                                            <label class="form-label"><?= $this->lang->line('activity_type') ?></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-clipboard"></i>
                                                </div>
                                                <select name="activity_type" id="activityType"
                                                    class="form-select form-control" data-select2-selector="default"
                                                    required="required">
                                                    <option value="">-- Select --</option>
                                                    <?php foreach ($activity_type as $status): ?>
                                                    <option value="<?= $status ?>"><?= $status ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <?php
                                        $due_date = !empty($due_date)
                                            ? date('Y-m-d', strtotime($due_date))
                                            : date('');
                                        ?>

                                        <div class="col-lg-4 mb-4">
                                            <label class="form-label"><?= $this->lang->line('due_date') ?><span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-calendar"></i>
                                                </div>
                                                <input type="datetime-local" class="form-control" name="due_date"
                                                    value="<?= !empty($due_date) ? date('Y-m-d\TH:i', strtotime($due_date)) : '' ?>"
                                                    required>


                                            </div>
                                        </div>

                                        <div class="col-lg-4 mb-4">
                                            <label class="form-label"><?= $this->lang->line('assigned_to') ?>
                                                <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-users"></i>
                                                </div>
                                                <?= form_dropdown('assign_to', $employees, set_value('assign_to', $assign_to), 'class="form-select form-control" data-select2-selector="default" required="required"') ?>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 mb-4">
                                            <label class="form-label"><?= $this->lang->line('summary') ?> <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-file-text"></i>
                                                </div>
                                                <textarea name="activity_summary" class="form-control" rows="2"
                                                    placeholder="<?= $this->lang->line('log_a_note') ?>..."><?= $activity_summary ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row" id="documentField" style="display:none;">
                                            <div class="col-lg-4 mb-4">
                                                <label
                                                    class="form-label"><?= $this->lang->line('upload_document') ?></label>
                                                <div class="input-group">
                                                    <div class="input-group-text"><i class="feather-image"></i>
                                                    </div>
                                                    <!-- <input type="file" name="document_file" class="form-control" required> -->

                                                    <input type="file" name="document_file"
                                                        class="form-control file-upload-main" accept="image/*" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-4 d-flex gap-4 your-brand mt-2">
                                                <div
                                                    class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                                    <?php 
                                                    // If editing, show the existing document image; else show placeholder
                                                    $document_preview_src = !empty($lead->document_file) 
                                                        ? $lead->document_file 
                                                        : base_url('assets/images/icons/1.png'); 
                                                    ?>
                                                    <img id="documentPreview" src="<?= $document_preview_src ?>"
                                                        class="upload-pic img-fluid rounded h-100 w-100"
                                                        alt="Document Preview">

                                                    <input type="hidden" name="old_document_file"
                                                        value="<?= !empty($lead->document_file) ? $lead->document_file : '' ?>">

                                                    <!-- Camera Icon Overlay -->
                                                    <div
                                                        class="position-absolute start-50 top-50 translate-middle hstack align-items-center justify-content-center c-pointer upload-button">
                                                        <i class="feather feather-camera" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Other Input (hidden by default) -->
                                        <div class="col-lg-4 mb-4" id="otherField" style="display:none;">
                                            <label class="form-label"><?= $this->lang->line('please_specify') ?></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="feather-info"></i></div>
                                                <input type="text" name="other_text" value="" class="form-control"
                                                    placeholder="<?= $this->lang->line('please_specify') ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="text-end mt-3">
                            <button type="submit"
                                class="btn btn-success"><?= !empty($id) ? $this->lang->line('update_lead') : $this->lang->line('create_lead') ?></button>
                        </div>

                        <?php echo form_close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

<script>
// Preview Function
document.querySelector('.file-upload-main').addEventListener('change', function(event) {
    const file = event.target.files[0];
    if (file) {
        let reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImage').setAttribute('src', e.target
                .result);
        };
        reader.readAsDataURL(file);
    }
});
</script>

<script>
document.querySelector('input[name="document_file"]').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('documentPreview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>

<script>
document.querySelector('input[name="document_file"]').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('documentPreview').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>

<!-- Get Location For Tap input  -->

<script>
const BASE_URL = "<?= base_url(); ?>";
</script>

<!-- <script>
function getCurrentLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;

            fetch(BASE_URL + "index.php/Leads/get_address?lat=" +
                    lat + "&lon=" + lon)
                .then(res => res.json())
                .then(data => {
                    if (data.address) {
                        // Destructure directly
                        let {
                            house_number = "",
                                road = "",
                                neighbourhood = "",
                                suburb = "",
                                city = "",
                                county = "",
                                state_district = "",
                                state = "",
                                postcode = "",
                                country = "",
                                country_code = ""
                        } = data.address;

                        let full_address = data.display_name || "";
                        let city_name = data.address.city || data.address.state_district || "";
                        let state_name = data.address.state || "";

                        console.log("Display Name:", full_address);
                        console.log("House No:", house_number);
                        console.log("Road:", road);
                        console.log("Neighbourhood:", neighbourhood);
                        console.log("Suburb:", suburb);
                        console.log("City:", city);
                        console.log("County:", county);
                        console.log("State District:", state_district);
                        console.log("State:", state);
                        console.log("Pincode:", postcode);
                        console.log("Country:", country);
                        console.log("Country Code:", country_code);

                        document.querySelector("input[name='current_location']").value = full_address;
                        document.querySelector("input[name='city']").value = city_name;
                        document.querySelector("input[name='state']").value = state_name;
                        document.querySelector("input[name='pincode']").value = postcode;
                        document.querySelector("input[name='country']").value = country;
                    }
                })


                .catch(err => console.error(err));
        });
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}
</script> -->

<script>
function getCurrentLocation() {
    const spinner = document.getElementById('geoSpinner');
    const btnTextEl = null;
    const currentInput = document.getElementById('currentLocation');

    if (!navigator.geolocation) {
        alert("Geolocation is not supported by this browser.");
        return;
    }

    spinner.style.display = 'inline-block';

    const options = {
        enableHighAccuracy: true,
        timeout: 10000,
        maximumAge: 0
    };

    navigator.geolocation.getCurrentPosition(successCallback, errorCallback, options);

    function successCallback(position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        fetch(BASE_URL + "index.php/Leads/get_address?lat=" + encodeURIComponent(lat) + "&lon=" + encodeURIComponent(
                lon))
            .then(resp => resp.json())
            .then(json => {
                spinner.style.display = 'none';
                if (!json || json.status === false) {
                    alert(json.message || "Could not fetch address");
                    return;
                }

                const data = json.data || json;
                const displayName = data.display_name || '';
                const address = data.address || {};

                const city = data.address.city || data.address.state_district || '';
                const state = address.state || '';
                const postcode = address.postcode || '';
                const country = address.country || '';

                if (currentInput) currentInput.value = displayName;
                const cityEl = document.getElementById('city');
                if (cityEl) cityEl.value = city;
                const stateEl = document.getElementById('state');
                if (stateEl) stateEl.value = state;
                const pinEl = document.getElementById('pincode');
                if (pinEl) pinEl.value = postcode;
                const countryEl = document.getElementById('country');
                if (countryEl) countryEl.value = country;

                let mapLink = document.getElementById('currentLocationMapLink');
                if (!mapLink) {
                    mapLink = document.createElement('a');
                    mapLink.id = 'currentLocationMapLink';
                    mapLink.target = '_blank';
                    // mapLink.style.marginLeft = '8px';
                    currentInput.parentNode.appendChild(mapLink);
                }

                const originLat = lat;
                const originLon = lon;
                const destLat = lat;
                const destLon = lon;

                mapLink.href =
                    `https://www.google.com/maps/dir/?api=1&origin=${originLat},${originLon}&destination=${destLat},${destLon}`;
                mapLink.innerHTML =
                    '<div class="input-group-text bg-primary text-white h-100 rounded-start-0 border-primary" style="border-top-left-radius: 0; border-bottom-left-radius: 0;"><i class="feather-map-pin"></i></div>';

                document.getElementById('map_link').value = mapLink.href;

                console.log("Full JSON Response:", JSON.stringify(json, null, 2));
            })
            .catch(err => {
                spinner.style.display = 'none';
                console.error(err);
                alert('Error fetching address. Try again.');
            });
    }

    function errorCallback(error) {
        spinner.style.display = 'none';
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("Location permission denied. Please allow location access in your browser.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("Geolocation request timed out. Try again.");
                break;
            default:
                alert("An unknown geolocation error occurred.");
                break;
        }
    }
}
</script>


<!-- Google Get Geolocation Script -->

<!-- <script>
function getCurrentLocation() {
    const spinner = document.getElementById('geoSpinner');
    const currentInput = document.getElementById('currentLocation');

    if (!navigator.geolocation) {
        alert("Geolocation is not supported by this browser.");
        return;
    }

    spinner.style.display = 'inline-block';

    const options = {
        enableHighAccuracy: true,
        timeout: 10000,
        maximumAge: 0
    };

    navigator.geolocation.getCurrentPosition(successCallback, errorCallback, options);

    function successCallback(position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        fetch(BASE_URL + "index.php/Leads/get_address_google?lat=" + encodeURIComponent(lat) + "&lon=" +
                encodeURIComponent(
                    lon))
            .then(resp => resp.json())
            .then(json => {
                spinner.style.display = 'none';

                console.log("Full Geolocation API Response:");
                console.log(json);

                if (!json || json.status === false) {
                    alert(json.message || "Could not fetch address");
                    return;
                }

                const data = json.data || json;
                const displayName = data.display_name || '';
                const address = data.address || {};

                const city = address.city || address.state_district || '';
                const state = address.state || '';
                const postcode = address.postcode || '';
                const country = address.country || '';

                if (currentInput) currentInput.value = displayName;

                const cityEl = document.getElementById('city');
                if (cityEl) cityEl.value = city;
                const stateEl = document.getElementById('state');
                if (stateEl) stateEl.value = state;
                const pinEl = document.getElementById('pincode');
                if (pinEl) pinEl.value = postcode;
                const countryEl = document.getElementById('country');
                if (countryEl) countryEl.value = country;

                let mapLink = document.getElementById('currentLocationMapLink');
                if (!mapLink) {
                    mapLink = document.createElement('a');
                    mapLink.id = 'currentLocationMapLink';
                    mapLink.target = '_blank';
                    currentInput.parentNode.appendChild(mapLink);
                }

                mapLink.href = `https://www.google.com/maps?q=${lat},${lon}`;
                mapLink.innerHTML =
                    '<div class="input-group-text bg-primary text-white h-100 rounded-start-0 border-primary"><i class="feather-map-pin"></i></div>';

                document.getElementById('map_link').value = mapLink.href;
            })
            .catch(err => {
                spinner.style.display = 'none';
                console.error("Fetch Error:", err);
                alert('Error fetching address. Try again.');
            });
    }

    function errorCallback(error) {
        spinner.style.display = 'none';
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("Location permission denied. Please allow location access in your browser.");
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Location information is unavailable.");
                break;
            case error.TIMEOUT:
                alert("Geolocation request timed out. Try again.");
                break;
            default:
                alert("An unknown geolocation error occurred.");
                break;
        }
    }
}
</script> -->