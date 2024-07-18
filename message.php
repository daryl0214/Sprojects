<?php
// Instead of include("config/configs.php");
include_once("config/configs.php");


if(isset($_POST['updatethisshit'])){

    $id = $_POST['id'];

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
    $pas_orderNum = $_POST['pas_orderNum'];
    $pas_Quantity_order = $_POST['pas_Quantity_order'];
    $pas_remarks = $_POST['pas_remarks'];
    $pas_harness_code = $_POST['pas_harness_code'];




    $db = new DatabaseConnection;

    $sql2 = "UPDATE tbl_inventory_system SET 
    pas_partNum = '$pas_partNum',
    pas_compartnum = '$pas_compartnum',
    pas_partName = '$pas_partName',
    pas_RevLvl = '$pas_RevLvl',
    pas_supplier = '$pas_supplier',
    pas_unitprice = '$pas_unitprice',  -- Added missing equal sign here
    pas_carmodel = '$pas_carmodel',
    pas_clrsticker = '$pas_clrsticker',
    pas_standardstock = '$pas_standardstock',
    pas_safetystock = '$pas_safetystock',  -- Fixed typo in variable name
    pas_RegCode = '$pas_RegCode',
    pas_location = '$pas_location',
    pas_orderNum = '$pas_orderNum',
    pas_Quantity_order = '$pas_Quantity_order',
    pas_remarks = '$pas_remarks',
    pas_harness_code = '$pas_harness_code'
    WHERE id = '$id'";


    if (mysqli_query($db->conn,$sql2)) {        
        header("Location: product.php");
        exit();
    } else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }      
    mysqli_close($conn);

        



}

?>

