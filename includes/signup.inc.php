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
      exit();
  }
  else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/", $name)){
    header("Location: ../register.php?error=invalidmailname=&address".$address."&postcode".$postcode);
    exit();
  }
  else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: ../register.php?error=invalidmail&name=".$name."&address".$address."&postcode".$postcode);
    exit();
  }
  else if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
    header("Location: ../register.php?error=invalidname&address="."&address".$address."&postcode".$postcode."&email".$email);
    exit();
  }
  else if ($password !== $cpassword) {
    header("Location: ../register.php?error=passwordcheck&name=".$name."&address".$address."&postcode".$postcode."&email".$email);
    exit();
  }
  else {
    $sql ="SELECT userEmail FROM user WHERE userEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../register.php?error=sqlerror1");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if($resultCheck > 0 ) {
        header("Location: ../register.php?error=emailTaken");
        exit();
      }
      else {
        $sql ="INSERT INTO user (userName, userAddress, userPostCode, userEmail, userPassword) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)){
          header("Location: ../register.php?error=sqlerror2");
          exit();
        }
        else {
          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
          mysqli_stmt_bind_param($stmt, "sssss",$name, $address, $postcode, $email, $hashedPwd);
          mysqli_stmt_execute($stmt);
          header("Location: ../register.php?success");
          exit();
        }
      }
    }
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../register.php");
  exit();
}

?>
