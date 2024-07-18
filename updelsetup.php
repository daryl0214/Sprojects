<?php
include("config/configs.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletemototo"])) {
    // Ensure that the 'id' parameter is set in the POST request
    if(isset($_POST["id"])) {
        $id = $_POST["id"];
        $db = new DatabaseConnection;

        // Sanitize the input (you may need to use more advanced sanitization methods based on your requirements)
        $id = $db->conn->real_escape_string($id);

        // Interpolate the sanitized 'id' directly into the SQL query
        $sql = "DELETE FROM tbl_accessories WHERE id = '$id'";

        if ($db->conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $db->conn->error;
        }

        $db->conn->close();

        header("Location: acce.php");
        exit();
    } else {
        echo "ID not provided in the POST request.";
    }
} else {
    echo "Invalid request method or 'deletemoto' parameter not set.";
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatemototo"])) {
    if(isset($_POST['updatemototo'])){

        $Id = $_POST['id'];
        $supplertype = $_POST['supplertype'];
        $acce_partname = $_POST['acce_partname'];
        $acce_partnumber = $_POST['acce_partnumber'];
        $acce_description = $_POST['acce_description'];
        $acce_supplier = $_POST['acce_supplier'];
        $acce_regcode  = $_POST['acce_regcode'];
        $acce_Price_PHP  = $_POST['acce_Price_PHP'];
        $acce_Price_USD  = $_POST['acce_Price_USD'];
        $acce_Safetystock  = $_POST['acce_Safetystock'];
        $acce_location  = $_POST['acce_location'];
        $acce_balance  = $_POST['acce_balance'];
        $acce_remarks  = $_POST['acce_remarks'];
        
        $db = new DatabaseConnection;

        $sql3 = "UPDATE tbl_accessories SET 

        supplertype = '$supplertype',
        acce_partname = '$acce_partname',
        acce_partnumber = '$acce_partnumber',
        acce_description = '$acce_description',
        acce_supplier = '$acce_supplier',
        acce_regcode = '$acce_regcode',  
        acce_Price_PHP = '$acce_Price_PHP',
        acce_Price_USD = '$acce_Price_USD',
        acce_Safetystock = '$acce_Safetystock',
        acce_location = '$acce_location',  
        acce_balance = '$acce_balance',
        acce_remarks = '$acce_remarks'
        
        WHERE id = '$Id'";


        if (mysqli_query($db->conn,$sql3)) {        
            header("Location: acce.php");
            exit();
        } else {
            echo "Error: " . $sql3 . "<br>" . mysqli_error($db->conn);  // Updated variable name
        }      
        mysqli_close($db->conn);  // Updated variable name
    }
    
    
}

?>
