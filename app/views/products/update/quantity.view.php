<div class="btn-add">
  <button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#addModal">
  </button>
</div>

<?php require('modalAdd.view.php') ?>
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead >
      <tr>
        <?php 
        $fields = ['ID', 'Size','Quantity', 'Action'];
        foreach($fields as $field) :
        ?>
        <th><?= $field ?></th>
        <?php endforeach; ?>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <?php foreach($fields as $field) : ?>
        <th><?= $field ?></th>
        <?php endforeach; ?>
      </tr>
    </tfoot>
    <tbody>
      <?php
        $i = 1;
        foreach($products as $product) :
      ?>
      <tr>
        <td><?= $i++ ?></td>
        <td><?= $product->size ?></td>
        <td><?= $product->quantity ?></td>
        <td>
        <a href="#" class="btn btn-primary fa fa-pencil-square-o" 
        data-toggle="modal" data-target="#editModal" 
        data-id="<?= $product->id; ?>" data-size="<?= $product->size; ?>" 
        data-quantity="<?= $product->quantity; ?>"
        data-product-detail-id=<?= $proDetail->id ?>
        >
        </a>
          &nbsp;
          <a href="#" class="btn btn-danger fa fa-trash-o" 
          data-toggle="modal" data-target="#deleteModal" 
          data-id="<?= $product->id; ?>"
          data-product-detail-id=<?= $proDetail->id ?>
        </td>
      </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
  <?php require('modalDelete.view.php') ?>
  <?php require('modalEdit.view.php') ?>
</div>