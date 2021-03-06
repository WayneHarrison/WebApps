<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>Custom Imports</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
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
      <header class="header">
        <section class="container">
          <div class="MyJumbo">
            <h1 class="title">Custom Imports</h1>
              <?php
              //If
              if (isset($_SESSION['usersID'])){
                echo '<p class="description">You are logged in.</p>';
              } else {
                echo '<p class="description">You are logged out.</p>';
              }

              ?>
              <img class="profile" src="images/moostang.png" alt="#">
            <br>
          </div>
              <br>
            <br>
          <br>
        </section>
      </header>
    </main>
  </body>
</html>
