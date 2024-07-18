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
                                <a  href= "javascript:history.back()" class="btn btn-primary btn-sm rounded-0"><i class="far fa-plus-square"></i> GO BACK</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"><div class="col-sm-9 table">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                <th>  </th>
                                <th>CONTROL NUMBER </th>
                                <th>IN / OUT </th>
                                <th>BY </th>
                                <th>TO </th>
                                <th>CONVEYOR </th>
                                <th>ORDER NUMBER </th>
                                <th>QUANTITY </th>
                                <th>REMARKS </th>
                                <th>REVISION LEVEL </th>



          
                                </tr></thead>
                                <tbody>
                                <form action="deletan.php" method="POST">
                                <?php 
                                
                                                                       
                                    if(isset($_GET['id']))
                                       
                                    {
                                        $gettingid = validateInput($db->conn, $_GET['id']);
                                        $inventory = new invents;
                                        $result = $inventory->edit12($gettingid);
                                        $result1 = $inventory->edit($gettingid);
                                        
                                   
                                       
                                      
                                     
                                       //echo [$result];     
                                        
                                        if($result)
                                        {
                                            ?>                                
             
                                            
                                                  
                                                    <td> <input type = 'hidden'  name="id" readOnly id="id" value=<?=$result['ID'] ?>> </input> </td>
                                                    <span> <input type = 'hidden' name='pas_total_in' readOnly id="pas_total_in" value="<?=$result1['pas_total_in'] ?>"> </input> </span>
                                                    <span> <input type = 'hidden' name="pas_total_out" readOnly id="pas_total_out" value="<?=$result1['pas_total_out'] ?>"> </input> </span>
                                                    <span> <input type = 'hidden' name="pas_Quantity_order" readOnly id="pas_Quantity_order" value="<?=$result1['pas_Quantity_order'] ?>"> </input> </span>
                                               
                               
                                        
                                    

                                                    <td> <input type="text"  name='fld_cntrlnum' value ="<?=$result['fld_cntrlnum'] ?>" id='fld_cntrlnum' class="form-control rounded-0"   /></td>
                                          
                                                    <td>  <input type="text"  name='fld_status' value ="<?=$result['fld_status'] ?>" id='fld_status' class="form-control rounded-0"   /></td>
                                                  
                                                    <td>  <input type="text"  name='fld_by' value ="<?=$result['fld_by'] ?>" id='fld_by' class="form-control rounded-0"   /></td>
                                                
                                                    <td>  <input type="text"  name='fld_to' value ="<?=$result['fld_to'] ?>" id='fld_to' class="form-control rounded-0"   /></td>
                                                    <td>  <input type="text"  name='fld_conv' value ="<?=$result['fld_conv'] ?>" id='fld_conv' class="form-control rounded-0"   /></td>
                                                    <td>  <input type="text"  name='fld_ornum' value ="<?=$result['fld_ornum'] ?>" id='fld_ornum' class="form-control rounded-0"   /></td>
                                                    <td>  <input type="text"  name='fld_qunatityin' value ="<?=$result['fld_qunatityin'] ?>" id='fld_qunatityin' class="form-control rounded-0"   /></td>
                                                    <td>  <input type="text"  name='fld_remarks' value ="<?=$result['fld_remarks'] ?>" id='fld_remarks' class="form-control rounded-0"   /></td>
                                                    <td>  <input type="text"  name='fld_revlvl' value ="<?=$result['fld_revlvl'] ?>" id='fld_revlvl' class="form-control rounded-0"   /></td>
                                               
                 
             
                                            </div>  
                                            </div>
                                            <div class="md-3-footer">
                                                <button type="submit"  name="deletemoto" id="deletemoto" class="btn btn-danger">DELETE </button>
                                                <button type="submit" name="updatemoto" id="updatemoto" class="btn btn-primary ">UPDATE </button>
                                           
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




        