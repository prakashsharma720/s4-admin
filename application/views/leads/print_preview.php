<style>
html,
body {
    height: auto;
    margin: 0;
    padding: 0;
    overflow: visible;
    /* overflow: hidden !important; */
}

.table1 {
    border: 1px solid #d9d9d9b5;
    padding: 5px;
    width: 100%;
    border-collapse: collapse;
    page-break-inside: avoid !important;
}

.invoice-container,
.table1,
.table-responsive,
.terms {
    page-break-inside: avoid !important;
    page-break-after: avoid !important;
    page-break-before: avoid !important;
}

/* .invoice-container > :last-child {
  margin-bottom: 0 !important;
  padding-bottom: 0 !important;
} */

* {
    font-family: sans-serif;
}

.table-responsive {
    padding-left: 1.5rem !important;
    padding-right: 1.5rem !important;
}

.terms {
    padding-left: 1.5rem !important;
    padding-right: 1.5rem !important;
}

th,
tr,
td {
    border: 1px solid #d9d9d9b5;
    padding: 5px;
    border-collapse: collapse;
}

@media print {
    body {
        zoom: 80%;
        /* similar effect for browser print */
    }

    .invoice-container {
        page-break-inside: avoid;
        /* transform: scale(1); */
    }
}
</style>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
function numberToWords($number) {
    $dictionary  = [
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
        100 => 'hundred',
        1000 => 'thousand',
        1000000 => 'Lakh',
        1000000000 => 'billion'
    ];

    if ($number < 0) {
        return 'negative ' . numberToWords(abs($number));
    }

    if ($number < 21) {
        return $dictionary[$number];
    } elseif ($number < 100) {
        $tens   = ((int) ($number / 10)) * 10;
        $units  = $number % 10;
        return $dictionary[$tens] . ($units ? '-' . $dictionary[$units] : '');
    } elseif ($number < 1000) {
        $hundreds  = (int) ($number / 100);
        $remainder = $number % 100;
        return $dictionary[$hundreds] . ' ' . $dictionary[100] . ($remainder ? ' and ' . numberToWords($remainder) : '');
    } else {
        foreach ([1000000000 => 'billion', 1000000 => 'lakh', 1000 => 'thousand'] as $value => $word) {
            if ($number >= $value) {
                $baseUnit = (int) ($number / $value);
                $remainder = $number % $value;
                return numberToWords($baseUnit) . ' ' . $word . ($remainder ? ' ' . numberToWords($remainder) : '');
            }
        }
    }
}
?>

<div class="nxl-content">

    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Print Preview</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Quotation</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="button-group float-right d-flex gap-2">
                <a href="javascript:void(0)" class="d-flex me-1 printBTN">
                    <div class="avatar-text avatar-md" data-bs-toggle="tooltip" data-bs-trigger="hover" title=""
                        data-bs-original-title="Print Invoice" aria-label="Print Invoice"><i
                            class="feather feather-printer"></i></div>
                </a>
                <a href="<?php echo base_url(); ?>index.php/Leads/edit_print_preview/<?php echo $quotation['id'];?>"
                    class="avatar-text avatar-md" data-toggle="tooltip" title="Edit Quotation"><i
                        class="feather feather-edit"></i></a>

                <a href="javascript:void(0)" class="d-flex me-1" id="downloadPDF">
                    <div class="avatar-text avatar-md" title="Download Invoice">
                        <i class="feather feather-download"></i>
                    </div>
                </a>

            </div>
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="main-content container-lg">

        <div class="row">

            <div class="card invoice-container fs-10">
                <h5 style="text-align:center;" class="align-items-center fs-12 pt-2  fw-bolder">Estimate</h5>


                <div class="card-body p-0">

                    <div class="px-4 pt-4">

                        <div class="d-sm-flex align-items-center justify-content-between">
                            <div>
                                <div class="fs-14 fw-bolder  text-uppercase">Saral Stone Creation
                                    Private Ltd. -2025-26</div>
                                <address class="text-muted">
                                    NH 8 AMBERI , SUKHER INDUSTRIAL AREA UDAIPUR
                                    <br>
                                    <span> Phone: </span> <span class="fw-bold text-dark">7665504555 </span><br>
                                    <span> GSTIN: </span> <span class="fw-bold text-dark"> 08AAICM2615C1ZT
                                    </span><br>
                                    <span> UDYAM REG. NO:</span>
                                    <span class="fw-bold text-dark"> UDYAM-RJ-33-0025113 </span> </br>
                                    <span> Email: </span> <span
                                        class="fw-bold text-dark">saralstones2020@gmail.com</span>
                                    </br>

                                    <span> State: </span> <span class="fw-bold text-dark">08-Rajasthan </span><br>

                                </address>

                            </div>
                            <div class="lh-lg pt-3 pt-sm-0">
                                <!-- <h2 class="fs-16 fw-bold text-dark mb-3"></h2> -->
                                <div class="fs-14 fw-bolder  text-uppercase">Estimate To:</div>
                                <div class="text-muted lh-lg">
                                    <div>
                                        <span class="text-muted">Estimate For:</span>
                                        <span class="fw-bold text-dark"><?php echo $quotation['contact_person']?></span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Estimate no.:</span>
                                        <span class="fw-bold text-dark"><?php echo $quotation['estimate_no']?></span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Date:</span>
                                        <span class="fw-bold text-warning"><?php echo $quotation['created_at']?></span>
                                    </div>
                                    <div>
                                        <span class="text-muted">Place Of Supply:</span>
                                        <span
                                            class="fw-bold text-dark"><?php echo $quotation['project_address']?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <hr class="border-dashed mb-0"> -->
                    <div class="table-responsive">
                        <table class="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Particular</th>
                                    <th>HSN/ SAC</th>

                                    <th>QTY</th>
                                    <th>Unit</th>
                                    <th>Rate</th>
                                    <th>GST</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                        foreach ($items as $obj) {
                                        ?>
                                <?php 
                                    $grand_total = $quotation['total_grand_amount']; // e.g. 2090960.00
                                    $rounded_total = round($grand_total); // nearest integer (2090960)
                                    $round_off = $rounded_total - $grand_total; // difference
                                    ?>
                                <tr>
                                    <td><?php echo $i;?></td>
                                    <td><span class="text-dark fw-semibold"><?php echo $obj['product_name']; ?></span>
                                        </br>
                                        <span class="fs-8"
                                            style="white-space: break-spaces;"><?php echo $obj['description']?></span>
                                    </td>
                                    <td><?php echo $obj['phsncode']; ?></td>
                                    <td><?php echo $obj['qty']; ?></td>
                                    <td><?php echo $obj['hsnunit']; ?></td>

                                    <td class="text-dark fw-semibold"><?php echo $obj['price']; ?></td>
                                    <td><?php echo $obj['gst_amount']; ?></br>
                                        (<?php echo $obj['gst']; ?>) </td>
                                    <td><?php echo $obj['total']; ?></td>

                                </tr>
                                <?php  $i++; } ?>

                                <tr>

                                    <td></td>

                                    <td class="fw-semibold text-dark "> Total</td>
                                    <td></td>
                                    <td class="fw-semibold text-dark "><?php echo $quotation['total_qty']?></td>
                                    <td></td>
                                    <td></td>
                                    <td class="fw-semibold text-dark "><?php echo $quotation['total_gst_amount']?>
                                    </td>
                                    <td class="fw-semibold text-dark "><?php echo $quotation['total_grand_amount']?>
                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="6" class="fw-semibold text-dark bg-gray-100 fs-11 ">Tax Summary:</td>
                                    <td colspan="" class="fw-semibold text-dark  text-lg-end fs-11">Sub Total :
                                    </td>
                                    <td class=" text-lg-end">
                                        <?php echo number_format($grand_total, 2); ?></td>

                                </tr>
                            </tbody>
                        </table>
                        <div style="width:100%; display:flex">
                            <div style="width:70%;">
                                <table class="table1">
                                    <thead>

                                        <tr>

                                            <th>HSN/ SAC</th>
                                            <th>Taxable amount (₹)</th>
                                            <th>IGST<br>Rate (%)</th>
                                            <th>IGST<br>Amt (₹)</th>
                                            <th colspan="3">Total Tax</th>
                                        </tr>
                                    </thead>


                                    <?php $i = 1;
                                            foreach ($items as $obj) {
                                            ?>
                                    <?php 
                                            $taxableamount = $obj['total'] - $obj['gst_amount']; 
                                            ?>
                                    <tr>
                                        <td><?php echo $obj['phsncode']?></td>
                                        <td><?php echo number_format($taxableamount, 2); ?></td>
                                        <td><?php echo $obj['gst']?></td>
                                        <td><?php echo $obj['gst_amount']?></td>
                                        <td><?php echo $obj['gst_amount']?></td>


                                    </tr>
                                    <?php }?>



                                </table>
                            </div>

                            <div style="width:30%" class="">
                                <table class="table1">
                                    <thead></thead>

                                    <tr>
                                        <!-- <td class="fw-semibold text-dark  "></td> -->

                                        <td colspan="2" class="fw-semibold text-dark  text-lg-end">Round Off :
                                        </td>
                                        <td class="fw-bolder text-dark  text-lg-end">
                                            <?php echo number_format($round_off, 2); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <!-- <td class="fw-semibold text-dark  "></td> -->
                                        <td colspan="2" class="fw-semibold text-dark  text-lg-end">Total :</td>
                                        <td colspan="3" class="fw-bolder text-dark  text-lg-end">
                                            <?php echo number_format($rounded_total, 2); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-dark bg-gray-100 " colspan="4">
                                            Estimate Amount in Words :
                                        </td>


                                    </tr>
                                    <tr>
                                        <td class="fw-semibold text-dark  " colspan="4">
                                            <span class="fw-bolder" style="white-space: normal;">
                                                <?php echo ucfirst(numberToWords($rounded_total)); ?> only
                                            </span>
                                        </td>


                                    </tr>
                                </table>

                            </div>

                        </div>

                    </div>

                    <div style="width:100%;  flex-direction:column; " class="px-4">
                        <div style="border:1px solid #d9d9d9b5; flex:1;"
                            class=" d-sm-flex align-items-start justify-content-between">
                            <div class="mb-5 mb-sm-0" style="flex:1;">
                                <h6 class="p-1 fs-11 fw-bold bg-gray-100">Terms &amp; Condition :</h6>
                                <ul class="list-unstyled fs-12"
                                    style="text-transform: lowercase; margin:0; padding-left:15px;">
                                    <li>1. QUOTATION VALID FOR 15 DAYS ONLY.</li>
                                    <li>2. DELIVERY :-<br>
                                        * MATERIAL IN STOCK : 2 TO 3 DAYS FROM THE DATE OF PURCHASE ORDER AND
                                        ADVANCE.<br>
                                        * MATERIAL TO BE MANUFACTURED : 30 TO 60 DAYS FROM THE DATE OF PURCHASE
                                        ORDER & ADVANCE PAYMENT.
                                    </li>
                                    <li>3. THE ABOVE PRICES ARE FOR SUPPLY OF MATERIAL ONLY EX-FACTORY UDAIPUR
                                    </li>
                                    <li>4. MATERIAL WILL BE DISPATCHED ONLY AGAINST PURCHASE ORDER & ADVANCE
                                        PAYMENT.</li>
                                    <li>5. ALL PAYMENT IN FORM OF DD/CHEQUE.</li>
                                    <li>6. TRANSPORTATION/PACKAGING CHARGES ARE NOT INCLUSIVE IN QUOTATION.</li>
                                    <li>7. PRIOR TO DELIVERY OF MATERIAL BUYER IS REQUIRED TO VISIT FACTORY
                                        ONCE.</li>
                                    <li>8. ANY PRODUCT TO BE INSURED SHOULD BE INTIMATED TO US EARLIER.</li>
                                    <li>9. ONCE PRODUCT IS DISPATCHED TO YOUR DESTINATION IT WILL BE YOUR
                                        RESPONSIBILITY.</li>
                                    <li>10. TRANSIT INSURANCE MUST BY BUYER AT THEIR OWN COST.</li>
                                    <li>11. WE ARE NOT LIABLE IF PRODUCT IS MISHANDLED & DAMAGED DURING
                                        TRANSPORTATION.</li>
                                    <li>12. ANY POLISHING WORK TO BE DONE ON MATERIAL WILL BE QUOTED FOR
                                        SEPARATELY.</li>
                                    <li>13. STONE IS NATURAL MATERIAL AND NATURAL VARIATION, CRACK, Bend up to
                                        5mm, RUST, VISIBLE FIXING JOINTS WILL OCCUR AND NEED TO BE ACCEPTED.
                                    </li>
                                    <li>14. FOR FIXING CHARGES 50% ADVANCE AS DD OR BY TT TO OUR ACCOUNT NUMBER
                                        AND REMAINING 50% TO OUR ACCOUNT AFTER COMPLETION OF WORK ON SITE.</li>
                                    <li>15. TRAVELLING, LODGING AND BOARDING CHARGES FOR FIXING TEAM TO BE BORNE
                                        BY BUYER AS PER ACTUAL.</li>
                                    <li>16. WHITE CEMENT, MS SCAFFOLDINGS, SAND AND WATER TO BE PROVIDED BY
                                        CLIENT AT THE FIXING SITE.</li>
                                    <li>17. SUBJECT TO UDAIPUR JURISDICTION ONLY.</li>
                                    <li>* MODE OF PAYMENT HAS TO BE ADVISED BEFORE DISPATCH OF MATERIAL.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div style="width:100%;display:flex;" class="px-4 pb-2">
                        <div style="width:50%; display:flex; flex-direction:column;">
                            <div class=" fs-12" style="border:1px solid #d9d9d9b5; flex:1;">

                                <h6 class="p-1 fs-11 fw-bold bg-gray-100">
                                    Bank Details :
                                </h6>
                                <address class="text-muted px-2">
                                    Name: <span class="fw-bold text-dark">BANK OF BARODA, SSI SUKHER
                                        BRANCH</span> <br>
                                    Account No.:<span class="fw-bold text-dark"> 24370500011334 </span><br>
                                    IFSC Code: <span class="fw-bold text-dark">BARB0INDSUK </span><br>
                                    Account Holder: <span class="fw-bold text-dark">SARAL STONE CREATIONS
                                        PVT LTD</span>
                                </address>

                            </div>
                        </div>
                        <div style="width:50%; display:flex; flex-direction:column;">
                            <div class="fs-12"
                                style="border:1px solid #d9d9d9b5; flex:1; display:flex; flex-direction:column; justify-content:space-between;">

                                <h6 class="p-1 fs-11 fw-bold bg-gray-100">
                                    For SARAL STONE CREATIONS PRIVATE LTD. -2025-26:
                                </h6>

                                <div style="text-align:center;">
                                    <span style="margin-top:60px;display:inline-block;">Authorized
                                        Signatory</span>
                                </div>
                            </div>
                        </div>

                    </div>



                </div>
            </div>

        </div>
    </div>


</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
<script>
document.getElementById('downloadPDF').addEventListener('click', function() {
    const element = document.querySelector('.invoice-container');

    // Reset any previous transforms
    element.style.transform = '';
    element.style.width = '';
    element.style.margin = '0';
    element.style.padding = '0';

    const a4WidthPt = 595.28;  // A4 width in points
    const a4HeightPt = 841.89; // A4 height in points
    const pxToPt = 0.75;       // 1px ≈ 0.75pt

    // Calculate content height in points
    const contentHeightPt = element.offsetHeight * pxToPt;

    // Determine scale to fit content into A4 if it overflows
    let scale = 1;
    if (contentHeightPt > a4HeightPt) {
        scale = a4HeightPt / contentHeightPt;
        element.style.transform = `scale(${scale})`;
        element.style.transformOrigin = 'top left';
        element.style.width = (100 / scale) + '%';
    }

    const opt = {
        margin: 0,
        filename: 'invoice.pdf',
        image: { type: 'jpeg', quality: 1 },
        html2canvas: {
            scale: 2, // keep high quality, scaling is adjusted with transform
            useCORS: true,
            logging: false,
            scrollY: 0,
            windowWidth: element.scrollWidth,
            windowHeight: element.scrollHeight
        },
        jsPDF: {
            unit: 'pt',
            format: [a4WidthPt, a4HeightPt],
            orientation: 'portrait',
            putOnlyUsedFonts: true,
            compress: true
        },
        // Remove pagebreak option to avoid blank pages
    };

    html2pdf().set(opt).from(element).save().then(() => {
        // Reset styles after PDF generation
        element.style.transform = '';
        element.style.width = '';
    });
});
</script>
