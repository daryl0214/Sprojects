<?php
session_start();
include "configs.php";


if(isset($_POST['acc_empnum']) && isset($_POST['acc_password'])) {

    function validate($data){
        $data =trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $acc_empnum = validate($_POST['acc_empnum']);
    $acc_password= validate($_POST['acc_password']);

    if(empty($acc_empnum)){
        
        header('Location: login.php?error=ID is required ang kulet');
        exit();
        echo"invalid";
    }
    else if(empty($acc_password)){
        header('Location: login.php?error=Password is required ang kulet');
        exit();
    }
    else{

        $sql = "SELECT * FROM accounts WHERE acc_empnum ='$acc_empnum'AND acc_password = '$acc_password'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)=== 1){
            $row=mysqli_fetch_assoc($result);
            if($row['acc_empnum'] === $acc_empnum && $row['acc_password'] === $acc_password){
                $SESSION['acc_empnum'] = $row['acc_empnum'];
                $SESSION['acc_password'] = $row['acc_password'];
                // $SESSION['ID'] = $row['ID'];
                header("Location: index.php");
                exit();
            }
        else{
            header('Location: login.php?error = Password is required ang kulet');
            exit();
        }

}
}
}




 