
<?php 

include('config/configs.php');
require_once __DIR__."/inc/inv.php";
$db = new DatabaseConnection;

?>
                                        

<div class="row"><div class="col-sm-9 table"> 

<table id="orderLists" class="table table-bordered table-striped">
    
    
   

        <thead><tr>                                    
            <div class="form-group">

                 <th>CONTROL NUMBER </th>
                 <th>ORDER NUMBER </th>
                 <th>ENTRY BY </th>
                 <th>STATUS</th>
                

                
        </thead>
        <tbody>
        <form action="deletanac.php" method="POST">
        <?php 
        
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
        
            // Query for tbl_in
            $query_in = "SELECT * FROM tbl_availablechecker WHERE ac_regcode LIKE '{$input}%'";
            $result_in = mysqli_query($db->conn, $query_in);
        
            if (mysqli_num_rows($result_in) > 0) {
                while ($row = mysqli_fetch_assoc($result_in)) {
                    // $ac_regcode= $row=['ac_regcode'];
                   
                    $ac_controlnum = $row['ac_controlnum'];
                    
                    $ac_ornum = $row['ac_ornum'];
                    $ac_inby = $row['ac_inby'];
                    $ac_repairnew = $row['ac_repairnew'];

   
                    ?>
                    
                        <tr>
                            <td><?php echo $ac_controlnum; ?></td>
   
                            <td><?php echo $ac_ornum; ?></td>
              
                            <td><?php echo $ac_inby; ?></td>
                            <td><?php echo $ac_repairnew; ?></td>
                        

                            
                            <td>
                           
                        </form>
                        <div class="form-group">
                        <!-- <button type="submit"  name="deletemoto" id="deletemoto" class="btn btn-danger">DELETE </button> -->
                        </td>
                        </tr>
                    <?php
                }

            }
            
            
        }
        ?>
        































