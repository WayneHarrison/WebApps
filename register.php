<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Custom Imports</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" charset="UTF-8">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <!--Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- CSS Reset -->
    <link rel="stylesheet" href="//cdn.rawgit.com/necolas/normalize.css/master/normalize.css">
    <!-- Milligram CSS minified -->
    <link rel="stylesheet" href="css/milligram.css">
    <link rel="stylesheet" href="css/milligram.css.map">
    <link rel="stylesheet" href="css/milligram.min.css.map">
    <link rel="stylesheet" href="css/main.css">
    <!-- Script-->
    <script type="text/javascript" src="js/myJS.js"></script>
  </head>
<body>
  <main class ="wrapper">
    <nav class="navigation">
      <section class="container">
        <a class="navigation-title" href="index.php"><h1 class="title">WebApps</h1></a>
          <ol class="navigation-list float-right">
            <div class="dropdown">
              <p class="navigation-item">Menu</p>
              <!--Dropdown Navigation-->
                <div class="dropdown-content">
                  <?php
                    //If the session is set print out links to profile, products and the logout
                    if(isset($_SESSION['usersID'])){
                      echo'
                      <li class="navigation-item">
                          <a class="navigation-link" href="profile.php">Profile</a>
                      </li>
                      <li class="navigation-item">
                          <a class="navigation-link" href="products.php">Products</a>
                      </li>
                      <li class="navigation-item">
                          <a class="navigation-link" href="includes/logout.inc.php">Logout</a>
                      </li>'; }
                      else {
                        //If there is no set session show login and register
                        echo'
                      <li class="navigation-item">
                          <a class="navigation-link" href="login.php">Login</a>
                      </li>
                      <li class="navigation-item">
                          <a class="navigation-link" href="register.php">Register</a>
                      </li>';
                      }
                      ?>
                </div>
            </div>
          </ol>
      </section>
    </nav>
    <!--Content Start-->
  <div class="container">
    <div class="row">
      <div class="column column-100">
        <div class="MyJumbo">
          <?php
          //Error Messages
          if(isset($_GET['error'])){
            if ($_GET['error'] == "emptyfields"){
              echo '<p class="signuperror">Missing fields!</p>';
            }
            else if($_GET['error'] == "invalidmail") {
              echo '<p class="signuperror">Invalid Email!</p>';
            }
            else if($_GET['error'] == "invalidname") {
              echo '<p class="signuperror">Invalid Name!</p>';
            }
            else if($_GET['error'] == "passwordcheck") {
              echo '<p class="signuperror">Password do not match!</p>';
            }
            else if($_GET['error'] == "incorrectdob") {
              echo '<p class="signuperror">Numbers only in DOB field!</p>';
            }
            else if($_GET['error'] == "incorrectphone") {
              echo '<p class="signuperror">Numbers only in phone number field!</p>';
            }
            else if($_GET['error'] == "EmailTaken") {
              echo '<p class="signuperror">User already registered!</p>';
            }
          }
          else if ($_GET["signup"] == "success") {
            echo '<p class="signupsuccess">Sign up successful!</p>';
          }
          ?>
          <!--Inputs for register-->
          <form action="includes/signup.inc.php" method="post">
            <fieldset>
              <label for="nameField">Name</label>
              <input placeholder="John Doe" id="nameField" type="text" name="name">
              <label for="addressField">Address</label>
              <input placeholder="1 Fakestreet" id="addressField" type="text" name="address">
              <label for="pcField">Postcode</label>
              <input id="pcField" type="text" name="postcode">
              <label for="dobField">Date of Birth</label>
              <input placeholder="DDMMYY" id="dobField" type="text" name="dob">
              <label for="phoneField">Phone Number</label>
              <input id="phoneField" type="text" name="phone">
              <label for="emailField">Email</label>
              <input placeholder="example@gmail.com" id="emailField" type="text" name="email">
              <label for="passwordField">Password</label>
              <input id="passwordField" type="password" name="password">
              <label for="cpasswordField">Confirm Password</label>
              <input id="cpasswordField" type="password" name="cpassword">
              <div class="float-center">
                <button class="button button-outline" name="registerButton" type="submit">Register</button>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <br>
  <br>
  </div>
  </main>
</body>
</html>
