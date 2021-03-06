<?php
session_start();
if (!ISSET($_SESSION['usersID'])){
  header("Location: ../login.php");
}
$uID = $_SESSION['usersID'];
$connection =  mysqli_connect("ixqxr3ajmyapuwmi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "cxvgnzbdx933nx2c", "pzgz4db5bifleb6r", "ejyc09067f68qv1j") or die("Connection Failed" .
mysqli_error($connection));
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
    <!--Nav Start-->
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
    <header class="header">
      <section class="container">
        <div class="MyJumbo">
            <h1 class="title">Current Stock</h1>
              <form action="search.php" method="POST">
                  <input type="text" name="search" placeholder="Search">
                  <button class="button button-outline navigation-item" name="submit-search" type="submit">Search</button>
              </form>
              <?php
              $sql3 ="SELECT * FROM search WHERE userID= $uID GROUP BY searchInfo ORDER BY COUNT(*)Desc limit 1";
              $result3= mysqli_query($connection, $sql3);
              $datas = array();
              if($result3){
                if (mysqli_num_rows($result3) > 0){
                  while($row = mysqli_fetch_assoc($result3)){
                    $datas[]=$row;
                    foreach($datas AS $data){
                      echo "<p>Most searched: ".$data['searchInfo'].".</p>";
                    }
                  }
                } else {
                echo '<p>No common search.</p>';
                }
              }
              ?>
            <?php
                //Get the cars in database
                  $query= 'SELECT * FROM car ORDER BY carID ASC';
                  $result = mysqli_query($connection, $query);
                  //If result true print until all results are viewable
                  if ($result):
                    if(mysqli_num_rows($result) > 0):
                      while($product = mysqli_fetch_assoc($result)):
                        ?>
                        <div class="row">
                          <div class="column column-100">
                            <div class = "divcard">
                              <form method="post" action="productpage.php?ID=<?php echo $product['carID']; ?>">
                                <p class="description">
                                  <?php echo $product['carName']; ?>
                                </p>
                                <p class="description">
                                  <?php echo $product['carPrice']; ?>
                                </p>
                                <img src="<?php echo $product['carPicture']; ?>"/>
                                <div>
                                  <button class="button button-outline float-center" name="viewProduct" type="submit">View Product</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <br>
                      <br>
                      <?php
                      endwhile;
                    endif;
                  endif;
                  ?>
                  <br>
                <br>
              <br>
            <br>
      </section>
    </header>
  </main>
</body>
</html>
