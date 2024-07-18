<?php
include("config/configs.php");
date_default_timezone_set('Asia/Manila');


if(isset($_POST['addBrand'])){

    $acce_date = date('m/d/Y h:i:s', time());

    $id = $_POST['id'];
 
    $acce_sec = $_POST['acce_sec'];
    $acce_fname = $_POST['acce_fname'];
    $acce_convno = $_POST['acce_convno'];
    $acce_carcode = $_POST['acce_carcode'];
    $acce_supps = $_POST['acce_supps'];
   

    $acce_pname = $_POST['acce_partname'];
    $acce_parno = $_POST['acce_partnumber'];
    $acce_regcode = $_POST['acce_regcode'];


    $acce_balance = $_POST['acce_balance'];
    $acce_qntyreq = $_POST['acce_qntyreq'];
    

    $db = new DatabaseConnection;
    $acce_balance1 = $acce_balance - $acce_qntyreq;

    $sql22 = "UPDATE tbl_accessories SET acce_balance = $acce_balance1 WHERE id = '$id' ";
    if (mysqli_query($db->conn,$sql22)) {        
        header("Location: test.php");
        
    }
    

    $sql1 = "INSERT INTO tbl_dmoip(acce_pname,acce_parno,acce_sec,acce_fname,acce_convno,acce_carcode,acce_regcode,acce_date,acce_qntyreq,acce_supps) VALUES
    ('$acce_pname','$acce_parno','$acce_sec','$acce_fname','$acce_convno','$acce_carcode','$acce_regcode','$acce_date','$acce_qntyreq','$acce_supps')";

            
    if (mysqli_query($db->conn,$sql1)) {        
        header("Location: test.php");
        exit();
    } else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);
    }      
    mysqli_close($conn);

    

    
}   



?>
