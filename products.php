<?php
    // 
    session_start();
    include('includes/header.php');
    include('functions/userfunctions.php');

    if(isset($_GET['category']))
    {

        $category_slug = $_GET['category'];
        $category_data = getSlugActive("categories", $category_slug);
        $category = mysqli_fetch_array($category_data);

        if($category)
        {
            $cid = $category['id'];
?>
        <div class="container-fluid page-header mb-5 position-relative">
            <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-0" style="min-height: 250px">
                <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase"><?= $category['name']; ?></h1>
                <div class="d-inline-flex mb-lg-5">
                    <p class="m-0 text-white"><a class="text-white" href="index.php">Home</a></p>
                    <p class="m-0 text-white px-2">/</p>
                    <p class="m-0 text-white"><a class="text-white" href="#">Category</a></p>
                    <p class="m-0 text-white px-2">/</p>
                    <p class="m-0 text-white"><a class="text-white" href=""><?= $category['name']; ?></a></p>
                </div>
            </div>
        </div>
        <style>
            .zoom-img{
                transition: transform 1s;
            }
            .hover-zoom:hover{
                transform: scale(1.1);
            }
          
        </style>
        <div class="container-fluid">
    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
               
                <div class="row">

                <?php
                           $products = getProdByCategory($cid);

                            if(mysqli_num_rows($products) > 0)
                            {
                                foreach ($products as $item) 
                                {
                                    ?>
                                    <div class="col-md-3 pb-4 pt-1">
                                        <a href="product-desc.php?product=<?= $item['name']; ?>"> 
                                            <div class="card rounded border-0 p-1">
                                                <span class="badge"><?php if($item['new']){ echo "New";} ?></span>
                                                <span class="badge"><?php if($item['bestseller']){ echo "Best Seller";} ?></span>
                                                <span class="badge"><?php if($item['trending']){ echo "Trending";} ?></span>
                                                <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Product Image" class="w-100 zoom-img hover-zoom" >
                                                    <h5 class="pt-3"><?= $item['name']; ?> </h5>
                                            </a>
                                            
                                            <span class="cut-text" style="color: #1e2029; font-size: 13px;"><?= $item['description']; ?></span><br>
                                            <span class="py-5" style="font-size: 28px;">&#8369 <?= $item['selling_price']; ?></span>
                                            <span class="py-5" style="font-size: 16px;"><del>&#8369 <?= $item['original_price']; ?></del> </span>
                                            <a href="product-desc.php?product=<?= $item['slug']; ?>">
                                            <div class="float-right pt-3 m-auto text-muted">
                                                <span class="py-5">view<i class="fas fa-angle-right p-1 text-muted" style="font-size: 14px;"></i></span>
                                            </div></a>
                                            
                                              </div>
                                            </div>
                    
                                    </div>
                                

                                    <?php
                                }

                            }
                            else
                            {
                                echo "No Product's Found.";
                            }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>

        <?php  
        }
        else
        {
            echo "You are looking for nothing!";
        }
        
    }
    else
    {
        echo "You are looking for nothing!";
    }
    include('includes/footer.php'); 
    ?>
    