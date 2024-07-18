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
			<h1 class="text-center my-10 py-6 text-light" id="title">WELCOME TO SETUP INVENTORY </h1>	
				
			</div>
			
			<div class="card-body">
				<div class="container-fluid">
				<form method="post" action="setup_confirmation.php" >
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
									$result = $inventory->setups1($gettingid);

								 
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
										<label for="Setup_fname" class="col-form-label">EMPLOYEE NAME</label >
										<input type="text" class="form-control" id="Setup_fname" name="Setup_fname" required>
									</div>
									<span> <input type="hidden" name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input> </span> 

																		<span>
										<input type="text" name="Setup_partname" id="Setup_partname" value="<?= $result['setup_partname'] ?>">
									</span>

									<span> <input type="text" name="Setup_partnumber"  id="Setup_partnumber" value=<?=$result['setup_partnumber'] ?>> </input> </span>  
									<span> <input type="text" name="Setup_regcode"  id="Setup_regcode" value=<?=$result['setup_regcode'] ?>> </input> </span> 
									<span> <input type="text" name="Setup_balance"  id="Setup_balance" value=<?=$result['setup_balance'] ?>> </input> </span> 
									<span> <input type="text" name="Setup_supps"  id="Setup_supps" value=<?=$result['setup_supplier'] ?>> </input> </span> 
								

									
									<div class="mb-3">
										<label for="Setup_qntyreq" class="col-form-label">QUANTITY OF ITEMS</label>
										<input type="text" class="form-control" id="Setup_qntyreq" name="Setup_qntyreq" required>
									</div>

									<div class="mb-3">
										<label for="Setup_sec" class="col-form-label">SECTION</label>
										<select name="Setup_sec" id="Setup_sec" name="Setup_sec" class="form-select rounded-0" >
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
										<label for="Setup_convno" class="col-form-label">CONVEYOR/PROCESS</label>
										<input type="text" class="form-control" id="Setup_convno" name="Setup_convno">
									</div>
									<div class="mb-3">
										<label for="Setup_carcode" class="col-form-label">CAR CODE</label>
										<input type="text" class="form-control" id="Setup_carcode" name="Setup_carcode">
									</div>
								</form>

								<div> <button type="submit" name="aaddBrand" id="aaddBrand" class="btn btn-primary btn-sm rounded-0" onclick="return confirm('PLEASE DOUBLE CHECK ')">  SUBMIT </button> <a type="button"class="btn btn-warning btn-sm rounded-0" href="setup_transaction.php">  BACK </a>

		 

								
										

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
