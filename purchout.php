<?php
include("config/configs.php");



if(isset($_POST['OUTSHIT'])){
    $nuvm = 1;


    $date = date('m/d/Y h:i:s', time());
    $id = $_POST['id'];

    $out_partnumber = $_POST['out_partnumber'];
    $out_compartnum = $_POST['out_compartnum'];
    $out_partname = $_POST['out_partname'];
    $out_RegCode = $_POST['out_RegCode'];
    $out_Supplier = $_POST['out_Supplier'];
    $out_by = $_POST['out_by'];
    $out_to = $_POST['out_to'];
    $out_cntrlnum = $_POST['out_cntrlnum'];
    $out_conv = $_POST['out_conv'];
    $out_Type = $_POST['out_Type'];
    $pas_Quantity_order = $_POST['balance'];
    
    

    $db = new DatabaseConnection;
    $pas_Quantity_order1 = --$pas_Quantity_order; 

    $checkQuery = "SELECT COUNT(*) AS count FROM tbl_in WHERE fld_cntrlnum = '$out_cntrlnum'";
    $checkResult = mysqli_query($db->conn, $checkQuery);

    if ($checkResult) {
        $row = mysqli_fetch_assoc($checkResult);
        $count = $row['count'];

        if ($count > 0) {
            $sql1 = "INSERT INTO tbl_out(out_status, out_date, out_partnumber, out_compartnum, out_partname, out_RegCode, out_Supplier, out_by, out_to, out_cntrlnum, out_conv, out_Type)
                    VALUES ('OUT', '$date', '$out_partnumber', '$out_compartnum', '$out_partname', '$out_RegCode', '$out_Supplier', '$out_by', '$out_to', '$out_cntrlnum', '$out_conv', '$out_Type')";

            $insertResult = mysqli_query($db->conn, $sql1);

            if ($insertResult) {
                // Insertion successful
                echo "<script>alert('Data inserted successfully.');</script>";
            } else {
                // Insertion failed
                echo "<script>alert('Error inserting data.');</script>";
            }

        } else {
            // out_cntrlnum doesn't exist, proceed with the insertion
            // out_cntrlnum already exists, show alert or take appropriate action
            echo "<script>alert('The out_cntrlnum already exists in the database.');</script>";
            
        }
    } else {
        // Error in the check query
        echo "<script>alert('Error checking the database.');</script>";
    }
        $sql2 = "UPDATE tbl_inventory_system  SET pas_Quantity_order =  $pas_Quantity_order1 WHERE id = '$id' ";

        if (mysqli_query($db->conn, $sql1)) {
            echo"<script>
            alert('SUCCESSFUL');
            windows.location.href='product.php';
            </script>";
    
        if (mysqli_query($db->conn,$sql2)) {
            
            header("Location: product.php");
            exit();

        } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
        }      
        mysqli_close($conn);





    $sql = "SELECT * FROM tbl_in WHERE out_RegCode= $out_RegCode ";
    $result = $this->conn->query($sql);
		if($result->num_rows > 0){
            echo $result;
			return $result;
		}
		else{
			return false;
		}
		
	}
}

    




?>