<?php
include("config/configs.php");

if(isset($_POST['addtran'])){

    $acce_date = date('m/d/Y h:i:s', time());

    $sid = $_POST['id'];

    $acce_balance = $_POST['acce_balance'];
    $acce_parno = $_POST['acce_partnumber'];
    $acce_fname = $_POST['acce_fname'];
    $acce_rcvdqty = $_POST['acce_rcvdqty'];
    $acce_ordernumber = $_POST['acce_ordernumber'];
    
    $db = new DatabaseConnection;

    $acce_balance1 = $acce_balance + $acce_rcvdqty;
   
    $sql221 = "UPDATE tbl_accessories SET acce_balance = '$acce_balance1' WHERE id = '$sid' ";
    if (mysqli_query($db->conn,$sql221)) {        
        header("Location: acce.php");
        
        
    }
    $sql21 = "INSERT INTO tbl_dmoip(acce_fname,acce_date,acce_rcvdqty,acce_parno,acce_ordernumber) VALUES ('$acce_fname','$acce_date','$acce_rcvdqty','$acce_parno','$acce_ordernumber')";        
    if (mysqli_query($db->conn,$sql21)) {        
        header("Location: acce.php");
        exit();
    } else {
    echo "Error: " . $sql21 . "<br>" . mysqli_error($conn);
    }      
    mysqli_close($conn);

    

    
}   



?>
