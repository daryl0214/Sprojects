<?php

include ('config/configs.php');
if (isset($_POST['submit'])){
    $m_number = $_POST ['m_number'];
    $m_name = $_POST ['m_name'];
    $section = $_POST ['section'];

    $db = new DatabaseConnection;
    
    $sql = "INSERT INTO  members (m_number, m_name, section) VALUES ('$m_number','$m_name', '$section')";
    if (mysqli_query($db->conn, $sql)) {
        echo "New record created successfully";
        header("Location: secmember.php");
        exit();
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }      
        mysqli_close($conn);


    }



?>