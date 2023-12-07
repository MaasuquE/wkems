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
    <title>Quotation</title>
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
            background-color: #252773;
            color: white;
            -webkit-print-color-adjust: exact;
        }

        #customers td {
            padding: 15px;
            vertical-align: initial;
        }

        #customers td h2 {
            margin: 0;
        }

        #customers td p {
            font-size: 15px;
            line-height: 26px;
        }

        #customers td:nth-child(1) {
            width: 45%;
        }

        #customers td:nth-child(2) {
            width: 10%;
        }

        #customers td:nth-child(3) {
            width: 20%;
        }

        #customers td:nth-child(4) {
            width: 20%;
        }

        #customers td:nth-child(5) {
            width: 10%;
        }

        .top-header {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            align-items: center;
            border-bottom: 2px solid #000;
            padding-bottom: 30px;
        }

        .header-right-invoice p {
            margin: 0 0 5px;
            font-size: 13px;
        }

        .header-right-invoice h1 {
            margin: 0 0 10px;
            color: #7375d2;
            -webkit-print-color-adjust: exact;
        }

        .left-image {
            width: 15%;
        }

        .bottom-plain-table td:first-child {
            width: 30% !important;
        }

        .bottom-plain-table td:last-child {
            width: 70% !important;
        }

        .mb-50 {
            margin-bottom: 50px !important;
        }


        .footer-content {
            padding-top: 10px;
            border-top: 2px solid #000;
            margin-top: 50px;
        }

        .footer-content p {
            line-height: 24px;
        }

    </style>
</head>

<body  onload="window.print();">
    <main>
        <div class="invoice-box">
            <div class="invoice-box-inner">
                <div class="top-header">
                    <div class="left-image"><img src="<?= base_url('uploads/company/single.png'); ?>" alt="" height="95px;"></div>
                    <div class="header-right-invoice">
                        <h1>SOFTLINE TECHNOLOGY COMPUTER</h1>
                    </div>
                </div>
                <div class="text-block" style="text-align: center;margin-bottom:80px;">
                    <h3>Quatation</h3>
                    <h4>Financial Offer</h4>
                    <p> If Cheque kindly prepares the cheque Name of Softline Electrical and Electronic Supplier</p>
                </div>
                <table id="customers" class="mb-50">
                    <tr>
                        <th>Item Description</th>
                        <th>Qty</th>
                        <th>Unit Price</th>
                        <th>Total Price KD</th>
                        <th>Remarks</th>
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
                                  a.total_cost,c.hsn
                                  FROM 
                                  db_salesitems AS a,db_items AS c 
                                  WHERE 
                                  c.id=a.item_id AND a.sales_id='$sales_id'");
                    foreach ($q2->result() as $res2) {
                        $discount = (empty($res2->discount_input) || $res2->discount_input == 0) ? '-' : $res2->discount_input . "%";
                        $discount_amt = (empty($res2->discount_amt) || $res2->discount_input == 0) ? '-' : $res2->discount_amt . "";

                        $unit_price = number_format($res2->price_per_unit, 3, '.', '');
                        $tax_amt = number_format($res2->tax_amt, 3, '.', '');
                    ?>
                    <tr>
                        <td><?= $res2->item_name ?></td>
                        <td><?= (int)($res2->sales_qty) ?></td>
                        <td><?= $unit_price ?></td>
                        <td><?= $res2->total_cost ?></td>
                        <td></td>
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
                        <td>Total</td>
                        <td colspan="5" style="text-align:center;font-size: 24px;"><span><strong> <?php echo number_format(($tot_total_cost), 3, '.', ''); ?> </strong></span></td>
                    </tr>
                </table>
                <h4>Terms & Conditions:</h4>
                <table id="customers" class="bottom-plain-table mb-50">
                    <tr>
                        <td>Availability</td>
                        <td>ZKTeco S30 Finger Print Device
                            Sl.No:152167899</td>
                    </tr>
                    <tr>
                        <td>Delivery</td>
                        <td>Installation and Configuration of Finger Print device</td>
                    </tr>
                    <tr>
                        <td>Payment</td>
                        <td>Hik 4MP Indoor /Outdoor Camera</td>
                    </tr>
                    <tr>
                        <td>validity of quote</td>
                        <td>Network Point Termination</td>
                    </tr>
                    <tr>
                        <td>warranty</td>
                        <td>Desktop PC format</td>
                    </tr>
                </table>

                <p> If Cheque kindly prepares the cheque Name of Softline Electrical and Electronic Supplier.
                    Goods Once sold will not be taken back or Exchanged</p>
                <p><strong> We assure you our best service at all time </strong></p>

                <div class="footer-content">
                    <P>Kuwait – Al Dawliah Commercial Centre-Mezzanine Floor – Office No.160/156-P.O.Box 29896 Safat 13009 – Kuwait. +96522479825 Mobile No-94157777 Email: sales@softlinekw.com</P>
                </div>

            </div>
        </div>
    </main>
    <script></script>
</body>

</html>
