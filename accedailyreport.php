<?php 
ob_start();
// session_start();
include('inc/header.php');
include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$inventory = new invents();

// include 'Inventory.php';

// $inventory = new Inventory();
// $inventory->checkLogin();
?>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/customer.js"></script>
<script src="js/common.js"></script>
<?php include('inc/container.php');?>

<div class=".container">		
<!-- Include jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

		
	<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-lg-300">
				<div class="card card-default rounded-0 shadow">
            
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
							<h3 class="card-title">DAILY MONITORING OF ISSUED PARTS</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
						
						<form action="tnct.php" method="POST">
						<!-- <button name="trankeyt" id="trankeyt" onclick="return confirm('MAKE SURE YOU HAVE BACK UP! \n  YOU WANT TO PROCEED ?  ')"  class="btn btn-danger" title="RESET">RESET </button> -->
						<a type="button"href=" acce.php" class="btn btn-primary bg-gradient rounded-0 btn-sm"><i class="far fa-plus-square"></i> BACK</a>
						</form>
						
						</div>
					</div>					   
					<div class="clear:both"></div>
				</div>
				<div class="card-body">
					
				
					<div class="row">
						<div class="col-sm-12 table-responsive">
							
							
							<table id="example3" class="table table-bordered table-striped">
							
								<thead>
									<tr>
 								
									</div>	
									
										<th>DATE</th>
										<th>FULL NAME</th>
										<th>PART NAME</th>
										<th>PART NUMBER</th>
										<th>REG. CODE</th>
										<th>SUPPLIER</th>
										<th>SECTION</th>
										<th>QUANTITY</th>
										<th>CONVEYOR NO.</th>
										<th>CAR CODE</th>

							
									</tr>
								</thead>
								<tbody  id="searchresult">
								
								<?php
								
                                        $in = $inventory->acceDMOIP();
                                        if($in)                                          
                                        {                                           
                                            foreach($in as $row)
                                            
                                                                                      
                                            {    
                                                ?>
                                                <tr>
												<td><?= $row['acce_date'] ?></td>
												<td><?= $row['acce_fname'] ?></td>
												<td><?= $row['acce_pname'] ?></td> 
												<td><?= $row['acce_parno'] ?></td>
												<td><?= $row['acce_regcode'] ?></td>
												<td><?= $row['acce_supps'] ?></td>

												<td><?= $row['acce_sec'] ?></td>
											
												<td><?= $row['acce_qntyreq'] ?></td>
												
												<td><?= $row['acce_convno'] ?></td>
										
												<td><?= $row['acce_carcode'] ?></td>
												
                                                    
                                                </tr>
                                                <?php   
                                            }                               
                                        }
                                        else{
                                            echo"No record Found!";
											

                                        }
                                        ?>

								
										

									</tbody>


										<link rel="stylesheet" href="./css/datatables.min.css" />
                                        <script src="./js/datatables.min.js"></script>
										

							
									<script>
									
                                               new DataTable('#example3',{
                                                layout:{
                                                    topstart:{
                                                        buttons:['copy','csv','excel','pdf']
                                                    }
                                                }
                                               });

									


											</script>

								
								
                                            
                                                             
							</table>
							
						</div>
						<div class="form-group">


                                </div>
                                

								<script>
									$(document).ready(function(){
										$("#live_search12").on("keyup",function (){
											var input = $("#live_search12").val();
											//alert(input);
											if(input !== " "){
												$.ajax({
													url:"timers2.php",
													method:"POST",
													data:{input:input},
													success:function(data){
														$("#searchresult").html(data);
													}                                                              
												});
											}else{
													$("#searchresult").css("display","none");
												}

											});

										});    
											
								</script>   

   
					</div>
				</div>
			</div>
		</div>
       
        
	</div>	
	
	
</div>	
<?php include('inc/footer.php');?>