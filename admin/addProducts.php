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
                <a href="products.php" class="text-secondary mx-3 p-3" style="float: right;"><i class="fa fa-angle-left"> Back</i></a>

                </div>
                    <div class="card-body mt-4">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Select Category</label>
                                    <select name="category_id" class="form-select mb-2">
                                        <option selected>Select Category</option>
                                        <?php
                                            $categories = getAll("categories");

                                            if(mysqli_num_rows($categories) > 0)
                                            {
                                                foreach ($categories as $item)
                                            {
                                                ?> 
                                                    <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
                                                <?php
                                            }
                                            }
                                            else
                                            {
                                                echo "No category available.";
                                            }
                                            
                                        ?>
                                    </select>
                                </div>
                                <!-- Product code -->
                                <div class="col-md-12 mt-3">
                                    <label class="mb-0">Product Code</label>
                                    <input type="text" name="prod_code" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0">Name</label>
                                    <input type="text" name="name" class="form-control mb-2" required>
                                </div>
                                <!-- <div class="col-md-6 mb-3">
                                    <label class="mb-0">Slug</label>
                                    <input type="text" name="slug" class="form-control mb-2" required>
                                </div> -->
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0">Description</label>
                                    <textarea name="description" rows="2" class="form-control mb-2" required></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0">Small description</label>
                                    <textarea name="small_description" rows="2" class="form-control mb-2" ></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-0">Original Price</label>
                                    <input type="text" name="original_price" class="form-control mb-2" >
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="mb-0">Selling Price</label>
                                    <input type="text" name="selling_price" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0">Upload Image</label>
                                    <input type="file" name="image" class="form-control mb-2" required>
                                </div>
                                <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="mb-0">Quantity</label>
                                    <input type="number" name="qty" class="form-control mb-2" required>
                                </div>
                                <div class="col-md-12">
                                    <!-- <input type="checkbox" name="status">
                                    <label class="mt-3">Status (Show/Hide)</label> -->

                                    <label class="switch">
                                        <input type="checkbox" name="status" id="toggle">
                                        <span class="slider round"></span>
                                        </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" name="trending">
                                    <label class="mb-0">Trending</label><br>
                                </div>
                                <div class="col-md-12">
                                    <input type="checkbox" name="new">
                                    <label class="mb-0">New</label><br>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" name="bestseller">
                                    <label class="mb-3">Best Seller</label><br>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" name="feature">
                                    <label class="mb-3">Remove from Feature Product</label><br>
                                </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="">Meta Title <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                    <input type="text" name="meta_title" class="form-control mb-2" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="">Meta Description <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                    <textarea rows="1" name="meta_description" class="form-control mb-2"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="">Meta Keywords <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                    <textarea rows="1" name="meta_keywords" class="form-control mb-2"></textarea>
                                </div>
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-dark w-100 mt-3" style="float:right;" name="add_product_btn">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        
    

<?php include('includes/footer.php'); ?>