

<script src="<?php echo $theme_link; ?>js/sales_for_modal.js"></script>
<script>
  //Initialize Select2 Elements
  $(".select2").select2();
  //Date picker
  $('.datepicker').datepicker({
    autoclose: true,
    format: 'dd-mm-yyyy',
    todayHighlight: true
  });
  /* ---------- CALCULATE TAX -------------*/
  function calculate_tax(i) { //i=Row
    set_tax_value(i);

    //Find the Tax type and Tax amount
    var tax_type = $("#tr_tax_type_" + i).val();
    var tax_amount = $("#td_data_" + i + "_11").val();

    var qty = $("#td_data_" + i + "_3").val().trim();
    var sales_price = parseFloat($("#td_data_" + i + "_10").val().trim());
    $("#td_data_" + i + "_4").val(sales_price);
    /*Discounr*/
    var discount_amt = $("#td_data_" + i + "_8").val().trim();
    discount_amt = (isNaN(parseFloat(discount_amt))) ? parseFloat(0.000) : parseFloat(discount_amt);

    var amt = parseFloat(qty) * sales_price; //Taxable

    var total_amt = amt - discount_amt;
    total_amt = (tax_type == 'Inclusive') ? total_amt : parseFloat(total_amt) + parseFloat(tax_amount);

    //Set Unit cost
    $("#td_data_" + i + "_9").val('').val(total_amt.toFixed(3));

    final_total();
  }

  /* ---------- CALCULATE GST END -------------*/


  /* ---------- Final Description of amount ------------*/
  function final_total() {


    var rowcount = $("#hidden_rowcount").val();
    var subtotal = parseFloat(0);

    var other_charges_per_amt = parseFloat(0);
    var other_charges_total_amt = 0;
    var taxable = 0;
    if ($("#other_charges_input").val() != null && $("#other_charges_input").val() != '') {

      other_charges_tax_id = $('option:selected', '#other_charges_tax_id').attr('data-tax');
      other_charges_input = $("#other_charges_input").val();
      if (other_charges_tax_id > 0) {

        other_charges_per_amt = (other_charges_tax_id * other_charges_input) / 100;
      }

      taxable = parseFloat(other_charges_per_amt) + parseFloat(other_charges_input); //Other charges input
      other_charges_total_amt = parseFloat(other_charges_per_amt) + parseFloat(other_charges_input);
    } else {
      //$("#other_charges_amt").html('0.000');
    }


    var tax_amt = 0;
    var actual_taxable = 0;
    var total_quantity = 0;

    for (i = 1; i <= rowcount; i++) {

      if (document.getElementById("td_data_" + i + "_3")) {
        //customer_id must exist
        if ($("#td_data_" + i + "_3").val() != null && $("#td_data_" + i + "_3").val() != '') {
          actual_taxable = actual_taxable + + +(parseFloat($("#td_data_" + i + "_13").val()).toFixed(3) * parseFloat($("#td_data_" + i + "_3").val()));
          subtotal = subtotal + + +parseFloat($("#td_data_" + i + "_9").val()).toFixed(3);
          if ($("#td_data_" + i + "_7").val() >= 0) {
            tax_amt = tax_amt + + +$("#td_data_" + i + "_7").val();
          }
          total_quantity += parseFloat($("#td_data_" + i + "_3").val().trim());
        }

      } //if end
    } //for end


    //Show total Sales Quantitys
    $(".total_quantity").html(total_quantity);

    //Apply Output on screen
    //subtotal
    if ((subtotal != null || subtotal != '') && (subtotal != 0)) {

      //subtotal
      $("#subtotal_amt").html(subtotal.toFixed(3));

      //other charges total amount
      $("#other_charges_amt").html(parseFloat(other_charges_total_amt).toFixed(3));

      //other charges total amount


      taxable = taxable + subtotal;

      //discount_to_all_amt
      // if($("#discount_to_all_input").val()!=null && $("#discount_to_all_input").val()!=''){
      var discount_input = parseFloat($("#discount_to_all_input").val());
      discount_input = isNaN(discount_input) ? 0 : discount_input;
      var discount = 0;
      if (discount_input > 0) {
        var discount_type = $("#discount_to_all_type").val();
        if (discount_type == 'in_fixed') {
          taxable -= discount_input;
          discount = discount_input;
          //Minus
        } else if (discount_type == 'in_percentage') {
          discount = (taxable * discount_input) / 100;
          taxable -= discount;

        }
      } else {
        //discount += $("#")
      }
      discount = parseFloat(discount).toFixed(3);

      $("#discount_to_all_amt").html(discount);
      $("#hidden_discount_to_all_amt").val(discount);
      //}
      //subtotal_round=Math.round(taxable);
      subtotal_round = round_off(taxable); //round_off() method custom defined
      subtotal_diff = subtotal_round - taxable;

      $("#round_off_amt").html(parseFloat(subtotal_diff).toFixed(3));
      $("#total_amt").html(parseFloat(subtotal_round).toFixed(3));
      $("#hidden_total_amt").val(parseFloat(subtotal_round).toFixed(3));
    } else {
      $("#subtotal_amt").html('0.000');
      $("#tax_amt").html('0.000');
      $("#round_off_amt").html('0.000');
      $("#total_amt").html('0.000');
      $("#amount").val('0.000');
      $("#hidden_total_amt").html('0.000');
      $("#discount_to_all_amt").html('0.000');
      $("#hidden_discount_to_all_amt").html('0.000');
      $("#subtotal_amt").html('0.000');
      $("#other_charges_amt").html('0.000');
    }

    // adjust_payments();
    //alert("final_total() end");
  }
  /* ---------- Final Description of amount end ------------*/

  function removerow(id) { //id=Rowid

    $("#row_" + id).remove();
    final_total();
    failed.currentTime = 0;
    failed.play();
  }



  function enable_or_disable_item_discount() {
  

    var rowcount = $("#hidden_rowcount").val();
    for (k = 1; k <= rowcount; k++) {
      if (document.getElementById("tr_item_id_" + k)) {
        calculate_tax(k);
      } //if end
    } //for end

    //final_total();
  }

  //Sale Items Modal Operations Start
  function show_sales_item_modal(row_id) {
    $('#sales_item').modal('toggle');
    $("#popup_tax_id").select2();

    //Find the item details
    var item_name = $("#td_data_" + row_id + "_1").html();
    var tax_type = $("#tr_tax_type_" + row_id).val();
    var tax_id = $("#tr_tax_id_" + row_id).val();
    var description = $("#description_" + row_id).val();

    /*Discount*/
    var item_discount_input = $("#item_discount_input_" + row_id).val();
    var item_discount_type = $("#item_discount_type_" + row_id).val();

    //Set to Popup
    $("#item_discount_input").val(item_discount_input);
    $("#item_discount_type").val(item_discount_type).select2();

    $("#popup_item_name").html(item_name);
    $("#popup_tax_type").val(tax_type).select2();
    $("#popup_tax_id").val(tax_id).select2();
    $("#popup_description").val(description);
    $("#popup_row_id").val(row_id);
  }

  function set_info() {
    var row_id = $("#popup_row_id").val();
    var tax_type = $("#popup_tax_type").val();
    var tax_id = $("#popup_tax_id").val();
    var description = $("#popup_description").val();
    var tax_name = ($('option:selected', "#popup_tax_id").attr('data-tax-value'));
    var tax = parseFloat($('option:selected', "#popup_tax_id").attr('data-tax'));

    /*Discounr*/
    var item_discount_input = $("#item_discount_input").val();
    var item_discount_type = $("#item_discount_type").val();

    //Set it into row 
    $("#item_discount_input_" + row_id).val(item_discount_input);
    $("#item_discount_type_" + row_id).val(item_discount_type);

    $("#tr_tax_type_" + row_id).val(tax_type);
    $("#tr_tax_id_" + row_id).val(tax_id);
    $("#tr_tax_value_" + row_id).val(tax); //%
    $("#description_" + row_id).val(description);
    $("#td_data_" + row_id + "_12").html(tax_name);

    calculate_tax(row_id);
    $('#sales_item').modal('toggle');
  }

  function set_tax_value(row_id) {
    //get the sales price of the item
    var tax_type = $("#tr_tax_type_" + row_id).val();
    var tax = isNaN( parseFloat($("#tr_tax_value_"+row_id).val() ))? 0 :parseFloat($("#tr_tax_value_"+row_id).val()); //%
    var qty = $("#td_data_" + row_id + "_3").val().trim();
    qty = (isNaN(qty)) ? 0 : qty;
    var sales_price = parseFloat($("#td_data_" + row_id + "_10").val());
    sales_price = (isNaN(sales_price)) ? 0 : sales_price;
    sales_price = sales_price * qty;

    /*Discount*/
    var item_discount_type = $("#item_discount_type_" + row_id).val();
    var item_discount_input = parseFloat($("#item_discount_input_" + row_id).val());
    item_discount_input = (isNaN(item_discount_input)) ? parseFloat(0.000) : item_discount_input;

    //Calculate discount      
    var discount_amt = (item_discount_type == 'Percentage') ? ((sales_price) * item_discount_input) / 100 : item_discount_input;
    sales_price -= parseFloat(discount_amt);

    var tax_amount = (tax_type == 'Inclusive') ? calculate_inclusive(sales_price, tax) : calculate_exclusive(sales_price, tax);

    $("#td_data_" + row_id + "_8").val(discount_amt.toFixed(3));

    $("#td_data_" + row_id + "_11").val(tax_amount);
  }
  //Sale Items Modal Operations End
</script>

<!-- UPDATE OPERATIONS -->
<script type="text/javascript">
  <?php if (isset($sales_id)) { ?>
    $(document).ready(function() {
      var base_url = '<?= base_url(); ?>';
      var sales_id = '<?= $sales_id; ?>';
      $(".box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
      $.post(base_url + "sales/return_sales_list/" + sales_id, {}, function(result) {
        //alert(result);
        $('#sales_table tbody').append(result);
        $("#hidden_rowcount").val(parseFloat(<?= $items_count; ?>) + 1);
        success.currentTime = 0;
        success.play();
        enable_or_disable_item_discount();
        $(".overlay").remove();
      });
    });
  <?php } ?>
</script>
<!-- UPDATE OPERATIONS end-->