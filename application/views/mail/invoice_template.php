<?php

$q1 = $this->db->query("select * from db_company where id=1 and status=1");
$res1 = $q1->row();
$company_name = $res1->company_name;
$company_mobile = $res1->mobile;
$company_phone = $res1->phone;
$company_email = $res1->email;
$company_country = $res1->country;
$company_state = $res1->state;
$company_city = $res1->city;
$company_address = $res1->address;
$company_gst_no = $res1->gst_no;
$company_vat_no = $res1->vat_no;
$company_logo = $res1->company_logo;

$q4 = $this->db->query("select sales_invoice_footer_text from db_sitesettings where id=1");
$res4 = $q4->row();
$sales_invoice_footer_text = $res4->sales_invoice_footer_text;


$q3 = $this->db->query("SELECT a.customer_name,a.mobile,a.phone,a.gstin,a.tax_number,a.email,
                           a.opening_balance,a.country_id,a.state_id,a.created_by,
                           a.postcode,a.address,b.sales_date,b.created_time,b.reference_no,
                           b.sales_code,b.sales_note,b.sales_status,
                           coalesce(b.grand_total,0) as grand_total,
                           coalesce(b.subtotal,0) as subtotal,
                           coalesce(b.paid_amount,0) as paid_amount,
                           coalesce(b.other_charges_input,0) as other_charges_input,
                           other_charges_tax_id,
                           coalesce(b.other_charges_amt,0) as other_charges_amt,
                           discount_to_all_input,
                           b.discount_to_all_type,
                           coalesce(b.tot_discount_to_all_amt,0) as tot_discount_to_all_amt,
                           coalesce(b.round_off,0) as round_off,
                           b.payment_status

                           FROM db_customers a,
                           db_sales b 
                           WHERE 
                           a.`id`=b.`customer_id` AND 
                           b.`id`='$sales_id' 
                           ");
/*GROUP BY
b.`customer_code`*/

$res3 = $q3->row();
$customer_name = $res3->customer_name;
$customer_mobile = $res3->mobile;
$customer_phone = $res3->phone;
$customer_email = $res3->email;
$customer_country = $res3->country_id;
$customer_state = $res3->state_id;
$customer_address = $res3->address;
$customer_postcode = $res3->postcode;
$customer_gst_no = $res3->gstin;
$customer_tax_number = $res3->tax_number;
$customer_opening_balance = $res3->opening_balance;
$sales_date = $res3->sales_date;
$created_time = $res3->created_time;
$reference_no = $res3->reference_no;
$sales_code = $res3->sales_code;
$sales_note = $res3->sales_note;
$sales_status = $res3->sales_status;
$created_by = $res3->created_by;


$subtotal = $res3->subtotal;
$grand_total = $res3->grand_total;
$other_charges_input = $res3->other_charges_input;
$other_charges_tax_id = $res3->other_charges_tax_id;
$other_charges_amt = $res3->other_charges_amt;
$paid_amount = $res3->paid_amount;
$discount_to_all_input = $res3->discount_to_all_input;
$discount_to_all_type = $res3->discount_to_all_type;
$discount_to_all_type = ($discount_to_all_type == 'in_percentage') ? '%' : 'Fixed';
$tot_discount_to_all_amt = $res3->tot_discount_to_all_amt;
$round_off = $res3->round_off;
$payment_status = $res3->payment_status;

if (!empty($customer_country)) {
    $customer_country = $this->db->query("select country from db_country where id='$customer_country'")->row()->country;
}
if (!empty($customer_state)) {
    $customer_state = $this->db->query("select state from db_states where id='$customer_state'")->row()->state;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Sales Invoice</title>
    <meta name="description" content="The HTML5 Herald" />
    <meta name="author" content="SitePoint" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            background: #e6e6e6;
            font-family: 'Roboto', sans-serif;
        }

        .invoice-box {
            width: 980px;
            background: white;
            margin: 0 auto;
            padding: 40px;
        }

        #customers {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 30px;
        }

        #customers td,
        #customers th {
            border: 1px solid #000;
            padding: 8px;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            -webkit-print-color-adjust: exact;
        }

        #customers td {
            padding: 15px;
            vertical-align: initial;
            font-weight: 600;
        }

        #customers td h2 {
            margin: 0;
        }

        #customers td p {
            font-size: 15px;
            line-height: 26px;
            font-weight: 600;
        }

        #customers td:nth-child(1) {
            width: 10%;
        }

        #customers td:nth-child(2) {
            width: 45%;
        }

        #customers td:nth-child(3) {
            width: 10%;
        }

        #customers td:nth-child(4) {
            width: 20%;
        }

        #customers td:nth-child(5) {
            width: 20%;
        }

        .table-one td {
            width: 50% !important;
        }

        .top-row {
            display: flex;
            justify-content: space-between;
        }

        .flex-text {
            width: 38%;
        }

        .flex-text p {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin: 10px 0;
        }

        .line-dot {
            height: 0px;
            border: 1px dashed #252773;
            -webkit-print-color-adjust: exact;
            position: relative;
        }

        .line-dot-1 {
            width: 42%;
        }

        .line-dot-2 {
            width: 42%;
        }

        .box-flex {
            border: 1px solid #000;
            padding: 15px;
            margin-bottom: 30px;
        }

        .top-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 50px;
        }

        .header-right-invoice p {
            margin: 0 0 5px;
            font-size: 13px;
            font-weight: 500;
        }

       
        .header-right-invoice h1 {
            font-weight: 500;
            margin: 0 0 10px;
            color: #3e4095;
            -webkit-print-color-adjust: exact;
        }
        .header-right-invoice p{
                ;
        }
    </style>
</head>

<body  onload="window.print();">
    <main>
        <div class="invoice-box">
            <div class="invoice-box-inner">
                <div class="top-header" style="width: 99%">
                    <div><img src="<?= base_url('uploads/company/sample-1.png'); ?>" alt="" height="130px;"></div>
                    <div class="header-right-invoice" style="margin-left: auto;margin-right: 0;">
                        <h1>INVOICE</h1>
                        <p>Invoice Number:<?php echo "$sales_code"; ?></p>
                        <p>Date : <?php echo show_date($sales_date); ?></p>
                        <p>Staff: <?php echo ucfirst($created_by); ?></p>
                    </div>
                </div>

                <table id="customers" class="table-one" style="width: 99%">
                    <tr>
                        <td>
                            <h2>Bill To</h2>
                            <p><span><strong>Customer Name:</strong></span> <?php echo  $customer_name; ?></p>
                        </td>
                        <td>

                        </td>
                    </tr>
                </table>
                <table id="customers" style="width: 99%">
                    <tr>
                        <th>S.No</th>
                        <th>Description</th>
                        <th>Qty</th>
                        <th>Unit Price KD</th>
                        <th >Discount KD</th>
                        <th>Amount KD</th>
                    </tr>
                    <?php
                    $i = 0;
                    $tot_qty = 0;
                    $tot_sales_price = 0;
                    $tot_tax_amt = 0;
                    $tot_discount_amt = 0;
                    $tot_unit_total_cost = 0;
                    $tot_total_cost = 0;
                    $q2 = $this->db->query("SELECT c.item_name, a.sales_qty,
                                  a.price_per_unit, a.tax_amt,
                                  a.discount_input,a.discount_amt, a.unit_total_cost,
                                  a.total_cost,c.hsn, a.id
                                  FROM 
                                  db_salesitems AS a,db_items AS c 
                                  WHERE 
                                  c.id=a.item_id AND a.sales_id='$sales_id'");
                    foreach ($q2->result() as $res2) {
                        if( in_array($res2->id,$hide_tems)){
                            continue;
                        }
                        $discount = (empty($res2->discount_input) || $res2->discount_input == 0) ? '-' : $res2->discount_input . "%";
                        $discount_amt = (empty($res2->discount_amt) || $res2->discount_input == 0) ? '-' : $res2->discount_amt . "";

                        $unit_price = number_format($res2->price_per_unit, 3, '.', '');
                        $tax_amt = number_format($res2->tax_amt, 3, '.', '');
                    ?>

                        <tr>
                            <td><?= ++$i ?></td>
                            <td><?= $res2->item_name ?></td>
                            <td><?= (int)($res2->sales_qty) ?></td>
                            <td><?= $unit_price ?></td>
                              <td><?=  $discount_amt?></td>
                            <td><?= $res2->total_cost ?></td>
                        </tr>
                    <?php 
                      $tot_qty += $res2->sales_qty;
                      $tot_sales_price += $res2->price_per_unit;
                      $tot_tax_amt += $res2->tax_amt;
                      $tot_discount_amt += $res2->discount_amt;
                      $tot_unit_total_cost += $res2->unit_total_cost;
                      $tot_total_cost += $res2->total_cost;
                    }
                  
                    ?>


                    <tr>
                        <td colspan="3"></td>
                        <td colspan="3" style="text-align:right;font-size: 24px;border:none;"><span><strong>Total <?php echo number_format(($tot_total_cost), 3, '.', ''); ?> </strong></span></td>
                    </tr>
                     <tr>
                        <td colspan="3" style="border:none;"></td>
                        <td colspan="3" style="text-align:right;font-size: 16px;border:none;"><span><strong>Discount <?php echo number_format(($tot_discount_to_all_amt), 3, '.', ''); ?> </strong></span></td>
                    </tr>
                    <tr>
                        <td colspan="3" style="border:none;"></td>
                        <td colspan="3" style="text-align:right;font-size: 16px;border:none;"><span><strong><?= $this->lang->line('grand_total'); ?> <?php echo number_format(($grand_total), 3, '.', ''); ?> </strong></span></td>
                    </tr>
                </table>
                <div class="divFooter">
                    <div class="box-flex">
                        <div class="top-row">
                            <div class="flex-text">
                                <p>
                                    <span>Sales Supervisor:</span>
                                    <span class="line-dot line-dot-1"></span>
                                    <span>امتیازی نشان</span>
                                </p>
                            </div>
                            <div class="flex-text">
                                <p>
                                    <span>Recipient:</span>
                                    <span class="line-dot line-dot-2"></span>
                                    <span>امتیازی نشان</span>
                                </p>
                                <p>
                                    <span>Signature:</span>
                                    <span class="line-dot line-dot-2"></span>
                                    <span>امتیازی نشان</span>
                                </p>
                            </div>
                        </div>
                        <?php if (!empty($sales_invoice_footer_text)) { ?>
                        <div class="bootom-row">
                            <p style="text-align: center;"><strong><?= $sales_invoice_footer_text; ?></strong></p>
                        </div>
                        <?php } ?>
                    </div>
                    <table id="customers" class="table-one">
                        <tr>
                            <td>
                                <h2>Address</h2>
                                <p>Kuwait – Al Dawliah Commercial Centre-Mezzanine Floor – Office No.160/156-P.O.Box 29896 Safat 13009 – Kuwait. +96522479825 Mobile No-94157777 Email: sales@softlinekw.com</p>
                            </td>
                            <td>
                                <h2>Bank Accounts</h2>
                                <p>A/C Name : Soft line for Electrical and Electronic Supplier
                                    Bank Name : Burgan Bank Head Quarter
                                    Account Number : 022066620660014402000
                                    IBAN Number : KW14BRGN0000000000002060397748
                                    Company Address : Fahad Al Salem St,Qibla ,Kuwait City ,Kuwait</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;color:red">* This is computer generated invoice no signature required</td>
                        </tr>
                    </table>
                     
                </div>

            </div>
        </div>
    </main>
    <script></script>
</body>

</html>