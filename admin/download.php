<?php
include('includes/header.php'); 
include('../middleware/adminMiddleware.php');
?>
    <div class="container mt-5">
            <a href="pdf.php" class="btn btn-dark mb-3  mx-2 shadow" style="float: right;"> Generate PDF</a>
           <a href="khenneth_csv.php" class="btn btn-dark mb-3  mx-2 shadow" style="float: right;"> Generate CSV</a>
        <?php

          
            
            // $query = "SELECT * FROM tbl_khenneth";
            // $queryRes = $con->query($query);

            $query = dlPdf();
        
                if(mysqli_num_rows($query) > 0)
                {
                    
                    ?>
                   
                    <table class="table table-hover table-striped table-bordered text-center mb-5">
                                    <thead class="table-dark">
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Order ID</th>
                                        <th scope="col">Product ID</th>
                                        <th scope="col">Product Code</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Price</th>
                                        <!-- <th scope="col"></th> -->
                                        
                                        <!-- <th scope="col">Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php
                    $i = 0;
                    while($row = $query->fetch_assoc())
                    
                    {
                        
                            ?>
                                
                                <tr>
                                    <th scope="row"><?php echo ++$i; ?></th>
                                    <td><?php echo $row["order_id"];?></td>
                                    <td><?php echo $row["prod_id"];?></td>
                                    <td><?php echo $row["prod_code"];?></td>
                                    <td><?php echo $row["qty"];?></td>
                                    <td><?php echo $row["price"];?></td>
                                   
                                    <!-- <td> -->
                                        <!-- <a href="khenneth_update.php?id=<?php echo $row["id"];?>" class="btn btn-success">Edit</a>
                                        <a href="index.php?id=<?php echo $row["id"];?>" class="btn btn-danger">Delete</a> -->
                                        <!-- <button type="submit" name="deleteBtn" value="<?php echo $row["id"];?>" class="btn btn-danger">Delete</button> -->
                                    <!-- </td> -->
                                </tr>
                                        
                            <?php 
                    }
                   
                }

            ?>
                </tbody>
                </table>
                
            <?php

        ?>
    </?>