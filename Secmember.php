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
						<form action="secregister.php" method="POST">
						</div>
						<div class="mb-3">
							<label for="m_number" class="control-label">ID NUMBER </label>
							<input name="m_number" id="m_number"  class="form-control rounded-0" placeholder="ID NUMBER" required>
						</div>
                        <div class="mb-3">
							<label for="m_name" class="control-label">NAME </label>
							<input name="m_name" id="m_name"  class="form-control rounded-0" placeholder="NAME" required>
						</div>

						<div class="form-group">
							<label>SELECT SECTION </label>
							<select name="section" id="section" class="form-select rounded-0" >
							<option value="">SECTIONS </option>
								<option value="RDE">RDE</option>
								<option value="I/B">I/B</option>
								<option value="J/B">J/B</option>
								<option value="SETUP">SETUP</option>
								<option value="NAVI">NAVI</option>
								<option value="MAINTENANCE">MAINTENANCEE</option>
								<option value="ALIDON/PROD/OTHERS">ALIDON/PROD/OTHERS</option>   
								<option value="N/A">N/A</option>    
								
							</select>
						</div>
						<br>
                	  
						<div class="d-grid">
							<button type="submit" name="submit" class="btn btn-primary rounded-1">ADD</button>
							
							<a type="button"class="btn btn-secondary btn-sm rounded-0" href="acce.php">  BACK </a>

						</div>
					</form>
				</div>
			</div>
		</div>
	</div>		
<?php include('inc/footer.php'); ?>
