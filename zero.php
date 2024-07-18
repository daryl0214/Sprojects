
<?php 

include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$db = new DatabaseConnection;

?>
                                        

                                        <!-- <div class="row">
			<div class="col-lg-300">
				<div class="card card-default rounded-0 shadow">
               
                    <div class="card-header">
                    	<div class="row">
                            <div class="col-lg-20 col-lg-10 col-lg-10 col-lg-10">
                            
                            	<h3 class="card-title">Product List</h3>
                                        
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-6 text-end">   
                            <a type="button"href="zerostock.php" class="btn btn-warning bg-gradient rounded-0 btn-sm"><i class="fa fa-location"></i> zero stock</a>    <a type="button"href="tanggo.php" class="btn btn-primary bg-gradient rounded-0 btn-sm"><i class="far fa-plus-square"></i> Add Product</a>                
                            </div> 
                        </div>
                    </div>
                    
                    <div class="card-body">
                   
                        <div class="row"><div class="col-xxl-12 table-responsive">
                      
                            <table id="productList" class="table table-bordered table-striped">

                            <thead><tr>                                    
                                <div class="form-group">
                                <th>STATUS</th>   
                                <th>Part Number</th>	
                                <th>Revision Level</th>
                                <th>Registration Code</th>
                                <th>Supplier Code</th>
                                <th>Type</th>
                                <th>Product Name</th>                                    
                                
                                <th>Common Part Number</th>	
                                <th>Unit Price</th>                                   								
                                <th>Car Model</th>                                    
                                
                                <th>Harness Code</th>
                                <th>Location</th>
                                <th>Standard Stock</th>
                                <th>Safety Stock</th>
                                <th>balance</th> -->

                                    
                            </thead>
                            <tbody>
                            <?php 
                            
                            if (isset($_POST['input'])) {
                                $input = $_POST['input'];
                            
                                // Query for tbl_in
                                $query_in = "SELECT * FROM tbl_inventory_system WHERE Checker_Status LIKE '{$input}%' OR pas_RegCode LIKE '{$input}%' OR pas_partNum  LIKE '{$input}%'OR pas_supplier  LIKE '{$input}%'
                                OR pas_carmodel  LIKE '{$input}%' OR pas_RevLvl  LIKE '{$input}%' OR pas_location  LIKE '{$input}%' OR pas_type  LIKE '{$input}%'OR pas_Quantity_order  LIKE '{$input}%'OR pas_harness_Code   LIKE '{$input}%'";
                                $result_in = mysqli_query($db->conn, $query_in);
                            
                                if (mysqli_num_rows($result_in) > 0) {
                                    while ($row = mysqli_fetch_assoc($result_in)) {
                                        $Sampleconn = $row['Sampleconn'];
                                        $Checker_Status = $row['Checker_Status'];
                                        $pas_partNum = $row['pas_partNum'];
                                        
                                        $pas_compartnum = $row['pas_compartnum'];
                                        $pas_partName = $row['pas_partName'];
                                        $pas_RevLvl = $row['pas_RevLvl'];
                                        $pas_supplier = $row['pas_supplier'];
                                        $pas_unitprice = $row['pas_unitprice'];
                                        $pas_carmodel = $row['pas_carmodel'];
                                        $pas_clrsticker = $row['pas_clrsticker'];
                                        $pas_standardstock = $row['pas_standardstock'];
                                        $pas_safetystock = $row['pas_safetystock'];
                                        $pas_RegCode = $row['pas_RegCode'];
                                        $pas_location = $row['pas_location'];

                                        $pas_Quantity_order = $row['pas_Quantity_order'];
                                        $pas_remarks = $row['pas_remarks'];
                                        $pas_harness_Code = $row['pas_harness_Code'];
                                    
                                        $pas_type = $row['pas_type'];
                                        $recommend = $row['recommend'];
                            
                                        ?>
                                        <tr>

                                            <td><?php echo $Sampleconn ; ?></td>
                                                                
                                            <td><?php echo $pas_partNum ; ?></td>
                                            <td><?php echo $pas_compartnum ; ?></td>
                                            <td><?php echo $pas_RevLvl ; ?></td>
                                            <td><?php echo $pas_RegCode ; ?></td>
                                            <td><?php echo $pas_partName ; ?></td>
                                            <td><?php echo $pas_supplier ; ?></td>
                                         
                                            <td><?php echo $pas_type ; ?></td>                                                                                              
                                            <td>$<?php echo $pas_unitprice ; ?></td>
                                            <td><?php echo $pas_carmodel ; ?></td>
                                            
                                            <td><?php echo $pas_clrsticker ; ?></td>
                                            
                                   
                                           
                                       
                                            <td><?php echo $pas_standardstock ; ?></td>

                                            
                                            
                                           
                                            <td><?php echo $pas_safetystock ; ?></td>
                                            <td><?php echo $pas_Quantity_order ; ?></td>
 
                                            <td><?php echo $pas_location ; ?></td>
                                            <td><?php echo $Checker_Status ; ?></td> 
                                            <td></td> 
                                            <td><?php echo $pas_harness_Code ; ?></td>
                                            <td>
                                                    <form action="deletan.php" method="post">   
                                                        <div class="btn-group btn-group-sm"> <a type="button" name="update" href ="prodview.php?id=<?= $row['ID'] ?>"  class="btn btn-primary btn-sm rounded-0  update" title="Update"><i class="fa fa-edit"></i></a><a  name="edit" id="edit"  href="purchase.php?id=<?= $row['ID'] ?>" class="btn btn-light bg-gradient border text-dark btn-sm rounded-0  Transact" title="Transact"><i class="fa fa-handshake"></i></a></div>
                                                    </form>
                                            </td>

                               
                                               
                                        
                                            
                                        </tr>
                                        <?php
                                    }
                                }
                            
                            }
        ?>
        































