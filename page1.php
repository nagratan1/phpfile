<?php 
include_once 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $pagelimit=2;
    $quary= "SELECT * FROM customerdetails";
    $result = mysqli_query($conn,$quary);
    $row = mysqli_num_rows($result);
    

    
    ?>
</body>
</html>