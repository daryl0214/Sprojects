<?php 
ob_start();
include('inc/header.php');
require_once __DIR__."/inc/inv.php";
include('config/configs.php');

?>
	
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/product.js"></script>
<script src="js/common.js"></script>

<?php include('inc/container.php');?>



<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-SM-10">
				<div class="card card-default rounded-0 shadow">
                    <div class="card-header">
                    	<div class="row">
                            <div class="col-sm-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="card-title">DETAILS</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                                <a  href= "product.php" class="btn btn-primary btn-sm rounded-0"><i class="far fa-plus-square"></i> GO BACK</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"><div class="col-sm-9 table">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                    
                           


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
                                                   
                                     <form action="action.php" method="post">
                                   
                                             <div class="form-group">
                                                    <div class="input-group">
                                                        <input type = 'hidden' type= 'text' name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input>
                                                    </div>

                                                    <H6>Sample Connector </H6>
                                                        <select name="Sampleconn" id="Sampleconn" class="form-select rounded-0"  >
                                                        <option value="" ><?= $result['Sampleconn'] ?> </option>
                                                            <option value="I">YES</option>
                                                            <option value="O">NO</option>
                                                                                                                        
                                                        </select>
                                                    </div>
                                                   
                                                    <H6>Checker Moving Status </H6>
                                                        <select name="pas_moving" id="pas_moving" class="form-select rounded-0" >
                                                        <option value=""><?= $result['pas_moving'] ?> </option>
                                                            <option value="FM">FAST MOVING</option>
                                                            <option value="SM">SLOW MOVING</option>
                                                                                                                        
                                                        </select>
                                                    </div>
                                               

                                                    <h6>Part Number</h6>
                                                        <input type="text"  name='pas_partNum' value ="<?=$result['pas_partNum'] ?>" id='pas_partNum' class="form-control rounded-0"   />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Common Part Number</h6>
                                                    <input type="text"  name='pas_compartnum' value ="<?=$result['pas_compartnum'] ?>" id='pas_compartnum' class="form-control rounded-0"  />
                                                     </div>
                                                    <div class="form-group">
                                                        <h6>Part Name</h6>
                                                        <input type="text"  name='pas_partName' value ="<?=$result['pas_partName'] ?>" id='pas_partName' class="form-control rounded-0"   />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Revision Level</h6>
                                                        <input type="text"  name='pas_RevLvl' value ="<?=$result['pas_RevLvl'] ?>" id='pas_RevLvl' class="form-control rounded-0"   />
                                                    </div>
                                                   
                                                
                                                    <div class="form-group">
                                                        <h6>Supplier Code</h6>
                                                        <input type="text"  name='pas_supplier' value ="<?=$result['pas_supplier'] ?>" id='pas_supplier' class="form-control rounded-0"   />
                                                    </div>
                                                   
                                                    <div class="form-group">
                                                        <h6>Unit Price</h6>
                                                        <input type="text"  name='pas_unitprice' value ="<?=$result['pas_unitprice'] ?>" id='pas_unitprice' class="form-control rounded-0"   />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Select Car Modele</h6>
                                                        <input type="text"  name='pas_carmodel' value ="<?=$result['pas_carmodel'] ?>" id='pas_carmodel' class="form-control rounded-0"   />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Fail Proofing Sticker</h6>
                                                        <input type="text"  name='pas_clrsticker' value ="<?=$result['pas_clrsticker'] ?>" id='pas_clrsticker' class="form-control rounded-0"   />
                                                    </div>
                                                    <div class="form-group">
                                                        <h6>standard stock</h6>
                                                    <input type="text" name="pas_standardstock" value ="<?=$result['pas_standardstock'] ?>" id="pas_standardstock" class="form-control rounded-0"  />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Safety stock</h6>
                                                        <input type="text" name="pas_safetystock" value ="<?=$result['pas_safetystock'] ?>" id="pas_safetystock" class="form-control rounded-0"  />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6>Register Code</h6>
                                                        <input type="text" name="pas_RegCode" value ="<?=$result['pas_RegCode'] ?>" id="pas_RegCode" class="form-control rounded-0"  />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Location</h6>
                                                        <input type="text" name="pas_location"value ="<?=$result['pas_location'] ?>"  id="pas_location" class="form-control rounded-0"  />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Order Number</h6>
                                                        <input type="text"  name="pas_orderNum"value ="<?=$result['pas_orderNum'] ?>" id="pas_orderNum" class="form-control rounded-0"  />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Quantity Order</h6>
                                                        <input type="text"  name="pas_Quantity_order" value ="<?=$result['pas_Quantity_order'] ?>"id="pas_Quantity_order" class="form-control rounded-0"  />
                                                    </div>

                                                    <div class="form-group">
                                                        <h6>Remarks</h6>
                                                        <input type="text"   name="pas_remarks" value ="<?=$result['pas_remarks'] ?>" id="pas_remarks" class="form-control rounded-0"  />
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <h6>Harness Code</h6>
                                                        <input type="text"  name="pas_harness_code" value ="<?=$result['pas_harness_Code']?> " id="pas_harness_Code" class="form-control rounded-0"  />
                                                    </div>
                                                    
                                                
                                                
                                                    
                                                    </div>
                                                    </div>
                                                    <div class="md-3-footer">
                                                    <button type="submit"   onclick="return confirm('YOU WANT TO PROCEED? -DARYL  ')" name="deletethisshit" id="deletethisshit" class="btn btn-danger">DELETE </button>
                                                    <button type="submit" onclick="return confirm('YOU WANT TO PROCEED?  -DARYL  ')"  name="updatethisshit" id="updatethisshit" class="btn btn-primary ">UPDATE </button>
                                                           
                                                            <a href="product.php" class="btn btn-default border rounded-0 btn-sm" >BACK</a>
                                                         
                                                      
                                                            
                                                        </form>
                                                            
                                                    </div>
                                    
                                                        
                                                    
                                                
                                     </form>

                           
                                   

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
                                </tbody>
                            </table>
                        </div></div>
                    </div>
                </div>
			</div>
		</div> </div>
</div>




        