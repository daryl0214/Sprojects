<?php 
ob_start();

include('inc/header.php');
require_once __DIR__."/inc/inv.php";
include('config/configs.php');

?>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>		
<link rel="stylesheet" href="css/dataTables.bootstrap.min.css" />
<script src="js/order.js"></script>
<script src="js/common.js"></script>
<?php include('inc/container.php');?>
<div class="container">		
		
	<?php include("menus.php"); ?> 	
	
	<div class="row">
			<div class="col-lg-12">
				<div class="card card-default rounded-0 shadow">
                    <div class="card-header">
                    	<div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                            	<h3 class="card-title">DETAILS</h3>
                            </div>
                        
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">
                                <a  href= "product.php" class="btn btn-primary btn-sm rounded-0"><i class="far fa-plus-square"></i> GO BACK</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row"><div class="col-sm-12 table">
                            <table id="orderList" class="table table-bordered table-striped">
                                <thead><tr>
                                    
                                        
                                    <th>Part Number </th>
									<th>Common Part Number</th> 
									<th>Registration Code</th>  
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
                                            
                                             <form action="order.php" method='post'>
                                             

                                                <div class="input-group">
                                                    <td><input type="text" name="pas_partNum" value ="<?=$result['pas_partNum'] ?>" required />   </td>     
                                                </div>
                                                <div class="input-group">
                                                    <td><input type="text" name ="pas_compartnum" value ="<?=$result['pas_compartnum'] ?>" required />   </td>     
                                                </div>
                                                <div class="input-group">
                                                    <td><input type="text" name="pas_RegCode" value ="<?=$result['pas_RegCode'] ?>" required /> </td>     
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
		</div>

<?php include('inc/footer.php');?>