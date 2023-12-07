<!DOCTYPE html>
<html>

<head>
  <!-- TABLES CSS CODE -->
  <?php include "comman/code_css_form.php"; ?>
  <!-- </copy> -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <?php include "sidebar.php"; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          <?= $page_title; ?>
          <small>Add/Update jobs</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo $base_url; ?>services"><?= $this->lang->line('services_list'); ?></a></li>
          <li class="active"><?= $page_title; ?></li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <!-- ********** ALERT MESSAGE START******* -->
          <?php include "comman/code_flashdata.php"; ?>
          <!-- ********** ALERT MESSAGE END******* -->
          <!-- right column -->
          <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-info ">

              <!-- form start -->
              <form class="form-horizontal" id="services-form">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="services_date" class="col-sm-4 control-label"><?= $this->lang->line('services_date'); ?><label class="text-danger">*</label></label>

                        <div class="col-sm-8">
                          <?php if($services_add_pemission) : ?>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datepicker" id="services_date" name="services_date" value="<?php echo ($services_date != '') ? date('d-m-Y',strtotime($services_date)):  show_date(date('d-m-Y')); ?>">

                            <span id="services_date_msg" style="display:none" class="text-danger"></span>
                          </div>
                          <?php else : ?>
                            <div class="vertical-center-field">
                            <?php echo ($services_date != '') ? date('d-m-Y',strtotime($services_date)) :  show_date(date('d-m-Y')); ?>
                            </div>
                          <?php endif; ?>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="services_customer_name" class="col-sm-4 control-label"><?= $this->lang->line('services_customer_name'); ?><label class="text-danger">*</label></label>
                        <div class="col-sm-8 ">
                          <?php if($services_add_pemission) : ?>
                          <div class="input-group">
                            <select class="form-control select2" id="services_customer_name" name="services_customer_name" style="width: 100%;" onkeyup="shift_cursor(event,'mobile')">
                              <?php

                              $query1 = "select * from db_customers where status=1";
                              $q1 = $this->db->query($query1);
                              if ($q1->num_rows($q1) > 0) {
                                // echo "<option value=''>-Select-</option>";
                                foreach ($q1->result() as $res1) {
                                  $selected = ($services_customer_name == $res1->id) ? 'selected' : '';
                                  echo "<option $selected  value='" . $res1->id . "'>" . $res1->customer_name . "</option>";
                                }
                              } else {
                              ?>
                                <option value="">No Records Found</option>
                              <?php
                              }
                              ?>
                            </select>
                            <span class="input-group-addon pointer" data-toggle="modal" data-target="#customer-modal" title="New Customer?"><i class="fa fa-user-plus text-primary fa-lg"></i></span>
                          </div>
                          <span id="services_customer_name_msg" style="display:none" class="text-danger"></span>
                          <?php else : ?>
                            <div class="vertical-center-field">
                            <?php echo $customer_name  ?>
                            </div>
                          <?php endif; ?>
                        </div>
                       
                        
                      </div>
                 

                      <div class="form-group">
                        <label for="services_details" class="col-sm-4 control-label"><?= $this->lang->line('services_details'); ?></label>
                        <div class="col-sm-8">
                          <?php if($services_add_pemission) : ?>
                          <textarea type="text" class="form-control" rows="4" id="services_details" name="services_details" placeholder=""><?php print $services_details; ?></textarea>
                          <span id="services_details_msg" style="display:none" class="text-danger"></span>
                            <?php else : ?>
                            <div class="vertical-center-field">
                            <?php echo $services_details  ?>
                            </div>
                            <?php endif; ?>
                        </div>
                      </div>

                      <?php if($services_add_pemission) : ?>
                      <div class="form-group">
                        <label for="services_expences" class="col-sm-4 control-label"><?= $this->lang->line('services_expences'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control only_currency" id="services_expences" name="services_expences" placeholder="" value="<?php print $services_expences; ?>">
                          <span id="services_expences_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>
                      <?php endif; ?>

                      <?php if($services_add_pemission) : ?>
                      <div class="form-group">
                        <label for="services_returns" class="col-sm-4 control-label"><?= $this->lang->line('services_returns'); ?></label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control" id="services_returns" name="services_returns" placeholder=""><?php print $services_returns; ?></textarea>
                          <span id="services_returns_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>
                      <?php endif; ?>


                      <!-- ########### -->
                    </div>

                    <?php

                    if( $services_no == ''){

                      $qs5="select service_init from db_company";
                      $q5=$this->db->query($qs5);
                      $service_init=$q5->row()->service_init;
                        //Create customers unique Number
                      $qs4="select coalesce(max(id),0)+1 as maxid from db_services";
                      $q1=$this->db->query($qs4);
                      $maxid=$q1->row()->maxid;
                      $services_no=$service_init.str_pad($maxid, 4, '0', STR_PAD_LEFT);
                    }
                  
                    ?>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="services_no" class="col-sm-4 control-label"><?= $this->lang->line('services_no'); ?></label>

                        <div class="col-sm-8">
                          <?php if($services_add_pemission) : ?>
                          <input type="text" class="form-control " id="services_no" name="services_no" placeholder="" value="<?php print $services_no; ?>" >
                          <span id="services_no_msg" style="display:none" class="text-danger"></span>
                          <?php else : ?>
                          <div class="vertical-center-field">
                          <?php echo $services_no  ?>
                          </div>
                          <?php endif; ?>
                        </div>
                      </div>

                      <?php if($services_add_pemission) : ?>
                      <div class="form-group">
                        <label for="services_technician_name" class="col-sm-4 control-label"><?= $this->lang->line('services_technician_name'); ?></label>

                        <div class="col-sm-8">

                          <select class="form-control select2" id="services_technician_id" name="services_technician_id" style="width: 100%;">
                            <?php

                            $query1 = "select * from db_users where status=1 and role_id != 1 ";
                            $q1 = $this->db->query($query1);
                            if ($q1->num_rows($q1) > 0) {
                              // echo "<option value=''>-Select-</option>";
                              foreach ($q1->result() as $res1) {
                                $selected = ($services_technician_id == $res1->id) ? 'selected' : '';
                                echo "<option $selected  value='" . $res1->id . "'>" . $res1->username . "</option>";
                              }
                            } else {
                            ?>
                              <option value="">No Records Found</option>
                            <?php
                            }
                            ?>
                          </select>
                          <span id="services_technician_name_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>
                      <?php endif; ?>

                      <div class="form-group">
                        <label for="services_status" class="col-sm-4 control-label"><?= $this->lang->line('services_status'); ?> <label class="text-danger">*</label></label>
                        <div class="col-sm-8"">
                          <select class=" form-control select2" id="services_status" name="services_status" style="width: 100%;">
                          <?php
                          $processing_select = ($services_status == 'Processing') ? 'selected' : '';
                          $hold_select = ($services_status == 'Hold') ? 'selected' : '';
                          $completed_select = ($services_status == 'Completed') ? 'selected' : '';
                          ?>
                          <option <?= $processing_select; ?> value="Processing">Processing</option>
                          <option <?= $hold_select; ?> value="Hold">Hold</option>
                          <option <?= $completed_select; ?> value="Completed">Completed</option>
                          </select>
                          <span id="services_status_msg" style="display:none" class="text-danger"></span>
                        </div>


                      </div>

                      <div class="form-group">
                        <label for="services_stock_used" class="col-sm-4 control-label"><?= $this->lang->line('services_stock_used'); ?></label>

                        <div class="col-sm-8">
                          <input type="text" class="form-control only_currency" id="services_stock_used" name="services_stock_used" placeholder="" value="<?php print $services_stock_used; ?>">
                          <span id="services_stock_used_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>


                      <div class="form-group">
                        <label for="services_invoice_no" class="col-sm-4 control-label"><?= $this->lang->line('services_invoice_no'); ?></label>

                        <div class="col-sm-8">
                          <div class="input-group ">

                            <input type="text" class="form-control " id="services_invoice_no" name="services_invoice_no" readonly placeholder="" value="<?php print $services_invoice_no; ?>">
                            <input type="hidden" class="form-control " id="services_invoice_id" name="services_invoice_id" placeholder="" value="<?php print $services_invoice_id; ?>">

                            <?php if ($services_invoice_no == '') : ?>
                              <div class="input-group-addon pointer" data-toggle="modal" data-target="#invoice-modal" title="New Invoice?">
                                <i class="fa fa-plus"></i>
                              </div>
                            <?php else :  ?>
                              <div class="input-group-addon pointer" data-toggle="modal" data-target="#invoice-modal" title="Update Invoice?">
                                <i class="fa fa-edit"></i>
                              </div>
                            <?php endif; ?>

                            <span id="services_invoice_no_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="services_remarks" class="col-sm-4 control-label"><?= $this->lang->line('services_remarks'); ?></label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control" id="services_remarks" name="services_remarks" placeholder=""><?php print $services_remarks; ?></textarea>
                          <span id="services_remarks_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                    </div>
                    <!-- ########### -->
                  </div>



                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <div class="col-sm-8 col-sm-offset-2 text-center">
                    <!-- <div class="col-sm-4"></div> -->
                    <?php
                    if ($q_id != "") {
                      $btn_name = "Update";
                      $btn_id = "update";
                    ?>
                      <input type="hidden" name="q_id" id="q_id" value="<?php echo $q_id; ?>" />
                    <?php
                    } else {
                      $btn_name = "Save";
                      $btn_id = "save";
                    }

                    ?>
                    <div class="col-md-3 col-md-offset-3">
                      <button type="button" id="<?php echo $btn_id; ?>" class=" btn btn-block btn-success" title="Save Data"><?php echo $btn_name; ?></button>
                    </div>
                    <div class="col-sm-3">
                      <button type="button" class="col-sm-3 btn btn-block btn-warning close_btn" title="Go Dashboard">Close</button>
                    </div>
                  </div>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box -->

          </div>
          <!--/.col (right) -->

          <!-- /.row -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include "footer.php"; ?>


    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->

  <?php include "modals/modal_invoice.php"; ?>
  <?php include"modals/modal_customer.php"; ?>
  <?php include"modals/modal_pos_sales_item.php"; ?>
  <!-- SOUND CODE -->
  <?php include "comman/code_js_sound.php"; ?>
  <!-- TABLES CODE -->
  <?php include "comman/code_js_form.php"; ?>

  <script src="<?php echo $theme_link; ?>js/services.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>
    $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");
  </script>

  <?php include "modals/modal_invoice_script.php"; ?>
  <script src="<?php echo $theme_link; ?>js/modals.js"></script>
</body>

</html>