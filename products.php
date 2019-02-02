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
    <header class="header">
      <section class="container">
      <div class="MyJumbo">
          <h1 class="title">Current Stock</h1>
          <form>
            <input type="text" name="search" placeholder="Search">
            <button class="button button-outline navigation-item" name="SearchButton" type="submit">Search</button>
          </form>

            <?php
                  require 'dbh.inc.php';
                  $query='SELECT * FROM car ORDER BY carID ASC';

                  $result = mysqli_query($conn, $query);
                  if ($result) :
                    if(mysqli_num_rows($result)>0):
                    while($product = mysqli_fetch_assoc($result)):
                      ?>
                      <div class="row">
                      <div class="column column-50">
                        <div class = "divcard">
                          <form method="post" action="products.php?action=add&id=<?php echo $product['carID'];?>">
                          <p class="description"><?php echo $product ['carName'];?></p>
                          <p class="description"><?php echo $product ['carPrice']; ?></p>
                          <img src="<?php echo $product['carPicture'];?>">
                        </div>
                      </div>
                      <div class="column column-50">
                      <div class = "divcard">
                        <p class="description">Car 2</p>
                        <img src="https://via.placeholder.com/150">
                      </div>
                    </div>
                      </div>
                    <?php
                  endwhile;
                endif;
              endif;
              ?>
                  </br>
        <div class="row">
        <div class="column column-50">
        <div class = "divcard">
          <p class="description">Car 3</p>
          <img src="https://via.placeholder.com/150">
        </div>
      </div>
      <div class="column column-50">
      <div class = "divcard">
        <p class="description">Car 4</p>
        <img src="https://via.placeholder.com/150">
      </div>
    </div>
      </div>
    </br>
      <div class="row">
      <div class="column column-50">
      <div class = "divcard">
        <p class="description">Car 5</p>
        <img src="https://via.placeholder.com/150">
      </div>
    </div>
    <div class="column column-50">
    <div class = "divcard">
      <p class="description">Car 6</p>
      <img src="https://via.placeholder.com/150">
    </div>
  </div>
    </div>
      </div>
    </br>
  </br>
</br>
    </section>
    </header>
  </main>
</body>
</html>
