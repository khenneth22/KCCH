<?php
 $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
?>

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" ></i>
      <a class="navbar-brand m-0" href="#" target="">
       <!-- <img src="../img/kape-catalina-logo.png" class="nav-brand nav-logo h-100"  alt="main_logo"> -->
       <span class=" font-weight-bold text-white">Kape Catalina's Coffee House</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
 
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link text-white <?= $page == "index.php"? 'bg-gradient-dark':'' ?>" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-tachometer opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "category.php"? 'bg-gradient-dark':'' ?>" href="category.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-list-alt opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">All Categories</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "products.php"? 'bg-gradient-dark':'' ?>" href="products.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-product-hunt opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">All Products</span>
          </a>
        </li>
       
       
       

        <!-- Temporary placement ng add review -->
          <!-- <li class="nav-item">
            <a class="nav-link text-white <?= $page == "../addReview.php"? 'bg-gradient-dark':'' ?>" href="../addReview.php">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">person</i>
              </div>
              <span class="nav-link-text ms-1">Add Review</span>
            </a>
          </li> -->
          <!-- Temporary placement ng add review -->

        
        
        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "view-order-history.php"? 'bg-gradient-dark':'' ?>" href="view-order-history.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-shopping-cart opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Orders</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white <?= $page == "salesReport.php"? 'bg-gradient-dark':'' ?>" href="salesReport.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-bar-chart opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sales/Report</span>
          </a>
        </li>
         <nav>
          <ul>
            <li class="nav-item">
              <select class="w-90 text-white form-control border-0" style="border: none; outline: none;" onchange="location = this.value;">
                <option value="" disabled selected>Manage</option>
                <option class="form-control text-dark" value="accounts.php" <?= $page == "accounts.php"? 'selected':'' ?>>Accounts</option>
                <option class="form-control text-dark" value="bannerSettings.php" <?= $page == "bannerSettings.php"? 'selected':'' ?>>Banners</option>
                <option class="form-control text-dark" value="customerReviews.php" <?= $page == "customerReviews.php"? 'selected':'' ?>>Reviews</option>
              </select>
            </li>
          </ul>
        </nav>


        <!-- <li class="nav-item">
          <a class="nav-link text-white <?= $page == "accounts.php"? 'bg-gradient-dark':'' ?>" href="accounts.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Accounts</span>
          </a>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link text-white <?= $page == "bannerSettings.php"? 'bg-gradient-dark':'' ?>" href="bannerSettings.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class=" fa fa-briefcase opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Banners</span>
          </a>
        </li> -->
        
        <!-- <li class="nav-item">
          <a class="nav-link text-white <?= $page == "offersManager.php"? 'bg-gradient-dark':'' ?>" href="offersManager.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-percent opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Offers</span>
          </a>
        </li> -->
        
        <!-- <li class="nav-item ">
          <a class="nav-link text-white <?= $page == "customerReviews.php"? 'bg-gradient-dark':'' ?>" href="customerReviews.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-comments opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Manage Reviews</span>
          </a>
        </li> -->
        <li class="nav-item ">
          <a class="nav-link text-white <?= $page == "walkinOrders.php"? 'bg-gradient-dark':'' ?>" href="walkinOrders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sticky-note opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Walk-in Orders</span>
          </a>
        </li>
        <!-- <li class="nav-item ">
          <a class="nav-link text-white <?= $page == "download.php"? 'bg-gradient-dark':'' ?>" href="download.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sticky-note opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">PDF/CSV</span>
          </a>
        </li> -->
        <li class="nav-item ">
          <a class="nav-link text-white <?= $page == "stocks.php"? 'bg-gradient-dark':'' ?>" href="stocks.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sticky-note opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Stocks</span>
          </a>
        </li>
        
     
        
      </ul>
      </div>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
        <a class="btn bg-gradient-dark mt-4 w-100" href="../logout.php"> Logout  <i class=" fa fa-sign-out"></i></a>
      </div>
    </div>
  </aside>