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
                    $category = getByID("categories", $id);

                    if(mysqli_num_rows($category) > 0)
                    {
                        $data = mysqli_fetch_array($category);
                        ?>
                        <div class="card">
                            <div class="card-header">
                                <h3>Edit Category
                                    <a href="category.php" class="btn btn-outline-secondary float-end"><i class="fa fa-angle-left"> Back</i></a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="code.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" >
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="">Slug</label>
                                            <input type="text" name="slug" value="<?= $data['slug'] ?>"  class="form-control" >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Description</label>
                                            <textarea name="description" rows="3" class="form-control"><?= $data['description'] ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Upload Image</label>
                                            <input type="file" name="image" class="form-control mb-3" >
                                            <label for="">Uploaded Image</label>
                                            <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                            <img src="../uploads/<?= $data['image'] ?>" height="100px" width="100px" alt="">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="">Meta Title <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                            <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" class="form-control" >
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Description <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                            <textarea rows="3" name="meta_description" class="form-control"><?= $data['meta_description'] ?></textarea>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label for="">Meta Keywords <span class="mx-2 badge badge-sm bg-dark">optional</span></label>
                                            <textarea rows="3" name="meta_keywords" class="form-control"><?= $data['meta_keywords'] ?></textarea>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <!-- <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status"> -->
                                            <label for="">Status</label>

                                            <label class="switch">
                                             <input type="checkbox" <?= $data['status'] ? "checked":"" ?> name="status" id="toggle">
                                             <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="checkbox" <?= $data['popular'] ? "checked":"" ?> name="popular">
                                            <label for="">Popular</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="checkbox" <?= $data['new'] ? "checked":"" ?> name="new">
                                            <label for="">New</label>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="checkbox" <?= $data['bestseller'] ? "checked":"" ?> name="bestseller">
                                            <label for="">Best Seller</label>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-dark w-100" name="update_category_btn">Update</button>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                    else
                    {
                        echo "item not found";
                    }
                    
                }
                else
                {
                    echo "ID missing from url.";
                }

                ?>
            </div>
        </div>
    </div>
    
        
    

<?php include('includes/footer.php'); ?>