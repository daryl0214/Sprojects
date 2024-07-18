<?php
include("config/configs.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deletemoto"])) {
    // Ensure that the 'id' parameter is set in the POST request
    if(isset($_POST["ID"])) {
        $id = $_POST["ID"];
        $db = new DatabaseConnection;

        // Sanitize the input (you may need to use more advanced sanitization methods based on your requirements)
        $id = $db->conn->real_escape_string($id);

        // Interpolate the sanitized 'id' directly into the SQL query
        $sql = "DELETE FROM tbl_availablechecker WHERE id = '$id'";

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

?>
