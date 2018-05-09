<?php 
session_start();

if($_SESSION['loggedin'] == false){
  header( 'Location: error.html' ) ;
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
  <title>My Groups</title>

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
            <a class="nav-link" href="createjoin.php">Groups</a>
          </li>
          <div class="dropdown-divider"></div>
          <li class="nav-item my-0">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
          <div class="dropdown-divider"></div>
          <li id="ms" class="nav-item my-0 nav-link ml-5">
            Welcome
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- The Modal -->
<div class="modal fade" id="login">
  <div class="modal-dialog">
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
        <form method="post" action="signin.php">
		  <input type="text" name="User_Name" class="modaluserpw" placeholder="Username" autofocus>
		  <input type="password" name="User_Password" 
          class="modaluserpw" placeholder="Password">
		  <input type="submit" name="login" class="login loginmodal-submit modaluserpw" value="Login">
		</form>
    </div>
    </div>
  </div>
</div>

<!-- background div -->
<div class="loggedInBG">

<!-- main div container -->
<div class="container-fluid">
<div id="main" class="container col-lg-6 col-md-7 col-sm-9 w-90 px-2 pt-4 title">
  <div class="row xs-12 text-left font-weight-bold">
    <div class="col">
      <!-- signup form -->
      <div class="container px-3 rounded mb-4">
        <div class="row xs-12 text-left font-weight-bold">
          <div id="title" class="col text-center py-3 mb-3">
            My Groups
          </div>
        </div>
        <div id="content" class="row xs-12">
          <ul id="tables" class="list-unstyled w-100">

            <div class="clickableDiv">
              <a href="aboutgroup.html">
                <div id="firstGroup" class="row xs-12 mx-2">
                  <li class="media">
                    <img class="mr-2 mb-3" src="img/mygroups/suit.jpeg" alt="group picture 1">
                    <div class="media-body">
                      <h4 class="mt-0 mb-1">Coworkers</h4>
                      <p>Year end celebration</p>
                    </div>
                  </li>
                </div>
              </a>
            </div>

            <div class="clickableDiv">
              <a href="aboutgroup.html">
                <div id="secondGroup" class="row xs-12 mx-2">
                  <li class="media">
                    <img class="mr-2 mb-3" src="img/mygroups/seawall.jpeg" alt="group picture 1">
                    <div class="media-body">
                      <h4 class="mt-0 mb-1">Family</h4>
                      <p>Rent bikes to go around seawall</p>
                    </div>
                  </li>
                </div>
              </a>
            </div>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

<!--- Footer -->
<footer class="site-footer page-footer font-small pt-3">
  <div class="container-fluid col-7 col-md-3 text-center my-auto">
    <h4>Links</h4>
    <div class="row pb-2">
      <div class="col-4">
        <a href="index.php">Home</a>
      </div>
      <div class="col-4">
        <a href="registration.php">Signup</a>
      </div>
      <div class="col-4">
        <a href="#" data-toggle="modal" data-target="#login">Login</a>
      </div>
    </div>
  </div>
  <div id="copyright" class="pt-1 text-center">
      2018 &copy; Team Five
  </div>
</footer>
  
  
<script>
  
var User_Name='<?php echo $_SESSION['User_Name'];?>';
    
document.getElementById("ms").innerHTML += User_Name + "!";  

</script>
  
<?php 
  
  $servername = "localhost";
  $dblogin = "evanmorr_team5";
  $password = "Team5!Team5!";
  $dbname = "evanmorr_mementodb";
  
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  $sql = "SELECT * FROM tbl_Registration WHERE User_Name = :UserName";

  $statement = $conn->prepare($sql);
  $statement->execute(array(":UserName" => $_SESSION['User_Name']));
  $count = $statement->rowCount();
  $rows = $statement->fetchAll();
  foreach ($rows as $row): ?>
  
  <?php
  
  $Group_Name = $row['Group_Name'];
  
  $sql2 = "SELECT * FROM tbl_Group WHERE Group_Name = :GroupName";
  
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $statement2 = $conn->prepare($sql2);
  $statement2->execute(array(":GroupName" => $Group_Name));
  $groupArray = $statement2->fetchAll();
  ?>
  
    <script>
    var Group_Name = '<?php echo $row['Group_Name'];?>';
    var Group_Description = '<?php echo $groupArray[0]['Group_Description'];?>';
    tables.innerHTML += "<div class='clickableDiv'><a href='aboutgroup.html'><img class='mr-2 mb-3' src='img/mygroups/suit.jpeg' alt='group picture 1'><div class='media-body'><h4 class='mt-0 mb-1'>" + Group_Name + "</h4><p>" + Group_Description + "</p></div></li></div></a></div>";
    </script>
    
<?php endforeach; ?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="mementoScripts.js"></script>
  </body>
</html>