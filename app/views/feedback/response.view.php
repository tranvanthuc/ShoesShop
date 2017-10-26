<?php require('app/views/master/header.view.php') ?>

<script src="/public/ckeditor/ckeditor.js"></script>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php require('app/views/master/nav.view.php') ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
      <li class="breadcrumb-item"><a href="/admin/feedback">List Feedback</a></li>
      <li class="breadcrumb-item active">Response</li>
    </ol>
    <!-- content -->
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-comments-o"></i> Current Feedback
      </div>
      <div class="card-body">
      <form action="/admin/feedback/response" method="post" 
        enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-10 offset-md-1">
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" value="<?= $feedback->name ?>" readonly="true">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" name="email" value="<?= $feedback->email ?>" readonly="true">
            </div>

            <div class="form-group">
              <label for="content">Content</label>
              <textarea class="form-control ckeditor" name="content" rows="5" readonly="true">
              <?= $feedback->content ?>
              </textarea>
            </div>

            <div class="form-group">
              <label for="subject">Subject</label>
              <input type="text" class="form-control" name="subject">
            </div>

            <div class="form-group">
              <label for="cc">CC</label>
              <input type="text" class="form-control" name="cc" >
            </div>

            <div class="form-group">
              <label for="response">Response</label>
              <textarea class="form-control ckeditor" name="response" rows="5" autofocus></textarea>
            </div>

            <div class="form-group">
              <label for="attach file">Attach File</label>
              <input type="file" class="form-control" name="file">
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
      </div>
    </div>
  </div>
</div>
</body>



<?php require('app/views/master/footer.view.php') ?>