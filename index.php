<?php 
include('inc/header.php');
ob_start();
session_start();


?>
<style>
html,
body,
body>.container {
    height: 95%;
    width: 100%;
}
body>.container {
	display:flex;
	flex-direction:column;
	align-items:center;
	justify-content:center;
}
#title{
	text-shadow:2px 2px 5px #000;
} 

</style>
<?php include('inc/container1.php');?>

	<h1 class="text-center my-4 py-3 text-light" id="title">WELCOME TO PROCUREMENT AND SUPPLY </h1>	
	<div class="col-lg-4 col-md-5 col-sm-10 col-xs-12">
		<div class="card rounded-0 shadow">
			<div class="card-header">
				<div class="card-title h3 text-center mb-0 fw-bold">Login</div>
			</div>
			<div class="card-body">
				<div class="container-fluid">
				<form action="accountss.php" method="POST">
					
						<div class="form-group">				
						</div>
							<!-- <div class="mb-3">
								<label for="acc_empnum" class="control-label">ID Number</label>
								<input name="acc_empnum" id="acc_empnum"  class="form-control rounded-0" placeholder="ID NUMBER" autofocus="" value="<?= isset($_POST['acc_empnum']) ? $_POST['acc_empnum'] : '' ?>" required>
							</div> -->
							<div class="mb-3">
								<label for="acc_password" class="control-label">Password</label>
								<input type="password" class="form-control rounded-0" id="acc_password" name="acc_password" placeholder="PASSWORD" required>
							</div>  
							<div class="d-grid">
								<button type="submit" name="login" class="btn btn-primary rounded-1">Login</button>
								<a type="button"href=" allsection.php" class="btn btn-danger bg-gradient rounded-0 btn-sm"><i class="far fa-plus-square"></i> BETA</a>
								<br>
							
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>		
	<a href =""> developed by Daryl Magpantay</a>
<?php include('inc/footer.php');?>