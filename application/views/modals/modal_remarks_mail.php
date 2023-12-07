<div class="modal fade " id="sales-remarks-modal">
  <?= form_open('#', array('class' => '', 'id' => 'sales-remarks-form')); ?>
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header header-custom">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <stax_number aria-hidden="true">&times;</stax_number>
        </button>
        <h4 class="modal-title text-center"> Remarks </h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="box-body">
              <div class="form-group">
                <label for="sales-remarks_name">Remarks*</label>
                <input type="hidden" name="ramaks_id" id="sales_id_for_remarsk">
                <input type="hidden" name="ramak_id_redirect_url" id="ramak_id_redirect_url">
                <textarea name="remarks"  class="form-control remarks-text" id="remarsk-text" ></textarea>
              </div>
            </div>
          </div>
          

          

        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
        <button type="button" onclick="print_delivery_note()" class="btn btn-primary add_sales-remarks">Print</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
  <?= form_close(); ?>
</div>
<!-- /.modal -->