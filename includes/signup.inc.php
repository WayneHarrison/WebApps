<?php
if (isset($_POST['registerButton'])) {

  require 'dbh.inc.php';

  $name = $POST['nameField'];
  $address = $POST['addressField'];
  $postcode = $POST['pcField'];
  $email = $POST['emailField'];
  $password = $POST['passwordField'];
  $cpassword = $POST['cpasswordField'];

  //error handlers
  if(empty($name) || empty($address) || empty($postcode) || empty($email) || empty($password) || empty($cpassword)){
    header("Location: ../register.php?error=emptyfields&uid=".$username."&address=".$address."&postcode".$postcode."&email".$email);
  }

}
