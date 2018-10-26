<?php
if (isset($_POST['registerButton'])) {

  require 'dbh.inc.php';

  $name = $_POST['nameField'];
  $address = $_POST['addressField'];
  $postcode = $_POST['pcField'];
  $email = $_POST['emailField'];
  $password = $_POST['passwordField'];
  $cpassword = $_POST['cpasswordField'];

  //error handlers
  if(empty($name) || empty($address) || empty($postcode) || empty($email) || empty($password) || empty($cpassword)) {
    header("Location: ../register.php?error=emptyfields&name=".$name."&address=".$address."&postcode".$postcode."&email".$email);
    exit();
  }

}


?>
