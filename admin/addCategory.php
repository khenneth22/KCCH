<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
                    <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3" >
                        <h4 class="text-white ps-3"  style="letter-spacing: 2px; text-transform: uppercase;">Add Category</h4>
                    </div>
                    </div>
                    <div class="col-md-12">
                <a href="category.php" class="text-secondary mx-3 p-3" style="float: right;"><i class="fa fa-angle-left"> Back</i></a>

                </div>
                    <div class="card-body mt-1">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="">Slug</label>
                                    <input type="text" name="slug" class="form-control" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" rows="3" class="form-control" required></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Upload Image</label>
                                    <input type="file" name="image" class="form-control" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Meta Title <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                    <input type="text" name="meta_title" class="form-control" >
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Meta Description <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                    <textarea rows="3" name="meta_description" class="form-control"></textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="">Meta Keywords <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                    <textarea rows="3" name="meta_keywords" class="form-control"></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <!-- <input type="checkbox" name="status"> -->
                                    <label for="">Status (Show/Hide)</label>

                                    <label class="switch">
                                        <input type="checkbox" name="status" id="toggle">
                                        <span class="slider round"></span>
                                        </label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" name="popular">
                                    <label for="">Popular</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" name="new">
                                    <label for="">New</label>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="checkbox" name="bestseller">
                                    <label for="">Best Seller</label>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-dark w-100 mt-3" style="float:right;" name="add_category_btn">Submit</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        
    

<?php include('includes/footer.php'); ?>