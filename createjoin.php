<?php 
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

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
    <h1 class="mt-4 createheading">Create a Memento</h1>
      <div class="row">
        <div class="col-12 col-sm-6 my-4">
            <button type="button" class="btn btn-primary btn-lg createjoin" data-toggle="modal" data-target="#createModal" style="background-color: #FFF; color: #1A75C1;">Create Group</button>
          <!-- <button type="button" onclick="location.href = 'create.html'" class="btn btn-primary btn-lg createjoin" style="background-color: #FFF; color: #1A75C1;">Create Group</button> -->
        </div>
        <div class="col-12 col-sm-6 my-4">
            <button type="button" class="btn btn-light btn-lg createjoin" data-toggle="modal" data-target="#joinModal" style="background-color: #1A75C1; color: #FFF;">Join Group</button>
          <!-- <button type="button" onclick="location.href = 'join.html'" class="btn btn-light btn-lg createjoin" style="background-color: #1A75C1; color: #FFF;">Join Group</button> -->
        </div>





  </div>

      <!-- main div container -->
<div class="container-fluid divBorder my-4">
  <div id="main" class="container col-12 w-90 px-2 pt-4 title">
    <div class="row xs-12 text-left font-weight-bold">
      <div class="col">
        <!-- signup form -->
        <div class="container px-3 rounded mb-4">
          <div class="row xs-12 text-left font-weight-bold">
            <div id="title" class="col text-center mb-3">
              My Groups
            </div>
          </div>
          <div id="content" class="row xs-12">
            <ul class="list-unstyled w-100">
  
              <div class="clickableDiv">
                <a href="#" data-toggle="modal" data-target="#aboutModal">
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
                <a href="#" data-toggle="modal" data-target="#aboutModal">
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
                <a href="#" data-toggle="modal" data-target="#aboutModal">
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
  
  
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>




      </div>
      
</header>

<!-- Create Group Modal -->
<div class="modal fade" id="createModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header mx-auto">
            <div class="container mx-auto">
                <div class="row">
                  <div class="col-2">
                  </div>
                  <div class="col-8 text-center">
                     <h2>
                       Create a Group
                     </h2>
                  </div>
                  <div class="col-2">
                      <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
                  </div>
              </div>
            </div>
        </div>
        <!-- Modal body -->
        <div class="modal-body col-8 mx-auto">
            <div id="form" class="col text-center px-3 py-3">
                <!-- form -->
            <form method="post" action="creategroup.php" onsubmit="return validate()">
              <div class="form-row mx-auto my-4">
                <input type="text" class="form-control" id="groupNameForm" placeholder="Group Name" name="Group_Name" pattern="[a-zA-Z0-9]{4,20}" oninput="checkGroupName(this)"  required autofocus>
              </div>
            <!-- password -->
              <div class="form-row mx-auto my-4">
                <input type="password" name="Group_Password" class="form-control" id="groupPasswordForm" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$"  oninput="checkPw(this)" required>
              </div>

            <!-- confirm password -->
              <div class="form-row mx-auto my-4">
                <input type="password" class="form-control" id="confirmGroupPasswordForm" placeholder="Confirm password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" oninput="checkPw(this)" required>
              </div>
              
              <div class="form-row mx-auto my-4" style="height: 100px;">
                <textarea type="text" id="descriptionForm" class="form-control" rows ="5" name="Group_Description" placeholder="Description" required></textarea>
              </div>
              <div class="form-row mx-auto my-4">
                <select class="form-control" name="Group_Size" title="Number of people" id="totalPeople" required>
                  <option value="" selected>Number of people</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                </select>
                <div class="col px-0">
                <button id="submitButton" type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
              </div>
              </div>
            </form>
      </div>
      </div>
    </div>
  </div>
</div>

<!-- Join Group Modal -->
<div class="modal fade" id="joinModal">
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
                       Join a Group
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
          <!-- form -->
          <form method="post" action="joingroup.php">
              <div class="form-row mx-auto my-4">
                <input type="text" class="form-control" id="usernameForm" name="Group_Name" placeholder="Group Name" autofocus required>
              </div>
              <div class="form-row mx-auto my-4">
                <input type="password" class="form-control" id="passwordForm" placeholder="Password" name="Group_Password" required>
                <div class="col px-0">
                  <button id="submitButton" type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
                </div>
              </div>
              
            </form>
      </div>
      </div>
    </div>
  </div>
<!-- About Group Modal -->
<div class="modal fade" id="aboutModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <!-- Modal Header -->
        <div class="modal-header mx-auto">
            <div class="container mx-auto">
                <div class="row">
                  <div class="col-2">
                  </div>
                  <div class="col-8 text-center">
                     <h2>
                       GROUP NAME
                     </h2>
                  </div>
                  <div class="col-2">
                      <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
                  </div>
              </div>
            </div>
        </div>
        <!-- Modal body -->
        <div class="modal-body col-12 mx-auto">
            <!-- group description, # of members, budget -->
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-5 mx-auto">
                <img class="mr-2 my-3 rounded mx-auto d-block img-fluid img-thumbnail" src="img/aboutgroup/groupimg.jpeg" alt="group picture 1">
              </div>
              <div id="maintext" class="col-sm-12 col-md-7 mb-4">
                <h2>Description</h2>
                <h3>Number of Members</h3>
                <br>
                <p>Budget</p>
              </div>
            </div>
          </div>
          <!-- events -->
          <div class="container-fluid">
            <div class="row">
              <!-- event 1 -->
              <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                <div class="card mx-auto">
                  <img class="card-img-top" src="img/aboutgroup/event.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h3 class="card-title">event</h3>
                    <p class="card-text">event description</p>
                  </div>
                </div>
              </div>
              <!-- event 2 -->
              <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                <div class="card mx-auto">
                  <img class="card-img-top" src="img/aboutgroup/event.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h3 class="card-title">event</h3>
                    <p class="card-text">event description</p>
                  </div>
                </div>
              </div>
              <!-- event 3 -->
              <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                <div class="card mx-auto">
                  <img class="card-img-top" src="img/aboutgroup/event.jpeg" alt="Card image cap">
                  <div class="card-body">
                    <h3 class="card-title">event</h3>
                    <p class="card-text">event description</p>
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
        <a href="index.html">Home</a>
      </div>
      <div class="col-4">
        <a href="register.html">Signup</a>
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
    
document.getElementById("ms").innerHTML = "Welcome " + User_Name + "!"; 
document.getElementById("ms").setAttribute("class", "nav-link ml-5"); 

</script>
  
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="mementoScripts.js"></script>
</body>
</html>