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
							<h3 class="card-title">ASSEMBLY CHECKER LIST</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
					<button class="btn btn-primary bg-gradient rounded-0 btn-sm"  data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="far fa-plus-square"></i> Add Product</button>
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
									
										<th>IMAGE</th>
										<th>SUPPLIER TYPE</th>
										<th>PART NAME</th>
										<th>PART NUMBER</th>
										<th>DESCRIPTION</th>
										<th>SUPPLIER</th>
										<th>REG. CODE</th>
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
								
                                        $in = $inventory->accessolist();
                                        if($in)                                          
                                        {                                           
                                            foreach($in as $row)
                                            
                                                                                      
                                            {    
                                                ?>
                                                <tr>
													<td><img   height="50" width="50"  src="./image/<?php echo $row['acce_image']; ?>" alt="IMAGE"></td>
													<td><?= $row['supplertype'] ?></td>
													<td><?= $row['acce_partname'] ?></td>
													<td><?= $row['acce_partnumber'] ?></td>
													<td><?= $row['acce_description'] ?></td>
													<td><?= $row['acce_supplier'] ?></td>
													<td><?= $row['acce_regcode'] ?></td>
											
													<td>₱<?= $row['acce_Price_PHP'] ?></td>
													<td>$<?= $row['acce_Price_USD'] ?></td>
													<td><?= $row['acce_Safetystock'] ?></td>
													<td><?= $row['acce_location'] ?></td>
													<td><?= $row['acce_balance'] ?></td>
													<td><?= $row['acce_remarks'] ?></td>
												
        
                                                

                                                    <td>
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

				<label>SUPPLIERS  </label>
				<select name="supplertype" id="supplertype" class="form-select rounded-0" >
				<option value="N/A">Select </option>
					<option value="I">IMPORTED</option>
					<option value="L">LOCAL</option>
                     
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Part Name</label>
                    <input type="text" name="acce_partname" id="acce_partname" class="form-control rounded-0"  />
                </div>
                                
                
                <div class="form-group">
                    <label>Part Number</label>
                    <input type="text" name='acce_partnumber' id='acce_partnumber' class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>description </label>
                    <input type="text" name='acce_description' id='acce_description' class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>supplier</label>
                    <input type="text" name="acce_supplier" id="acce_supplier" class="form-control rounded-0" required />
                </div>                    
                        
    
             
                <div class="form-group">
                    <label>Registration Code </label>
                    <input type="text" name="acce_regcode" id="acce_regcode" class="form-control rounded-0"  />
                </div>

                    

                <div class="form-group">
                    <label>Price PHP </label>
                    <input type="text" name="acce_Price_PHP" id="acce_Price_PHP" class="form-control rounded-0"  />
                </div>
                
                <div class="form-group">
                    <label>Price USD</label>
                    <input type="text" name="acce_Price_USD" id="acce_Price_USD" class="form-control rounded-0" required />
                </div>
  

               

                <div class="form-group">
                    <label>Safetystock</label>
                    <input type="text" name="acce_Safetystock" id="acce_Safetystock" class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>location</label>
                    <input type="text" name="acce_location" id="acce_location" class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>balance</label>
                    <input type="text" name="acce_balance" id="acce_balance" class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" name="acce_remarks" id="acce_remarks" class="form-control rounded-0"  />
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