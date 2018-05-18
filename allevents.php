<?php 
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

if($_SESSION['loggedin'] === false){
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
  <title>Groups</title>

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
            <a class="nav-link" href="createjoin.php">Groups</a>
          </li>
          <div class="dropdown-divider"></div>
          <li class="nav-item my-0">
            <a id="signup" class="nav-link" href="logout.php">Logout</a>
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
<div class="modal fade" id="login" role="dialog">
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


<!-- background -->
<header class="masthead d-flex">
  <!-- main div container -->
  <div class="container col-12  col-sm-9  col-md-8  col-lg-5 text-center mt-3 title">
    <h1 class="mt-4 eventsheading">Events</h1>

      <!-- main div container -->
<div class="container-fluid divBorder my-4">
  <div id="main" class="container col-12 w-90 px-2 pt-4 title">
    <div class="row xs-12 text-left font-weight-bold">
      <div class="col">
        <!-- signup form -->
        <div class="container px-3 rounded mb-4">
          <div id="content" class="row xs-12">
            <ul id="tables" class="list-unstyled w-100">
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>




      </div>
      
</header>

<!--- Footer -->
<footer class="site-footer page-footer font-small pt-3">
  <div class="container-fluid col-7 col-md-3 text-center my-auto">
    <h4>Links</h4>
    <div class="row pb-2">
      <div class="col-4">
        <a id="footerHome" href="index.php">Home</a>
      </div>
      <div class="col-4">
        <a id="footerSignup" href="registration.php">Signup</a>
      </div>
      <div class="col-4">
        <a id="footerLogin" href="#" data-toggle="modal" data-target="#login">Login</a>
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
document.getElementById("footerHome").innerHTML = "";
document.getElementById("footerSignup").innerHTML = "Home";
document.getElementById("footerSignup").setAttribute("href", "index.php");
document.getElementById("footerLogin").innerHTML = "";
  

</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"
integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="mementoScripts.js"></script>
  
  <script>
/*<![CDATA[*/
    
    // Adding all events:  
  
// Ajax call to get all events:
  
  
  $.ajax({
        url: "ajax-get-all-events.php",
        dataType: "json",
        type: "POST",
        success: function(data) {
          
          //console.log("received: ", data);
          
          var length = Object.keys(data).length;

          for (i = 0; i < length; i++) {

          tables.innerHTML += "<div id='eventDiv1' class='w-100 mb-3'>"
                  + "<div class='card mx-auto'><img id='event1image' class='card-img-top'"
                  + "src='" + data[i]["Event_ImgLocation"]
                  + "' alt='Card image cap'><div class='card-body'><h3 id='event1name' class='card-title'>"
                  + data[i]["Event_Name"] + "</h3><p id='event1description' class='card-text'>"
                  + data[i]["Event_Description"] + "</p><a id='event1link' href='" + data[i]["Event_URL"]
                  + "'>Visit their site for more information</a></div></div></div>"; 
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#tables").text(jqXHR.statusText);
        }
      });
    
    var User_Name='<?php echo $_SESSION['User_Name'];?>';
    
    document.getElementById("ms").innerHTML = "Welcome " + User_Name + "!"; 
    
    document.getElementById("ms").setAttribute("class", "nav-link ml-5"); 

/*]]>*/
</script>
  
</body>
</html>