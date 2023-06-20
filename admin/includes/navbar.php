<style>
/* Basic styling */
* {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
}
body {
  font-family: sans-serif;
  font-size: 16px;
}

a {
  color: white;
  text-decoration: none;
}
.menu,
.submenu {
  list-style-type: none;
  color: #111;
}

.item:not(.button) a:hover,
.item a:hover::after {
  color: #ccc;
}
/* Mobile menu */

.menu {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.menu li a {
  display: block;
  padding: 5px 5px;
  color: #111;
}
.menu .logo{
 font-size: 22px;
}

.toggle {
  order: 1;
  font-size: 20px;
 padding-left: 100px;
}
.item.button {
  order: 2;
}
.item {
  order: 3;
  width: 100%;
  text-align: left;
  display: none;
}
.active .item {
  display: block;
}
.button.secondary {
  /* divider between buttons and menu links */
  border-bottom: 1px #444 solid;
}


/* Tablet menu */
@media all and (min-width: 700px) {

  .menu {
    justify-content: center;
  }
  .logo {
    flex: 1;
  }
  .item.button {
    width: auto;
    order: 1;
    display: block;
  }
  .toggle {
    flex: 1;
    text-align: right;
    order: 2;
  }
  /* Button up from tablet screen */
  .menu li.button a {
    padding: 10px 15px;
    margin: 5px 0;
  }
  .button a {
    background: #0080ff;
    border: 1px royalblue solid;
  }
  .button.secondary {
    border: 0;
  }
  .button.secondary a {
    background: transparent;
    border: 1px #0080ff solid;
  }
  .button a:hover {
    text-decoration: none;
  }
  .button:not(.secondary) a:hover {
    background: royalblue;
    border-color: darkblue;
  }
}

</style>
<nav class="navbar navbar-main navbar-expand-lg shadow-none border-radius-xl mb-4"  >
      <div class="container-fluid py-1 px-3 float-end">
          <div class="collapse navbar-collapse w-auto  max-height-vh-100" >
            <div class="collapse navbar-collapse bg-white rounded" >
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center ">

                <ul class="menu py-2">
                  <li class="logo"><a href="index.php">Kape Catalina</a></li>
                  <li class="item"><a href="index.php" class="btn" >Home</a></li>
                  <li class="item"><a href="category.php" class="btn" >Categories</a></li>
                  <li class="item"><a href="products.php" class="btn" >Products</a></li>
                  <li class="item"><a href="salesReport.php" class="btn" >Sales/Report</a></li>
                  <li class="item"><a href="accounts.php" class="btn" >Accounts</a></li>
                  <li class="item"><a href="bannerSettings.php" class="btn" >Banners</a></li>
                  <li class="item"><a href="customerReviews.php" class="btn" >Reviews</a></li>
                  <li class="item"><a href="notes.php" class="btn" >Notes</a></li>
                  <li class="item"><a href="../logout.php" class="btn bg-gradient-dark" >Logout</a></li>
                  <li class="toggle"><a href="#"><i class="fas fa-bars"></i></a></li>
                </ul>
        
                  </li>
            </div>
         </div>
        </div>
      </div>
    </nav> 

    <script>
      const toggle = document.querySelector(".toggle");
const menu = document.querySelector(".menu");
const items = document.querySelectorAll(".item");

/* Toggle mobile menu */
function toggleMenu() {
  if (menu.classList.contains("active")) {
    menu.classList.remove("active");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-bars'></i>";
  } else {
    menu.classList.add("active");
    toggle.querySelector("a").innerHTML = "<i class='fas fa-times'></i>";
  }
}

/* Activate Submenu */
function toggleItem() {
  if (this.classList.contains("submenu-active")) {
    this.classList.remove("submenu-active");
  } else if (menu.querySelector(".submenu-active")) {
    menu.querySelector(".submenu-active").classList.remove("submenu-active");
    this.classList.add("submenu-active");
  } else {
    this.classList.add("submenu-active");
  }
}

/* Close Submenu From Anywhere */
function closeSubmenu(e) {
  if (menu.querySelector(".submenu-active")) {
    let isClickInside = menu
      .querySelector(".submenu-active")
      .contains(e.target);

    if (!isClickInside && menu.querySelector(".submenu-active")) {
      menu.querySelector(".submenu-active").classList.remove("submenu-active");
    }
  }
}
/* Event Listeners */
toggle.addEventListener("click", toggleMenu, false);
for (let item of items) {
  if (item.querySelector(".submenu")) {
    item.addEventListener("click", toggleItem, false);
  }
  item.addEventListener("keypress", toggleItem, false);
}
document.addEventListener("click", closeSubmenu, false);
    </script>
    

