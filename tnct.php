<?php
include("config/configs.php");
// Check if the button is clicked
if(isset($_POST['trankeyt'])) {
    // Perform the truncation operation

    // SQL query to truncate the table
    $sql = "TRUNCATE TABLE tbl_dmoip";

    // Execute the query
    if(mysqli_query($db->conn, $sql)) {
        echo "Table truncated successfully";
    } else {
        echo "Error truncating table: " . mysqli_error($conn);
    }

    // Close the database connection
    $db->conn->close();
}
?>