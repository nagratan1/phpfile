<?php
$server ="localhost";
$username = "root";
$password ="";
$database = "customers";
$conn = mysqli_connect($server,$username,$password,$database);
if($conn){
   //echo "ram";
}
else{
   die("error".mysqli_connect_erroe());
}


if (isset($_REQUEST['id'])) {

    $user_id = $_REQUEST['id'];

    $sql = "DELETE FROM `customerdetails` WHERE `id`='$user_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {

        echo "Record deleted successfully.";
        header("location:home1.php");
    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>