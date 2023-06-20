<?php
session_start();
include('config/dbcon.php');
include('includes/header.php') 
?>

<body>
        <div class="container-fluid mt-5 mb-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card align-items-center border-0 bg-transparent mb-5 mt-5">
                        
                        <div class="p-5 card-body text-center bg-white rounded">
                            
                            <h2 class=" mb-2">Order Received?</h2>

                            <p  class=" mt-4">Click Yes if so, otherwise we assume you received it.</p>
                             <form action="#" method="POST"> 
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <button type="submit" name="update" class="btn btn-dark rounded" value="YES">Yes</button>
                                <a href="my-orders.php" class="btn  ml-2">Cancel</a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>        
        </div>
    <?php include('includes/footer.php'); ?>

    <?php
      
      if(isset($_POST['update']))
      {
        $id = $_GET['id'];
         mysqli_query($con, "UPDATE orders SET status='2' WHERE id='$id'");
         ?>  
         <script>window.location="my-orders.php";</script>
         <?php

      }
      ?>