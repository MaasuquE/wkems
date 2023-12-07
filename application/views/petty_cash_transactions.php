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
          <small>Petty cash/ Transactions</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo $base_url; ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="<?php echo $base_url; ?>petty_cash"><?= $this->lang->line('petty_cash_list'); ?></a></li>
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
              <form class="form-horizontal" id="petty_cash-form" action="<?php echo base_url('petty_cash/newpetty_cash') ?>">
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
                          <input type="text" class="form-control only_currency " id="petty_cash_cash_in" name="petty_cash_cash_in" placeholder="" value="">
                          <span id="petty_cash_cash_in_msg" style="display:none" class="text-danger"></span>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="petty_cash_cash_out" class="col-sm-4 control-label"><?= $this->lang->line('petty_cash_cash_out'); ?></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control only_currency" id="petty_cash_cash_out" name="petty_cash_cash_out" placeholder="" value="">
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



                    </div>
                    <!-- ########### -->
                  </div>
                  <input type="hidden" name="parent_epetty_cash" id="parent_epetty_cash" value="<?php echo $parent_epetty_cash;  ?>">
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <div class="col-sm-8 col-sm-offset-2 text-center">
                    <!-- <div class="col-sm-4"></div> -->
                    <?php
                   
                      $btn_name = "Save";
                      $btn_id = "savetransaction";

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

              <hr>
              <div class="row">
                <!-- ********** ALERT MESSAGE START******* -->
                <?php include "comman/code_flashdata.php"; ?>
                <!-- ********** ALERT MESSAGE END******* -->
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header with-border">
                      <h3 class="box-title"><?= $page_title; ?></h3>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example2" class="table table-bordered table-striped" width="100%">
                        <thead class="bg-primary ">
                          <tr>
                            <th class="text-center">
                              <input type="checkbox" class="group_check checkbox">
                            </th>
                            <th><?= $this->lang->line('petty_cash_date'); ?></th>
                            <th><?= $this->lang->line('petty_cash_ref_no'); ?></th>
                            <th><?= $this->lang->line('petty_cash_description'); ?></th>
                            <th><?= $this->lang->line('petty_cash_cash_in'); ?></th>
                            <th><?= $this->lang->line('petty_cash_cash_out'); ?></th>
                            <th><?= $this->lang->line('petty_cash_total'); ?></th>
                            <th><?= $this->lang->line('action'); ?></th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.col -->
              </div>
            </div>
            <!-- /.box -->

          </div>
          <!--/.col (right) -->

          <!-- /.row -->
          <hr>


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
  <?php include "comman/code_js_datatable.php"; ?>
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


    $(document).ready(function() {
      //datatables
      var table = $('#example2').DataTable({

        /* FOR EXPORT BUTTONS START*/
        dom: '<"row margin-bottom-12"<"col-sm-12"<"pull-left"l><"pull-right"fr><"pull-right margin-left-10 "B>>>tip',
        /* dom:'<"row"<"col-sm-12"<"pull-left"B><"pull-right">>> <"row margin-bottom-12"<"col-sm-12"<"pull-left"l><"pull-right"fr>>>tip',*/
        buttons: {
          buttons: [{
              className: 'btn bg-red color-palette btn-flat hidden delete_btn pull-left',
              text: 'Delete',
              action: function(e, dt, node, config) {
                multi_delete();
              }
            },
            {
              extend: 'copy',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: 'excel',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: 'pdf',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: 'print',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: 'csv',
              className: 'btn bg-teal color-palette btn-flat',
              exportOptions: {
                columns: [1, 2, 3, 4, 5, 6]
              }
            },
            {
              extend: 'colvis',
              className: 'btn bg-teal color-palette btn-flat',
              text: 'Columns'
            },

          ]
        },
        /* FOR EXPORT BUTTONS END */

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [[0, 'asc']], //Initial no order.
        "responsive": true,
        language: {
          processing: '<div class="text-primary bg-primary" style="position: relative;z-index:100;overflow: visible;">Processing...</div>'
        },
        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "<?php echo base_url('petty_cash/transaction_ajax_list') ?>",
          "type": "POST",
          'data': {
              parent_petty_cash: '<?php echo $parent_epetty_cash;  ?>',
            },

          complete: function(data) {
            $('.column_checkbox').iCheck({
              checkboxClass: 'icheckbox_square-orange',
              /*uncheckedClass: 'bg-white',*/
              radioClass: 'iradio_square-orange',
              increaseArea: '10%' // optional
            });
            call_code();
            //$(".delete_btn").hide();
          },

        },



      });
      new $.fn.dataTable.FixedHeader(table);
    });
  </script>

</body>

</html>