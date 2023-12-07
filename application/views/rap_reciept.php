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
          <small>Add/Update reciept</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo $base_url; ?>rap_reciept"><?= $this->lang->line('rap_reciept_list'); ?></a></li>
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
              <form class="form-horizontal" id="rap_reciept-form">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="rap_reciept_date" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_date'); ?><label class="text-danger">*</label></label>

                        <div class="col-sm-8">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datepicker" id="rap_reciept_date" name="rap_reciept_date" value="<?php echo ($rap_reciept_date != '') ? date('d-m-Y', strtotime($rap_reciept_date)) :  show_date(date('d-m-Y')); ?>">

                            <span id="rap_reciept_date_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="rap_reciept_customer_name" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_customer_name'); ?><label class="text-danger">*</label></label>
                        <div class="col-sm-8 ">
                          <div class="input-group">
                            <select class="form-control select2" id="customer_id" name="rap_reciept_customer_name" style="width: 100%;" onkeyup="shift_cursor(event,'mobile')">
                              <?php

                              $query1 = "select * from db_customers where status=1";
                              $q1 = $this->db->query($query1);
                              if ($q1->num_rows($q1) > 0) {
                                // echo "<option value=''>-Select-</option>";
                                foreach ($q1->result() as $res1) {
                                  $selected = ($rap_reciept_customer_name == $res1->id) ? 'selected' : '';
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
                          <span id="rap_reciept_customer_name_msg" style="display:none" class="text-danger"></span>
                         
                        </div>
                       
                        
                      </div>


                      <div class="form-group">
                        <label for="rap_reciept_kd" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_kd'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control only_currency" id="rap_reciept_kd" name="rap_reciept_kd" placeholder="" value="<?php print $rap_reciept_kd; ?>">
                          <span id="rap_reciept_kd_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="rap_reciept_fils" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_fils'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control " id="rap_reciept_fils" name="rap_reciept_fils" placeholder="" value="<?php print $rap_reciept_fils; ?>">
                          <span id="rap_reciept_fils_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="rap_reciept_no" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_no'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control " id="rap_reciept_no" name="rap_reciept_no" placeholder="" value="<?php print $rap_reciept_no; ?>">
                          <span id="rap_reciept_no_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>


                      <!-- ########### -->
                    </div>


                    <div class="col-md-5">
                   
                      <div class="form-group">
                        <label for="rap_reciept_sum_of" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_sum_of'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control " id="rap_reciept_sum_of" name="rap_reciept_sum_of" placeholder="" value="<?php print $rap_reciept_sum_of; ?>">
                          <span id="rap_reciept_sum_of_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="rap_reciept_on_bank" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_on_bank'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control " id="rap_reciept_on_bank" name="rap_reciept_on_bank" placeholder="" value="<?php print $rap_reciept_on_bank; ?>">
                          <span id="rap_reciept_on_bank_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="rap_reciept_cash_or_check_no" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_cash_or_check_no'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control " id="rap_reciept_cash_or_check_no" name="rap_reciept_cash_or_check_no" placeholder="" value="<?php print $rap_reciept_cash_or_check_no; ?>">
                          <span id="rap_reciept_cash_or_check_no_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="rap_reciept_beign_of" class="col-sm-4 control-label"><?= $this->lang->line('rap_reciept_beign_of'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control " id="rap_reciept_beign_of" name="rap_reciept_beign_of" placeholder="" value="<?php print $rap_reciept_beign_of; ?>">
                          <span id="rap_reciept_beign_of_msg" style="display:none" class="text-danger"></span>
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

  <?php include"modals/modal_customer.php"; ?>

  <!-- SOUND CODE -->
  <?php include "comman/code_js_sound.php"; ?>
  <!-- TABLES CODE -->
  <?php include "comman/code_js_form.php"; ?>

  <script src="<?php echo $theme_link; ?>js/rap_reciept.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>
    $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");
  </script>

   <script src="<?php echo $theme_link; ?>js/modals.js"></script>
</body>

</html>