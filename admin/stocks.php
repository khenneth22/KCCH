<?php

$page_title = "Kape Catalina's - Stocks";
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
            <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Stocks</h4>
          </div>
        </div>
        <div class="col-md-12" ><a href="addStocks.php" class="mx-3 my-3 btn btn-dark" style="float: right;">Add Stocks</a></div>
        <div class="card-body p-3 pb-2">
          <div class="table-responsive p-0">

          <table id="myDataTable">
  <thead>
    <tr>
      <th>Ingredients Name</th>
      <th>Current Stock</th>
      <th>Minimum Stock Level</th>
      <th>Maximum Stock Level</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $i = 1;
        $stocks = getStocks();
        if (mysqli_num_rows($stocks) > 0) {
          foreach ($stocks as $item) {
        ?>
        <tr>
          <td><?= $item['stockName']; ?></td>
          <td><?= $item['stockQty']; ?></td>
          <td><?= $item['stockMin']; ?></td>
          <td><?= $item['stockMax']; ?></td>
          <td>
            <a href="stockEdit.php?id=<?= $item['id']; ?>" class="text-dark btn">Edit</a>
            <a href="#?id=<?= $item['id']; ?>" form="deletef" name="deleteStock" class="text-dark btn">Delete</a>
          </td>
          <form action="action.php" id="deletef" method="post"></form>
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