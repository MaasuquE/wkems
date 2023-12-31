<!DOCTYPE html>
<html>
<title><?= $page_title; ?>- Format 2</title>
<head>
    <link rel='shortcut icon' href='<?php echo $theme_link; ?>images/favicon.ico'/>

    <style>
        table, th, td {
            /*border: 1px solid black;*/
            border-collapse: collapse;
            font-family: 'Open Sans', 'Martel Sans', sans-serif;
        }

        th, td {
            padding: 5px;
            text-align: left;
            vertical-align: top
        }

        .dashed_top {
            border-top-style: dashed;
            border-width: 0.1px;
        }

        .dashed_bottom {
            border-bottom-style: dashed;
            border-width: 0.1px;
        }

        .dashed_left {
            border-left-style: dashed;
            border-width: 0.1px;
        }

        .dashed_right {
            border-right-style: dashed;
            border-width: 0.1px;
        }

        body {
            word-wrap: break-word;
        }
    </style>
</head>
<body onload="window.print();"><!--  -->
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

<table align="center" width="100%" height='100%' style="border:1px solid;">
    <thead>
    <tr>
        <th colspan="10">
            <table width="100%">
                <tr>
                    <th colspan="6" style="text-align: center; vertical-align: middle;">
                        <img src="<?= base_url('uploads/company/' . $company_logo); ?>" width='auto' height='80px'>
                    </th>
                    <th colspan="4" style="text-align: left;">
                        <h2 style="text-transform: uppercase;"><?= $this->lang->line('invoice'); ?></h2>
                        <?= $this->lang->line('invoice_no'); ?> : <?php echo "$sales_code"; ?><br>
                        
                        <?= $this->lang->line('date'); ?> : <?php echo show_date($sales_date); ?>
                        <br>
                        <?= $this->lang->line('staff'); ?> : <?php echo ucfirst($created_by); ?><br>
                    </th>
                </tr>
                <tr>
                    <td colspan="10">&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="6" style="border: 1px solid;">
                        <table width="100%">
                            <tr style="background-color: grey;">
                                <th style="text-align: center;">
                                    <?= $this->lang->line('bill_to'); ?>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <?php echo $this->lang->line('customer_name') . ": " . $customer_name; ?>
                                </th>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="10">&nbsp;</td>
                </tr>
            </table>
        </th>
    </tr>


    <tr style=''>
        <th style='border-right: 1px solid;border-top: 1px solid;' rowspan='2'>#</th>
        <th style='text-align: center;border-right: 1px solid;border-top: 1px solid;' rowspan='3'
            colspan='3'><?= $this->lang->line('description'); ?></th>
        <!--<th style='border-right: 1px solid;border-top: 1px solid;' rowspan='2'><? //= $this->lang->line('hsn'); ?></th>-->
        <th style='text-align: center;border-right: 1px solid;border-top: 1px solid;' rowspan='2'
            colspan="2"><?= $this->lang->line('quantity'); ?></th>
        <th style='text-align: center;border-right: 1px solid;border-top: 1px solid;' rowspan='2'
            colspan="2"><?= $this->lang->line('unit_price'); ?></th>
        <!--<th style='border-right: 1px solid;border-top: 1px solid;' rowspan='2'><? //= $this->lang->line('tax_amt'); ?></th>-->
        <!--<th style='border-right: 1px solid;border-top: 1px solid;' rowspan='2'><? //= $this->lang->line('discount_amount'); ?></th>-->
        <th style='text-align: center;border-right: 1px solid;border-top: 1px solid;' rowspan='2'
            colspan="2"><?= $this->lang->line('total_amount'); ?></th>
    </tr>
    </thead>
    <tbody style="border: 1px solid;">
    <tr style="border-bottom: 1px solid;">
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
                                  a.total_cost,c.hsn , a.id
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
            echo "<tr>";
            echo "<td style='border-right: 1px solid;border-top: 1px solid;'>" . ++$i . "</td>";
            echo "<td style='border-right: 1px solid;border-top: 1px solid;' colspan='3'>" . $res2->item_name . "</td>";
//            echo "<td style='border-right: 1px solid;border-top: 1px solid;'>" . $res2->hsn . "</td>";
            echo "<td style='border-right: 1px solid;border-top: 1px solid;' colspan='2'>" . $res2->sales_qty . "</td>";
            echo "<td style='text-align: right;border-right: 1px solid;border-top: 1px solid;' colspan='2'>" . $unit_price . "</td>";
//            echo "<td style='text-align: right;border-right: 1px solid;border-top: 1px solid;'>" . $tax_amt . "</td>";
//            echo "<td style='text-align: right;border-right: 1px solid;border-top: 1px solid;'>" . $discount_amt . "</td>";
            echo "<td style='text-align: right;border-right: 1px solid;border-top: 1px solid;' colspan='2'>" . app_number_format($res2->total_cost) . "</td>";
            echo "</tr>";
            $tot_qty += $res2->sales_qty;
            $tot_sales_price += $res2->price_per_unit;
            $tot_tax_amt += $res2->tax_amt;
            $tot_discount_amt += $res2->discount_amt;
            $tot_unit_total_cost += $res2->unit_total_cost;
            $tot_total_cost += $res2->total_cost;
        }
        ?>
    </tr>
    </tbody>
    <tfoot>
    <!-- <tr>
    <td colspan="3" style="text-align: center;font-weight: bold;"><?= $this->lang->line('total'); ?></td>
    <td colspan="1" style="font-weight: bold;"><?= $tot_qty; ?></td>
    <td colspan="1" style="">-</td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_tax_amt), 3, '.', ''); ?></b></td>
    <td colspan="1" style="">-</td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_discount_amt), 3, '.', ''); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_unit_total_cost), 3, '.', ''); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(($tot_total_cost), 3, '.', ''); ?></b></td>
  </tr> -->
    <tr>
        <td colspan="8" style="text-align: right;"><b><?= $this->lang->line('total'); ?></b></td>
        <td colspan="1" style="text-align: right;"><b><?php echo number_format(($tot_total_cost), 3, '.', ''); ?></b>
        </td>
    </tr>
    <!-- <tr>
    <td colspan="9" style="text-align: right;"><b><?= $this->lang->line('subtotal'); ?></b></td>
    <td colspan="1" style="text-align: right;" ><b><?php echo number_format(round($subtotal), 3, '.', ''); ?></b></td>
  </tr>

    <tr>
        <td colspan="8" style="text-align: right;"><b><?= $this->lang->line('other_charges'); ?></b></td>
        <td colspan="1" style="text-align: right;"><b><?php echo number_format(($other_charges_amt), 3, '.', ''); ?></b>
        </td>
    </tr>
    <tr>
        <td colspan="8" style="text-align: right;"><b><?= $this->lang->line('discount_on_all'); ?>
                (<?= $discount_to_all_input . " " . $discount_to_all_type; ?>)</b></td>
        <td colspan="1" style="text-align: right;">
            <b><?php echo number_format(($tot_discount_to_all_amt), 3, '.', ''); ?></b></td>
    </tr>
    <tr>
        <td colspan="8" style="text-align: right;"><b><?= $this->lang->line('round_off'); ?></b></td>
        <td colspan="1" style="text-align: right;"><b><?php echo number_format(($round_off), 3, '.', ''); ?></b></td>
    </tr>
    <tr>
        <td colspan="7">
            <?php echo "<span class='amt-in-word'>Amount in words: <i style='font-weight:bold;'>" . no_to_words(($grand_total)) . " Only</i></span>"; ?>
        </td>
        <td colspan="1" style="text-align: right;"><b><?= $this->lang->line('grand_total'); ?></b></td>
        <td colspan="1" style="text-align: right;"><b><?php echo number_format(($grand_total), 3, '.', ''); ?></b></td>
    </tr>
    <tr>
        <td colspan="9">
            <?php
    function no_to_words($no)
    {
        $words = array('0' => '', '1' => 'One', '2' => 'Two', '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six', '7' => 'Seven', '8' => 'Eight', '9' => 'Nine', '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve', '13' => 'Thirteen', '14' => 'Fouteen', '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen', '18' => 'Eighteen', '19' => 'Nineteen', '20' => 'Twenty', '30' => 'Thirty', '40' => 'Fourty', '50' => 'Fifty', '60' => 'Sixty', '70' => 'Seventy', '80' => 'Eighty', '90' => 'Ninty', '100' => 'Hundred &', '1000' => 'Thousand', '100000' => 'Lakh', '10000000' => 'Crore');
        if ($no == 0)
            return ' ';
        else {
            $novalue = '';
            $highno = $no;
            $remainno = 0;
            $value = 100;
            $value1 = 1000;
            while ($no >= 100) {
                if (($value <= $no) && ($no < $value1)) {
                    $novalue = $words["$value"];
                    $highno = (int)($no / $value);
                    $remainno = $no % $value;
                    break;
                }
                $value = $value1;
                $value1 = $value * 100;
            }
            if (array_key_exists("$highno", $words))
                return $words["$highno"] . " " . $novalue . " " . no_to_words($remainno);
            else {
                $unit = $highno % 10;
                $ten = (int)($highno / 10) * 10;
                return $words["$ten"] . " " . $words["$unit"] . " " . $novalue . " " . no_to_words($remainno);
            }
        }
    }

    /* echo "<span class='amt-in-word'>Amount in words: <i style='font-weight:bold;'>".no_to_words(round($grand_total))." Only</i></span>";*/

    ?>

        </td>
    </tr> -->

    <tr>
        <td colspan="5" style="padding-top: 100px">
            <b>Sales Supervisor<span
                        style="border-bottom-style: dotted; display: table-cell; border-bottom-color: black; white-space: pre;">                         </span>مشرف
                مبيعات</b>
        </td>
        <td colspan="5" style="text-align: right;padding-top: 100px">
            <b>Recipient<span
                        style="border-bottom-style: dotted; display: table-cell; border-bottom-color: black; white-space: pre;">                               </span>اسم
                المستلم</b>
        </td>
    </tr>

    <tr>
        <td colspan="5" style="padding-top: 100px">
            <b><?= $this->lang->line('installation_no'); ?></b>
        </td>
        <td colspan="5" style="text-align: right;padding-top: 100px">
            <b>Signature<span
                        style="border-bottom-style: dotted; display: table-cell; border-bottom-color: black; white-space: pre;">                                    </span>التوقيع</b>
        </td>
    </tr>

    <tr>
        <td colspan="9">&nbsp;</td>
    </tr>

    <?php if (!empty($sales_invoice_footer_text)) { ?>
        <tr style="border-top: 1px solid;">
            <td colspan="9" style="text-align: center;">
                <b><?= $sales_invoice_footer_text; ?></b>
            </td>
        </tr>
    <?php } ?>
    <tr>
        <td colspan="10" style="color: #0f74a8;">
            <hr>
        </td>
    </tr>
    <tr>
        <td colspan="10" style="color: #0f74a8;text-align: center;">
            <b>
                Kuwait - Al Dawliah Comm. Center - Mezzanine - Office No. 160/156 - P.O.Box 29896 Safat 13009
                Kuwait<br/>
                <?php echo $this->lang->line('tele_fax') . ": +96522479825 "; ?>
                <?php echo $this->lang->line('mobile') . ":" . $company_mobile . ' ' . ((!empty(trim($company_email))) ? $this->lang->line('email') . ": " . $company_email . "<br>" : ''); ?>
            </b>
        </td>
    </tr>
    </tfoot>
</table>


</body>
</html>
