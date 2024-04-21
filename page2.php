<?php
include_once 'dbconn.php';
if(isset($_REQUEST['page'])){
    $page_name=1;

}else{
    $page_name="";
}
$page_limit=2;
$initial=($page_name-1) * $page_limit;
$quary = "SELECT * FROM customerdetails";
$result = mysqli_query($conn,$sql);
$row = mysqli_num_rows($result);
$pages = ceil($row/$pagelimit);

$quary="SELECT * FROM customerdetails LIMIT".$initial.','.$pagelimit;
$result = mysqli_query($conn,$quary);
foreach($result as $row){
   echo $row['name'];
}


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
    <h1>Welcome</h1>
</body>
</html>