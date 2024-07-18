<?php

include ('config/configs.php');
if (isset($_POST['submit'])){
    $acc_empnum = $_POST ['acc_empnum'];
    $acc_empname = $_POST ['acc_empname'];
    $acc_password = $_POST ['acc_password'];

    $db = new DatabaseConnection;
    
    $sql = "INSERT INTO accounts (acc_empnum, acc_empname, acc_password) VALUES ('$acc_empnum','$acc_empname', '$acc_password')";
    if (mysqli_query($db->conn, $sql)) {
        echo "New record created successfully";
        header("Location: index.php");
        exit();
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }      
        mysqli_close($conn);


    }



?>