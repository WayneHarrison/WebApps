<?php
$uID = $_SESSION['usersID'];

if (isset($_POST['editButton'])){

  require 'dbh.inc.php';

  $address = $_POST['editAddress'];
  $postcode = $_POST['editPostcode'];
  $phone = $_POST['editPhone'];
  $dob = $_POST['editDob'];

  if (!preg_match("/^[0-9]*$/", $dob)){
    header("Location: ../profileedit.php?error=incorrectdob&address".$address."&postcode".$postcode."&phone".$phone);
    exit();
  }
    else if (!preg_match("/^[0-9]*$/", $phone)){
      header("Location: ../profileedit.php?error=incorrectphone&address".$address."&postcode".$postcode);
      exit();
    }
    else {
      $sql = "UPDATE user (userAddress, userPostCode, userDOB, userPhone) VALUES (?, ?, ?, ?) WHERE userID = '$uID'";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profileedit.php?error=SQLError");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "ssss", $address, $postcode, $dob, $phone);
        mysqli_stmt_execute($stmt);
        header("Location: ../profileedit.php?edit=success");
        exit();
      }



    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
  header("Location: ../profileedit.php");
}






?>
