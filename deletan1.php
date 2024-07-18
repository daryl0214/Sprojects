<?php
include("config/configs.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletemoto"])) {
    // Ensure that the 'id' parameter is set in the POST request
    if(isset($_POST["id"])) {
        $id = $_POST["id"];
        $db = new DatabaseConnection;

        // Sanitize the input (you may need to use more advanced sanitization methods based on your requirements)
        $id = $db->conn->real_escape_string($id);

        // Interpolate the sanitized 'id' directly into the SQL query
        $sql = "DELETE FROM tbl_in WHERE id = '$id'";

        if ($db->conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $db->conn->error;
        }

        $db->conn->close();

        header("Location: product.php");
        exit();
    } else {
        echo "ID not provided in the POST request.";
    }
} else {
    echo "Invalid request method or 'deletemoto' parameter not set.";
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatemoto"])) {
	if(isset($_POST['updatemoto'])){

		$Id = $_POST['id'];
        $fld_cntrlnum = $_POST['fld_cntrlnum'];
        $fld_status = $_POST['fld_status'];
        $fld_by = $_POST['fld_by'];
        $fld_to = $_POST['fld_to'];
        $fld_conv  = $_POST['fld_conv'];
        $fld_qunatityin  = $_POST['fld_qunatityin'];
        $fld_ornum  = $_POST['fld_ornum'];
        $fld_remarks  = $_POST['fld_remarks'];
        $fld_revlvl  = $_POST['fld_revlvl'];
       
        
		$db = new DatabaseConnection;

		$sql3 = "UPDATE tbl_in SET 


		fld_cntrlnum = '$fld_cntrlnum',
		fld_status = '$fld_status',
		fld_by = '$fld_by',
		fld_to = '$fld_to',
		fld_conv = '$fld_conv',  -- Added missing equal sign here
		fld_qunatityin = '$fld_qunatityin',
		fld_ornum = '$fld_ornum',
		fld_remarks = '$fld_remarks',
		fld_revlvl = '$fld_revlvl'  -- Fixed typo in variable name
		
		WHERE id = '$Id'";


		if (mysqli_query($db->conn,$sql3)) {        
			header("Location: product.php");
			exit();
		} else {
		echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);
		}      
		mysqli_close($conn);
	}
    
}

?>
