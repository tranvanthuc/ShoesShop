<script src="/public/ckeditor/ckeditor.js"></script>
<form action="/admin/product/update" method="post">
  <div class="row">
    <div class="col-md-10 offset-md-1">
      <input type="hidden" class="form-control" name="id" 
        value=<?= $proDetail->id ?> >
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" 
        value="<?= $proDetail->name; ?>" >
      </div>

      <div class="form-group">
        <label for="category">Category</label>
        <select class="form-control" name="category_id">
        <?php foreach($cates as $cate) : ?>
          <?php if ($cate->id === $proDetail->category_id) { ?>
            <option value=<?= $cate->id ?> 
            selected="selected"
            >
              <?= $cate->name . " - " . $cate->gender ?> 
            </option>
          <?php } else { ?>
            <option value=<?= $cate->id ?> >
              <?= $cate->name . " - " . $cate->gender ?> 
            </option>
          <?php } ?>
        <?php endforeach ?>
        </select>
      </div>
      <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" name="price" 
        value=<?= $proDetail->price ?> >
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control ckeditor" rows="5" name="description"
        ><?= $proDetail->description ?></textarea>
      </div>
      
      <div class="row form-group">
        <div class="col-md-3">
          <input type="submit" value="Save" class="btn btn-primary form-control">
        </div>
        
        <div class="col-md-3">
          <a href="/admin/products"class="btn btn-secondary form-control" >Cancel</a>
        </div>
      </div>
    </div>
  </div>
</form>