
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
                 <th>FULL NAME</th>
                 <th>PART NUMBER </th>
             

                 <th>ISSUED QTY </th>
                 <th>RECEIVED QTY </th>
                 <th>CONVEYOR NO. </th>
                 <th>CAR CODE</th>
                 <th>QUANTITY & <br> ORDER NO. </th> 
                 
                 <th>ACTION</th>
                 
                
        </thead>
        <tbody>
        <?php 
        
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
        
            // Query for tbl_in
            $query_in = "SELECT * FROM tbl_dmoip WHERE acce_parno LIKE '{$input}%'";
            $result_in = mysqli_query($db->conn, $query_in);
        
            if (mysqli_num_rows($result_in) > 0) {
                while ($row = mysqli_fetch_assoc($result_in)) {
                    $acce_date = $row['acce_date'];
                    $acce_fname = $row['acce_fname'];

                    $acce_parno = $row['acce_parno'];
                  

                    $acce_ordernumber = $row['acce_ordernumber'];
                    $acce_qntyreq  = $row['acce_qntyreq'];
                    $acce_convno  = $row['acce_convno'];
                    $acce_carcode  = $row['acce_carcode'];
                    $acce_rcvdqty  = $row['acce_rcvdqty'];
                  
                    ?>
                    
                        <tr>
                            <td><?php echo $acce_date; ?></td>
                            <td><?php echo $acce_fname; ?></td>
 
                            <td><?php echo $acce_parno; ?></td>
        

                            <td><?php echo $acce_qntyreq; ?></td>
                            <td><?php echo $acce_rcvdqty; ?></td>
                            <td><?php echo $acce_convno; ?></td>    
                            <td><?php echo $acce_carcode; ?></td>
                            <td><?php echo $acce_ordernumber; ?></td>

                            
                            <td>
                            <div class="form-group">
                            <a type="button" name="update" href ="#.php?id=<?= $row['ID'] ?>"  class="btn btn-primary btn-sm rounded-0  update" title="Update"><i class="fa fa-edit"></i></a>
                            </div>
                        </form>
                        </td>
                        </tr>
                    <?php
                }

            }
            
            
        }
        ?>
        































