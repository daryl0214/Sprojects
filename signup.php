<?php
include('inc/header.php');

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
	<h1 class="text-center my-4 py-3 text-light" id="title">MEMBERS </h1>	
	<div class="col-lg-4 col-md-5 col-sm-10 col-xs-12">
		<div class="card rounded-0 shadow">
			<div class="card-header">
				<div class="card-title h3 text-center mb-0 fw-bold">ADD MEMBERS</div>
			</div>
			<div class="card-body">
				<div class="container-fluid">
					
						<div class="form-group">
						<form action="register.php" method="POST">
						</div>
						<div class="mb-3">
							<label for="acc_empnum" class="control-label">ID Number: </label>
							<input name="acc_empnum" id="acc_empnum"  class="form-control rounded-0" placeholder="ID NUMBER" autofocus="" value="<?= isset($_POST['acc_empnum']) ? $_POST['acc_empnum'] : '' ?>" required>
						</div>
                        <div class="mb-3">
							<label for="acc_empname" class="control-label">Name: </label>
							<input name="acc_empname" id="acc_empname"  class="form-control rounded-0" placeholder="NAME" autofocus="" value="<?= isset($_POST['acc_empname']) ? $_POST['acc_empname'] : '' ?>" required>
						</div>
						<div class="mb-3">
							<label for="acc_password" class="control-label">Password: </label>
							<input class="form-control rounded-0" id="acc_password"  name="acc_password" placeholder="PASSWORD " value="<?= isset($_POST['acc_password']) ? $_POST['acc_password'] : '' ?>" required>
						</div>  
						<div class="d-grid">
							<button type="submit" name="submit" class="btn btn-primary rounded-1">ADD</button>
							<br>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>		
<?php include('inc/footer.php'); ?>
