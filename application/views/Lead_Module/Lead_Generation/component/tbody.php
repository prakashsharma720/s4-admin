<tbody>
    <?php if (!empty($leads)) {
        $i = 1;
        foreach ($leads as $obj) { 
           
            ?>
    <tr>
        <td>
            <div class="item-checkbox ms-1">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="sub_chk" value="<?php echo $obj['id']; ?>" />
                    
                </div>
            </div>
        </td>
        <!-- <td><?= $i ?></td> -->
        <!-- <td>
            <?php if (!empty($obj['is_duplicate']) && $obj['is_duplicate'] == 1) { ?>
            <p style="color:red;">Seems Like Duplicate as</p>
            <a href="<?= base_url('index.php/Leads/view/' . $obj['duplicate_lead_code']) ?>">
                <?= $obj['duplicate_lead_code'] ?>
            </a>
            <?php } ?>
        </td> -->
        <td style="max-width:250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
            <div><strong><?= $obj['lead_title'] ?? '-' ?></strong></div>
            <div><?= $obj['lead_code'] ?? '-' ?></div>
        </td>
        <td>
            <?php if(($obj['convert_quotation'])==1){?>
            <a href="<?php echo base_url(); ?>index.php/Leads/print_preview/<?php echo $obj['quotation_id'];?>">
                <span class="badge bg-soft-primary text-primary">
                <?= $obj['estimate_no']  ?>
            </span>
            </a>
            <?php }?>
        </td>

        <td><?= $obj['contact_person'] ?? '-' ?></td>

        <td>
            <a href="tel:<?= $obj['mobile'] ?>"><?= $obj['mobile'] ?? '-' ?></a>
        </td>

        <td><?= $obj['city'] ?? '-' ?></td>


        <td>
            <div class="d-flex align-items-center gap-3">
                <!-- <?php
                    $status = $obj['lead_status'];
                    switch ($status) {
                        case 'Qualify':
                            echo '<div class="badge bg-warning text-dark">Qualify</div>';
                            break;
                        case 'Won':
                            echo '<div class="badge bg-success text-white">Won</div>';
                            break;
                        case 'In Process':
                            echo '<div class="badge bg-primary text-white">In Process</div>';
                            break;
                        case 'Converted':
                            echo '<div class="badge bg-info text-white">Converted</div>';
                            break;
                        case 'Loss':
                            echo '<div class="badge bg-danger text-white">Loss</div>';
                            break;
                        default:
                            echo '<div class="badge bg-secondary text-white">Unknown</div>';
                    }
                    ?> -->

                <select class="form-select lead-status" data-id="<?= $obj['id']; ?>" data-select2-selector="status">
                    <option value="Qualify" <?= ($obj['lead_status'] == 'Qualify') ? 'selected' : '' ?>
                        data-bg="bg-secondary">Qualify</option>
                    <option value="Won" <?= ($obj['lead_status'] == 'Won') ? 'selected' : '' ?> data-bg="bg-success">Won
                    </option>
                    <option value="Loss" <?= ($obj['lead_status'] == 'Loss') ? 'selected' : '' ?> data-bg="bg-danger">
                        Loss
                    </option>
                </select>
                <div class="hstack gap-2 justify-content-end">

                    <?php if (!empty($obj['is_duplicate']) && $obj['is_duplicate'] == 1) {
                        $dcode = $obj['duplicate_lead_code']; ?>
                    <a class="avatar-text avatar-md view-duplicate" data-id="<?= $obj['duplicate_lead_code']; ?>"
                        href="javascript:void(0);">
                        <i class="feather feather-info"></i>
                    </a>
                    <div id="leadOffcanvasContainer"></div>
                    <?php $this->load->view('Lead_Module/Lead_Generation/component/view-duplicate', $obj['duplicate_lead_code']); ?>
                    <?php } ?>
                </div>
            </div>
        </td>

        <!-- <td><?= $obj['category_name'] ?? '-' ?></td> -->

        <td>
            <div class="d-flex align-items-center gap-3">
                <!-- <?php
                    $status = $obj['leads_priority'];
                    switch ($status) {
                        case 'Low':
                            echo '<div class="badge bg-success text-white">Low</div>';
                            break;
                        case 'Medium':
                            echo '<div class="badge bg-warning text-dark">Medium</div>';
                            break;
                        case 'High':
                            echo '<div class="badge bg-danger text-white">High</div>';
                            break;
                        case 'Very High':
                            echo '<div class="badge bg-primary text-white">Very High</div>';
                            break;
                        default:
                            echo '<div class="badge bg-secondary text-white"></div>';
                    }
                    ?> -->
                <select class="form-select lead-priority" data-id="<?= $obj['id']; ?>" data-select2-selector="priority">
                    <option value="Low" <?= ($obj['leads_priority'] == 'Low') ? 'selected' : '' ?> data-bg="bg-primary">
                        Low</option>
                    <option value="Medium" <?= ($obj['leads_priority'] == 'Medium') ? 'selected' : '' ?>
                        data-bg="bg-success">Medium</option>
                    <option value="High" <?= ($obj['leads_priority'] == 'High') ? 'selected' : '' ?>
                        data-bg="bg-warning">High</option>
                    <option value="Very High" <?= ($obj['leads_priority'] == 'Very High') ? 'selected' : '' ?>
                        data-bg="bg-danger">Very High
                    </option>
                </select>
            </div>
        </td>

        <!-- <td>
            <a href="mailto:<?= $obj['email'] ?>"><?= $obj['email'] ?? '-' ?></a>
        </td> -->
        <!-- <td><?= $obj['employee_name'] ?? '-' ?></td> -->
        <td>
            <select name="employee_id" class="form-control select2 lead-employee"
                data-id="<?= htmlspecialchars($obj['id'], ENT_QUOTES, 'UTF-8'); ?>" data-select2-selector="default">
                <option value=""><?= $this->lang->line('select_employee') ?></option>

                <?php if (!empty($employees) && is_array($employees)): ?>
                <?php foreach ($employees as $value): 
                $selected = (isset($obj['lead_assign']) && $value['id'] == $obj['lead_assign']) ? 'selected' : '';
            ?>
                <option value="<?= htmlspecialchars($value['id'], ENT_QUOTES, 'UTF-8') ?>" <?= $selected ?>>
                    <?= htmlspecialchars($value['name'], ENT_QUOTES, 'UTF-8') ?>
                </option>
                <?php endforeach; ?>
                <?php else: ?>
                <option value=""><?= $this->lang->line('no_result') ?></option>
                <?php endif; ?>
            </select>
        </td>
        <td style="white-space: nowrap;">
            <?= !empty($obj['date']) ? date('d-M-Y', strtotime($obj['date'])) : '-' ?>
        </td>
        <td>
            <div class="hstack gap-2 justify-content-end">
                <a href="<?php echo base_url(); ?>index.php/Leads/add/<?php echo $obj['id']; ?>"
                    class="avatar-text avatar-md">
                    <i class="feather feather-edit-3 "></i>
                </a>
                <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                    data-bs-target="#ViewLeave<?php echo $obj['id']; ?>">
                    <i class="feather feather-eye"></i>
                </a>
                <?php if(!($obj['convert_quotation'])==1){?>
                <a href="<?php echo base_url(); ?>index.php/Leads/convert/<?php echo $obj['id']; ?>"
                    class="badge bg-gray-200 text-dark me-2">
                    <i class="feather feather-crosshair "></i> Convert Quotation
                </a>
                <?php }?>
                <?php $this->load->view('Lead_Module/Lead_Generation/component/view-leave', [
                    'obj' => $obj,
                    'activities' => $obj['activities']
                    ]); ?>

                <!-- <a class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                    data-bs-target="#ViewTracking<?php echo $obj['id']; ?>">
                    <i class="feather feather-map"></i>
                </a> -->
                <?php $this->load->view('Lead_Module/Lead_Generation/activityTracking_model', [
                    'obj' => $obj,
                    'activities' => $obj['activities']
                ]); ?>
            </div>
        </td>
    </tr>
    <?php $i++;
            
        }
    } else { ?>
    <tr>
        <td colspan="100">
            <h5 style="text-align: center;">No Leads Found</h5>
        </td>
    </tr>
    <?php } ?>
</tbody>