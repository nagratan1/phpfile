<?php 

include "config.php";

  if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    $phone = $_POST['phone'];

    $email = $_POST['email'];

    $address = $_POST['address'];

    $gender = $_POST['gender'];
    $city = $_POST['city'];

    $sql = "INSERT INTO `customerdetails` ( `name`, `email`,`phone`, `address`, `city`, `state`, `country`, `zip`, `qualification`, `gender`, `user_photo_file`, `create_date`, `create_time`, `ip_address`, `timpstamp`) VALUES ( '$name', '$email','$phone', '$address', '$city', '$state', '$country', '$zip', '$qualification', '$gender', '$photopic', '','', '', current_timestamp())";
    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "New record created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Signup Form</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    First name:<br>

    <input type="text" name="firstname">

    <br>

    Last name:<br>

    <input type="text" name="lastname">

    <br>

    Email:<br>

    <input type="email" name="email">

    <br>

    Password:<br>

    <input type="password" name="password">

    <br>

    Gender:<br>

    <input type="radio" name="gender" value="Male">Male

    <input type="radio" name="gender" value="Female">Female

    <br><br>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form>

</body>

</html>