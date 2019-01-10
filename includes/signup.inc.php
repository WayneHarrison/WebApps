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

    $sql "SELECT userEmail FROM user where userEmail=?";
    $stmt = mysqli_stmt_init($con);
      if (!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../register.php?error=sqlerror");
      exit();
      }
        else {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultcheck = mysqli_stmt_num_rows($stmt);
          if ($resultcheck > 0){
          header("Location: ../register.php?error=emailtaken");
          exit();
            }
            else {
            $sql = "INSERT INTO user (userName, userAddress, userPostCode, userEmail, userPassword) VALUES (?, ?, ?, ?, ?)"
            $stmt = mysqli_stmt_init($con);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
              header("Location: ../register.php?error=sqlerror2");
              exit();
              }
                else{

                  $hashedpwd= password_hash($password, PASSWORD_DEFAULT)

                  mysqli_stmt_bind_param($stmt, "sssss",$name, $address, $postcode, $email, $hashedpwd );
                  mysqli_stmt_execute($stmt);
                  header("Location: ../register.php?signup=success");
                  exit();
                }
              }
            }
          }
          mysqli_stmt_close($stmt);
          mysqli_close($con);
        }
else {
  header("Location: ../register.php");
  exit();
}
?>
