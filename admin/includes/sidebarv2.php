

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
        
       
        <li class="nav-item ">
          <a class="nav-link text-white <?= $page == "walkinOrders.php"? 'bg-gradient-dark':'' ?>" href="walkinOrders.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sticky-note opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Walk-in Orders</span>
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