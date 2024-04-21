<?php
session_start (); 
if(!isset($_SESSION["res"])){
	header("location:index.php");}
  ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

form {border: 3px solid #f1f1f1;}

input[type=text], input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}



.container {
  padding: 20px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
h1{
    color:red;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display:;
     float: none;
  }
  .cancelbtn {
     width: 50%;
  }
}
</style>
</head>
<body style="background: #e9f8ff;">

<h2 style="text-color:red; text-aling:center;"> Add Customer Id</h2>

<form style="margin-left:340px;margin-right:390px;" method="POST" enctype="multipart/form-data">
  

  <div class="container">
    <label ><b>Name</b></label>
    <input type="text" placeholder="Enter the name" name="name" value="" required>

    <label><b>Email</b></label>
    <input type="text"  placeholder="Enter the Email" name="email" value="" required>
    <label><b>Phone Number</b></label>
    <input type="text" placeholder="Enter the Phone Number" name="phone" value="" required>
    <label><b>Address</b></label>
    <input type="text" placeholder="Enter the Address" name="address" value="" required>
    <label><b>City</b></label>
    <input type="text" placeholder="Enter the City" name="city" value="" required>
    <label><b>State</b></label>
    <input type="text" placeholder="Enter the State" name="state" value="" required>
    <label><b>Country</b></label>
    <input type="text" placeholder="Enter the Country" name="country" value="" required>
    <label><b>Zip/Posted Code</b></label>
    <input type="text" placeholder="Enter the Zip/Posted code" name="zip" value="" required>
    <label><b>Qualification</b></label>
    <input type="text" placeholder="Enter the Qualification" name="qualification" value="" required>
    <label><b>photo</b></label>
    <input type="file" name="photo" value="" required>
    
   
    
    
       
    
    
  </div>
  <button type="submit" name="sumbit">Add_Customers</button>
  
</form>


</body>
</html>
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

if(isset($_POST['sumbit'])){


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zip = $_POST['zip'];
$qualification = $_POST['qualification'];
$gender = $_POST['gender'];
$photopic = $_FILES['photo'];
$msg = "";
$photopic = $_FILES['photo']['name'];
	$target = "upload/".basename($photopic);

	if (move_uploaded_file($_FILES['photo']['tmp_name'], $target)) {
  		$msg = "Image uploaded successfully";
  }
$sql = "INSERT INTO `customerdetails` ( `name`, `email`,`phone`, `address`, `city`, `state`, `country`, `zip`, `qualification`,  `user_photo_file`,  `timpstamp`) VALUES ( '$name', '$email','$phone', '$address', '$city', '$state', '$country', '$zip', '$qualification', '$photopic', current_timestamp())";
//print_r($sql);die;

$result = mysqli_query($conn,$sql);
//header("location:home1.php");
if($result){
  //
  //display_msg = 'data add';
header("location:home1.php");
}
}
  

  ?>

