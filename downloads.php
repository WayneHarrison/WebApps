<!DOCTYPE HTML>
<html>
<head>
  <title>JNReviews</title>
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
            <a class="navigation-link" href="products.php">Products</a>
          </li>
          <?php
            if(isset($_SESSION['usersID'])){
              echo'<li class="navigation-item">
                <a class="navigation-link" formaction"logout.inc.php">Logout</a>
              </li>'; }
              else {
                echo'<li class="navigation-item">
                  <a class="navigation-link" href="login.php">Login</a>
                </li>
              </br>
                <li class="navigation-item">
                  <a class="navigation-link" href="register.php">Register</a>
                </li>';
              }
          ?>
        </div>
        </div>
        </ul>
      </section>
    </nav>
    <header class="header" name="top">
      <section class="container">
        <h1 class="title">Wallpapers</h1>
        <div class="row">
        <div class="column column-50">
          <div class="MyJumbo">
            <h3>Wallpaper 1</h3>
              <img src="https://via.placeholder.com/350x350">
            </br>
          </div>
        </div>
        <div class="column column-25">
          <h5>Desktop</h5>
          <a class="button button-outline" href="images/Wallpapers/SpectreDTLarge.jpg" download="large.jpg">Large</a>
          <a class="button button-outline" href="images/Wallpapers/SpectreDTMedium.jpg" download="medium.jpg">Medium</a>
          <a class="button button-outline" href="images/Wallpapers/SpectreDTSmall.jpg" download="small.jpg">Small</a>
        </div>
        <div class="column column-25">
          <h5>Mobile</h5>
          <a class="button button-outline" href="images/Wallpapers/SpectreMS8.jpg" download="samsung.jpg">Samsung</a>
          <a class="button button-outline" href="images/Wallpapers/SpectreMiPhone.jpg" download="iPhone.jpg">iPhone</a>
          <a class="button button-outline" href="images/Wallpapers/SpectreMiPad.jpg" download="iPad.jpg">iPad</a>
        </div>
      </div>
    </div>
      <div class="row">
        <div class="column column-50">
          <div class="MyJumbo">
            <h3>Wallpaper 2</h3>
              <img src="https://via.placeholder.com/350x350">
            </br>
          </div>
        </div>
        <div class="column column-25">
          <h5>Desktop</h5>
          <a class="button button-outline" href="images/Wallpapers/SpectreCDTLarge.jpg" download="large.jpg">Large</a>
          <a class="button button-outline" href="images/Wallpapers/SpectreCDTMedium.jpg" download="medium.jpg">Medium</a>
          <a class="button button-outline" href="images/Wallpapers/SpectreCDTSmall.jpg" download="small.jpg">Small</a>
        </div>
        <div class="column column-25">
          <h5>Mobile</h5>
          <a class="button button-outline" href="images/Wallpapers/SpectreCMS8.jpg" download="samsung.jpg">Samsung</a>
          <a class="button button-outline" href="images/Wallpapers/SpectreCMiPhone.jpg" download="iPhone.jpg">iPhone</a>
          <a class="button button-outline" href="images/Wallpapers/SpectreCMiPad.jpg" download="iPad.jpg">iPad</a>
        </div>
      </div>
    </section>
    </header>
  </main>
</body>
</html>
