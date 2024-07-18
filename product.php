<?php 
ob_start();
// session_start();
include('inc/header.php');
include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$inventory = new invents();

?>



<script src="js/datatables.min.js"></script>
<script src="./js/jszip.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="./css/style.css">  
<link rel="stylesheet" href="css/datatables.min.css" />
<script src="js/product.js"></script>
<script src="js/common.js"></script>
<script src="js/modcon.js"></script>
<?php include('inc/container.php');?>

<div class=".container">		

		
	<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-lg-300">
				<div class="card card-default rounded-0 shadow">
            
				<div class="card-header">
					<div class="row">
						<div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
							<h3 class="card-title">Checker Fixture List</h3>
						</div>
                        <!-- <i class="fa-solid fa-bell fa-shake"></i> -->
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                        <button  data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary bg-gradient rounded-0 btn-sm"><i class="far fa-plus-square"></i> Add Product</button>
						</div>
					</div>					   
					<div class="clear:both"></div>
				</div>
				<div class="card-body" >
					
				
					<div class="row">
						<div class="col-sm-12 table-responsive">
							
							
							<table id="example" class="table table-bordered table-striped">

                            <!-- <div class="form-group">
                                    <input type = "text"  id="live_search1"  autocomplete="OFF" placeholder="SEARCH">

                            </div> -->
                           
                                <thead><tr>
                                    <th>MOVING STATUS</th>
                                    
									<th>PART NUMBER</th>
                                    <th>COMMON PARTNUMBER</th>	
                                    <th>REVISION LEVEL</th>
                                    <th>REGISTRATION CODE</th>
                                    <th>PRODUCT NAME</th>
                                    <th>SUPLLIER CODE</th>
                                    <th>TYPE</th>
                                    <th>UNIT PRICE USD</th>   
                                       
                                    <th>STICKER</th>    
                                    
                                                              
                                  
                                    <th>STANDARD STOCK</th>
                                   
                                    <th>SAFETY STOCK</th> 
                                    <th>BALANCE</th>  
                                    <th>LOCATION</th>     
                                    <th>STATUS</th>       
                                    <th>RECOMMENDATION</th>
                                    <th>CAR LINE</th>
                                    <th>CAR MODEL</th>  
                                   
                           
                                    <th>ACTION</th>

                                </tr></thead>
                                
                                    
                           
                                <tbody id="searchresult"> 
                                 

                                    <?php
                                        $in = $inventory->getProductList();
                                        if($in)                                          
                                        {                                           
                                            foreach($in as $row)
                                            
                                                                                      
                                            {    
                                                ?>
                                                <tr>                                                
                                                
                                                    <td ><?= $row ['pas_moving'] ?></td>
                                                    <td><?= $row ['pas_partNum'] ?></td>
                                                    <td><?= $row ['pas_compartnum']?></td>
                                                    <td><?= $row ['pas_RevLvl']?></td>
                                                    <td><?= $row ['pas_RegCode']?></td>
                                                    <td><?= $row ['pas_partName']?></td>

                                                    <td><?= $row ['pas_supplier']?></td>   
                                                    <td><?= $row ['pas_type']?></td>                                        
                                                   
                                                  	
                                                    <td><?= $row['pas_unitprice'] ?></td>
                                                    
                                                    
                                                    <td><?= $row ['pas_clrsticker']?></td>                                        
                                                    <td><?= $row ['pas_standardstock']?></td>
                                                   
                                                    <td><?= $row ['pas_safetystock']?></td>
                                                    <td><?= $row ['pas_Quantity_order']?></td>
                                                    <td><?= $row ['pas_location']?></td>
                                                    <td>
                                                        <?php
                                                        if($row['Checker_Status'] == "OVERSTOCK"){
                                                        echo "<span class='badge-info'>OVERSTOCK</span>";
                                                        } elseif($row['Checker_Status'] == "BELOW SAFETY STOCK"){
                                                            echo "<span class='badge-danger blink'>BELOW SAFETY STOCK</span>";
                                                        } elseif($row['Checker_Status'] == "CRITICAL STOCK"){
                                                            echo "<span style='background-color: #8B0000; color: #ffffff; animation: blink 1s infinite;'>CRITICAL STOCK</span>";
                                                        } elseif($row['Checker_Status'] == "WITHIN STANDARD STOCK"){
                                                            echo "<span>WITHIN STANDARD STOCK</span>";
                                                        }elseif($row['Checker_Status'] == " SAFETY STOCK"){
                                                                echo "<span class=' badge-warning'>SAFETY STOCK</span>";
                                                        }
                                                        ?>
                                                    </td>
                                                    <style>
                                                        @keyframes blink {
                                                            0% { opacity: 1.0; }
                                                            50% { opacity: 0.0; }
                                                            100% { opacity: 1.0; }
                                                        }
                                                    </style>
                                                    
                                                    <!-- <td><?= $row['Checker_Status'] ?></td> -->
                                                    
                                                    <td><?= $row['recommend'] ?></td>
                                                    <td><?= $row ['pas_carmodel']?></td>
                                                    <td><?= $row ['pas_harness_Code']?></td>    
                                                    
                                                

                                                    <td>
                                                    <form action="deletan.php" method="post">   
                                                        <div class="btn-group btn-group-sm"> <a type="button" name="update" href ="prodview.php?id=<?= $row['ID'] ?>"  class="btn btn-primary btn-sm rounded-0  update" title="Update"><i class="fa fa-edit"></i></a><a  name="edit" id="edit"  href="purchase.php?id=<?= $row['ID'] ?>" class="btn btn-light bg-gradient border text-dark btn-sm rounded-0  Transact" title="Transact"><i class="fa fa-handshake"></i></a></div>
                                                    </form>
                                                </tr>

                                                <?php   
                                            }                               
                                        }
                                        else{
                                            echo"No record Found!";

                                        }
                                        ?>
                                        <link rel="stylesheet" href="./css/datatables.min.css" />
                                        <script src="./js/datatables.min.js"></script>
										<!-- <link href="https://cdn.datatables.net/v/bs5/dt-2.0.1/b-3.0.0/b-html5-3.0.0/b-print-3.0.0/sp-2.3.0/datatables.min.css" rel="stylesheet">
 
										<script src="https://cdn.datatables.net/v/bs5/dt-2.0.1/b-3.0.0/b-html5-3.0.0/b-print-3.0.0/sp-2.3.0/datatables.min.js"></script> -->
							
									        <script>
									
                                               new DataTable('#example',{
                                                layout:{
                                                    topstart:{
                                                        buttons:['copy','csv','excel','pdf']
                                                    }
                                                }
                                               });

									


											</script>

                                            

                                   </tbody>
                                   
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div>
        
                <!-- <script>
            $(document).ready(function(){
                $("#live_search1").on("keyup",function (){
                    var input = $("#live_search1").val();
                    //alert(input);
                    if(input !== " "){
                        $.ajax({
                            url:"zero.php",
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
        </tbody>



        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ADD PRODUCT</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                            
            <div class="form-group">
            <form action="alpha.php" method="POST">
            <input type="hidden" name="pid" id="pid" />
            <input type="hidden" name="btn_action" id="btn_action" />

            <div class="form-group">
                    <label>Sample Connector</label>
                    <select name="Sampleconn" id="Sampleconn" class="form-select rounded-0" >
                    <option value="">Select </option>
                        <option value="I">YES</option>
                        <option value="O">NO</option>
                        <option value="N/A">N/A</option>    
                        
                    </select>
                </div>

            <div class="form-group">
                    <label>Checker's Moving Status </label>
                    <select name="pas_moving" id="pas_moving" class="form-select rounded-0" >
                    <option value="">Select </option>
                        <option value="FM">FAST MOVING</option>
                        <option value="SM">SLOW MOVING</option>
                        <option value="N/A">N/A</option>    
                        
                    </select>
                </div>


                <div class="form-group">
                    <label>Part Number</label>
                    <input type="text" name="pas_partNum" id="pas_partNum" class="form-control rounded-0" required />
                </div>
                                
                
                <div class="form-group">
                    <label>Common Part Number</label>
                    <input type="text" name='pas_compartnum' id='pas_compartnum' class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>Select Part Name</label>
                    <input type="text" name='pas_partName' id='pas_partName' class="form-control rounded-0"  />
                   
                </div>

                <div class="form-group">
                    <label>Revision Level</label>
                    <input type="text" name='pas_RevLvl' id='pas_RevLvl' class="form-control rounded-0"  required/>
                </div>


                <div class="form-group">
                    <label>Unit Price</label>
                    <input type="text" name="pas_unitprice" id="pas_unitprice" class="form-control rounded-0" required />
                </div>

                <div class="form-group">
                    <label>Select Car Model</label>
                    <input type="text" name="pas_carmodel" id="pas_carmodel" class="form-control rounded-0"  />
                </div>

     

                
                <!-- CNTRL STICKER -->
                <div class="form-group">
                    <label>Select Fail Proofing Sticker </label>
                    <select name="pas_clrsticker" id="pas_clrsticker" class="form-select rounded-0" >
                    <option value="">Select </option>
                        <option value="G">GREEN</option>
                        <option value="O">ORANGE</option>
                        <option value="Y">YELLOW</option>
                        <option value="G/Y">GREEN/YELLOW</option>
                        <option value="Y/O">YELLOW/ORANGE</option>
                        <option value="G/O">GREEN/ORANGE</option>
                        <option value="G/O/Y">GREEN/ORANGE/YELLOW</option>   
                        <option value="N/A">N/A</option>    
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>standard stock</label>
                    <input type="number" name="pas_standardstock" id="pas_standardstock" class="form-control rounded-0" required />
                </div>
<!-- 
                <div class="form-group">
                    <label>Safety stock</label>
                    <input type="text" name="pas_safetystock" id="pas_safetystock" class="form-control rounded-0"  />
                </div> -->
                
                <div class="form-group">
                    <label>Register Code</label>
                    <input type="text" name="pas_RegCode" id="pas_RegCode" class="form-control rounded-0"  required/>
                </div>

                <div class="form-group">
                    <label>Supplier Code</label>
                    <input type="text" name="pas_supplier" id="pas_supplier" class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>Type </label>
                    <input type="text" name="pas_type" id="pas_type" class="form-control rounded-0"  />
      
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="pas_location" id="pas_location" class="form-control rounded-0"  />
                </div>

                <!-- <div class="form-group">
                    <label>Order Number</label>
                    <input type="text" name="pas_orderNum" id="pas_orderNum" class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>Quantity Order</label>
                    <input type="text" name="pas_Quantity_order" id="pas_Quantity_order" class="form-control rounded-0"  />
                </div> -->

                <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" name="pas_remarks" id="pas_remarks" class="form-control rounded-0"  />
                </div>
                <div class="form-group">
                    <label>Harness Code</label>
                    <input type="text" name="pas_harness_code" id="pas_harness_code" class="form-control rounded-0"  />
                </div>
    
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="submit" name="savethisshit" id="savethisshit" class="btn btn-primary ">ADD PRODUCT </button>	
			</div>
			</div>
		</div>
		</div>

        



            </div>
            	
<?php include('inc/footer.php');?>
            