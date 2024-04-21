<?php  error_reporting(E_ERROR | E_PARSE); ?>

<?php
$server = "localhost";
$user ="root";
$password = "";
$database = "customers";

$conn = mysqli_connect($server,$user,$password,$database);
 if($conn){
   // echo "connect";
}
else{
    die("error".mysqli_connect_erroe());
}

session_start();
if($_POST['submit']){
	//include 'singup.php';
	$email = $_POST["email"];
	$password = $_POST["password"];
	$sql = "select * from customersinfo where email ='$email' AND password ='$password'";
//  echo '<pre>';
//  print_r($sql); die;
	$result = mysqli_query($conn,$sql);
  $res = mysqli_fetch_array($result);
	//$num = mysqli_num_rows($result);
  // echo $num;
  //  echo '<pre>';
  //  print_r($res);die;
	
	
	// $_SESSION['password'] = $password;
	// $_SESSION['email'] = $email;
   if($res){
  
    echo "login success";
    $_SESSION["res"]="1";
	header("location:home1.php");
		//header("location:home1.php");
	}
else{
	echo "Invalid Credentials";
}
}

?>

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
  background-color: white;
  
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
<body>

<h2>Login Form</h2>

<form action="index.php" method="POST" style="margin-left:30%;margin-right:390px;">
  

  <div class="container">
    <label for="uname"><b>Email</b></label>
    <input type="text" placeholder="Enter Username" name="email" >

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" >
        
    <button type="submit" name="submit" value="submit">Login</button>
   
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn"><a href="registion.php">Registration</button></a>
   
    <span class="psw">Forgot <a href="forgetpassword.php">password?</a></span>
  </div>
</form>


</body>
</html>
