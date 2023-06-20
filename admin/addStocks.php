<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
                    <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white ps-3"  style="letter-spacing: 2px; text-transform: uppercase;">Add Products</h4>
                    </div>
                </div>
                <div class="col-md-12">
                <!-- <a href="products.php" class="text-secondary mx-3 p-3" style="float: right;"><i class="fa fa-angle-left"> Back</i></a> -->
                <button class="btn" onclick="history.back();"><i class="fa fa-chevron-left"></i></button>

                </div>
                    <div class="card-body mt-4">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                             
                                <!-- Product code -->
                                <div class="col-md-12 mt-3">
                                    <label class="mb-0">Ingredients Name</label>
                                    <input type="text" name="stockName" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0">Current Stock</label>
                                    <input type="text" name="stockQty" class="form-control mb-2" required>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label class="mb-0">Slug</label>
                                    <input type="text" name="slug" class="form-control mb-2" required>
                                </div> -->
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0">Minimum Stock Level</label>
                                    <input type="text" name="stockMin" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0">Maximum Stock Level</label>
                                    <input type="text" name="stockMax" class="form-control mb-2" required>
                                </div>
                              
                                
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-dark w-100 mt-3" style="float:right;" name="add_stocks_btn">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        
    

<?php include('includes/footer.php'); ?>