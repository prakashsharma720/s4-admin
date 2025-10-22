<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="nxl-content">

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Edit Quotation</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Edit</li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <form action="<?= base_url('index.php/Leads/update_quotation') ?>" method="post">
            <input type="hidden" name="quotation_id" value="<?= $quotation['id'] ?>">
            <input type="hidden" name="lead_id" value="<?= $quotation['lead_id'] ?>">

            <div class="row">
                <div class="col-xl-12">
                    <div class="card invoice-container">
                        <div class="card-body p-0">
                            <div class="px-4 pt-4">
                                <div class="d-md-flex align-items-center justify-content-between">
                                    <div class="d-md-flex align-items-center justify-content-end gap-4">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label class="form-label">Lead Code:</label>
                                            <input class="form-control" value="<?= $quotation['lead_code'] ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Lead Date:</label>
                                            <input class="form-control" value="<?= $quotation['date'] ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-dashed">

                            <div class="px-4 clearfix">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold">Edit Items:</h6>
                                        <span class="fs-12 text-muted">Edit items to Quotation</span>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-bordered overflow-hidden" id="tab_logic">
                                        <thead>
                                            <tr class="single-item">
                                                <th style="width:5%" class="text-center">#</th>
                                                <th style="width:30%" class="text-center">Product & Description</th>
                                                <th style="width:10%" class="text-center">Qty</th>
                                                <th style="width:15%" class="text-center">Price</th>
                                                <th style="width:15%" class="text-center">GST %</th>
                                                <th style="width:10%" class="text-center">GST Amount</th>
                                                <th style="width:15%" class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 0; ?>
                                            <?php foreach($items as $obj): $i++; ?>
                                            <tr id="addr<?= $i ?>">
                                                <td><?= $i ?></td>
                                                        <input type="hidden" name="item_id[]" value="<?= $obj['id'] ?>">

                                                <td>
                                                    <?= form_dropdown('product_id[]', $products, $obj['product_id'], 'class="form-control"') ?>
                                                    <textarea name="desc[]" class="form-control mt-1" placeholder="Enter Desc"><?= $obj['description'] ?></textarea>
                                                </td>
                                                <td><input type="number" name="qty[]" class="form-control qty" value="<?= $obj['qty'] ?>" min="1"></td>
                                                <td><input type="number" name="price[]" class="form-control price" value="<?= $obj['price'] ?>" min="1"></td>
                                                <td>
                                                    <select name="gst[]" class="form-control gst">
                                                        <option value="">-- Select GST % --</option>
                                                        <option value="5%" <?= ($obj['gst'] == "5%") ? 'selected' : '' ?>>5%</option>
                                                        <option value="10%" <?= ($obj['gst'] == "10%") ? 'selected' : '' ?>>10%</option>
                                                        <option value="18%" <?= ($obj['gst'] == "18%") ? 'selected' : '' ?>>18%</option>
                                                    </select>
                                                </td>
                                                <td class="text-end gst_amount_label">
                                                    <span class="gst_amount_text"><?= number_format($obj['gst_amount'],2) ?></span>
                                                    <input type="hidden" name="gst_amount[]" class="gst_amount_input" value="<?= $obj['gst_amount'] ?>">
                                                </td>
                                                <td class="text-end total_label">
                                                    <span class="total_text"><?= number_format($obj['total'],2) ?></span>
                                                    <input type="hidden" name="total[]" class="total_input" value="<?= $obj['total'] ?>">
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>

                                            <!-- Hidden template row -->
                                            <tr id="addr0" style="display:none;">
                                                <td>#</td>
                                                <input type="hidden" name="item_id[]" value="">
                                                <td>
                                                    <?= form_dropdown('product_id[]', $products, '', 'class="form-control"') ?>
                                                    <textarea name="desc[]" class="form-control mt-1" placeholder="Enter Desc"></textarea>
                                                </td>
                                                <td><input type="number" name="qty[]" class="form-control qty" min="1"></td>
                                                <td><input type="number" name="price[]" class="form-control price" min="1"></td>
                                                <td>
                                                    <select name="gst[]" class="form-control gst">
                                                        <option value="">-- Select GST % --</option>
                                                        <option value="5%">5%</option>
                                                        <option value="10%">10%</option>
                                                        <option value="18%">18%</option>
                                                    </select>
                                                </td>
                                                <td class="text-end gst_amount_label">
                                                    <span class="gst_amount_text">0.00</span>
                                                    <input type="hidden" name="gst_amount[]" class="gst_amount_input" value="0">
                                                </td>
                                                <td class="text-end total_label">
                                                    <span class="total_text">0.00</span>
                                                    <input type="hidden" name="total[]" class="total_input" value="0">
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr style="font-weight:bold; background:#f9f9f9;">
                                                <td colspan="2" class="text-end">Total</td>
                                                <td class="text-center" id="total_qty">0</td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-end" id="total_gst">0.00</td>
                                                <td class="text-end" id="grand_total">0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="d-flex justify-content-end gap-2 mt-3">
                                    <button id="delete_row" type="button" class="btn btn-sm bg-soft-danger text-danger">Delete</button>
                                    <button id="add_row" type="button" class="btn btn-sm btn-primary">Add Items</button>
                                </div>

                            </div>
                        </div>

                        <hr>
                        <div class="px-4 pb-4">
                            <input type="submit" value="Save Quotation" class="btn btn-primary">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    var i = <?= $i ?>; // start from existing rows

    $("#add_row").click(function() {
        var b = 0;
        $("#tab_logic").append('<tr id="addr'+(i+1)+'"></tr>');
        $("#addr"+(i+1)).html($("#addr0").html()).find("td:first-child").html(i+1);
        i++;
        updateTotals();
    });

    $("#delete_row").click(function() {
        if(i > <?= $i ?>) { // keep original rows intact
            $("#addr"+i).remove();
            i--;
            updateTotals();
        }
    });

    $("#tab_logic tbody").on("input change", ".qty, .price, .gst", function() {
        updateTotals();
    });

    updateTotals(); // initial calculation
});

// Parse numbers safely (removes % sign)
function parseNumber(val) {
    if(!val) return 0;
    return parseFloat(String(val).replace(/[^0-9.\-]/g,'')) || 0;
}

function updateTotals() {
    var totalQty = 0, totalGst = 0, grandTotal = 0, totalProducts = 0;

    $("#tab_logic tbody tr").each(function() {
        var $tr = $(this);
        if($tr.html().trim() === "") return;

        var qty = parseNumber($tr.find(".qty").val());
        var price = parseNumber($tr.find(".price").val());
        var gst = parseNumber($tr.find(".gst").val());

        if(!qty || !price) return;

        var baseAmount = qty * price;
        var gstAmount = (baseAmount * gst)/100;
        var total = baseAmount + gstAmount;

        $tr.find(".gst_amount_text").text(gstAmount.toFixed(2));
        $tr.find(".gst_amount_input").val(gstAmount.toFixed(2));

        $tr.find(".total_text").text(total.toFixed(2));
        $tr.find(".total_input").val(total.toFixed(2));

        totalQty += qty;
        totalGst += gstAmount;
        grandTotal += total;
    });

    $("#total_qty").text(totalQty);
    $("#total_gst").text(totalGst.toFixed(2));
    $("#grand_total").text(grandTotal.toFixed(2));
}
</script>
