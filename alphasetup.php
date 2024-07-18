<?php
include("config/configs.php");


if(isset($_POST['setupsave'])){

    $setup_partname = $_POST['setup_partname'];
    $setup_partnumber = $_POST['setup_partnumber'];
    $setup_description = $_POST['setup_description'];
    $setup_supplier = $_POST['setup_supplier'];
    $setup_regcode = $_POST['setup_regcode'];
    $setup_Price_PHP = $_POST['setup_Price_PHP'];
    $setup_Price_USD = $_POST['setup_Price_USD'];
    $setup_Safetystock = $_POST['setup_Safetystock'];
    $setup_location = $_POST['setup_location'];
    $setup_balance = $_POST['setup_balance'];
    $setup_remarks = $_POST['setup_remarks'];
   


   



    $db = new DatabaseConnection;
    $sql = "INSERT INTO tbl_setup(setup_partname,setup_partnumber,setup_description, setup_supplier,setup_regcode,setup_Price_PHP,setup_Price_USD,setup_Safetystock,setup_location,setup_balance,setup_remarks) VALUES 
                                            ('$setup_partname','$setup_partnumber','$setup_description','$setup_supplier','$setup_regcode','$setup_Price_PHP','$setup_Price_USD','$setup_Safetystock','$setup_location','$setup_balance','$setup_remarks')";

    if (mysqli_query($db->conn, $sql)) {
        
        header("Location: setups.php");

    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }      
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    
    mysqli_close($conn);
    

}


?>
