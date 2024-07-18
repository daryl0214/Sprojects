<?php
include("config/configs.php");

if(isset($_POST['addtran'])){

    $Setup_date = date('m/d/Y h:i:s', time());

    $sid = $_POST['id'];

    $setup_balance = $_POST['setup_balance'];
    #$setup_partnumber = $_POST['setup_partnumber'];
    $setup_fname = $_POST['Setup_fname'];
    $Setup_rcvdqty = $_POST['Setup_rcvdqty'];
    #$setup_ordernumber = $_POST['Setup_ordernumber'];
    
    
    $db = new DatabaseConnection;
    $setup_balance1 = $Setup_rcvdqty + $setup_balance;
    $db = new DatabaseConnection;
    $sql2121 = "UPDATE tbl_setup SET setup_balance = '$setup_balance1' WHERE id = '$sid' ";
    if (mysqli_query($db->conn,$sql2121)) {      
        echo '<script>window.location.href=document.referrer;</script>';  
        
    }  
    
      
    $sql21 = "INSERT INTO tbl_setuphistory(Setup_fname,Setup_date,Setup_rcvdqty,Setup_parno,Setup_ordernumber) VALUES ('$Setup_fname','$Setup_date','$Setup_rcvdqty','$Setup_parno','$Setup_ordernumber')";        
    if (mysqli_query($db->conn,$sql21)) {        
        header("Location: setups.php");
        exit();
    }
   else {
        echo "Error: " . $sql2121 . "<br>" . mysqli_error($conn);
    }     
    mysqli_close($conn);
}
    

    





?>
