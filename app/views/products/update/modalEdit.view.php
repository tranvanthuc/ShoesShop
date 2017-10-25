

<!-- edit -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/product/quantity/update" method="post">
          <input type="hidden" class="form-control" id="id" name="id">
          <input type="hidden" class="form-control" id="product_detail_id" name="product_detail_id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Size:</label>
            <input type="text" class="form-control" id="size" name="size" readonly="true">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Update">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
$('#editModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id');
  var size = button.data('size');
  var quantity = button.data('quantity');
  var product_detail_id = button.data('product-detail-id');
     
  $('#id').val(id);
  $('#size').val(size);
  $('#quantity').val(quantity);
  $('#product_detail_id').val(product_detail_id);

})
</script>