<?php 

$page_title = "Kape Catalina's - Products";
$meta_description = "Admin Dashboard";
$meta_keywords = "Kape Catalina's, Coffee House, Coffee, Hot coffee, Iced coffee";

include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
                    <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white ps-3"  style="letter-spacing: 2px; text-transform: uppercase;">Products</h4>
                    </div>
                </div>
                <div class="col-md-12 p-3 px-2">
                 <a href="addProducts.php" class="bg-gradient-dark text-white mx-2 p-2 rounded" style="float: right;"><i class="fa fa-plus-circle p-2"> Add New Product</i></a>
                </div>
           
                    <div class="card-body mt-1" id="products_table">
                    <div class="table-responsive p-0">
                        <table id="myDataTable" class="table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Prod_Code</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Qty</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Image</th>
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                                    <!-- <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Featured</th> -->
                                    <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                $products = getAll("products");

                                if(mysqli_num_rows($products) > 0)
                                {
                                    foreach($products as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-sm align-middle"> <?php echo $i; $i++; ?></td>
                                            <td class="text-sm align-middle"> <?= $item['prod_code']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['name']; ?> </td>
                                            <td class="text-sm align-middle">&#8369 <?= $item['selling_price']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['qty']; ?> </td>
                                            <td>
                                               <img src="../uploads/<?= $item['image']; ?>" width="70px" height="70px" alt="<?= $item['name']; ?>">
                                            </td>
                                            <td class="text-sm align-middle text-center">
                                                <?php
                                                    if($item['qty'] >= 1)
                                                    {
                                                        echo '<span class="badge badge-sm bg-gradient-success">'."In-Stock".'</p>';
                                                    }
                                                    
                                                    elseif($item['qty'] == 0)
                                                    {
                                                        echo '<span class="badge badge-sm bg-gradient-danger">'."Out of stocks".'</p>';
                                                    }
                                                ?>
                                            </td>
                                            <!-- <td class="text-sm align-middle text-center">
                                            <?php
                                                    if($item['feature'] == 0)
                                                    {
                                                        echo '<span class="badge badge-sm bg-gradient-success">'."Visible".'</p>';
                                                    }
                                                    elseif($item['feature'] == 1)
                                                    {
                                                        echo '<span class="badge badge-sm bg-gradient-dark">'."Hidden".'</p>';
                                                    }
                                                ?> -->
                                            <!-- <span class="badge badge-sm bg-gradient-success"> <?= $item['feature'] == '0'? "VISIBLE":"HIDDEN" ?> </span> -->
                                            <!-- </td> -->
                                            <td>
                                                <a href="editProduct.php?id=<?= $item['id']; ?>" class="btn btn-dark my-3 align-middle">Edit</a>
                                                <button type="button" class="btn delete_product_btn align-middle my-3" value="<?= $item['id']; ?> ">Delete</button>
                                            </td>
                                            
                                            <!-- <form action="code.php" method="POST"></form> 
                                                    <input type="hidden" name="product_id" value=" <?= $item['id']; ?>"> -->

                                            
                                            

                                        </tr>
                                        <?php
                                    }

                                }
                                else
                                {
                                    echo "No records found.";
                                }

                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
        
    

<?php include('includes/footer.php'); ?>