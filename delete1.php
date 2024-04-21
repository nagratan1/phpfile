<?php
include 'dbcon.php';
f (isset($_REQUEST['id'])) {

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM `pdf_data` WHERE `id`='$id'";

     $result = $con->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("location:view.php");
    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 
?>