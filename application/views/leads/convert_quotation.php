<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="nxl-content">

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Quotation</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item">Create</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">


            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content">
        <form action="<?php echo base_url(); ?>index.php/Leads/add_quotation" method="post">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card invoice-container">



                        <div class="card-body p-0">

                            <input type="hidden" name="lead_id" value="<?php echo $leads_data['id']?>" id="">

                            <div class="px-4 pt-4">
                                <div class="d-md-flex align-items-center justify-content-between">
                                    <!-- <div class="mb-4 mb-md-0 your-brand">
                                        <div
                                            class="wd-100 ht-100 position-relative overflow-hidden border border-gray-2 rounded">
                                            <?php if(!empty($leads_data['photo'])) { ?>
                                            <div style="height: 10%;width: 100%;">
                                                <img src="<?php echo base_url().$leads_data['photo']; ?>" width="100%;" />
                                            </div>
                                            <?php } else {?>
                                            <img src="assets/images/logo-abbr.png"
                                                class="upload-pic img-fluid rounded h-100 w-100" alt="">
                                                <?php }?>
                                            <div
                                                class="position-absolute start-50 top-50 end-0 bottom-0 translate-middle h-100 w-100 hstack align-items-center justify-content-center c-pointer upload-button">
                                                <i class="feather feather-camera" aria-hidden="true"></i>
                                            </div>
                                            <input class="file-upload" type="file" accept="image/*">
                                        </div>
                                        <div class="fs-12 text-muted mt-2">* Upload your brand</div>
                                    </div> -->
                                    <div class="d-md-flex align-items-center justify-content-end gap-4">
                                        <div class="form-group mb-3 mb-md-0">
                                            <label class="form-label">Lead Code:</label>
                                            <input class="form-control " value="<?php echo $leads_data['lead_code']?>"
                                                readonly>

                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Lead Date:</label>

                                            <input class="form-control " value="<?php echo $leads_data['date']?>"
                                                readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="border-dashed">
                            <div class="row px-4 justify-content-between">
                                <div class="col-xl-5 mb-4 mb-sm-0">
                                    <div class="mb-4">
                                        <h6 class="fw-bold"> For:</h6>
                                        <!-- <span class="fs-12 text-muted">Send an invoice and get paid</span> -->
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoiceName" class="col-sm-3 col-form-label">Lead Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?php echo $leads_data['lead_title']?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoiceEmail" class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?php echo $leads_data['email']?>" readonly>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoicePhone" class="col-sm-3 col-form-label">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?php echo $leads_data['mobile']?>" readonly>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoicePhone" class="col-sm-3 col-form-label">Lead
                                            Category</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?php echo $leads_data['category_name']?>" readonly>

                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-5 mb-4 mb-sm-0">
                                    <div class="mb-4">
                                        <h6 class="fw-bold" style="visibility:hidden"> For:</h6>
                                        <!-- <span class="fs-12 text-muted">Send an invoice and get paid</span> -->
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoiceEmail" class="col-sm-3 col-form-label">Contact Person
                                            Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?php echo $leads_data['contact_person']?>" readonly>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="InvoiceAddress" class="col-sm-3 col-form-label">Lead
                                            Architect</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="<?php echo $leads_data['lead_architect']?>" readonly>

                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="InvoiceName" class="col-sm-3 col-form-label">Lead
                                            Description</label>
                                        <div class="col-sm-9">
                                            <textarea rows="5" class="form-control" id="InvoiceAddress"
                                                placeholder="Enter Address"
                                                readonly><?php echo $leads_data['work_description']?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="InvoiceAddress" class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <textarea rows="5" class="form-control" id="InvoiceAddress"
                                                placeholder="Enter Address"
                                                readonly><?php echo $leads_data['city'] .' , ' .$leads_data['state']?></textarea>
                                        </div>
                                    </div>




                                </div>
                            </div>
                            <hr class="border-dashed">
                            <div class="px-4 clearfix">
                                <div class="mb-4 d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="fw-bold">Add Items:</h6>
                                        <span class="fs-12 text-muted">Add items to Quotation</span>
                                    </div>
                                    <div class="avatar-text avatar-sm" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                        title="" data-bs-original-title="Informations">
                                        <i class="feather feather-info"></i>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered overflow-hidden" id="tab_logic">
                                        <thead>
                                            <tr class="single-item">
                                                <th style="width:5%" class="text-center">#</th>
                                                <th class="text-center" style="width:30%">Product</th>
                                                <!-- <th class="text-center wd-200">Description</th> -->
                                                <!-- <th class="text-center wd-200">HSN/ SAC</th>
                                                <th class="text-center wd-200">Unit</th> -->
                                                <th style="width:10%" class="text-center wd-150">Qty</th>
                                                <th style="width:15%" class="text-center wd-150">Price</th>
                                                <th class="text-center" style="width:15%">GST %</th>
                                                <th class="text-center" style="width:10%">GST Amount</th>
                                                <th style="width:15%" class="text-center">Total</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr id="addr0">
                                                <td>1</td>
                                                <td>

                                                    <div class="input-group mb-2">

                                                        <?php
                                                    echo form_dropdown('product_id[]', $products, '', )
                                                    ?>
                                                    </div>

                                                    <textarea name="desc[]" class="form-control "
                                                        placeholder="Enter Desc"></textarea>
                                                </td>

                                                <!-- <td>
                                                    <select name="hsn_code[]" class="form-control">
                                                        <option value="">-- Select HSN Code --</option>
                                                        <?php foreach($hsn_codes as $hsn): ?>
                                                        <option value="<?= $hsn; ?>"><?= $hsn; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="unit[]" class="form-control">
                                                        <option value="">-- Select Units --</option>
                                                        <?php foreach($units as $unit): ?>
                                                        <option value="<?= $unit; ?>"><?= $unit; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </td> -->
                                                <td><input type="number" name="qty[]" placeholder="Qty"
                                                        class="form-control qty" min="1"></td>
                                                <td><input type="number" name="price[]" placeholder="Price"
                                                        class="form-control price" min="1"></td>
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
                                                    <input type="hidden" name="gst_amount[]" class="gst_amount_input"
                                                        value="0">
                                                </td>

                                                <td class="text-end total_label">
                                                    <span class="total_text">0.00</span>
                                                    <input type="hidden" name="total[]" class="total_input" value="0">
                                                </td>


                                            </tr>
                                            <tr id="addr1">
                                                <td>2</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
                                        <input type="hidden" name="total_products" id="input_total_products">
                                        <input type="hidden" name="total_qty_val" id="input_total_qty">
                                        <input type="hidden" name="total_gst_val" id="input_total_gst">
                                        <input type="hidden" name="grand_total_val" id="input_grand_total">
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end gap-2 mt-3">
                                    <button id="delete_row" type="button"
                                        class="btn btn-sm bg-soft-danger text-danger">Delete</button>
                                    <button id="add_row" type="button" class="btn btn-sm btn-primary">Add Items</button>
                                </div>

                            </div>


                        </div>
                        <hr>
                        <div class="px-4 pb-4">
                            <div class="d-flex align-items-center gap-2 ">
                                <input type="submit" value="Save Quotation" class="btn btn-primary">


                            </div>
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
    var i = 1;
    $("#add_row").click(function() {
        b = i - 1;
        $("#addr" + i)
            .html($("#addr" + b).html())
            .find("td:first-child")
            .html(i + 1);
        $("#tab_logic").append('<tr id="addr' + (i + 1) + '"></tr>');
        i++;
    });
    $("#delete_row").click(function() {
        if (i > 1) {
            $("#addr" + (i - 1)).html("");
            i--;
        }
        calc();
    });
    $("#tab_logic tbody").on("keyup change", function() {
        calc();
    });
    $("#tax").on("keyup change", function() {
        calc_total();
    });
});

function calc() {
    $("#tab_logic tbody tr").each(function(i, element) {
        var html = $(this).html();
        if (html != "") {
            var qty = $(this).find(".qty").val();
            var price = $(this).find(".price").val();
            $(this)
                .find(".total")
                .val(qty * price);
            calc_total();
        }
    });
}

function calc_total() {
    total = 0;
    $(".total").each(function() {
        total += parseInt($(this).val());
    });
    $("#sub_total").val(total.toFixed(2));
    tax_sum = (total / 100) * $("#tax").val();
    $("#tax_amount").val(tax_sum.toFixed(2));
    $("#total_amount").val((tax_sum + total).toFixed(2));
}
</script>

<script>
$(document).ready(function() {

    // Delegate events so dynamically added rows are handled
    $(document).on("input change",
        "#tab_logic tbody tr .qty, #tab_logic tbody tr .price, #tab_logic tbody tr select[name='gst[]']",
        function() {
            updateTotals();
        });

    // After add_row / delete_row buttons are clicked, recalc totals
    $("#add_row, #delete_row").on("click", function() {
        setTimeout(updateTotals, 50); // small delay to allow DOM changes
    });

    // Ensure totals are updated before form submission
    $("form").on("submit", function() {
        updateTotals();
    });

    // Initial calculation
    updateTotals();
});

// Parse numbers safely (removes % and other chars)
function parseNumber(val) {
    if (!val) return 0;
    return parseFloat(String(val).replace(/[^0-9.\-]/g, '')) || 0;
}

// Update totals for all rows
function updateTotals() {
    var totalQty = 0,
        totalGst = 0,
        grandTotal = 0,
        totalProducts = 0;

    $("#tab_logic tbody tr").each(function() {
        var $tr = $(this);
        if ($tr.html().trim() === "") return;

        var qty = parseNumber($tr.find(".qty").val());
        var price = parseNumber($tr.find(".price").val());
        var gst = parseNumber($tr.find(".gst").val());

        if (!qty || !price) return;

        var baseAmount = qty * price;
        var gstAmount = (baseAmount * gst) / 100;
        var total = baseAmount + gstAmount;

        // Update visible labels using the <span>
        $tr.find(".gst_amount_text").text(gstAmount.toFixed(2));
        $tr.find(".total_text").text(total.toFixed(2));

        // Hidden inputs remain intact
        $tr.find(".gst_amount_input").val(gstAmount.toFixed(2));
        $tr.find(".total_input").val(total.toFixed(2));

        totalQty += qty;
        totalGst += gstAmount;
        grandTotal += total;
        totalProducts++;
    });

    // Update footer totals
    $("#total_qty").text(totalQty);
    $("#total_gst").text(totalGst.toFixed(2));
    $("#grand_total").text(grandTotal.toFixed(2));

    // Update hidden fields for backend
    $("#input_total_products").val(totalProducts);
    $("#input_total_qty").val(totalQty);
    $("#input_total_gst").val(totalGst.toFixed(2));
    $("#input_grand_total").val(grandTotal.toFixed(2));
}
</script>