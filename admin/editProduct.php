<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if(isset($_GET['id']))
                    {
                            $id = $_GET['id'];
                            $product = getByID("products", $id);

                            if(mysqli_num_rows($product) > 0)
                            {
                                $data = mysqli_fetch_array($product);
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Edit Product
                                            <a href="products.php" class="btn btn-outline-secondary float-end"><i class="fa fa-angle-left"> Back</i></a>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label for="">Select Category</label>
                                                    <select name="category_id" class="form-select mb-2" >
                                                        <option selected>Select Category</option>
                                                        <?php
                                                            $categories = getAll("categories");

                                                            if(mysqli_num_rows($categories) > 0)
                                                            {
                                                                foreach ($categories as $item)
                                                            {
                                                                ?> 
                                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']? 'selected':'' ?> ><?= $item['name']; ?></option>
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
                                                <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                                <div class="col-md-6">
                                                    <label class="mb-0">Name</label>
                                                    <input type="text" name="name" value="<?= $data['name']; ?>" class="form-control mb-2" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Slug</label>
                                                    <input type="text" name="slug" value="<?= $data['slug']; ?>" class="form-control mb-2" >
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="mb-0">Small Description</label>
                                                    <textarea name="small_description" value="" rows="2" class="form-control mb-2"><?= $data['small_description']; ?></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="mb-0">Description</label>
                                                    <textarea name="description" value=""  rows="2" class="form-control mb-2"><?= $data['description']; ?></textarea>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Original Price</label>
                                                    <input type="text" name="original_price" value="<?= $data['original_price']; ?>" class="form-control mb-2" >
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-0">Selling Price</label>
                                                    <input type="text" name="selling_price" value="<?= $data['selling_price']; ?>" class="form-control mb-2" >
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="mb-0">Upload Image</label>
                                                    <input type="hidden" name="old_image" value="<?= $data['image']; ?>">
                                                    <input type="file" name="image"  class="form-control mb-2" >
                                                    <label class="mb-0">Uploaded Image</label>
                                                    <img src="../uploads/<?= $data['image']; ?>" alt="Product Image" height="70px" width="70px">
                                                </div>
                                                <div class="row">
                                                <div class="col-md-6">
                                                    <label class="mb-0">Quantity</label>
                                                    <input type="number" name="qty" value="<?= $data['qty']; ?>"  class="form-control mb-2" >
                                                </div>
                                                <div class="col-md-12">
                                                    <!-- <input type="checkbox" <?= $data['status'] == '0'?'':'checked' ?> name="status">
                                                    <label class="mt-3">Status (Show/Hide)</label><br> -->

                                                    
                                                        <label class="switch">
                                                            <input type="checkbox" <?= $data['status'] == '0'?'':'checked' ?> name="status" id="toggle">
                                                            <span class="slider round"></span>
                                                            </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="checkbox" <?= $data['trending'] == '0'?'':'checked' ?> name="trending">
                                                    <label class="mb-0">Trending</label><br>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="checkbox" <?= $data['new'] == '0'?'':'checked' ?> name="new">
                                                    <label class="mb-0">New</label><br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="checkbox" <?= $data['bestseller'] == '0'?'':'checked' ?> name="bestseller">
                                                    <label class="mb-3">Best Seller</label><br>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="checkbox" <?= $data['feature'] == '0'?'':'checked' ?> name="feature">
                                                    <label class="mb-3">Remove from Featured Product</label><br>
                                                </div>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="">Meta Title <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                                    <input type="text" name="meta_title" value="<?= $data['meta_title']; ?>" class="form-control mb-2" >
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="">Meta Description <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                                    <textarea rows="1" name="meta_description" value="" class="form-control mb-2"><?= $data['meta_description']; ?></textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="">Meta Keywords <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                                    <textarea rows="1" name="meta_keywords" value="" class="form-control mb-2"><?= $data['meta_keywords']; ?></textarea>
                                                </div>
                                               
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-dark w-100" name="update_product_btn">Update</button> <!-- code.php -->
                                                </div>
                                                
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php 
                            }
                            else
                    {
                        echo "Product not found.";
                    }
                        
                    }
                    else
                    {
                        echo "Missing ID in url.";
                    }
                    ?>
            </div>
        </div>
    </div>
    
        
    

<?php include('includes/footer.php'); ?>