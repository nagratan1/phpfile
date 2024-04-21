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
<?php
$server ="localhost";
$username = "root";
$password ="";
$database = "customers";
$conn = mysqli_connect($server,$username,$password,$database);
if($conn){
   //echo "connect";
}
else{
   die("error".mysqli_connect_erroe());
}
if(isset($_REQUEST['id'])){
 $user_id = $_REQUEST['id'];
 $query = "SELECT * FROM `customerdetails`WHERE id = '$user_id'";
$viwe_user = mysqli_query($conn,$query);
$rows=mysqli_fetch_array($viwe_user);
}
?>
<h2 style="text-color:red; text-aling:center;"> Edit Customer Id</h2>
<form style="margin-left:340px;margin-right:390px;" method="POST" enctype="multipart/form-data">
  <div class="container">
    <label ><b>Name</b></label>
    <input type="text" placeholder="Enter the name" name="name" value="<?php if(isset($rows['name'])) echo $rows['name']; else ''; ?>">
    <input type="hidden" name="id" value="<?php if(isset($rows['id'])) echo $rows['id']; else ''; ?>">
    <label><b>Email</b></label>
    <input type="text"  placeholder="Enter the Email" name="email" value="<?php if(isset($rows['email'])) echo $rows['email']; else ''; ?>" required>
    <label><b>Phone Number</b></label>
    <input type="text" placeholder="Enter the Phone Number" name="phone" value="<?php if(isset($rows['phone'])) echo $rows['phone']; else ''; ?>" required>
    <label><b>Address</b></label>
    <input type="text" placeholder="Enter the Address" name="address" value="<?php if(isset($rows['address'])) echo $rows['address']; else ''; ?>" required>
    <label><b>City</b></label>
    <input type="text" placeholder="Enter the City" name="city" value="<?php if(isset($rows['city'])) echo $rows['city']; else ''; ?>" required>
    <label><b>State</b></label>
    <input type="text" placeholder="Enter the State" name="state" value="<?php if(isset($rows['state'])) echo $rows['state']; else ''; ?>" required>
    <label><b>Country</b></label>
    <input type="text" placeholder="Enter the Country" name="country" value="<?php if(isset($rows['country'])) echo $rows['country']; else ''; ?>" required>
    <label><b>Zip/Posted Code</b></label>
    <input type="text" placeholder="Enter the Zip/Posted code" name="zip" value="<?php if(isset($rows['zip'])) echo $rows['zip']; else ''; ?>" required>
    <label><b>Qualification</b></label>
    <input type="text" placeholder="Enter the Qualification" name="qualification" value="<?php if(isset($rows['qualification'])) echo $rows['qualification']; else ''; ?>" required>
    <label><b>Photo</b></label>
    <input type="file" name="user_photo_file" value="<?php if(isset($rows['user_photo_file'])) echo $rows['user_photo_file']; else '' ?>" >
     <img style="height: 100px; width: 100px;float:left;" src="<?php echo 'upload/'.$rows['user_photo_file']; ?>" alt="" >
    </div>
  <button type="submit" name="update">Edit_Customers</button>
  </form>
</body>
</html>
<?php
 if (isset($_POST['update'])){
$user_id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$country = $_POST['country'];
$zip = $_POST['zip'];
$qualification = $_POST['qualification'];
$photopic = $_FILES['user_photo_file'];

$msg = "";
	$photopic = $_FILES['user_photo_file']['name'];
	if(empty($photopic)){
	    $photopic = $photopic;
	}
	$target = "upload/".basename($photopic);


$update = "UPDATE customerdetails SET name='$name', email='$email',phone='$phone',address='$address',city='$city',state='$state',country='$country',zip='$zip',qualification='$qualification',user_photo_file='$photopic'  WHERE id = $user_id";
//print_r($update);die;
$result = mysqli_query($conn,$update);
if($result){
  echo "Record updated successfully.";
header("location:home1.php");
}else{
  echo "Error:" . $update . "<br>" . $conn->error;
}
echo '<pre>';
print_r($result);die;
}


    ?>





