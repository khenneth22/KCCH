<?php
	session_start();
	include('includes/header.php');
?>

<style>
	@import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

	body {
		background-color: #eee;
		font-family: 'Calibri', sans-serif !important;
	}

	.mt-100{
	margin-top:100px;

	}

	.card {
		margin-bottom: 30px;
		border: 0;
		-webkit-transition: all .3s ease;
		transition: all .3s ease;
		letter-spacing: .5px;
		border-radius: 8px;
		-webkit-box-shadow: 1px 5px 24px 0 rgba(68,102,242,.05);
		box-shadow: 1px 5px 24px 0 rgba(68,102,242,.05);
	}

	.card .card-header {
		background-color: #fff;
		border-bottom: none;
		padding: 24px;
		border-bottom: 1px solid #f6f7fb;
		border-top-left-radius: 8px;
		border-top-right-radius: 8px;
	}

	.card-header:first-child {
		border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
	}

	.card .card-body {
		padding: 30px;
		background-color: transparent;
	}

	.card .card-body .login{
		font-size: 20px;
	}
	.card .card-body .continuebtn{
		font-size: 22px;
	}

</style>

	<div class="container-fluid  mt-100">
		<div class="row">
				 
			<div class="col-md-12">
					
				<div class="card">
					
					<div class="card-body cart">
							<div class="col-sm-12 empty-cart-cls text-center">
								<img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid mb-4 mr-3">
								<h2><strong>Your cart is empty</strong></h2>
								
								<a href="index.php" class="btn btn-primary continuebtn cart-btn-transform m-3 text-white rounded">continue shopping</a>
								<div class="col-md-12 mt-4">
									<h4>Have an account?</h4>
									<a href="login.php" class="login"><u>Log in</u></a><span> to check out faster</span>

								</div>
							</div>
					</div>
				</div>
						
					
			</div>
				 
		</div>
				
	</div>

	<?php
	//session_start();
	include('includes/footer.php');
?>