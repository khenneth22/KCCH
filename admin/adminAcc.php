<?php

$page_title = "Kape Catalina's - Accounts Manager";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";

include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
          <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
            <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Accounts</h4>
          </div>
        </div>
        <div class="col-md-12" ><button type="button" onclick="history.back();" class="mx-4 my-3 btn" style="float: right;">Back</button></div>
        <div class="card-body p-3 pb-2">
          <div class="table-responsive p-0">
            <table id="myDataTable" class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">No</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">User</th>
                  <!-- <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Password</th> -->
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Role as</th>
                  <!-- <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Status</th> -->
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Created at</th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $i=1;
                $user = getAdmin();
                if (mysqli_num_rows($user) > 0) {
                  foreach ($user as $item) {
                ?>
                    <tr>
                      <td>
                        <div class="d-flex px-3 py-2">
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $i; $i++; ?></h6>
                          </div>
                      </td>
                      <td>

                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $item['first_name']; ?> <span><?= $item['last_name']; ?></span></h6>
                          <p class="text-xs text-secondary mb-0"><?= $item['email']; ?></p>
                        </div>
          </div>
          </td>
          <!-- <td>
                                      <p class="text-xs font-weight-bold mb-0"><?= $item['password']; ?></p>
                                      </td> -->
          <td>
            <p class="text-xs font-weight-bold align-center">
              <?php
                    if ($item['role_as'] == 0) {
                      echo '<p class="text-xs font-weight-bold mb-0">' . "Customer" . '</p>';
                    } elseif ($item['role_as'] == 1) {
                      echo '<p class="text-xs font-weight-bold mb-0">' . "Admin" . '</p>';
                    }
              ?>
            </p>

          </td>
          <!-- <td class="align-middle text-center text-sm">
            <span class="badge badge-sm bg-gradient-success">Active</span>
          </td> -->
          <td class="align-middle text-center">
            <span class="text-secondary text-xs font-weight-bold"><?= $item['created_at']; ?></span>
          </td>
          <td class="">
            <a href="editAccount.php?id=<?php echo $item["id"]; ?>" class="btn my-2  font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
              Edit
              <!-- new page/ edit role by id  -->
            </a>
          </td>


          </tr>

      <?php
                  }
                }
      ?>
      </tbody>
      </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('includes/footer.php'); ?>