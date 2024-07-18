<?php
include("config/configs.php");


if(isset($_POST['savethisshit'])){


    $pas_partNum = $_POST['pas_partNum'];
    $pas_compartnum = $_POST['pas_compartnum'];
    $pas_partName = $_POST['pas_partName'];
    $pas_RevLvl = $_POST['pas_RevLvl'];
    $pas_supplier = $_POST['pas_supplier'];
    $pas_unitprice = $_POST['pas_unitprice'];
    $pas_carmodel = $_POST['pas_carmodel'];
    $pas_clrsticker = $_POST['pas_clrsticker'];
    $pas_standardstock = $_POST['pas_standardstock'];
    $pas_safetystock = $_POST['pas_safetystock'];
    $pas_RegCode = $_POST['pas_RegCode'];
    $pas_location = $_POST['pas_location'];
    // $pas_orderNum = $_POST['pas_orderNum'];
    // $pas_Quantity_order = $_POST['pas_Quantity_order'];
    $pas_remarks = $_POST['pas_remarks'];
    $pas_harness_code = $_POST['pas_harness_code'];
    $pas_type = $_POST['pas_type'];
    $Sampleconn = $_POST['Sampleconn'];
    $pas_moving = $_POST['pas_moving'];
    $Sampleconn= $_POST['Sampleconn'];

    
    $db = new DatabaseConnection;
    $pas_safetystock1 = $pas_standardstock - 1;


    $sql = "INSERT INTO tbl_inventory_system(Sampleconn,pas_type, pas_partNum, pas_compartnum,pas_partName,pas_RevLvl,pas_supplier,pas_unitprice,pas_carmodel,pas_clrsticker,pas_standardstock,pas_safetystock,pas_RegCode,pas_location,pas_remarks,pas_harness_code,pas_moving) VALUES 
                                            ('$Sampleconn','$pas_type','$pas_partNum', '$pas_compartnum','$pas_partName','$pas_RevLvl','$pas_supplier','$pas_unitprice','$pas_carmodel','$pas_clrsticker','$pas_standardstock','$pas_safetystock1','$pas_RegCode','$pas_location','$pas_remarks','$pas_harness_code','$pas_moving')";

    if (mysqli_query($db->conn, $sql)) {
        
        header("Location: product.php");
        exit();
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }      
    mysqli_close($conn);

  

}


?>
