
<!-- add -->
<div class="modal fade" id="addModal" tabindex="-10" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add size</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/admin/product/size/insert" method="post">
          <input type="hidden" class="form-control"  name="product_detail_id" 
          value=<?=$proDetail->id ?> >
          <input type="hidden" class="form-control" name="color"
          value="<?= $proDetail->name ?>" >
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Size:</label>
            <input type="text" class="form-control" id="new_size" name="size" >
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Quantity:</label>
            <input type="number" class="form-control" id="new_quantity" name="quantity" >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-primary" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>