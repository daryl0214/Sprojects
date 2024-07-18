<!DOCTYPE html>
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
							<h3 class="card-title">CHECKER FIXTURE MONTHLY REPORT</h3>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-4 col-xs-6" align="right">
                       
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
                                    <th>CHANGE LEVEL DATE</th>	
                                    <th>REVISION LEVEL</th>
                                    <th>REGISTRATION CODE</th>
                                    <th>PRODUCT NAME</th>
                                    <th>SUPLLIER CODE</th>
                                    <th>TYPE</th>
                                    <th>UNIT PRICE USD</th>   
                                    <th>CAR MODEL</th>  
                                    <th>LOCATION</th>   
                                    <th>NEW</th>
                                    <th>REPAIR</th>                                                                                              
                                    <th>STANDARD STOCK</th>                                  
                                    <th>SAFETY STOCK</th> 

                                    <th>BALANCE</th>                                           
                                    <th>STATUS</th>       
                                    <th>RECOMMENDATION</th>
                                    <th>TOTAL AMOUNT</th>
                                  
                           
                                   

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
                                                    <td><?= $row ['pas_ddate']?></td>
                                                    <td><?= $row ['pas_RevLvl']?></td>
                                                    <td><?= $row ['pas_RegCode']?></td>
                                                    <td><?= $row ['pas_partName']?></td>
                                                    <td><?= $row ['pas_supplier']?></td>   
                                                    <td><?= $row ['pas_type']?></td>                                                                                                                   
                                                    <td><?= $row['pas_unitprice'] ?></td>
                                                    <td><?= $row ['pas_carmodel']?></td>
                                                    <td><?= $row ['pas_location']?></td>
                                                    <td><?= $row ['pas_new']?></td>
                                                    <td><?= $row ['pas_repair']?></td>  

                                                    <td><?= $row ['pas_standardstock']?></td>                                    
                                                    <td><?= $row ['pas_safetystock']?></td>                                                   
                                                    <td><?= $row ['pas_Quantity_order']?></td>
                                                    <td><?= $row['Checker_Status'] ?></td>                                                  
                                                    <td><?= $row['recommend'] ?></td>                                                   
                                                    <td><?= $row ['pas_totalvalue']?></td>    
                                                    
                                                

                                                   
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



<?php include('inc/footer.php');?>
            