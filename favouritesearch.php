<?php
session_start();
$uID = $_SESSION['usersID'];
$connection =  mysqli_connect("ixqxr3ajmyapuwmi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "cxvgnzbdx933nx2c", "pzgz4db5bifleb6r", "ejyc09067f68qv1j") or die("Connection Failed" .
mysqli_error($connection));
$sql1 = "SELECT * FROM user WHERE userID='$uID'";
$result= mysqli_query($connection, "SELECT * FROM user WHERE userID= ".$uID );
if(mysqli_num_rows($result)) {
  $userResult = mysqli_fetch_array($result);
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
    <header class="header">
      <section class="container">
      <div class="MyJumbo">
          <h1 class="title">Favourite Search Results</h1>
          <h2>Go <a class="link" href="profile.php">back.</a></h2>
            <?php

                    if (isset($_POST['favourite-search'])):
                      $search = mysqli_real_escape_string($connection, $userResult['userSaveSearch']);
                      $sql = "SELECT * FROM car WHERE carName LIKE '%$search%' OR carColor LIKE '%$search%' OR carEngine LIKE '%$search%'
                       OR carFuel LIKE '%$search%' OR carGearbox LIKE '%$search%'";
                      $result = mysqli_query($connection, $sql);
                      $queryResult = mysqli_num_rows($result);

                      if ($queryResult > 0):
                        while ($row = mysqli_fetch_assoc($result)):


                  ?>
                      <div class="row">
                      <div class="column column-100">
                        <div class = "divcard">
                          <form method="post" action="productpage.php?ID=<?php echo $row['carID']; ?>">
                            <p class="description">
                               <?php echo $row['carName']; ?>
                            </p>
                            <p class="description">
                               <?php echo $row['carPrice']; ?>
                            </p>
                            <img src="<?php echo $row['carPicture']; ?>"/>
                            <div>
                            <button class="button button-outline float-center" name="fviewProduct" type="submit">View Product</button>
                          </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </br>
                </br>
                <?php
                endwhile;
              else: echo '<h2>No results matching your search!</h2>';
                endif;
                endif;
                ?>
                  </br>
    </br>
  </br>
</br>
    </section>
    </header>
  </main>
</body>
</html>
