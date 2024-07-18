<?php
include("config/configs.php");



if(isset($_POST['INTHISSHIT'])){
    


    $date = date('m/d/Y h:i:s', time());
    $id = $_POST['id'];

    $pas_safetystock = $_POST['pas_safetystock'];
    $pas_standardstock = $_POST['pas_standardstock'];
    $Checker_Status = $_POST['Checker_Status'];

    $fld_partnumber = $_POST['fld_partnumber'];
    $fld_compartnum = $_POST['fld_compartnum'];
    $fld_partname = $_POST['fld_partname'];
    $fld_RegCode = $_POST['fld_RegCode'];
    $fld_Supplier = $_POST['fld_Supplier'];
    $fld_by = $_POST['fld_by'];
    $fld_to = $_POST['fld_to'];
    $fld_cntrlnum = $_POST['fld_cntrlnum'];
    $fld_conv = $_POST['fld_conv'];
    $fld_Type = $_POST['fld_Type'];
    $fld_ornum = $_POST['fld_ornum'];
    $fld_remarks = $_POST['fld_remarks'];
    $fld_qunatityin = $_POST['fld_qunatityin'];
    $pas_Quantity_order = $_POST['balance'];  
    $pas_total_in = $_POST['pas_total_IN'];
    $fld_revlvl = $_POST['fld_revlvl'];
    $pas_total_order= $_POST['pas_total_order'];
    $pas_total_out = $_POST['pas_total_out'];
    
    $order_monitor = $_POST['order_monitor'];
    $ordered = $_POST['ordered'];
    $recommend =  $_POST['recommend'];
    
    
    
    $db = new DatabaseConnection;
    $pas_total_in1 = ++$pas_total_in;

    $ordered1 = $fld_qunatityin + $ordered;
    $pas_Quantity_order1 = ++$pas_Quantity_order; 

    $Checker_Status1 = $Checker_Status; 
    $pas_total_order1 = $pas_standardstock - $pas_total_in + $pas_total_out - $ordered;
    //--------------------------------------------------//



    //--------------------------------------------------//
    $sql69 = "UPDATE tbl_inventory_system SET ";

    if ($pas_total_order == '0') {
        $sql69 .= "order_monitor = 'MONITOR'";
    } elseif ($pas_total_order > '0') {
        $sql69 .= "order_monitor = 'ORDER'";
    } elseif ($pas_total_order < '0') {
        $sql69 .= "order_monitor = 'MONITOR'";

    } 
    $sql69 .= " WHERE id = '$id'";
    if ($db->conn->query($sql69) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->conn->error;
    }
    // $db->conn->close();
    //------------------------------------------------------//

    $sq = "UPDATE tbl_inventory_system SET ";

    if ($pas_Quantity_order > $pas_standardstock) {
        $sq .= "recommend = 'MONITOR'";
    } elseif ($pas_Quantity_order < $pas_standardstock) {
        $sq .= "recommend = 'ORDER BY AIR'";

    } elseif ($pas_Quantity_order == $pas_standardstock) {
        $sq .= "recommend = 'MONITOR'";

    } elseif ($pas_Quantity_order == $pas_safetystock) {
        $sq .= "recommend = 'ORDER BY BOAT'";

    } 
    
    // Add your condition to update the specific row, for example:
    $sq .= " WHERE id = '$id'";
    
    if ($db->conn->query($sq) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->conn->error;
    }

   
    $db = new DatabaseConnection;
    $sql1 = "INSERT INTO tbl_in(fld_revlvl,fld_ornum,fld_remarks,fld_status,fld_date,fld_partnumber,fld_compartnum,fld_partname, fld_RegCode, fld_Supplier, fld_by ,fld_to ,fld_cntrlnum ,fld_conv, fld_Type,fld_qunatityin)  VALUES
     ('$fld_revlvl','$fld_ornum', '$fld_remarks', 'IN','$date ','$fld_partnumber','$fld_compartnum','$fld_partname', '$fld_RegCode', '$fld_Supplier', '$fld_by' ,'$fld_to' ,'$fld_cntrlnum' ,'$fld_conv', '$fld_Type','$fld_qunatityin')";

    $sql = "UPDATE tbl_inventory_system SET ";

    if ($pas_Quantity_order == '0') {
        $sql .= "Checker_Status = 'CRITICAL STOCK'";

    } elseif ($pas_Quantity_order > $pas_standardstock) {
        $sql .= "Checker_Status = 'OVERSTOCK'";

        $labelStyle = 'style="color: BLUE;"';
    } elseif ($pas_Quantity_order == $pas_safetystock) {
        $sql .= "Checker_Status = ' SAFETY STOCK'";

    } elseif ($pas_Quantity_order == $pas_standardstock) {
        $sql .= "Checker_Status = 'WITHIN STANDARD STOCK'";

    } elseif ($pas_Quantity_order < $pas_standardstock) {
        $sql .= "Checker_Status = 'BELOW SAFETY STOCK'";

    } 

    // Add your condition to update the specific row, for example:
    $sql .= " WHERE id = '$id'";

    if ($db->conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->conn->error;
    }

    

    $sql2 = "UPDATE tbl_inventory_system 
    SET 
        pas_Quantity_order = $pas_Quantity_order1, 
        ordered = $ordered1,
        pas_total_order = $pas_total_order1,
        pas_total_in = $pas_total_in1 
        
    WHERE id = '$id'";

    if (mysqli_query($db->conn, $sql1)) {
        echo '<script>window.location.href=document.referrer;</script>';  
        
        
               
    if (mysqli_query($db->conn,$sql2)) {        
        echo '<script>window.location.href=document.referrer;</script>';         
        
    } else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }     
    $db->conn->close();
    }
    


      
} 

    



if(isset($_POST['OUTSHIT'])){
    
    $nuvmS = 1;


    $date = date('m/d/Y h:i:s', time());
    $idS = $_POST['id'];

    $pas_safetystock1 = $_POST['pas_safetystock'];
    $pas_standardstock1 = $_POST['pas_standardstock'];
    $Checker_Status1 = $_POST['Checker_Status'];

    $fld_partnumber = $_POST['fld_partnumber'];
    $fld_compartnum = $_POST['fld_compartnum'];
    $fld_partname = $_POST['fld_partname'];
    $fld_RegCode = $_POST['fld_RegCode'];
    $fld_Supplier = $_POST['fld_Supplier'];
    $fld_by = $_POST['fld_by'];
    $fld_to = $_POST['fld_to'];
    $fld_cntrlnum = $_POST['fld_cntrlnum'];
    $fld_conv = $_POST['fld_conv'];
    $fld_Type = $_POST['fld_Type'];
    $pas_Quantity_order1 = $_POST['balance'];  
    $pas_total_in = $_POST['pas_total_IN'];
    $pas_total_out = $_POST['pas_total_out'];
    $pas_total_order= $_POST['pas_total_order'];
    $order_monitor = $_POST['order_monitor'];
    $recommend1 =  $_POST['recommend'];
    $fld_carcode = $_POST['fld_carcode'];
    $ordered = $_POST['ordered'];
   
    
    $db = new DatabaseConnection; 
    $pas_total_out1 = ++$pas_total_out;
    $pas_Quantity_order1S = --$pas_Quantity_order1; 
    $pas_total_order1 = $pas_standardstock1 - $pas_total_in + $pas_total_out - $ordered;

    $db = new DatabaseConnection;
    $sql1S = "INSERT INTO tbl_in(fld_status,fld_date,fld_partnumber,fld_compartnum,fld_partname, fld_RegCode, fld_Supplier, fld_by ,fld_to ,fld_cntrlnum ,fld_conv, fld_Type)  VALUES
    ('OUT','$date ','$fld_partnumber','$fld_compartnum','$fld_partname', '$fld_RegCode', '$fld_Supplier', '$fld_by' ,'$fld_to' ,'$fld_cntrlnum' ,'$fld_conv', '$fld_Type')";

    $sqlaS = "INSERT INTO tbl_dmoip(acce_date,acce_fname,acce_pname,acce_parno,acce_regcode, acce_sec, acce_qntyreq, acce_convno,acce_carcode)  VALUES
    ('$date ','$fld_to','$fld_partname','$fld_partnumber', '$fld_RegCode', 'PREVENTIVE', '1' ,'$fld_conv','$fld_carcode')";




    $sql1s12 = "UPDATE tbl_inventory_system SET ";

    if ($pas_Quantity_order1S == '0') {
        $sql1s12 .= "Checker_Status = 'CRITICAL STOCK'";

    } elseif ($pas_Quantity_order1S > $pas_standardstock1) {
        $sql1s12 .= "Checker_Status = 'OVERSTOCK'";

        $labelStyle = 'style="color: BLUE;"';
    } elseif ($pas_Quantity_order1S == $pas_safetystock1) {
        $sql1s12 .= "Checker_Status = ' SAFETY STOCK'";

    } elseif ($pas_Quantity_order1S == $pas_standardstock1) {
        $sql1s12 .= "Checker_Status = 'WITHIN STANDARD STOCK'";

    } elseif ($pas_Quantity_order1S < $pas_standardstock1) {
        $sql1s12 .= "Checker_Status = 'BELOW SAFETY STOCK'";
    }

    $sql1s12 .= " WHERE id = '$idS'";

    if ($db->conn->query($sql1s12) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->conn->error;
    }

    
    $sql691 = "UPDATE tbl_inventory_system SET ";

    if ($pas_total_order == '0') {
        $sql691 .= "order_monitor = 'MONITOR'";
    } elseif ($pas_total_order > '0') {
        $sql691 .= "order_monitor = 'ORDER'";
    } elseif ($pas_total_order < '0') {
        $sql691 .= "order_monitor = 'MONITOR'";

    } 
    $sql691 .= " WHERE id = '$idS'";
    if ($db->conn->query($sql691) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->conn->error;
    }
     //$db->conn->close();
     //------------------------------------------------------------//

     
    $s = "UPDATE tbl_inventory_system SET ";

    if ($pas_Quantity_order1 > $pas_standardstock1) {
        $s .= "recommend = 'MONITOR'";
    } elseif ($pas_Quantity_order1 < $pas_standardstock1) {
        $s .= "recommend = 'ORDER BY AIR'";

    } elseif ($pas_Quantity_order1 == $pas_standardstock1) {
        $s .= "recommend = 'MONITOR'";

    } elseif ($pas_Quantity_order1 == $pas_safetystock1) {
        $s .= "recommend = 'ORDER BY BOAT'";

    } 
    
    // Add your condition to update the specific row, for example:
    $s .= " WHERE id = '$idS'";
    
    if ($db->conn->query($s) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $db->conn->error;
    }


    $sql2S1 = "UPDATE tbl_inventory_system 
    SET 
        pas_Quantity_order = $pas_Quantity_order1S, 
        pas_total_order = $pas_total_order1,
        pas_total_out = $pas_total_out1

    WHERE id = '$idS'";

    if (mysqli_query($db->conn, $sqlaS)) {
        echo '<script>window.location.href=document.referrer;</script>';  
    if (mysqli_query($db->conn, $sql1S)) {
        echo '<script>window.location.href=document.referrer;</script>';  
 
    if (mysqli_query($db->conn,$sql2S1)) {
        
        echo '<script>window.location.href=document.referrer;</script>';  
        exit();

    } else {
    echo "Error: " . $sql2S1 . "<br>" . mysqli_error($conn);
    }         
    $db->conn->close();
    }

    }


}

    


if(isset($_POST['INSERTONLY'])){
    


    $date = date('m/d/Y h:i:s', time());
    $id = $_POST['id'];

    $pas_safetystock = $_POST['pas_safetystock'];
    $pas_standardstock = $_POST['pas_standardstock'];
    $Checker_Status = $_POST['Checker_Status'];

    $fld_partnumber = $_POST['fld_partnumber'];
    $fld_compartnum = $_POST['fld_compartnum'];
    $fld_partname = $_POST['fld_partname'];
    $fld_RegCode = $_POST['fld_RegCode'];
    $fld_Supplier = $_POST['fld_Supplier'];
    $fld_by = $_POST['fld_by'];
    $fld_to = $_POST['fld_to'];
    $fld_cntrlnum = $_POST['fld_cntrlnum'];
    $fld_conv = $_POST['fld_conv'];
    $fld_Type = $_POST['fld_Type'];
    $fld_ornum = $_POST['fld_ornum'];
    $fld_remarks = $_POST['fld_remarks'];
    $fld_qunatityin = $_POST['fld_qunatityin'];
    $pas_Quantity_order = $_POST['balance'];  
    $pas_total_in = $_POST['pas_total_IN'];
    $fld_revlvl = $_POST['fld_revlvl'];
    $pas_total_order= $_POST['pas_total_order'];
    $pas_total_out = $_POST['pas_total_out'];
    
    $order_monitor = $_POST['order_monitor'];
    $ordered = $_POST['ordered'];
    $recommend =  $_POST['recommend'];
    
    
    $db = new DatabaseConnection;
   

    $ordered1s = $fld_qunatityin + $ordered;

 
    $pas_total_order1s = $pas_standardstock - $pas_total_in + $pas_total_out - $ordered;
    //--------------------------------------------------------------------------------//


   
    $db = new DatabaseConnection;
    $sql1sz = "INSERT INTO tbl_in(fld_revlvl,fld_ornum,fld_remarks,fld_date,fld_partnumber,fld_compartnum,fld_partname, fld_RegCode, fld_Supplier, fld_by ,fld_to ,fld_cntrlnum ,fld_conv, fld_Type,fld_qunatityin)  VALUES
     ('$fld_revlvl','$fld_ornum', '$fld_remarks','$date ','$fld_partnumber','$fld_compartnum','$fld_partname', '$fld_RegCode', '$fld_Supplier', '$fld_by' ,'$fld_to' ,'$fld_cntrlnum' ,'$fld_conv', '$fld_Type','$fld_qunatityin')";

    
    $sql2sz = "UPDATE tbl_inventory_system 
    SET 
        ordered = $ordered1s,
        pas_total_order = $pas_total_order1s
        
    WHERE id = '$id'";

    


    if (mysqli_query($db->conn, $sql1sz)) {
        echo '<script>window.location.href=document.referrer;</script>';  
        
               
    if (mysqli_query($db->conn,$sql2sz)) {        
        echo '<script>window.location.href=document.referrer;</script>';  
        exit();
    } else {
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);
    }      
    mysqli_close($conn);
    
    }

      
} 

 




?>




