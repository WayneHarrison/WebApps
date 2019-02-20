<?php
session_start();
if (isset($_POST['editButton'])){
  $uID = $_SESSION['usersID'];
  $conn = mysqli_connect("ixqxr3ajmyapuwmi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "cxvgnzbdx933nx2c", "pzgz4db5bifleb6r", "ejyc09067f68qv1j") or die("Connection Failed" .
  mysqli_error($conn));

  $address = $_POST['editAddress'];
  $postcode = $_POST['editPostcode'];
  $phone = $_POST['editPhone'];
  $dob = $_POST['editDob'];
  $ssearch = $_POST['editSearch'];

  if (empty($address) || empty($postcode) || empty($dob) || empty($phone)|| empty($ssearch)){
      header("Location: ../profileedit.php?error=emptyfields&name=".$name."&address".$address."&postcode".$postcode."&email".$email);
      exit();
    }
  else if (!preg_match("/^[0-9]*$/", $dob)){
    header("Location: ../profileedit.php?error=incorrectdob");
    exit();
  }
    else if (!preg_match("/^[0-9]*$/", $phone)){
      header("Location: ../profileedit.php?error=incorrectphone");
      exit();
    }
    else {
      $sql = "UPDATE user SET userAddress = ?, userPostCode = ?, userDOB = ?, userPhone = ?, userSaveSearch = ? WHERE userID = $uID";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../profileedit.php?error=SQLError&".$uID);
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "sssss", $address, $postcode, $dob, $phone, $ssearch);
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
