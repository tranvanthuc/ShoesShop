<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Modal content-->
        <form action="/admin/cate/delete" method="post">
          <input type="hidden" class="form-control" id="id" name="id">
          <p>Do you want to delete this categories?</p>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <input type="submit" class="btn btn-danger" value="Yes">
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

  $('#id').val(id);
})
</script>
