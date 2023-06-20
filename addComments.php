<?php 
    session_start();
    include('includes/header.php');
    include('authenticate.php');
    include('functions/userfunctions.php');
?>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-5 mb-5 border-0">
                    <div class="card-body">
                        <h1 class="text-center mb-5">Write us review</h1>

                        <form action="functions/addReviewProcess.php" method="POST">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name"  maxlength="8" class="form-control my-1 py-4 rounded" value="" placeholder="e.g. Juan Dela Cruz">
                            </div>
                            <div class="form-group">
                                <textarea name="review" id="comments" maxlength="255" cols="10" rows="5" class="form-control rounded review-textarea" placeholder="Type your message..."></textarea>
                                <span id="counter" 
                                            style="position:relative;
                                            font-size: 13px;
                                            float: right;
                                            right: 15px;
                                            top: -25px;
                                            color: #c7ccd1;
                                            ">255</span>
                            </div>
                            <button type="submit" name="add_comments" class="btn btn-dark btn-lg rounded mt-2 w-100 px-4">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>