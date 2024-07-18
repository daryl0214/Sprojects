<?php 
include('inc/header.php');
ob_start();

// session_start();
include('inc/header.php');
include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$inventory = new invents();

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

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/common.js"></script>


<?php include('inc/container1.php');?>

		
	<div class="col-lg-15 col-md-15 col-sm-15 col-xs-18">
		<div class="card rounded-0 shadow">
			<div class="card-header">
			<h1 class="text-center my-10 py-6 text-light" id="title">WELCOME TO PROCUREMENT AND SUPPLY </h1>	
				
			</div>
			
			<div class="card-body">
				<div class="container-fluid">
				<form method="post" action="bravo.php" >
				<div class="row">
						<div class="col-sm-12 table-responsive">
							
							
							
							<table id="example2" class="table table-bordered table-striped">
							
								<thead><r>
								
								</thead>
								<?php 
                                
                                                                       
								if(isset($_GET['id']))
								   
								{
									$gettingid = validateInput($db->conn, $_GET['id']);
									$inventory = new invents;
									$result = $inventory->acce($gettingid);

								 
								   //echo [$result];     
									
									if($result)
								 	{
									?>      


										<?php

										}
										else{
											echo"<h4>NO RECORD FOUND<h4>";
										}
										}
										else{
										echo "<h4>SOMETHING WENT WRONG</h4>";
										}

								 		?>
																		
									
									<div class="mb-3">
										<label for="acce_fname" class="col-form-label">EMPLOYEE NAME</label >
										<input type="text" class="form-control" id="acce_fname" name="acce_fname" required>
									</div>
									<span> <input type="hidden" name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input> </span> 

																		<span>
										<input type="hidden" name="acce_partname" id="acce_partname" value="<?= $result['acce_partname'] ?>">
									</span>

									<span> <input type="hidden"name="acce_partnumber"  id="acce_partnumber" value=<?=$result['acce_partnumber'] ?>> </input> </span>  
									<span> <input type="hidden" name="acce_regcode"  id="acce_regcode" value=<?=$result['acce_regcode'] ?>> </input> </span> 
									<span> <input type="hidden" name="acce_balance"  id="acce_balance" value=<?=$result['acce_balance'] ?>> </input> </span> 
									<span> <input type="hidden" name="acce_supps"  id="acce_supps" value=<?=$result['acce_supplier'] ?>> </input> </span> 
								

									
									<div class="mb-3">
										<label for="acce_qntyreq" class="col-form-label">QUANTITY OF ITEMS</label>
										<input type="text" class="form-control" id="acce_qntyreq" name="acce_qntyreq" required>
									</div>

									<div class="mb-3">
										<label for="acce_sec" class="col-form-label">SECTION</label>
										<select name="acce_sec" id="acce_sec" name="acce_sec" class="form-select rounded-0" >
										<option value="N/A">Select </option>
													<option value="BREAKDOWN">BREAKDOWN</option>
													<option value="PREVENTIVE">PREVENTIVE</option>
													<option value="I/B FAB">I/B FAB</option>
													<option value="CONV/NAVI SETUP">CONV/NAVI SETUP</option>
													<option value="J/B FAB">J/B FAB</option>
													<option value="RDE">RDE</option>
													<option value="PRODUCTION">PRODUCTIONS</option>
													<option value="OTHERS">OTHERS</option>

													</select>
									</div>
								


									<div class="mb-3">
										<label for="acce_convno" class="col-form-label">CONVEYOR/PROCESS</label>
										<input type="text" class="form-control" id="acce_convno" name="acce_convno">
									</div>
									<div class="mb-3">
										<label for="acce_carcode" class="col-form-label">CAR CODE</label>
										<input type="text" class="form-control" id="acce_carcode" name="acce_carcode">
									</div>
								</form>

								<div> <button type="submit" name="addBrand" id="addBrand" class="btn btn-primary btn-sm rounded-0" onclick="return confirm('PLEASE DOUBLE CHECK ')">  SUBMIT </button> <a type="button"class="btn btn-warning btn-sm rounded-0" href="test.php">  BACK </a>

		 

								
										

									</tbody>
								
								
								
                                            
                                                             
							</table>
							
					
   						 </div>
  					</div>

				</div>


			</div>
		</div>
       
        
	</div>	
	
					
	</div>		
<?php include('inc/footer.php');?>
<!-- Button trigger modal -->

<!-- Modal -->
