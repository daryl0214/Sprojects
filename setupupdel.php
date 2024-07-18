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
        $sql = "DELETE FROM tbl_setup WHERE id = '$id'";

        if ($db->conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $db->conn->error;
        }

        $db->conn->close();

        header("Location: setups.php");
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
        $setup_partname = $_POST['setup_partname'];
        $setup_partnumber = $_POST['setup_partnumber'];
        $setup_description = $_POST['setup_description'];
        $setup_supplier = $_POST['setup_supplier'];
        $setup_regcode  = $_POST['setup_regcode'];
        $setup_Price_PHP  = $_POST['setup_Price_PHP'];
        $setup_Price_USD  = $_POST['setup_Price_USD'];
        $setup_Safetystock  = $_POST['setup_Safetystock'];
        $setup_location  = $_POST['setup_location'];
        $setup_balance  = $_POST['setup_balance'];
        $setup_remarks  = $_POST['setup_remarks'];
        $setup_drawing = $_POST['setup_drawing'];
         
        $db = new DatabaseConnection;

        $sql3 = "UPDATE tbl_setup SET 

        setup_partname = '$setup_partname',
        setup_partnumber = '$setup_partnumber',
        setup_description = '$setup_description',
        setup_supplier = '$setup_supplier',
        setup_regcode = '$setup_regcode',  
        setup_Price_PHP = '$setup_Price_PHP',
        setup_Price_USD = '$setup_Price_USD',
        setup_Safetystock = '$setup_Safetystock',
        setup_location = '$setup_location',  
        setup_balance = '$setup_balance',
        setup_remarks = '$setup_remarks',
        setup_drawing = '$setup_drawing'
        
        WHERE id = '$Id'";


        if (mysqli_query($db->conn,$sql3)) {        
            header("Location: setups.php");
            exit();
        } else {
            echo "Error: " . $sql3 . "<br>" . mysqli_error($db->conn);  // Updated variable name
        }      
        mysqli_close($db->conn);  // Updated variable name
    }
    
    
}

?>
