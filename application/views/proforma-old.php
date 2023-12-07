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
          <small>Add/Update Proforma</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo $base_url; ?>Proforma"><?= $this->lang->line('Proforma_list'); ?></a></li>
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
              <form class="form-horizontal" id="profroma-form">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="hidden" id="base_url" value="<?php echo $base_url;; ?>">
                <div class="box-body">
                  <div class="row">
                    <div class="col-md-5">
                      <div class="form-group">
                        <label for="petty_cash_date" class="col-sm-4 control-label"><?= $this->lang->line('petty_cash_date'); ?><label class="text-danger">*</label></label>

                        <div class="col-sm-8">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right datepicker" id="petty_cash_date" name="petty_cash_date" value="<?php echo ($petty_cash_date != '') ? date('d-m-Y', strtotime($petty_cash_date)) :  show_date(date('d-m-Y')); ?>">

                            <span id="petty_cash_date_msg" style="display:none" class="text-danger"></span>
                          </div>
                        </div>
                      </div>



                      <div class="form-group">
                        <label for="petty_cash_ref_no" class="col-sm-4 control-label"><?= $this->lang->line('petty_cash_ref_no'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control " id="petty_cash_ref_no" name="petty_cash_ref_no" placeholder="" value="<?php print $petty_cash_ref_no; ?>">
                          <span id="petty_cash_ref_no_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="petty_cash_description" class="col-sm-4 control-label"><?= $this->lang->line('petty_cash_description'); ?></label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control" rows="4" id="petty_cash_description" name="petty_cash_description" placeholder=""><?php print $petty_cash_description; ?></textarea>
                          <span id="petty_cash_description_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>
                      <!-- ########### -->
                    </div>


                    <div class="col-md-5">

                      <div class="form-group">
                        <label for="petty_cash_cash_in" class="col-sm-4 control-label"><?= $this->lang->line('petty_cash_cash_in'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control only_currency " id="petty_cash_cash_in" name="petty_cash_cash_in" placeholder="" value="<?php print $petty_cash_cash_in; ?>">
                          <span id="petty_cash_cash_in_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="petty_cash_cash_out" class="col-sm-4 control-label"><?= $this->lang->line('petty_cash_cash_out'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control only_currency" id="petty_cash_cash_out" name="petty_cash_cash_out" placeholder="" value="<?php print $petty_cash_cash_out; ?>">
                          <span id="petty_cash_cash_out_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <!-- <div class="form-group">
                        <label for="petty_cash_total" class="col-sm-4 control-label"><?= $this->lang->line('petty_cash_total'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control only_currency" id="petty_cash_total" name="petty_cash_total" placeholder="" value="<?php print $petty_cash_total; ?>">
                          <span id="petty_cash_total_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div> -->

                      <div class="form-group">
                        <label for="petty_cash_remarks" class="col-sm-4 control-label"><?= $this->lang->line('petty_cash_remarks'); ?></label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control" rows="4" id="petty_cash_remarks" name="petty_cash_remarks" placeholder=""><?php print $petty_cash_remarks; ?></textarea>
                          <span id="petty_cash_remarks_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>


                      <?php if (isset($pi)) {
                      ?>
                        <input type="hidden" name="parent_epetty_cash" id="parent_epetty_cash" value="<?php echo $pi;  ?>">
                      <?php
                      } ?>

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

  <?php include "modals/modal_customer.php"; ?>

  <!-- SOUND CODE -->
  <?php include "comman/code_js_sound.php"; ?>
  <!-- TABLES CODE -->
  <?php include "comman/code_js_form.php"; ?>

  <script src="<?php echo $theme_link; ?>js/petty_cash.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>
    $(".<?php echo basename(__FILE__, '.php'); ?>-active-li").addClass("active");
  </script>

  <script src="<?php echo $theme_link; ?>js/modals.js"></script>
  <script>
    $("#petty_cash_cash_in").blur(function() {
      cal_total();
    });

    $("#petty_cash_cash_out").blur(function() {
      cal_total();
    });

    function cal_total() {
      var peti_in = $("#petty_cash_cash_in").val();
      var peti_out = $("#petty_cash_cash_out").val();
      if (isNaN(parseFloat(peti_in))) {
        peti_in = 0;
      }
      if (isNaN(parseFloat(peti_out))) {
        peti_out = 0;
      }

      var total = peti_in - peti_out;
      total = parseFloat(total).toFixed(3);
      $("#petty_cash_total").val(total);
    }
  </script>

</body>

</html>