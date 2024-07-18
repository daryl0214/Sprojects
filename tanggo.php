<?php 
ob_start();
session_start();
include('inc/header.php');
require_once __DIR__."/inc/inv.php";
//$inventory = new invents();

?>
	
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/product.js"></script>
<script src="js/common.js"></script>

<?php include('inc/container.php');?>



<div class="container">		
		
	<?php include("menus.php"); ?> 	

  
        <form action="alpha.php" method="POST">
            <input type="hidden" name="pid" id="pid" />
            <input type="hidden" name="btn_action" id="btn_action" />
            
            <div class="form-group">
                    <label>Sample Connector </label>
                    <select name="Sampleconn" id="Sampleconn" class="form-select rounded-0" >
                    <option value="">Select </option>
                        <option value="l">YES</option>
                        <option value="O">NO</option>
                        <option value="N/A">N/A</option>    
                        
                    </select>
                </div>


                <div class="form-group">
                    <label>Part Number</label>
                    <input type="text" name="pas_partNum" id="pas_partNum" class="form-control rounded-0"  />
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
                    <input type="text" name='pas_RevLvl' id='pas_RevLvl' class="form-control rounded-0"  />
                </div>


                <div class="form-group">
                    <label>Unit Price</label>
                    <input type="text" name="pas_unitprice" id="pas_unitprice" class="form-control rounded-0"  />
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
                    <input type="text" name="pas_standardstock" id="pas_standardstock" class="form-control rounded-0"  />
                </div>

                <div class="form-group">
                    <label>Safety stock</label>
                    <input type="text" name="pas_safetystock" id="pas_safetystock" class="form-control rounded-0"  />
                </div>
                
                <div class="form-group">
                    <label>Register Code</label>
                    <input type="text" name="pas_RegCode" id="pas_RegCode" class="form-control rounded-0"  />
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

                <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" name="pas_remarks" id="pas_remarks" class="form-control rounded-0"  />
                </div>
                <div class="form-group">
                    <label>Harness Code</label>
                    <input type="text" name="pas_harness_code" id="pas_harness_code" class="form-control rounded-0"  />
                </div>
           

 
                 
                            
                <div class="md-3-footer">
                    <button type="submit"  onclick="return confirm('SIGURADO KA NA BA?  -DARYL  ')"    name="savethisshit" id="savethisshit" class="btn btn-primary ">ADD PRODUCT </button>
                    <a href="product.php" class="btn btn-default border rounded-0 btn-sm" >BACK</a>
                </div>
            </form>
        </div>
</div>
        