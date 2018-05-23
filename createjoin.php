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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <h1 class="mt-4 createheading">Create a Memento</h1>
      <div class="row">
        <div class="col-12 col-sm-6 my-4">
            <button type="button" class="btn btn-primary btn-lg createjoin" data-toggle="modal" data-target="#createModal" onclick="clearModalErrors()" style="background-color: #FFF; color: #1A75C1;">Create Group</button>
          <!-- <button type="button" onclick="location.href = 'create.html'" class="btn btn-primary btn-lg createjoin" style="background-color: #FFF; color: #1A75C1;">Create Group</button> -->
        </div>
        <div class="col-12 col-sm-6 my-4">
            <button type="button" class="btn btn-light btn-lg createjoin" data-toggle="modal" data-target="#joinModal" onclick="clearModalErrors()" style="background-color: #1A75C1; color: #FFF;">Join Group</button>
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
              <h5 id="createGroupError"></h5>
            
                <!-- form -->
            <form method='POST'>
              <div class="form-row mx-auto my-4">
                <input type="text" class="form-control" id="groupNameForm" placeholder="Group Name" name="Group_Name" pattern="[a-zA-Z0-9]{4,20}" required autofocus>
                <div id="groupnameError"></div>
              </div>

            <!-- password -->
              <div class="form-row mx-auto my-4">
                <input type="password" name="Group_Password" class="form-control" id="groupPasswordForm" placeholder="Password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
                <div id="groupPwError"></div>
              </div>

            <!-- confirm password -->
              <div class="form-row mx-auto my-4">
                <input type="password" class="form-control" id="confirmGroupPasswordForm" placeholder="Confirm password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
                <div id="groupPwMatch"></div>
              </div>
              
              <!-- Description -->
              <div class="form-row mx-auto mt-4" style="height: 100px;">
                <textarea type="text" id="descriptionForm" class="form-control" rows ="5" name="Group_Description" placeholder="Description" required></textarea>
              </div>
                <div id="descriptionError"></div>
              
              <!-- Group Size -->
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
                <div id="groupSizeError"></div>
                <div class="col px-0">
                <button id="createSubmitButton" type="button" class="btn btn-primary mt-4 w-100">Submit</button>
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
          <form method='POST'>
              <h5 id="joinGroupError"></h5>
              <div class="form-row mx-auto my-4">
                <input type="text" class="form-control" id="usernameForm" name="Group_ID" placeholder="Group ID" autofocus required>
              </div>
              <div class="form-row mx-auto my-4">
                <input type="password" class="form-control" id="passwordForm" placeholder="Password" name="Group_Password" required>
                <div class="col px-0">
                  <button id="joinSubmitButton" type="button" class="btn btn-primary mt-4 w-100">Submit</button>
                </div>
              </div>
              
            </form>
      </div>
      </div>
    </div>
  </div>
  <!-- Delete Group Modal -->
<div class="modal fade" id="deleteModal">
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
                       Delete Group
                     </h3>
                  </div>
                  <div class="col-2">
                      <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
                  </div>
                </div>
                </div>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body col-8 mx-auto">
          <h6>Are you sure you want to delete this group? This cannot be undone.</h6>
          <div class="col px-0">
            <div id='deletemodalID' style="display: none;"></div>
            <button id="deleteButton" type="button" class="btn btn-primary mt-4 w-100 deleteButton">Delete</button>
            <button id="noDelete" type="button" class="btn btn-primary mt-4 w-100" data-dismiss="modal">No</button>
          </div>
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
                     <h2 id="modalgroupname">GROUP NAME</h2>
                  </div>
                  <div class="col-2">
                      <button type="button" class="close text-right" data-dismiss="modal">&times;</button>
                  </div>
              </div>
            </div>
        </div>
        <!-- Modal body -->
        <div id="modalbody" class="modal-body col-12 mx-auto">
        
            <!-- group description, # of members, budget -->
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-5 mx-auto">
                <img id="grpimg" class="mr-2 my-3 rounded mx-auto d-block img-fluid img-thumbnail" src="img/aboutgroup/groupimg.jpeg" alt="group picture 1">
                    

              </div>
              <div id="maintext" class="col-sm-12 col-md-7 mb-4">
                <div class="row">
                  <div class="col-1">
                    <i class='fa fa-comment'></i>
                  </div>
                  <div class="col-11">
                    <h5>Group ID: <span id="modalgroupID"></span></h5>
                    <h5 id="modalgroupdescription"></h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-1">
                    <i class='fa fa-users'></i>
                  </div>
                  <div class="col-11">
                    <h5 id="numbermembers"></h5>
                    <h5 id="currentmembers"></h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-1">
                    <i class='fa fa-dollar'></i>
                  </div>
                  <div class="col-11">
                    <h5>Personal Budget: <span id="currentBudgetID">Please enter below</span></h5>
                    <h5 id="groupBudgeth5"></h5>
                  </div>
                </div>
                <div id="groupEventID" style="display: none;"></div>
                <h5 color="red" id="BudgetErrorID"></h5>
                <br>
                <form method='POST' autocomplete="off">
                  <input type="number" class="form-control" id="personalBudget" placeholder="Personal Budget" min="0" value="0">
                  <button id="budgetSubmit" type="button" class="btn btn-primary mt-4 w-100">Submit</button>
                </form>
                <br>
                
              </div>
            </div>
          </div>


        </div>
        <div id="modalbodyevents"></div>
      </div>
    </div>
  </div>
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
  var User_Name='<?php echo $_SESSION['User_Name'];?>';
  //console.log(User_Name);
  
  var userInfo = {"User_Name":User_Name};

  //JSON.stringify(userInfo);
  console.log(userInfo);
  
$.ajax({
  url: "ajax-post-userReg.php",
  dataType: "json",
  type: "POST",
  data: userInfo,
  success: function(data) {

    var userReg = data;

    console.log("user reg data:", userReg);

    $.ajax({
    url: "ajax-get-groups.php",
    dataType: "json",
    type: "GET",
    success: function(data) {
      
      console.log("groups data:",data);

      var userRegLength = Object.keys(userReg).length;
      var groupLength = Object.keys(data).length;

      // iterate through user registration info
      for (i = 0; i < userRegLength; i++) {

        //iterate through all groups
        for (g = 0; g < groupLength; g++) {
          if (userReg[i]["Group_ID"] == data[g]["ID"]) {
            
            tables.innerHTML += "<div class='clickableDiv' id='" + userReg[i]["Group_ID"] + "hideid'><a id=" + userReg[i]["Group_ID"] + " href='#' data-toggle='modal' onClick='reply_click(this.id)' data-target='#aboutModal'><div class='row xs-12 mx-2'><li class='media'><img class='mr-2 mb-3' src=" + data[g]["Group_ImgLoc"] + " alt='group picture'><div class='media-body'><h4 class='mt-0 mb-1'>" + data[g]["Group_Name"] + "</h4><p>Group ID: " + userReg[i]["Group_ID"] + "</p><p>" + data[g]["Group_Description"] + "</p></div></li></div></a><p><form action='upload.php' method='post' enctype='multipart/form-data'>Choose a profile picture for your group (optional):<input type='hidden' name='Group_ID' value=" + userReg[i]["Group_ID"] + "><input type='file' name='grouppic'><input type='submit' value='Upload' name='submit'></form></p><div class='text-center'><button type='button' id='0" + userReg[i]["Group_ID"] + "' name='deleteButton' onClick='delete_click(this.id)' class='groupDelete mb-2' href='#' data-toggle='modal' data-target='#deleteModal'>Delete Group</button></div></div>";

            }
        }
      }



    },
    error: function(jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.statusText);
    }
  });

  },
  error: function(jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.statusText);
  }
});
  
  
/*]]>*/
</script>
  
  <script>
/*<![CDATA[*/
    
    var User_Name='<?php echo $_SESSION['User_Name'];?>';
    
    document.getElementById("ms").innerHTML = "Welcome " + User_Name + "!"; 
    
    document.getElementById("ms").setAttribute("class", "nav-link ml-5"); 
    
    function delete_click(clicked_id) {
      var Group_ID = clicked_id.substring(1);
      document.getElementById("deletemodalID").innerHTML = Group_ID;
    }
  
    function reply_click(clicked_id) {
      
    // Updates the modal with the id of what was clicked - the id is set to the Group_Name when created.
      
    var Group_Event_ID;
      
    var allbudgetsentered;
    
    Group_ID = (clicked_id);
    document.getElementById("modalgroupID").innerHTML = Group_ID;
    
        // Ajax call to get query database for groups, find the group that matches the id that was clicked, updates the modal with group description and number of members.
      
        $.ajax({
            url: "ajax-get-groups.php",
            dataType: "json",
            type: "GET",
            success: function(data) {
              
                var length = Object.keys(data).length;
              
                var Group_Size = 0;
                
                var Group_ImgLoc;
                
                for (i = 0; i < length; i++) {
                  
                  //console.log("Group Name: " + Group_Name);
                  //console.log(data[i]["Group_Name"]);
                  
                  if (data[i]["ID"] === Group_ID) {
                    
                    //console.log("i = " + i);
                    
                  //console.log(data[i]["Group_Description"]);
                    Group_Description = data[i]["Group_Description"];
                    Group_Size = "" + data[i]["Group_Size"];
                    Group_Event_ID = data[i]["Event_Name"];
                    Group_Name = data[i]["Group_Name"];
                    
                    document.getElementById("modalgroupname").innerHTML = Group_Name;
                    document.getElementById("groupEventID").innerHTML = Group_Event_ID;
                    
                    Group_ImgLoc = data[i]["Group_ImgLoc"];
                    document.getElementById("grpimg").setAttribute("src", Group_ImgLoc);
                    document.getElementById("modalgroupdescription").innerHTML = "" + Group_Description;
                    document.getElementById("numbermembers").innerHTML = "Members (max <span id='groupSizeID'>" + Group_Size + "</span>):</br>";  
              } 
              }
              
              // Second Ajax call inside this one to access Group_Size variable.
              
                          
      // This Ajax call queries the Registration table to find the number
      // of users in the group, and if the group is full, the total budget.
      
      $.ajax({
        url: "ajax-get-registration.php",
        dataType: "json",
        type: "POST",
        success: function(data) {
            // get events
            var events = "";
            //console.log("test");
            //console.log(data);
          
            var length = Object.keys(data).length;
            var userCount = 0;
            var userBudgetCount = 0;
            
            // Create var outside loop so it's accessible outside loop:
            var groupBudget = 0;
          
            document.getElementById("currentmembers").innerHTML = "<h5>" + "</h5>";
                
            for (i = 0; i < length; i++) {

              if (data[i]["Group_ID"] === Group_ID) {
                
                userCount++;

                document.getElementById("currentmembers").innerHTML += "<h5>" + data[i]["User_Name"] + "</br></h5>";
                
                // Sum up the group's budget:
                
                var Reg_Budget = data[i]["Registration_Budget"];
                //console.log("Reg_Budget = " + Reg_Budget)
                  if (Reg_Budget != null) {
                    
                  groupBudget += Number(Reg_Budget);
                  userBudgetCount++;
                    
                }
                
                  if (User_Name == data[i]["User_Name"]) {
                    if (Reg_Budget != null) {
                  document.getElementById("currentBudgetID").innerHTML = "$" + Number(Reg_Budget).toFixed(2);
                    } else {
                      document.getElementById("currentBudgetID").innerHTML = "Please enter below";
                    }
                  }
                
              } 
              }
          
              allbudgetsentered = false;
          
              if (userCount == Group_Size && userBudgetCount == Group_Size) {
                //console.log("userBudgetCount: " + userBudgetCount);
                //console.log("Group size: " + Group_Size);
                allbudgetsentered = true;
                groupBudget /= Group_Size;
                groupBudget = Number(groupBudget).toFixed(2);
                
              } else {
                groupBudget = null;
              }

                     
 
              if (!allbudgetsentered || userCount < Group_Size) {
                document.getElementById("groupBudgeth5").innerHTML = "<h6>The Group must be full and all members must have submitted budgets for Event options to be displayed. However, you can browse the full list of Event <a href='allevents.php'>here.</a></h6>";
              }
          
              if (userCount == Group_Size && allbudgetsentered) {
                    document.getElementById("groupBudgeth5").innerHTML = "Budget per Person: " + "<span id=groupBudget>$" + groupBudget + "</span>";
              }
                
      // This Ajax call queries the database for all Events.
          
      // First compile the data needed to query database for appropriate Events:
          
      var groupInfo = {"Group_Size":Group_Size,"Group_Budget_Set":allbudgetsentered,"Group_BudgetPP":groupBudget,"Group_Event_ID":Group_Event_ID}
      
      console.log("sent: ", groupInfo);
      
        $.ajax({
        url: "ajax-get-events.php",
        dataType: "json",
        type: "POST",
        data: groupInfo,
        success: function(data) {
            //console.log("test");
            //console.log(data);
          
            //Only show first div and set it to Group's Event if an Event is set for the group:
            console.log("received: ", data);
            console.log("Group_Event_ID: " + Group_Event_ID);
          
            if (Group_Event_ID) {
            console.log("if statement entered.");
            // If the Group already has an Event set, show that Event and hide others:
              
            modalbodyevents.innerHTML = "<div id='selectedEvent' class='text-center mb-3'>Your group has selected the following event:<br></div><div id='eventDiv1' class='w-100 mb-3'>"
                    + "<div class='card mx-auto'><img id='event1image' class='card-img-top'"
                    + "src='" + data[0]["Event_ImgLocation"]
                    + "' alt='Card image cap'><div class='card-body'><h3 id='event1name' class='card-title'>"
                    + data[0]["Event_Name"] + "</h3><p id='event1description' class='card-text'>"
                    + data[0]["Event_Description"] + "</p><a id='event1link' href='" + data[0]["Event_URL"]
                    + "'>Visit their site for more information</a></div></div></div>";   
              
              
            // Else populate with relevant Events:
              
            } else if (allbudgetsentered) {
              
            var length = Object.keys(data).length;
            
            if (length > 0){
              
            modalbodyevents.innerHTML = "The following events are recommended for your group based on your group size and budget per person. Choose one for your group and make it happen!";
              
            for (i = 0; i < length; i++) {
            
            modalbodyevents.innerHTML += "<div id='eventDiv1' class='w-100 mb-3'>"
                    + "<div class='card mx-auto'><img class='card-img-top'"
                    + "src='" + data[i]["Event_ImgLocation"]
                    + "' alt='Card image cap'><div class='card-body'><h3 id='event1name' class='card-title'>"
                    + data[i]["Event_Name"] + "</h3><p id='event1description' class='card-text'>"
                    + data[i]["Event_Description"] + "</p><a href='" + data[i]["Event_URL"]
                    + "'>Visit their site for more information</a><button id='"
                    + data[i]["ID"] + "' type='button' onclick='set_event(this.id)'"
                    + "class='btn btn-primary float-right'>Select This Event For Your Group</button></div></div></div>";
            }
              
            }
              

          
        } else {
          // Clear the events if the group isn't ready to pick one yet:
          modalbodyevents.innerHTML ="";
        }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#modalgroupdescription").text(jqXHR.statusText);
        }
      });
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#modalgroupdescription").text(jqXHR.statusText);
        }
      });
              
              
            },
            error: function(jqXHR, textStatus, errorThrown) {
                $("#modalgroupdescription").text("An error has occurred.");
            }
          }); 
      
      }

    
    function set_event(clicked_id) {
      
      var Event_ID = clicked_id;
      
      var Group_Name = document.getElementById("modalgroupname").innerHTML;
      
      console.log("Clicked id: " + clicked_id);
      
      var eventInfo = {"Group_Name":Group_Name,"Event_ID":Event_ID};
      
      JSON.stringify(eventInfo);
      
      console.log(eventInfo);
      
      $.ajax({
        url: "ajax-post-selectEvent.php",
        dataType: "json",
        type: "POST",
        data: eventInfo,
        success: function(data) {
          
        console.log("Data received: ", data);
          
        if (data["error"] = "no") {
          
        modalbodyevents.innerHTML = "<div id='selectedEvent' class='text-center mb-3'>Your group has selected the following event:<br></div><div id='eventDiv1' class='w-100 mb-3'>"
                    + "<div class='card mx-auto'><img id='event1image' class='card-img-top'"
                    + "src='" + data[0]["Event_ImgLocation"]
                    + "' alt='Card image cap'><div class='card-body'><h3 id='event1name' class='card-title'>"
                    + data[0]["Event_Name"] + "</h3><p id='event1description' class='card-text'>"
                    + data[0]["Event_Description"] + "</p><a id='event1link' href='" + data[0]["Event_URL"]
                    + "'>Visit their site for more information</a></div></div></div>"; 
          
          }
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText);
        }
      });
      
      
    }
    
    
function clearModalErrors() {
  document.getElementById("createGroupError").innerHTML = "";
  document.getElementById("joinGroupError").innerHTML = "";
}


/*]]>*/
</script>
  
</body>
</html>