<!DOCTYPE html>
<html>

<head>
  <!-- TABLES CSS CODE -->
  <?php include "comman/code_css_form.php"; ?>
  <!-- </copy> -->
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

    .details-box {
      padding: 2px;
      background: #fff;
      border: 4px solid #252773;
      border-radius: 25px;
    }

    .inner-details-box {
      padding: 30px;
      background: #fff;
      border: 2px solid #252773;
      border-radius: 20px;
    }

    .inner-details-box p {
      color: #252773;
      font-weight: 600;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      margin: 24px 0;
    }

    .inner-details-box .float-right {
      display: flex;
      justify-content: flex-end;
      align-items: baseline;
    }

    .invoice-box-inner {
      width: 780px;
      margin: 0 auto;
    }

    .logo-img {
      margin-bottom: 50px;
    }

    .line-dot {
      border-bottom: 2px dotted #252773;
      padding: 0 10px;
      position: relative;
      bottom: 6px;
      margin: 0 5px;
    }

    .line-dot-1 {
      width: 24%;
    }

    .line-dot-2 {
      width: 69%;
    }

    .line-dot-3 {
      width: 69%;
    }

    .line-dot-4 {
      width: 25%;
    }

    .line-dot-5 {
      width: 25%;
    }

    .line-dot-6 {
      width: 77%;
    }

    .line-dot-7 {
      width: 100%;
      margin-top: 10px;
    }

    .line-dot-8 {
      width: 100%;
      margin-top: 10px;
    }

    .bottom-signature {
      display: flex;
      justify-content: space-around;
      align-items: baseline;
    }

    .top-boxes {
      display: flex;
      justify-content: space-between;
      margin-bottom: 50px;
      margin-top: -65px;
    }

    .box-main {
      width: 28%;
      border: 2px solid #252773;
      border-radius: 10px;
      border-radius: 8px;
      height: 52px;
      background: #fff;
      /*
            height: 34px;
            padding: 10px;
*/
    }

    .box1 {
      height: 70px;
    }

    .one-box-wrap {
      display: flex;
      justify-content: space-between;
      padding: 0 !important;
    }

    .box-innner-wrap {
      padding: 6px 20px;
    }

    .box1 h4 {
      margin: 0px;
      display: flex;
      justify-content: center;
      transform: translate(0, 50%);
      color: #252773;
    }

    .box1 p span {
      padding: 5px 8px;
    }

    .box1 p:first-child {
      margin: 0;
      background-color: #252773;
      color: #fff;
    }

    .box1 p:last-child {
      margin: 0;
      background-color: #252773;
      color: #fff;
    }

    .box2 p {
      margin: 0;
    }

    .box3 p {
      margin: 0;
      display: flex;
      justify-content: flex-start;
      font-size: 26px !important;
      align-items: center;
    }

    .box3 p span {
      color: #d46363;
    }

    .box1:before {
      content: "";
      position: absolute;
      height: 72px;
      width: 2px;
      left: 291px;
      top: 191px;
      background: #cfd0ff;
      -webkit-print-color-adjust: exact;
    }

    .footer-content p {
      line-height: 24px;
      color: #252773;
      font-weight: 600;
      width: 90%;
      margin: 0 auto;
      padding: 10px;
    }

    @media print {
      .box1 p:first-child {
        margin: 0;
        background-color: #252773 !important;
        color: #fff;
        -webkit-print-color-adjust: exact;
      }

      .box1 p:last-child {
        margin: 0;
        background-color: #252773 !important;
        color: #fff;
        -webkit-print-color-adjust: exact;
      }

      .box1:before {
        content: "";
        position: absolute;
        height: 72px;
        width: 2px;
        left: 280px;
        top: 205px;
        background: #cfd0ff;
        -webkit-print-color-adjust: exact;
      }
    }
  </style>
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
          <small>Reciept voucher</small>
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

              <div class="invoice-box">
                <div class="invoice-box-inner">
                  <div class="logo-img"><img src="<?= base_url('uploads/company/sample-1.png'); ?>" alt="" height="130px;"></div>
                  <div class="details-box">
                    <div class="inner-details-box">
                      <div class="top-boxes">
                        <div class="box-main box1">
                          <div class="box-main-innner-wrap one-box-wrap">
                            <div style="width: 50%;">
                              <p style="display: block;text-align: center;padding: 5px 0px;border-radius: 0 0 0px 5px;"><span>K.D. نشان</span></p>
                              <h4><?= $rap_reciept_kd?></h4>
                            </div>
                            <div style="width: 50%;">
                              <p style="display: block;text-align: center;padding: 5px 0px;border-radius: 0 0 5px 0;"><span>Fils نشان</span></p>
                              <h4><?= $rap_reciept_fils?></h4>
                            </div>
                          </div>
                        </div>
                        <div class="box-main box2">
                          <div class="box-main-innner-wrap">
                            <p align="center" style="display: block;">امتیازی نشان</p>
                            <p align="center" style="display: block;">Reciept Voucher</p>
                          </div>
                        </div>
                        <div class="box-main box3">
                          <div class="box-main-innner-wrap">
                            <p>No &nbsp;&nbsp;&nbsp;<span><?= $rap_reciept_no?></span></p>
                          </div>
                        </div>
                      </div>
                      <p class="float-right">
                        <span>Date </span>
                        <span class="line-dot line-dot-1"><?= date('d-m-Y',strtotime($rap_reciept_date)) ?></span>
                        <span>امتیازی نشان</span>
                      </p>
                      <p>
                        <span>Paid to Mr./Mrs </span>  
                        <span class="line-dot line-dot-2"><?= $customer_name?></span>
                        <span>امتیازی نشان</span>
                      </p>
                      <p>
                        <span>The Sum of K.D. </span>
                        <span class="line-dot line-dot-3"><?= $rap_reciept_sum_of ?></span>
                        <span>امتیازی نشان</span>
                      </p>
                      <p>
                        <span>On Bank</span>
                        <span class="line-dot line-dot-4"><?= $rap_reciept_on_bank?></span>
                        <span>امتیازی نشان</span>
                        <span>/ Cheque No</span>
                        <span class="line-dot line-dot-5"><?= $rap_reciept_cash_or_check_no?></span>
                        <span>امتیازی نشان</span>
                      </p>
                      <p>
                        <span>Being of</span>
                        <span class="line-dot line-dot-6"><?= $rap_reciept_beign_of?></span>
                        <span>امتیازی نشان</span>
                      </p>
                      <div class="bottom-signature">
                        <div class="cashier">
                          <p>Cashier&nbsp;&nbsp;&nbsp; امتیازی نشان</p>
                          <p><span class="line-dot line-dot-7"></span></p>
                        </div>
                        <div class="receiver">
                          <p>Receiver's Sign.&nbsp;&nbsp;&nbsp; امتیازی نشان</p>
                          <p><span class="line-dot line-dot-8"></span></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="footer-content">
                    <P style="text-align: center">Kuwait – Al Dawliah Commercial Centre-Mezzanine Floor – Office No.160/156-P.O.Box 29896 Safat 13009 – Kuwait. +96522479825 Mobile No-94157777 Email: sales@softlinekw.com</P>
                  </div>

                  <a href="<?php echo $base_url; ?>rap_reciept/update/<?php echo $q_id; ?>" class="btn btn-success">
                    <i class="fa  fa-edit"></i> Edit
                  </a>


                  <a href="<?php echo $base_url; ?>rap_reciept/print_voucher/<?php echo $q_id; ?>" target="_blank" class="btn btn-warning">
                    <i class="fa fa-print"></i>
                    Print
                  </a>
                </div>
              </div>
            </div>







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


  <!-- SOUND CODE -->
  <?php include "comman/code_js_sound.php"; ?>
  <!-- TABLES CODE -->
  <?php include "comman/code_js_form.php"; ?>

  <script src="<?php echo $theme_link; ?>js/rap_reciept.js"></script>
  <!-- Make sidebar menu hughlighter/selector -->
  <script>$(".rap_reciept-view-active-li").addClass("active");</script>

</body>

</html>