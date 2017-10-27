<form action="shop-info/upload-image" method="post" enctype="multipart/form-data" id="myForm">
    <!-- Modal -->
    <div class="modal fade" id="uploadModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update shop information</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <input name="uploadedImage" id="uploadedImage" type="file" value="Choose Image">
                </div>
                <div class="modal-footer">
                    <input class="btn btn-primary" name="submit" type="submit" value="UpoadImage">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
$(function(){
    $('#myform').on('submit', function(e){
        
        // prevent native form submission here
        e.preventDefault();

        // now do whatever you want here
        $.ajax({
            type: $(this).attr('method'), // <-- get method of form
            url: $(this).attr('action'), // <-- get action of form
            data: $(this).serialize(), // <-- serialize all fields into a string that is ready to be posted to your PHP file
            beforeSend: function(){
                $('#result').html('<img src="loading.gif" />');
            },
            success: function(data){
                $('#result').html(data);
            }
        });
    });
});
</script>