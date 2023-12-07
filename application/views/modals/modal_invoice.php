
 <?php
    if(!isset($sales_id)){
      $customer_id  = $sales_date = $sales_status = $warehouse_id =
      $reference_no  =
      $other_charges_input          = $other_charges_tax_id =
      $discount_type  = $sales_note = '';
      $sales_date=show_date(date("d-m-Y"));
      $discount_input = $this->db->select("sales_discount")->get('db_sitesettings')->row()->sales_discount;
      $discount_input = ($discount_input==0) ? '' : $discount_input;
    }
    else{
      $q2 = $this->db->query("select * from db_sales where id=$sales_id");
      $customer_id=$q2->row()->customer_id;
      $sales_date=show_date($q2->row()->sales_date);
      $sales_status=$q2->row()->sales_status;
      $warehouse_id=$q2->row()->warehouse_id;
      $reference_no=$q2->row()->reference_no;
      $discount_input=$q2->row()->discount_to_all_input;
      $discount_type=$q2->row()->discount_to_all_type;
      $other_charges_input=$q2->row()->other_charges_input;
      $other_charges_tax_id=$q2->row()->other_charges_tax_id;
      $sales_note=$q2->row()->sales_note;

      $items_count = $this->db->query("select count(*) as items_count from db_salesitems where sales_id=$sales_id")->row()->items_count;
    }
    
    ?>

<div class="modal fade " id="invoice-modal">
  <?= form_open('#', array('class' => '', 'id' => 'sales-form', 'enctype' => 'multipart/form-data', 'method' => 'POST')); ?>
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <stax_number aria-hidden="true">&times;</stax_number>
        </button>
        <h4 class="modal-title text-center">Add Invoice</h4>
      </div>
      <div class="modal-body">

        <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
        <input type="hidden" value='1' id="hidden_rowcount" name="hidden_rowcount">
        <input type="hidden" value='0' id="hidden_update_rowid" name="hidden_update_rowid">

        <div class="form-group row">
          <label for="customer_id" class="col-sm-2 control-label"><?= $this->lang->line('customer_name'); ?><label class="text-danger">*</label></label>
          <div class="col-sm-3">
            <select class="form-control select2" id="customer_id" name="customer_id" style="width: 100%;" onkeyup="shift_cursor(event,'mobile')">
              <?php

              $query1 = "select * from db_customers where status=1";
              $q1 = $this->db->query($query1);
              if ($q1->num_rows($q1) > 0) {
                // echo "<option value=''>-Select-</option>";
                foreach ($q1->result() as $res1) {
                  $selected = ($customer_id == $res1->id) ? 'selected' : '';
                  echo "<option $selected  value='" . $res1->id . "'>" . $res1->customer_name . "</option>";
                }
              } else {
              ?>
                <option value="">No Records Found</option>
              <?php
              }
              ?>
            </select>
            <span id="customer_id_msg" style="display:none" class="text-danger"></span>
          </div>
          <label for="sales_date" class="col-sm-2 control-label"><?= $this->lang->line('sales_date'); ?> <label class="text-danger">*</label></label>
          <div class="col-sm-3">
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="text" class="form-control pull-right datepicker" id="sales_date" name="sales_date" readonly onkeyup="shift_cursor(event,'sales_status')" value="<?= $sales_date; ?>">
            </div>
            <span id="sales_date_msg" style="display:none" class="text-danger"></span>
          </div>
        </div>

        <div class="form-group row" style="display: none;">
          <label for="sales_status" class="col-sm-2 control-label"><?= $this->lang->line('status'); ?> <label class="text-danger">*</label></label>
          <div class="col-sm-3">
            <select class="form-control select2" id="sales_status" name="sales_status" style="width: 100%;" onkeyup="shift_cursor(event,'mobile')">
              <?php
              $received_select = ($sales_status == 'Final') ? 'selected' : '';
              $pending_select = ($sales_status == 'Quotation') ? 'selected' : '';
              ?>
              <option <?= $received_select; ?> value="Final">Final</option>
              <option <?= $pending_select; ?> value="Quotation">Quotation</option>
            </select>
            <span id="sales_status_msg" style="display:none" class="text-danger"></span>
          </div>
          <label for="reference_no" class="col-sm-2 control-label"><?= $this->lang->line('reference_no'); ?> </label>
          <div class="col-sm-3">
            <input type="text" value="<?php echo  $reference_no; ?>" class="form-control " id="reference_no" name="reference_no" placeholder="">
            <span id="reference_no_msg" style="display:none" class="text-danger"></span>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12">
              <div class="box">
                <div class="box-info">
                  <div class="box-header">
                    <div class="col-md-8 col-md-offset-2 d-flex justify-content">
                      <div class="input-group">
                        <span class="input-group-addon" title="Select Items"><i class="fa fa-barcode"></i></span>
                        <input type="text" class="form-control " placeholder="Item name/Barcode/Itemcode" id="item_search">
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <div class="table-responsive" style="width: 100%">
                      <table class="table table-hover table-bordered" style="width:100%" id="sales_table">
                        <thead class="custom_thead">
                          <tr class="bg-primary">
                            <th rowspan='2' style="width:15%"><?= $this->lang->line('item_name'); ?></th>

                            <th rowspan='2' style="width:10%;min-width: 180px;"><?= $this->lang->line('quantity'); ?></th>
                            <th rowspan='2' style="width:10%"><?= $this->lang->line('unit_price'); ?></th>
                            <th rowspan='2' style="width:10%"><?= $this->lang->line('discount'); ?>(<?= $CI->currency() ?>)</th>
                            <th style="display: none;" rowspan='2' style="width:10%"><?= $this->lang->line('tax_amount'); ?></th>
                            <th  style="display: none;"  rowspan='2' style="width:5%"><?= $this->lang->line('tax'); ?></th>
                            <th rowspan='2' style="width:7.5%"><?= $this->lang->line('total_amount'); ?></th>
                            <th rowspan='2' style="width:7.5%"><?= $this->lang->line('action'); ?></th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="" class="col-sm-4 control-label"><?= $this->lang->line('quantity'); ?></label>
                  <div class="col-sm-4">
                    <label class="control-label total_quantity text-success" style="font-size: 15pt;">0</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="other_charges_input" class="col-sm-4 control-label"><?= $this->lang->line('other_charges'); ?></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control text-right only_currency" id="other_charges_input" name="other_charges_input" onkeyup="final_total();" value="<?php echo  $other_charges_input; ?>">
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control " id="other_charges_tax_id" name="other_charges_tax_id" onchange="final_total();" style="width: 100%;">
                      <?php
                      $q1 = "select * from db_tax where status=1";
                      $q1 = $this->db->query($q1);
                      if ($q1->num_rows() > 0) {
                        echo "<option>None</option>";
                        foreach ($q1->result() as $res1) {
                          $selected = ($other_charges_tax_id == $res1->id) ? 'selected' : '';
                          echo "<option $selected data-tax='" . $res1->tax . "' value='" . $res1->id . "'>" . $res1->tax_name . "</option>";
                        }
                      } else {
                      ?>
                        <option value="">No Records Found</option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="discount_to_all_input" class="col-sm-4 control-label"><?= $this->lang->line('discount_on_all'); ?></label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control  text-right only_currency" id="discount_to_all_input" name="discount_to_all_input" onkeyup="enable_or_disable_item_discount();" value="<?php echo  $discount_input; ?>">
                  </div>
                  <div class="col-sm-4">
                    <select class="form-control" onchange="final_total();" id='discount_to_all_type' name="discount_to_all_type">
                      <option value='in_percentage'>Per%</option>
                      <option value='in_fixed'>Fixed</option>
                    </select>
                  </div>
                  <!-- Dynamicaly select Supplier name -->
                  <script type="text/javascript">
                    <?php if ($discount_type != '') { ?>
                      document.getElementById('discount_to_all_type').value = '<?php echo  $discount_type; ?>';
                    <?php } ?>
                  </script>
                  <!-- Dynamicaly select Supplier name end-->
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="sales_note" class="col-sm-4 control-label"><?= $this->lang->line('note'); ?></label>
                  <div class="col-sm-8">
                    <textarea class="form-control text-left" id='sales_note' name="sales_note"><?= $sales_note; ?></textarea>
                    <span id="sales_note_msg" style="display:none" class="text-danger"></span>
                  </div>
                </div>
              </div>
            </div>


          </div>


          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">

                  <table class="col-md-9">
                    <tr>
                      <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('subtotal'); ?></th>
                      <th class="text-right" style="padding-left:10%;font-size: 17px;">
                        <h4><b id="subtotal_amt" name="subtotal_amt">0.000</b></h4>
                      </th>
                    </tr>
                    <tr>
                      <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('other_charges'); ?></th>
                      <th class="text-right" style="padding-left:10%;font-size: 17px;">
                        <h4><b id="other_charges_amt" name="other_charges_amt">0.000</b></h4>
                      </th>
                    </tr>
                    <tr>
                      <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('discount_on_all'); ?></th>
                      <th class="text-right" style="padding-left:10%;font-size: 17px;">
                        <h4><b id="discount_to_all_amt" name="discount_to_all_amt">0.000</b></h4>
                      </th>
                    </tr>
                    <tr style="<?= (!is_enabled_round_off()) ? 'display: none;' : ''; ?>">
                      <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('round_off'); ?>
                        <i class="hover-q " data-container="body" data-toggle="popover" data-placement="top" data-content="Go to Site Settings-> Site -> Disable the Round Off(Checkbox)." data-html="true" data-trigger="hover" data-original-title="" title="Do you wants to Disable Round Off ?">
                          <i class="fa fa-info-circle text-maroon text-black hover-q"></i>
                        </i>

                      </th>
                      <th class="text-right" style="padding-left:10%;font-size: 17px;">
                        <h4><b id="round_off_amt" name="tot_round_off_amt">0.000</b></h4>
                      </th>
                    </tr>
                    <tr>
                      <th class="text-right" style="font-size: 17px;"><?= $this->lang->line('grand_total'); ?></th>
                      <th class="text-right" style="padding-left:10%;font-size: 17px;">
                        <h4><b id="total_amt" name="total_amt">0.000</b></h4>
                      </th>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

         

          <div class="col-xs-12 ">
            <div class="col-sm-12">
              <div class="box-body ">

                <div class="col-md-12 payments_div payments_div_">
                  <h4 class="box-title text-info"><?= $this->lang->line('subtotal'); ?> : </h4>
                  <div class="box box-solid bg-gray">
                    <div class="box-body">
                      <div class="row">

                        <div class="col-md-6">
                          <div class="">
                            <label for="amount"><?= $this->lang->line('amount'); ?></label>
                            <input type="text" class="form-control text-right paid_amt only_currency" id="amount" name="amount" placeholder="">
                            <span id="amount_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="">
                            <label for="payment_type"><?= $this->lang->line('payment_type'); ?></label>
                            <select class="form-control select2" id='payment_type' name="payment_type" style="width:100%">
                              <?php
                              $q1 = $this->db->query("select * from db_paymenttypes where status=1");
                              if ($q1->num_rows() > 0) {
                                echo "<option value=''>-Select-</option>";
                                foreach ($q1->result() as $res1) {
                                  echo "<option value='" . $res1->payment_type . "'>" . $res1->payment_type . "</option>";
                                }
                              } else {
                                echo "<option>None</option>";
                              }
                              ?>
                            </select>
                            <span id="payment_type_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="">
                            <label for="payment_note"><?= $this->lang->line('payment_note'); ?></label>
                            <textarea type="text" class="form-control" id="payment_note" name="payment_note" placeholder=""></textarea>
                            <span id="payment_note_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>

                        <div class="clearfix"></div>
                      </div>
                    </div>
                  </div>
                </div><!-- col-md-12 -->
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
        



        </div>


      </div>
      <div class="modal-footer">
        <?php
        if (isset($sales_id)) {
          $btn_id = 'modal_update';
          $btn_name = "Update";
          echo '<input type="hidden" name="sales_id" id="sales_id" value="' . $sales_id . '"/>';
        } else {
          $btn_id = 'modal_save';
          $btn_name = "Save";
        }

        ?>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="button" id="<?php echo $btn_id; ?>" class="btn btn-primary "><?php echo $btn_name; ?></button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  <?= form_close(); ?>
</div>
<!-- /.modal -->
