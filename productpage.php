<?php
session_start();
?>
<?php

	// Connect to the MySQL database
    $connection =  mysqli_connect("ixqxr3ajmyapuwmi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "cxvgnzbdx933nx2c", "pzgz4db5bifleb6r", "ejyc09067f68qv1j") or die("Connection Failed" .
    mysqli_error($connection));
    //Set ID
	  $ID = intval($_GET['ID']);

    $sql = "SELECT * FROM car WHERE carID='$ID'";
    $result= mysqli_query($connection, "SELECT * FROM car WHERE carID= ".$ID );
    if(mysqli_num_rows($result)) {
      $product = mysqli_fetch_array($result);
    }


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
        <div class="MyJumbo">
            <h1 class="title">
              <?php echo $product['carName']; ?>
            </h1>
            <h2><?php echo $product['carPrice'];?></h2>
            <img src="<?php echo $product['carPicture'];?>">
            <p>Go <a class="link" href="products.php">back.</a></p>
        </div>
      </section>
    </header>
    <section class="container">
      <div class="myJumbo">
        <div class ="row">
          <div class="column column-50">
              <h3 class="title">Description</h3>
                <p>
                  <?php echo $product['carDescription']; ?>
                </p>
          </div>
          <div class="column column-50">
              <h3 class="title">Technical Specs</h3>
                <p>
                  <ul>
                    <li>Colour: <?php echo $product['carColor']; ?></li>
                    <li>Doors: <?php echo $product['carDoors']; ?></li>
                    <li>Engine Size: <?php echo $product['carEngine']; ?></li>
                    <li>Gearbox: <?php echo $product['carGearbox']; ?></li>
                    <li>Fuel: <?php echo $product['carFuel']; ?></li>
                  </ul>
                </p>
          </div>
        </div>
      </div>
    </section>
  </main>
</body>
</html>
