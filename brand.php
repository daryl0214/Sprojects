<?php 
ob_start();
include('inc/header.php');
require_once __DIR__."/inc/inv.php";
include('config/configs.php');

?>

	
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/product.js"></script>
<script src="js/common.js"></script>

<?php include('inc/container.php');?>
<?php include('message.php');?>


<?php include("menus.php"); ?> 	

	
	<div class="row">
			<div class="col-lg-12">
				<div class="card card-default rounded-0 shadow">
                    <div class="card-header">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="card-title">Transaction</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                            <a  href= "acce.php" class="btn btn-primary btn-sm rounded-0"></i> GO BACK</a>
                            </div>
                        </div>
                    </div>

                        
                    <div class=".card-body-sm">
                        

                        <div class="row"><div class="col-xsm-9 table">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                    <th><h3>STANDARD STOCK<h3></th>
                                    <th><h3>SAFETY STOCK<h3></th> 
                                    <th><h3>BALANCE<h3></th> 
                                    <th><h3>STATUS<h3></th>
                                    <th><h3>TOTAL IN<h3></th> 
                                    <th><h3>TOTAL OUT<h3></th> 

                                </thead></tr>
                                <tbody>
                                <?php 
                                
                                                                       
                                    if(isset($_GET['id']))
                                       
                                    {
                                        $gettingid = validateInput($db->conn, $_GET['id']);
                                        $inventory = new invents;
                                        $result = $inventory->edit($gettingid);

                                     
                                       //echo [$result];     
                                        
                                        if($result)
                                        {
                                            ?>
                     
                                                <div class="input-group-">
                                                     <td> <h4><input name="pas_standardstock" readOnly id="pas_standardstock" value=<?=$result['pas_standardstock'] ?>><h4> </input> </td>  
                                                
                                                </div>
                                                <div class="input-group ">
                                                    <td> <h4> <input name="pas_safetystock" readOnly id="pas_safetystock" value=<?=$result['pas_safetystock'] ?>><h4> </input> </td>  
                                                    
                                                </div>
                                                <div class="input-group">
                                                    <td>  <h4> <input name="balance" readOnly id="balance" value=<?=$result['pas_Quantity_order'] ?>> <h4></input> </td>  
                                                     
                                                </div>

                                                <td>
                                                
                                                <h4>
                                                    <input name="Checker_Status" readOnly id="Checker_Status" 
                                                        value="<?= $result['Checker_Status'] ?>"
                                                        style="<?= ($result['Checker_Status'] == 'BELOW SAFETY STOCK') ? 'background-color: red;' : '' ?>
                                                                <?= ($result['Checker_Status'] == 'OVERSTOCK') ? 'background-color: blue;' : '' ?>
                                                                <?= ($result['Checker_Status'] == 'WITHIN SAFETY STOCK') ? 'background-color: orange;' : '' ?>
                                                                <?= ($result['Checker_Status'] == 'ZERO STOCK') ? 'background-color: grey;' : '' ?>">
                                                </h4>
                                                </td>



                                                
                                                <div class="input-group">
                                                    <td><h4> <input name="pas_total_IN" readOnly id="pas_total_IN" value=<?=$result['pas_total_in'] ?>> <h4></input> </td>  
                                                          
                                                </div>
                                                <div class="input-group">
                                                    <td><h4> <input name="pas_total_out" readOnly id="pas_total_out" value=<?=$result['pas_total_out'] ?>><h4> </input> </td>  
                                                      
                                                </div>                                                                                                                                                                                          
                                            <?php

                                        }
                                        else{
                                            echo"<h4>NO RECORD FOUND<h4>";
                                        }
                                    }
                                    else{
                                        echo "<h4>SOMETHING WENT WRONG</h4>";
                                    }
                                    //echo "Today is " . date("Y/m/d") . "<br>";
                                    ?>
                                </tbody>
                            </table>
                            </table>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"><div class="col-sm-9 table">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                    
                                    <th> </th>
                                    <th> </th>
                                    <th>Part Number </th>
									<th>Common Part Number</th> 
                                    <th>Part Name</th>  
									<th>Registration Code</th>  
                                    <th>TYPE</th> 
                                    <th>SUPPLIER</th>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                    <th>CONTROL NUMBER</th>
                                    <th>BY      </th>
                                    <th>To             </th>
                                    <th>conv            </th>
                                    <th> </th>
                                    <th> </th>
                                    <th> </th>
                                    <th>Action</th>
                                    
                                    
                                </tr></thead>
                                
                                <tbody>
                                <?php 
                                
                                                                       
                                    if(isset($_GET['id']))
                                       
                                    {
                                        $gettingid = validateInput($db->conn, $_GET['id']);
                                        $inventory = new invents;
                                        $result = $inventory->edit($gettingid);

                                     
                                       //echo [$result];     
                                        
                                        if($result)
                                        {
                                            ?>
                                            
                                             <form action="purchpros.php" method='post'>
                                             <!-- <form action="timers.php" method='post'> -->
                                             
                                                
                                            
                                                 <div class="input-group">
                                                    <td><input type = hidden type= 'text' name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input>  </td>
                                                </div>  
                                                <div class="input-group">
                                                    <td><input type = hidden  name="pas_safetystock" readOnly id="pas_safetystock" value=<?=$result['pas_safetystock'] ?>> </input>  </td>
                                                </div>             
                                                
                                                <div class="input-group">
                                                    <td><input  name="fld_partnumber" readOnly id="fld_partnumber" value=<?=$result['pas_partNum'] ?>> </input>  </td>     
                                                </div>
                                                <div class="input-group ">
                                                    <td><input name="fld_compartnum" readOnly id="fld_compartnum" value=<?=$result['pas_compartnum'] ?>>  </input>  </td>     
                                                </div>
                                                <div class="input-group">
                                                    <td><input name="fld_partname" readOnly id="fld_partname" value=<?=$result['pas_partName'] ?>></input>  </td>     
                                                </div>
                                                <div class="input-group">
                                                    <td><input name="fld_RegCode" readOnly id="fld_RegCode" value=<?=$result['pas_RegCode'] ?>></input>  </td>     
                                                </div>
                                                <div class="input-group">
                                                    <td><input name="fld_Type" readOnly id="fld_Type" value=<?=$result['pas_type'] ?> ></input> </td>     
                                                </div>
                                                <div class="input-group">
                                                    <td><input name="fld_Supplier" readOnly id="fld_Supplier" value=<?=$result['pas_supplier'] ?>> </input> </td>     
                                                </div>

                                                <div class="input-group">
                                                    <td><input type = hidden name="pas_standardstock" readOnly id="pas_standardstock" value=<?=$result['pas_standardstock'] ?>> </input>  </td>
                                                </div>  
                                                <div class="input-group">
                                                    <td><input type = hidden  name="Checker_Status" readOnly id="Checker_Status" value=<?=$result['Checker_Status']  ?>> </input>  </td>
                                                </div>  
                                                <div class="input-group">
                                                    <td><input type = hidden  name="pas_safetystock" readOnly id="pas_safetystock"  value=<?=$result['pas_safetystock'] ?>> </input>  </td>
                                                </div>  
                                                


                                                <div class="form-group">
                                                   <td> <input type="text" name= 'fld_cntrlnum' id= 'fld_cntrlnum' class="form-control rounded-0"  /></td>
                                                </div>
                                                <div class="form-group">
                                                   <td> <input type="text" name= 'fld_by' id= 'fld_by' class="form-control rounded-0"  /></td>
                                                </div>
                                                <div class="form-group">
                                                   <td> <input type="text" name= 'fld_to' id= 'fld_to' class="form-control rounded-0"  /></td>
                                                </div>
                                                <div class="form-group">
                                                   <td> <input type="text" name= 'fld_conv' id= 'fld_conv' class="form-control rounded-0"  /></td>
                                                </div>
                                                <div class="form-group">

                                                <div class="input-group">
                                                    <td>  <h4> <input type = hidden name="balance" readOnly id="balance" value=<?=$result['pas_Quantity_order'] ?>> <h4></input> </td>  
                                                     
                                                </div>
                                                <div class="input-group">
                                                    <td><h4> <input type=hidden name="pas_total_IN" readOnly id="pas_total_IN" value=<?=$result['pas_total_in'] ?>> <h4></input> </td>  
                                                          
                                                </div>
                                                <div class="input-group">
                                                    <td><h4> <input type = hidden name="pas_total_out" readOnly id="pas_total_out" value=<?=$result['pas_total_out'] ?>><h4> </input> </td>  
                                                      
                                                </div>   
                                                
                                                

                                                    
                                                    
                                                    <td><div class="btn-group btn-group-sm"><button name="INTHISSHIT" id="INTHISSHIT"  class="btn btn-success"  onclick="return alert('SIGURADO KA NA BA?  -DARYL  ')"  title="IN"><i class="fa fa-download" ></i></button><div></div><button name="OUTSHIT" id="OUTSHIT" onclick="return alert('SIGURADO KA NA BA?  -DARYL  ')"  class="btn btn-danger" title="OUT"><i class="fa fa-upload" ></i></button></div>
                                                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                                                    <script>
                                                    $(document).ready(function() {
                                                        // Prevent form submission on Enter key press for the barcode input field
                                                        $('#fld_cntrlnum').on('keyup keypress', function(e) {
                                                            var keyCode = e.keyCode || e.which;
                                                            if (keyCode === 13) { 
                                                                e.preventDefault();
                                                                return false;
                                                            }
                                                        });
                                                    });
                                                    </script>

                                                    
                                                
                                                </div>  
                                                
                                                <!--  -->
                                            <?php

                                        }
                                        else{
                                            echo"<h4>NO RECORD FOUND<h4>";
                                        }
                                    }
                                    else{
                                        echo "<h4>SOMETHING WENT WRONG</h4>";
                                    }
                                    //echo "Today is " . date("Y/m/d") . "<br>";
                                    ?>
                                </tbody>
                            </table>

                            <button type="button" class="btn btn-primary" id="live_search_button">History</button>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="live_search" value="<?=$result['pas_RegCode'] ?>" autocomplete="on" placeholder="Type here...">

                                </div>
                                <div id="searchresult"></div>

                                <script>
                                    $(document).ready(function(){
                                        $("#live_search_button").click(function (){
                                            var input = $("#live_search").val();
                                            //alert(input);
                                            if(input !== " "){
                                                $.ajax({
                                                    url:"timers.php",
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
                                            </script>
                                           

                                </thead></tr>
                                </div></table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div> </div>
</div>
