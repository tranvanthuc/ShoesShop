<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Shoes Shop</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">

      <!-- nav - sidenav -->
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="/">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Categories management">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#categories-management" data-parent="#parent-products">
            <i class="fa fa-th-list" aria-hidden="true"></i>
            <span class="nav-link-text">Categories management</span>
          </a>
          <ul class="sidenav-second-level collapse" id="categories-management">
              <li>
                <a href="/admin/cate/insert"><span class="fa fa-plus-square-o"></span> Add Categories</a>
              </li>
              <li>
                <a href="/admin/cates"><span class="fa fa-list"></span> List Categories</a>
              </li>
          </ul>
        </li>
          <a class="nav-link" href="/admin/users">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">View list users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Products management">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#products-management" data-parent="#parent-products">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span class="nav-link-text">Products management</span>
          </a>
          <ul class="sidenav-second-level collapse" id="products-management">
            <li>
              <a href="/admin/product/insert">Add Product</a>
            </li>
            <li>
              <a href="/admin/products">List Products</a>
            </li>
          </ul>
        </li>
      </ul>


      <!-- side nav -->
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="http://localhost:8000/admin/logout">
            <i class="fa fa-fw fa-sign-out"></i>Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>


