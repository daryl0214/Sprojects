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
                                <a  href= "acce.php" class="btn btn-primary btn-sm rounded-0"><i class="far fa-plus-square"></i> GO BACK</a>
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
                                        $result = $inventory->acce($gettingid);

                                     
                                       //echo [$result];     
                                        
                                        if($result)
                                        {
                                            ?>                                
                                                   
                                     <form action="deletan2.php" method="post">
                                   

                                            <input type = 'hidden'  name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input> 
                                                    
                                            <div class="form-group">
                                                    <label>SUPPLIERS  </label>
                                                    <select name="supplertype" id="supplertype" class="form-select rounded-0"  >
                                                    <option value="N/A">Select </option>
                                                        <option value="I">IMPORTED</option>
                                                        <option value="L">LOCAL</option>
                                                    
                                                        
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                <label>PART NAME</label>
                                                <input type="text" name="acce_partname" id="acce_partname" class="form-control rounded-0" value="<?= htmlspecialchars($result['acce_partname']) ?>">
                                            </div>
     
                                                
                                                <div class="form-group">
                                                    <label>PART NUMBER</label>
                                                    <input type="text" name='acce_partnumber' id='acce_partnumber' class="form-control rounded-0" value="<?= htmlspecialchars($result['acce_partnumber']) ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label>DESCRIPTION </label>
                                                    <input type="text" name='acce_description' id='acce_description' class="form-control rounded-0" value=<?=$result['acce_description'] ?> >
                                                </div>


                                                <div class="form-group">
                                                    <label>SUPPLIER</label>
                                                    <input type="text" name="acce_supplier" id="acce_supplier" class="form-control rounded-0"  value=<?=$result['acce_supplier'] ?> required />
                                                </div>                    
                                                        
                                    
                                            
                                                <div class="form-group">
                                                    <label>REGISTRATION CODE </label>
                                                    <input type="text" name="acce_regcode" id="acce_regcode" class="form-control rounded-0"   value=<?=$result['acce_regcode'] ?>  />
                                                </div>

                                                    

                                                <div class="form-group">
                                                    <label>PRICE PHP </label>
                                                    <input type="text" name="acce_Price_PHP" id="acce_Price_PHP" class="form-control rounded-0"   value=<?=$result['acce_Price_PHP'] ?>  />
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>PRICE USD</label>
                                                    <input type="text" name="acce_Price_USD" id="acce_Price_USD" class="form-control rounded-0" required  value=<?=$result['acce_Price_USD'] ?>  />
                                                </div>
                                

                                            

                                                <div class="form-group">
                                                    <label>SAFETYSTOCK</label>
                                                    <input type="text" name="acce_Safetystock" id="acce_Safetystock" class="form-control rounded-0"  value=<?=$result['acce_Safetystock'] ?>  />
                                                </div>

                                                <div class="form-group">
                                                    <label>LOCATION</label>
                                                    <input type="text" name="acce_location" id="acce_location" class="form-control rounded-0"  value=<?=$result['acce_location'] ?>  />
                                                </div>


                                                <div class="form-group">
                                                    <label>BALANCE</label>
                                                    <input type="text" name="acce_balance" id="acce_balance" class="form-control rounded-0"  value=<?=$result['acce_balance'] ?>   />
                                                </div>

                                                <div class="form-group">
                                                    <label>REMARKS</label>
                                                    <input type="text" name="acce_remarks" id="acce_remarks" class="form-control rounded-0"   value=<?=$result['acce_remarks'] ?> >
                                                </div>

                                                <div class="form-group">
                                                    <label>ORDER NUMBER</label>
                                                    <input type="text" name="acce_order_number" id="acce_order_number" class="form-control rounded-0"   value=<?=$result['acce_order_number'] ?> >
                                                </div>
                 
                                                
                                                    
                                                    </div>
                                                    </div>
                                                    <div class="md-3-footer">
                                                    <button type="submit"   onclick="return confirm('YOU WANT TO PROCEED? -DARYL  ')" name="deletemototo" id="deletemototo" class="btn btn-danger">DELETE </button>
                                                    <button type="submit" onclick="return confirm('YOU WANT TO PROCEED?  -DARYL  ')"  name="updatemototo" id="updatemototo" class="btn btn-primary ">UPDATE </button>
                                                           
                                                        
                                                         
                                                      
                                                            
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




        