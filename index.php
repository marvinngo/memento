<?php 
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

      if (!isset($_SESSION['loggedin'])) {
      $_SESSION['loggedin'] = false;
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link href="style.css" rel="stylesheet">
  <title>Memento</title>

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <!-- To view the analytics, go to https://analytics.google.com/analytics/web/?authuser=0#/embed/report-home/a119244757w176500717p175343866 Login credentials are mementovancouver // Team5!Team5! -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119244757-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-119244757-1');
  </script>

</head>
  
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-dark sticky-top w-100" style="background-color: #1A75C1;">
  <div class="container-fluid w-75">
    <a class="navbar-brand" href="index.php"><img src="img/frontpage/logo/logo.png"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTop">
      <ul class="navbar-nav ml-auto">
        <div class="dropdown-divider"></div>
        <li class="nav-item my-0">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <div class="dropdown-divider"></div>
          <li class="nav-item my-0">
            <a class="nav-link" href="allevents.php">Events</a>
          </li>
        <div id="groupDivider" class="dropdown-divider"></div>
        <li id="Groups" class="nav-item my-0">
          <a class="nav-link" href="createjoin.php">Groups</a>
        </li>
        <div class="dropdown-divider"></div>
        <li class="nav-item my-0">
          <a id="signup" class="nav-link" href="registration.php">Sign Up</a>
        </li>
        <div class="dropdown-divider"></div>
        <li id="ms" class="nav-item my-0">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#login">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- The Modal -->
<div class="modal fade" id="login">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    <!-- Modal Header -->
      <div class="modal-header mx-auto">
          <div class="container mx-auto">
              <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8 text-center">
                   <h3>
                     Login 
                   </h3>
                </div>
                <div class="col-2">
                    <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
                </div>
              </div>
              </div>
      </div>
      <!-- Modal body -->
      <div class="modal-body col-6 mx-auto">
      <h5 id="loginErrorID"></h5>
        <!-- username -->
        <form>
              <div class="form-row mx-auto my-4">
                <input type="text" name="User_Name" class="form-control" id="usernameForm2" placeholder="Username" pattern="[a-zA-Z0-9]{4,20}" required>
              </div>

              <!-- password -->
              <div class="form-row mx-auto my-4">
                <input type="password" name="User_Password" class="form-control" id="passwordForm2" placeholder="Password" pattern="[a-zA-Z0-9]{8,20}" required>
                <div class="col px-0">
                  <button id="submitButton" onclick="return loginClick()" type="submit" class="btn btn-primary mt-4 w-100 submitButton">Sign in</button>
                </div>
              </div>
            </form>
    </div>
    </div>
  </div>
</div>

  <!--- carousel image slider -->
<div id="slideshow" class="carousel mx-auto slide " data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#slideshow" data-slide-to="0" class="active"></li>
    <li data-target="#slideshow" data-slide-to="1"></li>
    <li data-target="#slideshow" data-slide-to="2"></li>
  </ul>
  <!-- first image -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="carouselTint" src="img/frontpage/carousel/picnic.jpeg">
      <div class="carousel-caption">
        <h1 class="display-2">Memento</h1>
          <h3>Create Memories Together</h3>
            <button type="button" id="getStarted1" onclick="location.href = 'registration.php'" class="btn btn-light btn-lg" style="background-color: #1A75C1; color: #FFF;">Get Started</button>
      </div>
    </div>
    <!-- second image -->
    <div class="carousel-item">
      <img class="carouselTint" src="img/frontpage/carousel/hike.jpg">
      <div class="carousel-caption">
        <h1 class="display-2">Memento</h1>
          <h3>Create Memories Together</h3>
            <button type="button" id="getStarted2" onclick="location.href = 'registration.php'" class="btn btn-light btn-lg" style="background-color: #1A75C1; color: #FFF;">Get Started</button>
      </div>
    </div>
    <!-- third image -->
    <div class="carousel-item">
      <img class="carouselTint" src="img/frontpage/carousel/beertour.jpg">
      <div class="carousel-caption">
        <h1 class="display-2">Memento</h1>
          <h3>Create Memories Together</h3>
            <button type="button" id="getStarted3" onclick="location.href = 'registration.php'" class="btn btn-light btn-lg" style="background-color: #1A75C1; color: #FFF;">Get Started</button>
      </div>
    </div>    
  </div>
</div>

<!--- Jumbotron (name and description of app) -->
<div class="textcenter jumbotron">
  <div id="about" class="navbarOffset"></div>
  <h2>Memento</h2>
  <p class="lead">An event generating service which allows individuals and groups to contribute to a pot and enjoy local activities together.</p>
</div>

<!-- three icons (get together, reduce waste, support locals) -->
<div class="container col-lg-9 col-md-10 col-sm-11 col-xs-12">
  <div class="row">
    <img src="img/recycling.gif" id="A" alt="A"/>
    <!-- first ion -->
    <div class="col-12 col-md-4">
      <div class="card border-0">
        <img class="icons card-img-top mx-auto" src="img/frontpage/icon/social.png" alt="Create memories with loved ones">
        <div class="card-body">
          <h5 class="card-title text-center">Get Together</h5>
        </div>
      </div>
    </div>
    <!-- second icon -->
    <div class="col-12 col-md-4">
      <div class="card border-0">
        <img class="icons card-img-top mx-auto" src="img/frontpage/icon/recycling.png" alt="Recycling and reduce waste" onclick="huehuehue()">
        <div class="card-body">
          <h5 class="card-title text-center">Reduce Waste</h5>
        </div>
      </div>
    </div>
    <!-- third icon -->
    <div class="col-12 col-md-4">
      <div class="card border-0">
        <img class="icons card-img-top mx-auto" src="img/frontpage/icon/local.png" alt="Support small local businesses">
        <div class="card-body">
          <h5 class="card-title text-center">Support Local Economy</h5>
        </div>
      </div>
    </div>
  </div>
</div>

<!--- Two Column Section (mission statement, video) -->
<div class="row m-4 mx-auto col-lg-9 col-md-10 col-sm-11 col-xs-12 greyBG">
  <!-- mission statement -->
  <div class="textcenter col xs-12 lg-8 pt-3">
    <h2>Mission statement<small><br></small></h2>
    <p>While gift giving is well intentioned, we often miss the point: to create lasting memories with other people. 24% of all people believe most of the gifts they receive are useless junk. Each year, Canadians will throw out 540,000 tonnes of wrapping paper and gift bags. Our application, Memento takes all the money a group would have spent on gift-giving, aggregates a sum from anonymous personal budgets, and turns that sum it into a memorable experience. This not only reduces waste, but also supports local businesses and brings people together.</p>
  </div>
  <!-- video -->
  <div class="col-lg-4 mt-1">
    <br>
    <div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/FQHxHH8y3VA" allowfullscreen></iframe>
    </div>
  </div>
</div>

<!--- Footer -->
<footer class="site-footer page-footer font-small pt-3">
  <div class="container-fluid col-7 col-md-3 text-center my-auto">
    <h4>Links</h4>
    <div class="row pb-2">
      <div class="col-4">
        <a id="footerHome" ref="index.php">Home</a>
      </div>
      <div class="col-4">
        <a id="footerSignup" href="registration.php">Signup</a>
      </div>
      <div class="col-4">
        <a id="footerLogin" href="#" data-toggle="modal" data-target="#login">Login</a>
      </div>
    </div>
    <div class="mb-2">
      <a href="" class="blockoPayBtn" data-toggle="modal" data-uid=2dcbe732589b11e8><img width=110 src="./img/donate/button.png"></a>
    </div>
    </div>
  <div id="copyright" class="pt-1 text-center">
      2018 &copy; Team Five
  </div>
</footer>
  
  <?php if($_SESSION['loggedin'] === false): ?>
  
  <script>
    
  document.getElementById("Groups").innerHTML = ""; 
  document.getElementById("groupDivider").setAttribute("class", "");
  
  document.getElementById("getStarted1").setAttribute("onclick", "location.href='registration.php'");
  document.getElementById("getStarted2").setAttribute("onclick", "location.href='registration.php'");
  document.getElementById("getStarted3").setAttribute("onclick", "location.href='registration.php'");
  </script>
  
<?php endif; ?>

  
<?php if($_SESSION['loggedin'] === true): ?>
  
  <script>
  
  var User_Name='<?php echo $_SESSION['User_Name'];?>';
    
  document.getElementById("ms").innerHTML = "Welcome " + User_Name + "!"; 
  document.getElementById("ms").setAttribute("class", "nav-link ml-5"); 
    
  document.getElementById("signup").innerHTML = "Logout";
  document.getElementById("signup").setAttribute("href", "logout.php");

  document.getElementById("footerHome").innerHTML = "";
  document.getElementById("footerSignup").innerHTML = "Home";
  document.getElementById("footerSignup").setAttribute("href", "index.php");
  document.getElementById("footerLogin").innerHTML = "";
  
  document.getElementById("getStarted1").setAttribute("onclick", "location.href='createjoin.php'");
  document.getElementById("getStarted2").setAttribute("onclick", "location.href='createjoin.php'");
  document.getElementById("getStarted3").setAttribute("onclick", "location.href='createjoin.php'");
  </script>
  
<?php endif; ?>

<script
src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>
<script 
src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="mementoScripts.js"></script>
<script src="https://www.blockonomics.co/js/pay_button.js"></script>
  
<script>

  function loginClick() {
    
    var User_Name = document.getElementById('usernameForm2').value;
    var User_Password = document.getElementById('passwordForm2').value;
    
    var userLogin = {"User_Name":User_Name,"User_Password":User_Password};
      
    JSON.stringify(userLogin);
      
    console.log(userLogin);
          
      // This Ajax call sends user login info to the server to either login
      // the user and redirect them to a new page or return an error message.

        $.ajax({
        url: "signin.php",
        dataType: "json",
        type: "POST",
        data: userLogin,
        success: function(data) {
          
          console.log("successss");
          
          console.log("Data returned from server: ", data);
          
          if (data["error"] == "yes") {
          document.getElementById("loginErrorID").innerHTML = "Error: " + data["return"];
          }
          if (data["error"] == "no") {
          window.location = 'createjoin.php';
          }


        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText);
        }
      });
  }
  
</script>

</body>
</html>
