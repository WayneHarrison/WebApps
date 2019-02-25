<?php

session_start();
if (!ISSET($_SESSION['usersID'])){
  header("Location: ../login.php");
}
//php for retrieving user details
  $connection =  mysqli_connect("ixqxr3ajmyapuwmi.cbetxkdyhwsb.us-east-1.rds.amazonaws.com", "cxvgnzbdx933nx2c", "pzgz4db5bifleb6r", "ejyc09067f68qv1j") or die("Connection Failed" .
  mysqli_error($connection));
  //Set ID
  $uID = $_SESSION['usersID'];
  //selects Results
    $sql = "SELECT * FROM user WHERE userID='$uID'";
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
    <header class="header" name="top">
      <section class="container">
        <div class="row">
          <div class="column column-50">
            <div class="divcard">
              <h2 class="title">Your Profile</h2>
              <p class="description">Welcome <?php echo $userResult['userName'];?>.</p>
              <h3 class="title">Your Info</h3>
              <ul>
                <li>Address: <?php echo $userResult['userAddress'];?></li>
                <li>Postcode: <?php echo $userResult['userPostCode']; ?> </li>
                <li>Phone: <?php echo $userResult['userPhone']; ?></li>
                <li>Date of Birth: <?php echo $userResult['userDOB'];?></li>
                  <?php if(isset($userResult['userSaveSearch'])):
                    ?>
                    <form action="favouritesearch.php" method="post">
                      <li> Favourite search: <?php echo $userResult['userSaveSearch'];?></li>
                      <button class="button button-outline" name="favourite-search" type="submit">Search</button>
                    </form>
                    <?php
                    else: echo '<li>No saved search.</li>' ;
                    endif;
                    ?>
                  </ul>
                  <a href="profileedit.php">  <button class="button button-outline">Edit Details</button></a>
            </div>
          </div>
          <div class="column column-50">
            <div class="divcard">
            <h2 class="title">Your Searches</h2>
            <?php
            $sql2 = "SELECT * FROM search WHERE userID='$uID'";
            $result2= mysqli_query($connection, "SELECT * FROM search WHERE userID=".$uID );
            if(mysqli_num_rows($result2) > 0) :
              while($userResult2 = mysqli_fetch_assoc($result2)):
            ?>
              <p class="description"><?php echo $userResult2['searchInfo']; ?></p>
              <?php
            endwhile;
          else: echo '<p>No searches on record.</p>';
            endif;
              ?>
              <h4 class="title">Your Most Common Search</h4>
              <?php
              $sql3 ="SELECT * FROM search WHERE userID=$uID GROUP BY searchInfo ORDER BY COUNT(*) Desc limit 1";
              $result3= mysqli_query($connection, $sql3);
              $datas = array();
              if (mysqli_num_rows($result3)>0):
                while($row = mysqli_fetch_assoc($result3)):
                  $datas[]=$row;
                  foreach($datas AS $data){
                    echo $data['searchInfo'];
                  }
                else: echo'<p>No common search.</p>'
                endif;
              endwhile;
              ?>

            </div>
          </div>
        </div>
      </section>
    </header>
  </main>
</body>
</html>
