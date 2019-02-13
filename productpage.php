<?php
session_start();
require 'dbh.inc.php';
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
          <li class="navigation-item">
            <a class="navigation-link" href="products.php">Products</a>
          </li>
          <?php
            if(isset($_SESSION['usersID'])){
              echo'<li class="navigation-item">
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
    <?php
      if(ISSET($_GET['carID'])){
        echo $product['carPicture'];
      }
    ?>
    <header class="header" name="top">
      <section class="container">
      <div class="MyJumbo">
          <h1 class="title">Product Name</h1>
          <p class="description">Price</p>
          <img src="http://via.placeholder.com/1400x1000">
          <p>Go <a class="link" href="products.php">back.</a></p>
      </div>
    </section>
    </header>
    <section class="container">
      <div class="myJumbo">
        <h3 class="title">Introduction</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id lacus elit.
          Curabitur feugiat quam ac iaculis pretium. Morbi congue velit est, vitae interdum lorem sodales sed. Nulla in mauris quam.
        </p>
        <h3 class="title">The Good</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id lacus elit.
          Curabitur feugiat quam ac iaculis pretium. Morbi congue velit est, vitae interdum lorem sodales sed. Nulla in mauris quam.
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
        </ul>
        </p>
        <h3 class="title">The Bad</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id lacus elit.
          Curabitur feugiat quam ac iaculis pretium. Morbi congue velit est, vitae interdum lorem sodales sed. Nulla in mauris quam.
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
        </ul>
        </p>
        <h3 class="title">Conclusion</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent id lacus elit.
          Curabitur feugiat quam ac iaculis pretium. Morbi congue velit est, vitae interdum lorem sodales sed. Nulla in mauris quam.
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
        </ul>
        </p>
      </div>
    </section>

  </main>
</body>
</html>
