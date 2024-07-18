
<?php 

include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$db = new DatabaseConnection;


?>
                                 
<table id="orderLists" class="table table-bordered table-striped">
                                        
    
         </thead>
        <tbody>
        <?php 
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
        
            // Query for tbl_in
            $query_in = "SELECT * FROM tbl_accessories WHERE supplertype LIKE '{$input}%' OR acce_partname LIKE '{$input}%'";
            $result_in = mysqli_query($db->conn, $query_in);
        
            if (mysqli_num_rows($result_in) > 0) {
                while ($row = mysqli_fetch_assoc($result_in)) {


               
                 
                    $supplertype = $row['supplertype'];
                    $acce_partname = $row['acce_partname'];
                    $acce_partnumber = $row['acce_partnumber'];
                    $acce_description = $row['acce_description'];
                    $acce_supplier = $row['acce_supplier'];
                    $acce_regcode = $row['acce_regcode'];
                    $acce_Price_PHP = $row['acce_Price_PHP'];
                    $acce_Price_USD = $row['acce_Price_USD'];
                    $acce_Safetystock = $row['acce_Safetystock'];
                    $acce_location = $row['acce_location'];
                    $acce_balance = $row['acce_balance'];
                    $acce_remarks = $row['acce_remarks'];
                
          
                    ?>
                    
                        <tr>
                         
                            <td><?php echo $supplertype; ?></td>
                            <td><?php echo $acce_partname; ?></td>
                            <td><?php echo $acce_partnumber; ?></td>
                            <td><?php echo $acce_description; ?></td>
                            <td><?php echo $acce_supplier; ?></td>
                            <td><?php echo $acce_regcode; ?></td>
                         
                            <td>₱<?php   echo  $acce_Price_PHP; ?></td>
                            <td>$<?php echo $acce_Price_USD; ?></td>
                            
                           
                            <td><?php echo $acce_Safetystock; ?></td>
                            <td><?php echo $acce_location; ?></td>
                            <td><?php echo $acce_balance; ?></td>
                            <td><?php echo $acce_remarks; ?></td>
                            
                                                    
                            
                            
                            <td>
                            <div class="form-group">
                            <a type="button" name="update" href ="category.php?id=<?= $row['ID'] ?>"  class="btn btn-primary btn-sm rounded-0  update" title="Update"><i class="fa fa-edit"></i></a>
                            </div>
                        </form>
                        </td>
                        </tr>
                    <?php
                }
            }

            }
 
        ?>
        































