

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=password] {
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
  width: 100%;
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

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

   


span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body style="background: #e9f8ff;height: 100%;">

<h2 style="padding: 10px; margin-left:30%;">Registration Form</h2>

<form action="registion.php" method="POST"  style="margin-left:30%;margin-right:390px;">
  

  <div class="container">
    <label ><b>Name</b></label>
    <input type="text" placeholder="Enter the Name" name="name" required  value="">

    <label ><b>Email</b></label>
    <input type="text" placeholder="Enter the Email" name="email" required>
    <label ><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required >
    <label ><b>CPassword</b></label>
    <input type="password" placeholder="Enter CPassword" name="cpassword" required>
        
    <button type="submit" name="submit">SingUp</button>
    
  </div>

  
</form>
</div>
</body>
</html>
<?php
$server = "localhost";
$user ="root";
$password = "";
$database = "customers";

$conn = mysqli_connect($server,$user,$password,$database);
 if($conn){
    //echo "ram";
}
else{
    die("error".mysqli_connect_erroe());
}

//if (isset($_POST['submit'])){
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$exists = false;
if(($password == $cpassword) && $exists == false){
$sql = "INSERT INTO `customersinfo` ( `name`, `email`, `password`, `created_date`, `created_time`, `ip_address`, `timestamp`) VALUES ( '$name', '$email', '$password', '', '', '', '')";
//echo '<pre>';
//print_r($sql); die;
$result = mysqli_query($conn,$sql);
//echo $result;die;
header("location:index.php");
if($result){
  $showAlert = true;
}
}
else{
  $showError = "password do not match";
}
}

?>