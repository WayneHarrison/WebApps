<?php
session_start();
//php for retrieving user details
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
      <a class="navigation-title" href="index.php">
        <h1 class="title">WebApps</h1>
        </a>
        <ol class="navigation-list float-right">
          <div class="dropdown">
            <p class="navigation-item">Menu</p>
            <div class="dropdown-content">
          <?php
          if(isset($_SESSION['usersID'])){
            echo' <li class="navigation-item">
                    <a class="navigation-link" href="profile.php">Profile</a>
                  </li>
                  <li class="navigation-item">
                    <a class="navigation-link" href="products.php">Products</a>
                  </li>
                  <li class="navigation-item">
                    <a class="navigation-link" href="includes/logout.inc.php">Logout</a>
                  </li>'; }
              else {
                echo'<li class="navigation-item">
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
    <header class="header" name="top">
      <section class="container">
      <div class="divcard">
          <h2 class="title">Edit your details</h2>
          <h3 class="title">Please fill in all boxes below and then press submit.</h3>
          <?php
          if(isset($_GET['error'])){
            if($_GET['error'] == "emptyfields") {
              echo '<p class="signuperror">Missing Fields!</p>';
            }
            else if($_GET['error'] == "incorrectdob") {
              echo '<p class="signuperror">Numbers only in DOB field!</p>';
            }
            else if($_GET['error'] == "incorrectphone") {
              echo '<p class="signuperror">Numbers only in phone number field!</p>';
            }
          }
          else if ($_GET["edit"] == "success") {
            echo '<p class="signupsuccess">Edit successful!</p>';
          }
          ?>
        <form action="includes/edit.inc.php" method="post">
          <fieldset>
            <label for="addressField">Address</label>
            <input placeholder="1 Fakestreet" id="addressField" type="text" name="editAddress">
            <label for="pcField">Postcode</label>
            <input id="pcField" type="text" name="editPostcode">
            <label for="phoneField">Phone Number</label>
            <input id="phoneField" type="text" name="editPhone">
            <label for="dobField">Date of Birth</label>
            <input placeholder="DDMMYY" id="dobField" type="text" name="editDob">
            <label for="dobField">Saved Search</label>
            <input id="savedSearchField" type="text" name="editSearch">
            <button class="button button-outline" name="editButton">Submit</button>
          </fieldset>
        </form>
      </div>
    </section>
    </header>
  </main>
</body>
</html>
