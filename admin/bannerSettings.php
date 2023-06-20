<?php 
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>

<div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 text-center">
  <div class="bg-gradient-dark shadow-secondary border-radius-lg pt-4 pb-3 mb-2">
    <h4 class="text-white ps-3" style="letter-spacing: 2px; text-transform: uppercase;">Banners
    </div>
</div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                 <h4 class="m-3">Banners
                 <a href="bannerManager.php" type="button" class="btn btn-dark float-end mx-2" onclick="history.back();">Upload Banner</a></h4>
                </h4>

                    <div class="card-body" id="">
                        <table id="" class="table table-bordered table-striped table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">No</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7">Image Name</th></th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Top Text</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Middle Text</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Bottom Text</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Created at</th>
                                    <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder opacity-7 ps-2">Action</th>
                                
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=1;
                                 $banners = getAllBanners();

                                if(mysqli_num_rows($banners) > 0)
                                {
                                    foreach($banners as $item)
                                    {
                                        ?>
                                        <tr>
                                            <td class="text-sm align-middle"> <?php echo $i; $i++; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['img_name']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['top_text']; ?></td>
                                            <td class="text-sm align-middle"> <?= $item['mid_text']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['bot_text']; ?> </td>
                                            <td class="text-sm align-middle"> <?= $item['created_at']; ?> </td>
                                            
                                            <td>
                                            <form action="code.php" method="POST">                                                   
                                                    <button type="submit" class="btn" name="delete_banner_btn" value="<?= $item['id']; ?>"><i class="fa fa-trash fa-lg text-dark" title="Delete"></i></button>
                                                </form> 
                                             </td>  
                                        </tr>
                                        <?php
                                    }
                                }else {
                                    ?>
                                    <tr>
                                        <td colspan="7">No reviews yet!</td>
                                    </tr>
                                <?php
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