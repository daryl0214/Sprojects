
<?php 

include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$db = new DatabaseConnection;

?>
                                        

<div class="row"><div class="col-sm-9 table"> 
<form action="action.php" method="post">                                     
<table id="orderLists" class="table table-bordered table-striped">
    
    
   

        <thead><tr>                                    
            <div class="form-group">
                 <th>DATE </th>
                 <th>CONTROL NUMBER </th>
                 <th>IN / OUT  </th>
                 <!-- <th>NEW</th>
                 <th>REPAIRED</th> -->
                 <th>BY </th>
                 <th>TO </th>
                 <th>CONVEYOR </th>
                 <th>ORDER NUMBER </th>
                 <th>QUANTITY </th>
                 <th>REMARKS </th>
                 <th>STATUS </th>
                 <th>REVISION LEVEL </th>
                 
                 <th>ACTION</th>
                 
                
        </thead>
        <tbody>
        <?php 
        
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
        
            // Query for tbl_in
            $query_in = "SELECT * FROM tbl_in WHERE fld_regCode LIKE '{$input}%'";
            $result_in = mysqli_query($db->conn, $query_in);
        
            if (mysqli_num_rows($result_in) > 0) {
                while ($row = mysqli_fetch_assoc($result_in)) {
                    $fld_date = $row['fld_date'];
                    $fld_cntrlnum = $row['fld_cntrlnum'];
                    $fld_status = $row['fld_status'];
                    
                    $fld_by = $row['fld_by'];
                    $fld_to = $row['fld_to'];
                    $fld_conv  = $row['fld_conv'];
                    $fld_qunatityin  = $row['fld_qunatityin'];
                    $fld_ornum  = $row['fld_ornum'];
                    $fld_remarks  = $row['fld_remarks'];
                    $fld_repairnew  = $row['fld_repairnew'];
                    $fld_revlvl  = $row['fld_revlvl'];
                    ?>
                    
                        <tr>
                            <td><?php echo $fld_date; ?></td>
                            <td><?php echo $fld_cntrlnum; ?></td>
                            <td><?php echo $fld_status; ?></td>
                            <td><?php echo $fld_by; ?></td>
                            <td><?php echo $fld_to; ?></td>
                            <td><?php echo $fld_conv; ?></td>
                            <td><?php echo $fld_ornum; ?></td>
                            <td><?php echo $fld_qunatityin; ?></td>
                            <td><?php echo $fld_remarks; ?></td>
                            <td><?php echo $fld_repairnew; ?></td>

                            <td><?php echo $fld_revlvl; ?></td>
                            
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
        































