<?php
if (isset($_POST['registerButton'])) {

  require 'dbh.inc.php';

  $name = $_POST['name'];
  $address = $_POST['address'];
  $postcode = $_POST['postcode'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];

  //error handlers
  if (empty($name) || empty($address) || empty($postcode) || empty($email) || empty($password) || empty($cpassword)){
      header("Location: ../register.php?error=emptyfields&name=".$name."&address".$address."&postcode".$postcode."&email".$email);

  }

}


?>
