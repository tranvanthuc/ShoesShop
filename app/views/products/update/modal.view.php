<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
          <input type="hidden" class="form-control" id="product-detail-id" name="product-detail-id">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Size:</label>
            <input type="text" class="form-control" id="size" name="size" readonly="true">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Quantity:</label>
            <input type="text" class="form-control" id="quantity" name="quantity" >
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
$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id = button.data('id');
  var size = button.data('size');
  var quantity = button.data('quantity');
  var productDetailId = button.data('product-detail-id');

  $('#id').val(id);
  $('#size').val(size);
  $('#quantity').val(quantity);
  $('#product-detail-id').val(productDetailId);

  // $.ajax({
  //   type: "POST",
  //   url: "http://localhost:8000/products/product",
  //   data: {id: id},
  //   success: function(data){

  //     var data = JSON.parse(data);
  //     var product = data.results[0];
  //     console.log(product.id);
  //     console.log(product);

  //     $('#id').val(product.id);
  //     $('#size').val(product.size);
  //     $('#quantity').val(product.quantity);
  //   }

  // });

})
</script>
