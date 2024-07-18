<?php
include("config/configs.php");


if(isset($_POST['savethisshittoo'])){
    $acce_fmsmds = $_POST['FMSM'];
    $acce_partname = $_POST['acce_partname'];
    $acce_order_number= $_POST['acce_order_number'];
    $acce_partnumber = $_POST['acce_partnumber'];
    $acce_description = $_POST['acce_description'];
    $acce_supplier = $_POST['acce_supplier'];
    $acce_regcode = $_POST['acce_regcode'];
    $acce_Price_PHP = $_POST['acce_Price_PHP'];
    $acce_Price_USD = $_POST['acce_Price_USD'];
    $acce_Safetystock = $_POST['acce_Safetystock'];
    $acce_location = $_POST['acce_location'];
    $acce_balance = $_POST['acce_balance'];
    $acce_remarks = $_POST['acce_remarks'];
    $supplertype = $_POST['supplertype'];

    $acce_image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./image/" . $acce_image;
   



    $db = new DatabaseConnection;
    $sql = "INSERT INTO tbl_accessories(acce_image,supplertype, acce_partname,acce_partnumber,acce_description, acce_supplier,acce_regcode,acce_Price_PHP,acce_Price_USD,acce_Safetystock,acce_location,acce_balance,acce_remarks,acce_fmsmds, acce_order_number) VALUES 
                                            ('$acce_image','$supplertype','$acce_partname','$acce_partnumber','$acce_description','$acce_supplier','$acce_regcode','$acce_Price_PHP','$acce_Price_USD','$acce_Safetystock','$acce_location','$acce_balance','$acce_remarks','$acce_fmsmds','$acce_order_number')";

    if (mysqli_query($db->conn, $sql)) {
        
        header("Location: acce.php");

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
