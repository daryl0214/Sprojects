<?php
include("config/configs.php");
include_once("inc/inv.php");

if (isset($_POST['acc_password'])) {
    // Function to sanitize input
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Validate input
    $acc_password = validate($_POST['acc_password']);

    // Database connection
    $db = new DatabaseConnection;

    // Check if the connection is established
    if (!$db->conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL query
    $sql = "SELECT * FROM accounts WHERE acc_password = '$acc_password'";

    // Execute query
    $result = mysqli_query($db->conn, $sql);

    // Check if query execution was successful
    if (!$result) {
        die("Query failed: " . mysqli_error($db->conn));
    }

    // Fetch user data
    $row = mysqli_fetch_assoc($result);

    // Check if a user with the provided password exists
    if (!$row) {
        die("<script>window.location.href = 'index.php';</script>");
      
    }

    // Redirect based on user type
    if ($row['usertype'] == "admin") {
        header("Location: overview.php");
        exit();
    } elseif ($row['usertype'] == "user") {
        header("Location: product.php");
        exit();
    } else {
        die("Unknown user type.");
        exit();
    }
}

        

     


   
    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>

<body>

    <!-- Your login form goes here -->

</body>

</html>




