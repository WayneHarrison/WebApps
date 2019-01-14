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
      <a class="navigation-title" href="index.php">
        <h1 class="title">WebApps</h1>
        </a>
        <ul class="navigation-list float-right">
          <div class="dropdown">
            <p class="navigation-item">Menu</p>
            <div class="dropdown-content">
          <li class="navigation-item">
            <a class="navigation-link" href="index.php">Home</a>
          </li>
          <li class="navigation-item">
            <a class="navigation-link" href="products.php">Products</a>
          </li>
          <li class="navigation-item">
            <a class="navigation-link" href="login.php">Login</a>
          </li>
        </div>
        </div>
        </ul>
      </section>
    </nav>
    <div class="container">
      <div class="row">
      <div class="column column-100">
        <div class="MyJumbo">
          <form action="includes/signup.inc.php" method="post">
  <fieldset>
    <label for="nameField">Name</label>
    <input placeholder="John Doe" id="nameField" type="text" name="name">
    <label for="addressField">Address</label>
    <input placeholder="1 Fakestreet" id="addressField" type="text" name="address">
    <label for="pcField">Postcode</label>
    <input id="pcField" type="text" name="postcode">
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
  </br>
</br>
  </div>
  </main>
</body>
</html>
