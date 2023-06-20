<?php
    //include('includes/header.php');
    include('functions/userfunctions.php');
?>
<style>
    /* @media only screen and (max-width: 768px) {

  .card-body {
    padding: 0.5em 1.2em;
  }
  .card-body .card-text {
    margin: 0;
  }
  .card img {
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
}
@media only screen and (max-width: 1200px) {
  .card img {
    width: 40%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
} */
</style>

    <div class="container-fluid ">
        <div class="container mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="display-6"> SHOP BY CATEGORY </h3>
                    </div>
                    <div class="row">
                    <?php
                        $categories = getAllActive("categories");

                        if(mysqli_num_rows($categories) > 0)
                        {
                            foreach ($categories as $item) 
                            {
                                ?>
                                
                                <!-- <div class="col-md-3 m-auto d-flex align-items-stretch">
                                    <a href="products.php?category=<?= $item['slug']; ?>"> 
                                        <div class="card rounded">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="card-img-top"   >
                                                <h4 class="text-center pt-0 card-title"><?= $item['name']; ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div> -->

                                <div class="col-md-3 mb-3 ">
                                    <div class="card w-100 rounded" >
                                        <a href="products.php?category=<?= $item['slug']; ?>">
                                            <img class="card-img-top" src="uploads/<?= $item['image']; ?>" alt="Card image cap h-100" >
                                            <div class="card-body">
                                                <h5 class="card-title text-center cat-text"><?= $item['name']; ?></h5>
                                                <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                                <a href="#" class="btn btn-primary">Go somewhere</a> -->
                                            </div>
                                            </a>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-3 card  text-white">
                                    <img class="card-img" src="uploads/<?= $item['image'];?>" alt="Card image">
                                    <div class="card-img-overlay">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text">Last updated 3 mins ago</p>
                                    </div>
                                    </div>
                               -->
                               <!-- <div class="col-md-3 m-auto ">
                                    <a href="products.php?category=<?= $item['slug']; ?>"> 
                                        <div class="card rounded mb-2">
                                            <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="Category Image" class="card-img-top w-100" height="250px"  >
                                                <h4 class="text-center pt-0"><?= $item['name']; ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div> -->
                              

                                <?php
                            }

                        }
                        else
                        {
                            echo "No data found.";
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

