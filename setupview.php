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
                                <a  href= "setups.php" class="btn btn-primary btn-sm rounded-0"><i class="far fa-plus-square"></i> GO BACK</a>
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
                                        $result = $inventory->Setups1($gettingid);

                                     
                                       //echo [$result];     
                                        
                                        if($result)
                                        {
                                            ?>                                
                                                   
                                     <form action="setupupdel.php" method="post">
                                   

                                            <input type = 'hidden'  name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input> 

                                                <div class="form-group">
                                                <label>PART NAME</label>
                                                <input type="text" name="setup_partname" id="setup_partname" class="form-control rounded-0" value="<?= htmlspecialchars($result['setup_partname']) ?>">
                                            </div>
     
                                                
                                                <div class="form-group">
                                                    <label>PART NUMBER</label>
                                                    <input type="text" name='setup_partnumber' id='setup_partnumber' class="form-control rounded-0" value="<?= htmlspecialchars($result['setup_partnumber']) ?>" />
                                                </div>

                                                <div class="form-group">
                                                    <label>DESCRIPTION </label>
                                                    <input type="text" name='setup_description' id='setup_description' class="form-control rounded-0" value=<?=$result['setup_description'] ?> >
                                                </div>


                                                <div class="form-group">
                                                    <label>SUPPLIER</label>
                                                    <input type="text" name="setup_supplier" id="setup_supplier" class="form-control rounded-0"  value=<?=$result['setup_supplier'] ?> required />
                                                </div>                    
                                                        
                                    
                                            
                                                <div class="form-group">
                                                    <label>ITEM CODE OR REGISTRATION CODE </label>
                                                    <input type="text" name="setup_regcode" id="setup_regcode" class="form-control rounded-0"   value=<?=$result['setup_regcode'] ?>  />
                                                </div>

                                                <div class="form-group">
                                                    <label>DRAWING NUMBER </label>
                                                    <input type="text" name="setup_drawing" id="setup_drawing" class="form-control rounded-0"   value=<?=$result['setup_regcode'] ?>  />
                                                </div>

                                              

                                                <div class="form-group">
                                                    <label>PRICE PHP </label>
                                                    <input type="text" name="setup_Price_PHP" id="setup_Price_PHP" class="form-control rounded-0"   value=<?=$result['setup_Price_PHP'] ?>  />
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label>PRICE USD</label>
                                                    <input type="text" name="setup_Price_USD" id="setup_Price_USD" class="form-control rounded-0" required  value=<?=$result['setup_Price_USD'] ?>  />
                                                </div>
                                

                                            

                                                <div class="form-group">
                                                    <label>SAFETYSTOCK</label>
                                                    <input type="text" name="setup_Safetystock" id="asetup_Safetystock" class="form-control rounded-0"  value=<?=$result['setup_Safetystock'] ?>  />
                                                </div>

                                                <div class="form-group">
                                                    <label>LOCATION</label>
                                                    <input type="text" name="setup_location" id="setup_location" class="form-control rounded-0"  value=<?=$result['setup_location'] ?>  />
                                                </div>


                                                <div class="form-group">
                                                    <label>BALANCE</label>
                                                    <input type="text" name="setup_balance" id="setup_balance" class="form-control rounded-0"  value=<?=$result['setup_balance'] ?>   />
                                                </div>

                                                <div class="form-group">
                                                    <label>REMARKS</label>
                                                    <input type="text" name="setup_remarks" id="setup_remarks" class="form-control rounded-0"   value=<?=$result['setup_remarks'] ?> >
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




        