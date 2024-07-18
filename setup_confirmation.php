<?php
include("config/configs.php");

if(isset($_POST['aaddBrand'])){

    $Setup_date = date('m/d/Y h:i:s', time());

    $sid = $_POST['id'];

    $Setup_balance = $_POST['Setup_balance'];
    $Setup_parno = $_POST['Setup_partnumber'];
    $Setup_fname = $_POST['Setup_fname'];

    $Setup_ordernumber = $_POST['Setup_ordernumber'];
    $Setup_sec = $_POST['Setup_sec'];
    $Setup_qntyreq= $_POST['Setup_qntyreq'];
    
    $db = new DatabaseConnection;

    $setup_balance1 = $Setup_balance - $Setup_qntyreq;
   
    $sql221 = "UPDATE tbl_setup SET setup_balance = $setup_balance1 WHERE id = '$sid' ";
    if (mysqli_query($db->conn,$sql221)) {        
        header("Location: setups.php");

    
    $sql21 = "INSERT INTO tbl_setuphistory(Setup_fname,Setup_date,Setup_parno,Setup_ordernumber,Setup_sec,Setup_qntyreq) VALUES ('$Setup_fname','$Setup_date','$Setup_parno','$Setup_ordernumber','$Setup_sec','$Setup_qntyreq')";        
    if (mysqli_query($db->conn,$sql21)) {        
        header("Location: setups.php");
        exit();
    } else {
    echo "Error: " . $sql21 . "<br>" . mysqli_error($conn);
    }      
    mysqli_close($conn);
    }
    

    
}   



?>
