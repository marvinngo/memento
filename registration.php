<?php 

// Start a session if it doesn't already exist, and set state of logged in to false if it isn't set.

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}

// Redirect to the home page if user is logged in.

if($_SESSION['loggedin'] === true){
  header( 'Location: index.php' ) ;
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
  <title>Register</title>

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
      <h5 id="loginErrorID"></h5>
        <!-- username -->
        <form method="post" action="signin.php">
              <div class="form-row mx-auto my-4">
                <input type="text" name="User_Name" class="form-control" id="usernameForm2" placeholder="Username" required>
              </div>

              <!-- password -->
              <div class="form-row mx-auto my-4">
                <input type="password" name="User_Password" class="form-control" id="passwordForm2" placeholder="Password" required>
                <div class="col px-0">
                  <button id="submitButton" type="button" class="btn btn-primary w-100 mt-4 submitButton">Sign in</button>
                </div>
              </div>
            </form>
    </div>
    </div>
  </div>
</div>

<!-- background div -->
<div class="registerBG container-fluid">
  <!-- main div container -->
  <div id="main" class="container col-lg-6 col-md-7 col-sm-9 w-90 px-2 pt-4 title">
    <div class="row xs-12 text-left font-weight-bold">
      <div class="col">
        <div class="container pt-2 px-3 rounded mb-4">
          <div class="row xs-12 text-left font-weight-bold">
            <!-- form container -->
            <div id="title" class="col text-center px-3 py-3">
              <div class="container-fluid w-100 mb-4">
                <div class="row">
                  <div class="container col-xs-12 col-sm-10 col-md-10 col-lg-8 divBorder title">
                    <div class="pt-3">
                      Sign Up
                    </div>

            <!-- sign up form -->
              <form method="post" action="register.php">
                
                <!-- username -->
                <div class="form-row col-xs-12 col-sm-10 col-md-10 col-lg-6 mx-auto my-4">
                  <input type="text" name="User_Name" class="form-control" id="usernameRegistrationForm" placeholder="Username" pattern="[a-zA-Z0-9]{4,20}" required autofocus>
                  <div id="usernameError"></div>
                  <div id="registrationError"></div>
                </div>

                <!-- password -->
                <div class="form-row col-xs-12 col-sm-10 col-md-10 col-lg-6 mx-auto my-4">
                  <input type="password" name="User_Password" class="form-control" id="passwordForm" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
                  <div id="passwordError"></div>
                </div>


                  <!-- confirm password -->
                  <div class="form-row col-xs-12 col-sm-10 col-md-10 col-lg-6 mx-auto my-4">
                  <input type="password" name="confirm_User_Password" class="form-control" id="confirmpasswordForm" placeholder="Confirm Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
                  <div id="passwordMatch"></div>
                </div>

                


                <!-- email -->
                <div class="form-row col-xs-12 col-sm-10 col-md-10 col-lg-6 mx-auto my-4">
                  <input type="email" name="User_Email" class="form-control" id="emailRegistrationForm" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                  <div id="emailError" class="text-center"></div>

                  <div class="col px-0">
                    <button type="button" id="registerSubmit" class="btn btn-primary mt-4 submitButton float-right" name="submit">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="container-fluid w-100 mb-4">
            <div class="row">
              <div class="container col-xs-12 col-sm-10 col-md-10 col-lg-8 divBorder title pt-3">
            <!-- form for existing users -->
              <small><b>Already have an account? <br> 
                Sign in:</b></small>
              <div id="loginErrorID2"></div>

              <!-- username -->
              <form method="post" action="signin.php">
              <div class="form-row col-xs-12 col-sm-10 col-md-10 col-lg-6 mx-auto my-4">
                <input type="text" name="User_Name" class="form-control" id="usernameForm" placeholder="Username" pattern="[a-zA-Z0-9]{4,20}" required>
              </div>

              <!-- password -->
              <div class="form-row col-xs-12 col-sm-10 col-md-10 col-lg-6 mx-auto my-4">
                <input type="password" name="User_Password" class="form-control" id="passwordForm3" placeholder="Password" pattern="[a-zA-Z0-9]{8,20}" required>
                <div class="col px-0">
                  <button id="submitButton2" type="button" class="btn btn-primary mt-4 submitButton float-right">Sign in</button>
                </div>
              </div>
            </form>
            </div>
            </div>
          </div>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="mementoScripts.js"></script>

  <script>
  
  </script>
  
  </body>
</html>