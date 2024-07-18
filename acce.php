<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

<div class="container1">		

		
	<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-lg-300">
				<div class="card card-default rounded-0 shadow">
            
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
							<h3 class="card-title">ACCESSORIES LIST</h3>
						</div>
						<div class="col-md-2 col-md-1 col-sm-4 col-xs-6" align="right">
					<a type="button" name="update" href ="test.php"  class="btn btn-secondary btn-sm rounded-0  update" title="BETA"><i class="fa fa-alert"></i>BETA</a><button class="btn btn-primary bg-gradient rounded-0 btn-sm"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="far fa-plus-square"></i> Add Product</button>
						</div>
					</div>					   
					<div class="clear:both"></div>
				</div>
				<div class="card-body">
					<style>
						.fixed-size {
						width: 6%; /* Set your desired fixed width */
						height: 70px; /* Set your desired fixed height */
						overflow: auto; /* Add overflow property for scrolling content if needed */
						/* Optionally, add other styling as needed */
						}
						.fixed {
						width: 1%; /* Set your desired fixed width */
						height: 80px; /* Set your desired fixed height */
						overflow: auto; /* Add overflow property for scrolling content if needed */
						/* Optionally, add other styling as needed */
						}
						.th.td{
						width: 6%; /* Set your desired fixed width */
						height: 70px; /* Set your desired fixed height */
						overflow: auto; /* Add overflow property for scrolling content if needed */

						}
			

					

					</style>
				
					<div class="row">
					<div class="col-xl-12 table-responsive">
							
							
							<table id="example2" class="table table-bordered table-striped">
							
								<thead>
									<tr>
<!-- 								   
									<input type = "text"  id="live_search12"  autocomplete="OFF" placeholder="SEARCH"></input> -->
									</div>	
									
										<!-- <th>IMAGE</th> -->
										<th class="fixed">STATUS</th>
										<th class="fixed" >SUPPLIER TYPE</th>
										<th class="fixed-size">PART NAME</th>
										<th class="fixed"  >PART NUMBER</th>
										<th class="fixed">DESCRIPTION</th>
										<th class="fixed"  >SUPPLIER</th>
										<th class="fixed" >REG. CODE</th>
										<th class="fixed" >PRICE PHP</th>
										<th class="fixed" >PRICE USD</th>
										<th class="fixed">SAFETYSTOCK</th>
										<th class="fixed" >LOCATION</th>
										<th class="fixed">BALANCE</th>
										<th class="fixed-size">REMARKS</th>
										<th class="fixed" >ORDER NO.</th>
							
										<th class="fixed">ACTION</th>
									</tr>
								</thead>
								<tbody   id="searchresult">
								
								<?php
								
                                        $in = $inventory->accessolist();
                                        if($in)                                          
                                        {                                           
                                            foreach($in as $row)
                                            
                                                                                      
                                            {    
                                                ?>
                                                <tr>
													<!-- <td><img   height="50" width="50"  src="./image/<?php echo $row['acce_image']; ?>" alt="IMAGE"></td> -->
													<td class="fixed"><?= $row['acce_fmsmds'] ?></td>
													<td class="fixed" ><?= $row['supplertype'] ?></td>
													<td class="fixed-size" ><?= $row['acce_partname'] ?></td>
													<td class="fixed" ><?= $row['acce_partnumber'] ?></td>
													<td class="fixed-size"><?= $row['acce_description'] ?></td>
													<td class="fixed" ><?= $row['acce_supplier'] ?></td>
													<td class="fixed"><?= $row['acce_regcode'] ?></td>
											
													<td class="fixed" >₱<?= $row['acce_Price_PHP'] ?></td>
													<td class="fixed" >$<?= $row['acce_Price_USD'] ?></td>
													<td class="fixed"><?= $row['acce_Safetystock'] ?></td>
													<td class="fixed" ><?= $row['acce_location'] ?></td>
													<td class="fixed"><?= $row['acce_balance'] ?></td>
													<td class="fixed-size"><?= $row['acce_remarks'] ?></td>
													<td class="fixed" ><?= $row['acce_order_number'] ?></td>
												
        
                                                

                                                    <td class="fixed">
                                                    <form action="action.php" method="post">   
													<div class="btn-group btn-group-sm"> <a type="button" name="update" href ="acceview.php?id=<?= $row['ID'] ?>"  class="btn btn-primary btn-sm rounded-0  update" title="Update"><i class="fa fa-edit"></i></a><a  name="edit" id="edit"  href="acceoutin.php?id=<?= $row['ID'] ?>" class="btn btn-light bg-gradient border text-dark btn-sm rounded-0  Transact" title="Transactacce"><i class="fa fa-handshake"></i></a></div>
                                                    </form>
                                                </tr>
                                                <?php   
                                            }                               
                                        }
                                        else{
                                            echo"No record Found!";

                                        }
                                        ?>
									
								
										

									</tbody>
									<script src="./js/jszip.min.js"></script>
                                    <link href="./css/datatables.min.css" rel="stylesheet">
									<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
                                    <script src="https://cdn.datatables.net/v/dt/jszip-3.10.1/dt-2.0.0/b-3.0.0/b-html5-3.0.0/b-print-3.0.0/datatables.min.js"></script>
									<script src="./js/datatables.min.js"></script>
									<script>
										
										new DataTable('#example2',{
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
                                

								<!-- <script>
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
											
								</script>    -->

   
					</div>
				</div>
			</div>
		</div>
									</div>
       

				<!-- Button trigger modal -->
	

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">ADD ACCESSORIES</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				               
            <div class="form-group">
				
			<form action="alpha1.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="pid" id="pid" />
				<input type="hidden" name="btn_action" id="btn_action" />

				<label>STATUS </label>
				<select name="FMSM" id="FMSM" class="form-select rounded-0" >
				<option value="N/A">Select </option>
					<option value="FM">FAST MOVING</option>
					<option value="SM">SLOW MOVING</option>
					<option value="DS">DEAD STOCK</option>

					</select>

				<label>CATEGORIES  </label>
				<select name="supplertype" id="supplertype" class="form-select rounded-0" >
				<option value="N/A">Select </option>
					<option value="I">IMPORTED</option>
					<option value="L">LOCAL</option>
                     
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>PART Name</label>
                    <input type="text" name="acce_partname" id="acce_partname" class="form-control rounded-0"  />
                </div>
                                
                
                <div class="form-group">
                    <label>PART NUMBER</label>
                    <input type="text" name='acce_partnumber' id='acce_partnumber' class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>DESCRIPTION </label>
                    <input type="text" name='acce_description' id='acce_description' class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>SUPPLIER</label>
                    <input type="text" name="acce_supplier" id="acce_supplier" class="form-control rounded-0" required />
                </div>                    
                        
    
             
                <div class="form-group">
                    <label>REGISTRATION CODE</label>
                    <input type="text" name="acce_regcode" id="acce_regcode" class="form-control rounded-0"  />
                </div>

                    

                <div class="form-group">
                    <label>PRICE PHP </label>
                    <input type="text" name="acce_Price_PHP" id="acce_Price_PHP" class="form-control rounded-0"  />
                </div>
                
                <div class="form-group">
                    <label>PRICE USD</label>
                    <input type="text" name="acce_Price_USD" id="acce_Price_USD" class="form-control rounded-0" required />
                </div>
  

               

                <div class="form-group">
                    <label>SAFETYSTOCK</label>
                    <input type="text" name="acce_Safetystock" id="acce_Safetystock" class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>LOCATION</label>
                    <input type="text" name="acce_location" id="acce_location" class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>BALANCE</label>
                    <input type="text" name="acce_balance" id="acce_balance" class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>REMARKS</label>
                    <input type="text" name="acce_remarks" id="acce_remarks" class="form-control rounded-0"  />
                </div>
				
                <div class="form-group">
                    <label>ORDER NO.</label>
                    <input type="text" name="acce_order_number" id="acce_order_number" class="form-control rounded-0"  />
                </div>

				<div class="form-group">
                	<input class="form-control" type="file" name="uploadfile" value="" />
            	</div>
		
                 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="savethisshittoo" id="savethisshittoo" class="btn btn-primary ">ADD PRODUCT </button>	
			</div>
			</div>
		</div>
		</div>







        
	</div>	
	
	
</div>	
<?php include('inc/footer.php');?>