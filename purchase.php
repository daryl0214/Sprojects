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
                            <a  href= "product.php" class="btn btn-primary btn-sm rounded-0"></i> GO BACK</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">                    
                        <div class="row"><div class="col-sm-9 table">
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
                                                 
                                            <div class="form-group">
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
                                                        style="<?= ($result['Checker_Status'] == 'BELOW SAFETY STOCK') ? 'background-color: red; ' : '' ?>
                                                         <?= ($result['Checker_Status'] == 'WITHIN STANDARD STOCK') ?>
                                                    <?= ($result['Checker_Status'] == 'OVERSTOCK') ? 'background-color: blue;' : '' ?>
                                                    <?= ($result['Checker_Status'] == 'SAFETY STOCK') ? 'background-color: orange; ' : '' ?>
                                                    <?= ($result['Checker_Status'] == 'ZERO STOCK') ? 'background-color: gray; ' : '' ?>">
                                                   

                                                </h4>
                                                </td>
                                                </div>
                                               


                                                
                                                <div class="input-group">
                                                    <td><h4> <input name="pas_total_IN" readOnly id="pas_total_IN" value=<?=$result['pas_total_in'] ?>> <h4></input> </td>  
                                                          
                                                </div>
                                                <div class="input-group">
                                                    <td><h4> <input name="pas_total_out" readOnly id="pas_total_out" value=<?=$result['pas_total_out'] ?>><h4> </input> </td>  
                                                      
                                                </div> 
                                        </div>
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
                                <?php 
                                
                                                                       
                                if(isset($_GET['id']))
                                   
                                {
                                    $gettingid = validateInput($db->conn, $_GET['id']);
                                    $inventory = new invents;
                                    $result = $inventory->edit($gettingid);
                                    
                                    if($result)
                                    {
                                    ?>
                                    
                                        <form action="purchpros.php" method='post'>
                                        <!-- <form action="timers.php" method='post'> -->

                                        <th>SAMPLE CONNECTOR </th>
                                        <th>PART NUMBER </th>
                                        <th>COMMON PART NUMBER</th> 
                                        <th>PART NAME </th>  
                                        <th>REGISTRATION CODE</th>  
                                        <th>TYPE</th> 
                                        <th>SUPPLIER</th>
                                        <th>ORDERED QTY.</th>
                                        <th>    <label for="order_monitor"><?= $result['order_monitor'] ?></label></th>  
                                        <th>ACTION</th>
                                       
                                  
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
                                                    <span><input type = hidden type= 'text' name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input>  </span>
                                                </div>  
                                                <div class="input-group">
                                                    <span><input type = hidden  name="pas_safetystock" readOnly id="pas_safetystock" value=<?=$result['pas_safetystock'] ?>> </input>  </span>
                                                </div> 
                                                <div class="input-group">
                                                    <td><input  name="Sampleconn" readOnly id="Sampleconn" value=<?=$result['Sampleconn'] ?>> </input>  </td>     
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
                                                <td><input   name="ordered" readOnly id="ordered"  value=<?=$result['ordered'] ?>> </input>  </td>
                                                <span><input  name="recommend" id="recommend" class="form-control rounded-0"  /> </span>
                                                <div class="input-group">
                                                    <td><input name="pas_total_order" readOnly id="pas_total_order" value=<?=$result['pas_total_order'] ?>> </input> </td>     
                                                </div>

                                         
                                                    <span><input type = hidden name="pas_standardstock" readOnly id="pas_standardstock" value=<?=$result['pas_standardstock'] ?>> </input>  </span>
                                            
                                                    <span><input type = hidden  name="Checker_Status" readOnly id="Checker_Status" value=<?=$result['Checker_Status']  ?>> </input>  </td>
                                             
                                       
                                                    <span><input type = hidden  name="pas_safetystock" readOnly id="pas_safetystock"  value=<?=$result['pas_safetystock'] ?>> </input>  </span>
                                                <!-- BUTTON MODAL -->
                                                <td><button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" title="IN"> <i class="fa fa-download" ></i>TRANSACTION</button>
                                                    
                                                    
                                                
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
          
                                

                            <button type="button" class="btn btn-primary" id="live_search_button">History</button><button type="button" class="btn btn-secondary" id="availablecheckers">AVAILABLE CHECKERS</button>
                            <div class="form-group">
                                    <input type="hidden" class="form-control" id="live_search" value="<?=$result['pas_RegCode'] ?>" autocomplete="off" placeholder="Type here...">

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
                                                        $("#searchresult").html(data).show();

                                                        $("#searchresult_checkers").hide();
                                                    }                                                              
                                                });
                                            }else{
                                                    $("#searchresult").css("display","none");
                                                }

                                            });

                                        });    
                                            
                                </script>                                     
                                            </script>
                                            

                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="live_search" value="<?=$result['pas_RegCode'] ?>" autocomplete="off" placeholder="Type here...">

                                </div>
                                <div id="searchresult_checkers"></div>

                                <script>
                                    $(document).ready(function(){
                                        $("#availablecheckers").click(function (){
                                            var input = $("#live_search").val();
                                            //alert(input);
                                            if(input !== " "){
                                                $.ajax({
                                                    url:"availablecheckers.php",
                                                    method:"POST",
                                                    data:{input:input},
                                                    success:function(data){
                                                        $("#searchresult_checkers").html(data).show();

                                                        $("#searchresult").hide();
                                                    }                                                              
                                                });
                                            }else{
                                                    $("#searchresult_checkers").css("display","none");
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

        		
		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">TRANSACTION</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
            <form action="purchpros.php" method='post'>

                <label> CONTROL NUMBER </label>
                 <td> <input type="text" name= 'fld_cntrlnum' id= 'fld_cntrlnum' class="form-control rounded-0"  /></td>
                 <label> BY </label>
                <td> <input type="text" name= 'fld_by' id= 'fld_by' class="form-control rounded-0"  /></td>
                <label> TO </label>
                <td> <input type="text" name= 'fld_to' id= 'fld_to' class="form-control rounded-0"  /></td>
                <label> CONVEYOR </label>
                <td> <input type="text" name= 'fld_conv' id= 'fld_conv' class="form-control rounded-0"  /></td>
                <label> ORDER NUMBER </label>
                <td> <input type="text" name= 'fld_ornum' id= 'fld_ornum' class="form-control rounded-0"  /></td>
                <label> REMARKS </label>
                <td> <input type="text" name= 'fld_remarks' id= 'fld_remarks' class="form-control rounded-0"  /></td>
                <label> REPAIRED/NEW </label>
                    <select name="fld_repairnew" id="fld_repairnew" class="form-select rounded-0" >
                    <option value="NEW">NEW </option>
                        <option value="REPAIRED">REPAIRED</option>                    
                    </select>
                
                <label> QUANTITY </label>
                <td> <input type="number" name= 'fld_qunatityin' id= 'fld_qunatityin' value= "0" class="form-control rounded-0"  /></td>
                
                <label> REVISION LEVEL</label>
                <td> <input type="text" name= 'fld_revlvl' id= 'fld_revlvl' class="form-control rounded-0"  /></td>
                <label> CAR CODE</label>
                <td> <input type="text" name= 'fld_carcode' id= 'fld_carcode' class="form-control rounded-0"  /></td>
            
                <span><input type = hidden name="balance" readOnly id="balance" value=<?=$result['pas_Quantity_order'] ?>> </input> </span>  
                    
               
                
                <span><input type= hidden name="pas_total_IN" readOnly id="pas_total_IN" value=<?=$result['pas_total_in'] ?>> </input> </span>  
                        
            
                <span> <input type = hidden name="pas_total_out"  id="pas_total_out" value=<?=$result['pas_total_out'] ?>> </input> </span>  
                <span> <input type = hidden  name="order_monitor"  id="order_monitor"  value=<?=$result['order_monitor'] ?>> </input>  </span>
                <span> <input type = hidden  name="pas_totalvalue"  id="pas_totalvalue"  value=<?=$result['pas_totalvalue'] ?>> </input>  </span>
                <span> <input type = hidden  name="pas_unitprice"  id="pas_unitprice"  value=<?=$result['pas_unitprice'] ?>> </input>  </span>
                
                <span> <input type = hidden  name="pas_repair"  id="pas_repair"  value=<?=$result['pas_repair'] ?>> </input>  </span>
                <span> <input type = hidden  name="pas_new"  id="pas_new"  value=<?=$result['pas_Quantity_order'] ?>> </input>  </span>
			</div>
			<div class="modal-footer">
				<button name="INSERTONLY" id="INSERTONLY" onclick="return confirm('PLEASE CONFIRM  ')"  class="btn btn-warning" title="INSERT">    INSERT    </button>
				<button name="INTHISSHIT" id="INTHISSHIT"  class="btn btn-success"  onclick="return confirm('PLEASE CONFIRM ')"  title="IN"> IN </button>
                <button name="OUTSHIT" id="OUTSHIT" onclick="return confirm('PLEASE CONFIRM ')"  class="btn btn-danger" title="OUT">OUT </button>
                <!-- <button name="REPAIRSHIT" id="REPAIRSHIT" onclick="return confirm('PLEASE CONFIRM  ')"  class="btn btn-secondary    " title="REPAIR">REPAIR </button> -->
                <!-- FOR TRIAL -->
                <!-- <button name="FORCHECKERS" id="FORCHECKERS" onclick="return confirm('PLEASE CONFIRM  ')"  class="btn btn-primary    " title="AVAILABLE CHECKERS">AVAILABLE CHECKERS </button> -->
            </div>
			</div>
		</div>
		</div>


</div>

