
<!-- add -->
<div class="modal fade" id="deleteModal" tabindex="-10" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="modal-title" id="deleteModalLabel">Do you want to delete this size ?</h5>
        <form action="/admin/product/size/delete" method="post">
          <input type="hidden" class="form-control" id="delete_id" name="id" >
          <input type="hidden" class="form-control" id="delete_product_detail_id" name="product_detail_id">
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <input type="submit" class="btn btn-primary" value="Yes">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$('#deleteModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id');
  var product_detail_id = button.data('product-detail-id');
  $('#delete_id').val(id);
  $('#delete_product_detail_id').val(product_detail_id);

})
</script>