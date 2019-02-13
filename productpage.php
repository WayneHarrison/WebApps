<?php
session_start();
?>
<?php
if (isset($_GET['id'])) {
	// Connect to the MySQL database
    $connection =  mysqli_connect("ixqxr3ajmyapuwmi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "cxvgnzbdx933nx2c", "pzgz4db5bifleb6r", "ejyc09067f68qv1j") or die("Connection Failed" .
    mysqli_error($connection));
	$id = preg_replace('#[^0-9]#i', '', $_GET['ID']);
	// Use this var to check to see if this ID exists, if yes then get the product
	// details, if no then exit this script and give message why
	$sql = mysql_query("SELECT * FROM car WHERE carID='$id' LIMIT 1");
	$productCount = mysql_num_rows($sql); // count the output amount
    if ($productCount > 0) {
		// get all the product details
		while($row = mysql_fetch_array($sql)){
			 $car_name = $row["carName"];
			 $price = $row["carPrice"];
			 $description = $row["carDescription"];
       $doors = $row["carDoors"];
       $color = $row["carColor"];
       $engine = $row["carEngine"];
       $gearbox = $row["carGearbox"];
       $fuel = $row["carFuel"];
       $picture = $row["carPicture"];
			 ));
         }

	} else {
		echo "That item does not exist.";
	    exit();
	}

} else {
	echo "Data to render this page is missing.";
	exit();
}
mysql_close();
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
    <header class="header" name="top">
      <section class="container">
      <div class="MyJumbo">
          <h1 class="title"><?php echo $car_name;?></h1>
          <p class="description"><?php echo $price;?></p>
          <img src="<?php echo $picture?>">
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
