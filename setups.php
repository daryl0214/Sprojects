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

		
	<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-lg-300">
				<div class="card card-default rounded-0 shadow">
            
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
							<h3 class="card-title">SETUP ACCESSORIES LIST</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
						<a type="button" name="update" href ="setup_transaction.php"  class="btn btn-secondary btn-sm rounded-0  update" title="BETA"><i class="fa fa-alert"></i>BETA</a><button class="btn btn-primary bg-gradient rounded-0 btn-sm"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="far fa-plus-square"></i> Add Product</button>
						</div>
					</div>					   
					<div class="clear:both"></div>
				</div>
				<div class="card-body">
					
				
					<div class="row">
						<div class="col-sm-12 table-responsive">
							
							
							<table id="example2" class="table table-bordered table-striped">
							
								<thead>
									<tr>
<!-- 								   
									<input type = "text"  id="live_search12"  autocomplete="OFF" placeholder="SEARCH"></input> -->
									</div>	
									
									
						
										<th>ITEM CODE <br> REGISTRATION CODE </th>
										<th>PART NAME</th>
										<th>PART NUMBER</th>
										<th>DESCRIPTION</th>
										<th>SUPPLIER</th>
										<th>DRAWING NO.</th>
										<th>PRICE PHP</th>
										<th>PRICE USD</th>
										<th>SAFETYSTOCK</th>
										<th>LOCATION</th>
										<th>BALANCE</th>
										<th>REMARKS</th>
							
										<th>ACTION</th>
									</tr>
								</thead>
								<tbody  id="searchresult">
								
								<?php
								
                                        $in = $inventory->setups();
                                        if($in)                                          
                                        {                                           
                                            foreach($in as $row)
                                            
                                                                                      
                                            {    
                                                ?>
                                                <tr>
			
										
													<td><?= $row['setup_regcode'] ?></td>
													<td><?= $row['setup_partname'] ?></td>
													<td><?= $row['setup_partnumber'] ?></td>
													<td><?= $row['setup_description'] ?></td>
													<td><?= $row['setup_supplier'] ?></td>
													<td><?= $row['setup_drawing'] ?></td>
													
											
													<td>₱<?= $row['setup_Price_PHP'] ?></td>
													<td>$<?= $row['setup_Price_USD'] ?></td>
													<td><?= $row['setup_Safetystock'] ?></td>
													<td><?= $row['setup_location'] ?></td>
													<td><?= $row['setup_balance'] ?></td>
													<td><?= $row['setup_remarks'] ?></td>
												
        
                                                

                                                    <td>
                                                    <form action="action.php" method="post">   
													<div class="btn-group btn-group-sm"> <a type="button" name="update" href ="setupview.php?id=<?= $row['ID'] ?>"  class="btn btn-primary btn-sm rounded-0  update" title="Update"><i class="fa fa-edit"></i></a><a  name="edit" id="edit"  href="setuptransaction.php?id=<?= $row['ID'] ?>" class="btn btn-light bg-gradient border text-dark btn-sm rounded-0  Transact" title="Transactacce"><i class="fa fa-handshake"></i></a></div>
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
       

				<!-- Button trigger modal -->
	

		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">ADD ITEM</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				               
            <div class="form-group">
				
			<form action="alphasetup.php" method="POST" enctype="multipart/form-data">
				<input type="hidden" name="pid" id="pid" />
				<input type="hidden" name="btn_action" id="btn_action" />



				<label>DRAWING NO.  </label>
				<input type="text" name="setup_drawing" id="setup_drawing" class="form-control rounded-0"  />
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>PART Name</label>
                    <input type="text" name="setup_partname" id="setup_partname" class="form-control rounded-0"  />
                </div>
                                
                
                <div class="form-group">
                    <label>PART NUMBER</label>
                    <input type="text" name='setup_partnumber' id='setup_partnumber' class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>DESCRIPTION </label>
                    <input type="text" name='setup_description' id='setup_description' class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>SUPPLIER</label>
                    <input type="text" name="setup_supplier" id="setup_supplier" class="form-control rounded-0" required />
                </div>                    
                        
    
             
                <div class="form-group">
                    <label>ITEM CODE OR REGISTRATION CODE</label>
                    <input type="text" name="setup_regcode" id="setup_regcode" class="form-control rounded-0"  />
                </div>

                    

                <div class="form-group">
                    <label>PRICE PHP </label>
                    <input type="text" name="setup_Price_PHP" id="setup_Price_PHP" class="form-control rounded-0"  />
                </div>
                
                <div class="form-group">
                    <label>PRICE USD</label>
                    <input type="text" name="setup_Price_USD" id="setup_Price_USD" class="form-control rounded-0" required />
                </div>
  

               

                <div class="form-group">
                    <label>SAFETYSTOCK</label>
                    <input type="text" name="setup_Safetystock" id="setup_Safetystock" class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>LOCATION</label>
                    <input type="text" name="setup_location" id="setup__location" class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>BALANCE</label>
                    <input type="text" name="setup_balance" id="setup_balance" class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>REMARKS</label>
                    <input type="text" name="setup_remarks" id="setup_remarks" class="form-control rounded-0"  />
                </div>

				<div class="form-group">
                	<input class="form-control" type="file" name="uploadfile" value="" />
            	</div>
		
                 
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="setupsave" id="setupsave" class="btn btn-primary ">ADD ITEM </button>	
			</div>
			</div>
		</div>
		</div>







        
	</div>	
	
	
</div>	
<?php include('inc/footer.php');?>