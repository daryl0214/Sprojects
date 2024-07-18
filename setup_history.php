
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
         
                 
                
        </thead>
        <tbody>
        <?php 
        
        if (isset($_POST['input'])) {
            $input = $_POST['input'];
        
            // Query for tbl_in
            $query_in = "SELECT * FROM tbl_setuphistory WHERE setup_parno LIKE '{$input}%'";
            $result_in = mysqli_query($db->conn, $query_in);
        
            if (mysqli_num_rows($result_in) > 0) {
                while ($row = mysqli_fetch_assoc($result_in)) {
                    $Setup_date = $row['Setup_date'];
                    $Setup_fname = $row['Setup_fname'];

                    $Setup_parno = $row['Setup_parno'];
                  

                    $Setup_ordernumber = $row['Setup_ordernumber'];
                    $Setup_qntyreq  = $row['Setup_qntyreq'];
                    $Setup_convo  = $row['Setup_convo'];
                    $Setup_carcode  = $row['Setup_carcode'];
                    $Setup_rcvdqty  = $row['Setup_rcvdqty'];
                  
                    ?>
                    
                        <tr>
                            <td><?php echo $Setup_date; ?></td>
                            <td><?php echo $Setup_fname; ?></td>
 
                            <td><?php echo $Setup_parno; ?></td>
        

                            <td><?php echo $Setup_qntyreq; ?></td>
                            <td><?php echo $Setup_rcvdqty; ?></td>
                            <td><?php echo $Setup_convo; ?></td>    
                            <td><?php echo $Setup_carcode; ?></td>
                            <td><?php echo $Setup_ordernumber; ?></td>

                            
                            <td>
                            <!-- <div class="form-group">
                            <a type="button" name="update" href ="#.php?id=<?= $row['ID'] ?>"  class="btn btn-primary btn-sm rounded-0  update" title="Update"><i class="fa fa-edit"></i></a>
                            </div> -->
                        </form>
                        </td>
                        </tr>
                    <?php
                }

            }
            
            
        }
        ?>
        































