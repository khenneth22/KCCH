<?php 
    $page_title = "Kape Catalina's - Category";
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
                    <h4 class="text-white ps-3"  style="letter-spacing: 2px; text-transform: uppercase;">Categories</h4>
                </div>
                </div>
                <div class="col-md-12 p-3 px-2">
                 <a href="addCategory.php" class="bg-gradient-dark text-white mx-2 p-2 rounded" style="float: right;"><i class="fa fa-plus-circle p-2"> Add New Category</i></a>
                </div>
                    <div class="card-body" id="category_table">
                    <div class="table-responsive">
                        <table id="myDataTable" class="table table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Image</th>
                                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Status</th>
                                    <th class="text-uppercase text-secondary text-xxs text-center font-weight-bolder opacity-7">Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                $category = getAll("categories");

                                if(mysqli_num_rows($category) > 0)
                                {
                                    foreach($category as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-sm align-middle"> <?php echo $i; $i++; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['name']; ?> </td>
                                            <td>
                                               <img src="../uploads/<?= $item['image']; ?>" width="70px" height="70px" alt="<?= $item['name']; ?>">
                                            </td>
                                            <td class="text-sm align-middle">
                                            <?php
                                                    if($item['status'] == 0)
                                                    {
                                                        echo '<span class="badge badge-sm bg-gradient-success">'."Visible".'</p>';
                                                    }
                                                    elseif($item['status'] == 1)
                                                    {
                                                        echo '<span class="badge badge-sm bg-gradient-dark">'."Hidden".'</p>';
                                                    }
                                                ?>
                                           
                                            </td>
                                            <td>
                                                <a href="editCategory.php?id=<?= $item['id']; ?>" class="btn btn-dark my-3" >Edit</a>  
                                                <button type="button" class="btn  delete_category_btn my-3" value="<?= $item['id']; ?> ">Delete</button>
                                            </td>
                                           
                                                <!-- <form action="code.php" method="POST">
                                                    <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                <button type="submit" class="btn btn-danger" name="delete_category_btn"><i class="fa fa-trash"></i></button>
                                            </form> -->
                                            
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