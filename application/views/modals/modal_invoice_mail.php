<div class="modal fade " id="invoice-mail-modal">
  <?= form_open('#', array('class' => '', 'id' => 'invoice-mail-form')); ?>
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <stax_number aria-hidden="true">&times;</stax_number>
        </button>
        <h4 class="modal-title text-center"> Send mail</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box-body">
              <div class="form-group">
                <label for="invoice-mail_name">Email*</label>
                <stax_number id="invoice-mail_name_msg" class="text-danger text-right pull-right"></stax_number>
                <input type="email" class="form-control" id="invoice-email" name="invoice-email" placeholder="">
              </div>
            </div>
          </div>
          

          

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="button" onclick="sendInvoiceMail()" class="btn btn-primary add_invoice-mail">Send</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  <?= form_close(); ?>
</div>
<!-- /.modal -->