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
            <form method='POST' onsubmit="return validate()">
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
                <button id="submitButton" type="submit" onclick="createClick()" class="btn btn-primary mt-4 w-100">Submit</button>
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
                <input type="text" class="form-control" id="usernameForm" name="Group_Name" placeholder="Group Name" autofocus required>
              </div>
              <div class="form-row mx-auto my-4">
                <input type="password" class="form-control" id="passwordForm" placeholder="Password" name="Group_Password" required>
                <div class="col px-0">
                  <button id="submitButton" onclick="joinClick()" type="submit" class="btn btn-primary mt-4 w-100">Submit</button>
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
                     <h2 id="modalgroupname">
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
        <div id="modalbody" class="modal-body col-12 mx-auto">
        
            <!-- group description, # of members, budget -->
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-5 mx-auto">
                <img id="grpimg" class="mr-2 my-3 rounded mx-auto d-block img-fluid img-thumbnail" src="img/aboutgroup/groupimg.jpeg" alt="group picture 1">
                    

              </div>
              <div id="maintext" class="col-sm-12 col-md-7 mb-4">
                <h2 id="modalgroupdescription">Description</h2>
                <h3 id="numbermembers">Max Members</h3>
                <h5 id="currentmembers"></h5>
                <h5>Personal Budget: <span id="currentBudgetID">not set.</span></h5>
                <div id="groupBudgeth5"></div>
                <h5 color="red" id="BudgetErrorID"></h5>
                <br>
                <form method='POST'>
                  <input type="number" class="form-control" id="personalBudget" placeholder="Personal Budget" min="0" value="0">
                  <button id="budgetSubmit" type="submit" onclick="return updateBudgetTable();" class="btn btn-primary mt-4 w-100">Submit</button>
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
  
// The following just used to hold Event IDs for use in selecting Events for Groups.
  
//document.getElementById("event1ID").style.display="none";
//document.getElementById("event2ID").style.display="none";
//document.getElementById("event3ID").style.display="none";

</script>
  
<?php 
  
  try {
  
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
  
  // Storing group data for use in modal:
  
  $sql = "SELECT * FROM tbl_Group";

  $statement = $conn->prepare($sql);
  $statement->execute(array());
  $groupcount = $statement->rowCount();
  $groups = $statement->fetchAll();
    
  } catch(PDOException $e) {
      echo "<p style='color: red;'>From the SQL code: $sql</p>";
      $error = $e->getMessage();
      echo "<p style='color: red;'>$error</p>";
  }
    
  ?>
  <script>
    var groupcount = '<?php echo $groupcount;?>';
    var groups = new Array();
    
    <?php foreach($groups as $key => $group){
    foreach($group as $key => $value){?>
        groups.push('<?php echo $value; ?>');
    <?php } } ?>
  </script>
  <?php
  // Loop begins below foreach, and ends at endforeach
  
  foreach ($rows as $row): ?>
  
  <?php
  
  try {
  
  $Group_Name = $row['Group_Name'];
  
  $sql2 = "SELECT * FROM tbl_Group WHERE Group_Name = :GroupName";
  
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $statement2 = $conn->prepare($sql2);
  $statement2->execute(array(":GroupName" => $Group_Name));
  $groupArray = $statement2->fetchAll();
    
  } catch(PDOException $e) {
    echo "<p style='color: red;'>From the SQL code: $sql</p>";
    $error = $e->getMessage();
    echo "<p style='color: red;'>$error</p>";
  }
    
  ?>
  
  <script>
    var Group_Name = '<?php echo $row['Group_Name'];?>';
    var Group_Image = '<?php echo $groupArray[0]['Group_ImgLoc'];?>';
    var Group_Description = '<?php echo $groupArray[0]['Group_Description'];?>';
    tables.innerHTML += "<div class='clickableDiv'><a id=" + Group_Name + " href='#' data-toggle='modal' onClick='reply_click(this.id)' data-target='#aboutModal'><div class='row xs-12 mx-2'><li class='media'><img class='mr-2 mb-3' src=" + Group_Image + " alt='group picture'><div class='media-body'><h4 class='mt-0 mb-1'>" + Group_Name + "</h4><p>" + Group_Description + "</p></div></li></div></a><p><form action='upload.php' method='post' enctype='multipart/form-data'>Choose a profile picture for your group (optional):<input type='hidden' name='GroupName' value=" + Group_Name + "><input type='file' name='grouppic'><input type='submit' value='Upload' name='submit'></form></p></div>";
    </script>
  
  
<?php endforeach; ?>

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
    
    document.getElementById("ms").innerHTML = "Welcome " + User_Name + "!"; 
    
    document.getElementById("ms").setAttribute("class", "nav-link ml-5"); 
  
    function reply_click(clicked_id) {
      
    // Updates the modal with the id of what was clicked - the id is set to the Group_Name when created.
    
    Group_Name = (clicked_id);
    document.getElementById("modalgroupname").innerHTML = Group_Name;
    
        // Ajax call to get query database for groups, find the group that matches the id that was clicked, updates the modal with group description and number of members.
      
        $.ajax({
            url: "ajax-get-groups.php",
            dataType: "json",
            type: "GET",
            success: function(data) {
              
                var length = Object.keys(data).length;
              
                var Group_Size = 0;
                
                var Group_Event_ID;
                
                var Group_ImgLoc;
                
                for (i = 0; i < length; i++) {
                  
                  //console.log("Group Name: " + Group_Name);
                  //console.log(data[i]["Group_Name"]);
                  
                  if (data[i]["Group_Name"] === Group_Name) {
                    
                    //console.log("i = " + i);
                    
                  //console.log(data[i]["Group_Description"]);
                    Group_Description = data[i]["Group_Description"];
                    Group_Size = "" + data[i]["Group_Size"];
                    Group_Event_ID = data[i]["Event_Name"];
                    Group_ImgLoc = data[i]["Group_ImgLoc"];
                    document.getElementById("grpimg").setAttribute("src", Group_ImgLoc);
                    document.getElementById("modalgroupdescription").innerHTML = "Group Description: " + Group_Description;
                    document.getElementById("numbermembers").innerHTML = "Max members: <span id='groupSizeID'>" + Group_Size + "</span></br>";  
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
          
            document.getElementById("currentmembers").innerHTML = "<h5>Members: " + "</br></h5>";
                
            for (i = 0; i < length; i++) {

              if (data[i]["Group_Name"] === Group_Name) {
                
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
                      document.getElementById("currentBudgetID").innerHTML = "not set.";
                    }
                  }
                
              } 
              }
          
              
          
              var allbudgetsentered = false;
          
              if (userCount == Group_Size && userBudgetCount == Group_Size) {
                //console.log("userBudgetCount: " + userBudgetCount);
                //console.log("Group size: " + Group_Size);
                allbudgetsentered = true;
                groupBudget /= Group_Size;
                groupBudget = Number(groupBudget).toFixed(2);
                
                // Display "Select This Event For Your Group"  
                // buttons if all users have entered a budget:
                
                //document.getElementById("selectEvent1").style.display="block";
                //document.getElementById("selectEvent2").style.display="block";
                //document.getElementById("selectEvent3").style.display="block";
                
              } else {
                groupBudget = null;
                // Hides the select this event for your group buttons:
                //document.getElementById("selectEvent1").style.display="none";
                //document.getElementById("selectEvent2").style.display="none";
                //document.getElementById("selectEvent3").style.display="none";
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
              
            modalbodyevents.innerHTML = "Your group has selected the following event:<br><div id='eventDiv1' class='w-100 mb-3'>"
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
              
            modalbodyevents.innerHTML = "";
              
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
    
    
    function updateBudgetTable() {
      
    var User_Name='<?php echo $_SESSION['User_Name'];?>';
      
    //var Group_Name previously assigned still points to correct variable based on testing:
      
    //console.log("Group Name: " + Group_Name);
      
    var Registration_Budget = document.getElementById('personalBudget').value;
    // Check if Group Budget exists:
    //if( $('#groupBudget').length ) {
      // It exists so assign it's value to Group Budget and set boolean true to be used in if statement:
      //Group_Budget = document.getElementById('groupBudget').value;
      //groupBudgetExists = true;
      //}
      
    // console.log("User entered: " + Registration_Budget);
      
    var indivBudgJSON = {"User_Name":User_Name,"Group_Name":Group_Name,"Registration_Budget":Registration_Budget};
      
    JSON.stringify(indivBudgJSON);
      
    // console.log(indivBudgJSON); // seems to work.
          
      // This Ajax call updates the database with the user's personal budget.
      event.preventDefault();
      //prevents modal from closing on submission

        $.ajax({
        url: "ajax-post-personalBudget.php",
        dataType: "json",
        type: "POST",
        data: indivBudgJSON,
        success: function(data) {
          

          var Group_Budget = 0;
          
          var groupMax = document.getElementById("groupSizeID").innerHTML;
          console.log("Group size: " + groupMax);
          
          var budgetCount = 0;
          
          var length = Object.keys(data).length;
            
            for (i = 0; i < length; i++) {
              
              // 
              if (data[i]["Registration_Budget"] != null) {
                var RegBudget = data[i]["Registration_Budget"];
                // Keep track of how many users have entered a budget and add up the total group's budget:
                budgetCount++;
                Group_Budget += Number(RegBudget);
                
                // Update user's current showing budget:
                if (data[i]["User_Name"] === User_Name) {
                  document.getElementById("currentBudgetID").innerHTML = "$" + Number(RegBudget).toFixed(2);
                }
                }
          
            }
          
            console.log("budget total: " + Group_Budget);
            console.log("group max: " + groupMax);
            console.log("budgetcount: " + budgetCount);
            
             if (groupMax == budgetCount) {
               var groupBudgetPP = Group_Budget / groupMax;
                   
                document.getElementById("groupBudgeth5").innerHTML = "Budget per Person: <span id=groupBudget>$" + Number(groupBudgetPP).toFixed(2) + "</span>";
               console.log("if:" + Group_Budget);

               var groupname = {"Group_Name":Group_Name};
               JSON.stringify(groupname);
              
               $.ajax({
                url: "sendemail.php",
                dataType: "json",
                type: "POST",
                data: groupname,
                success: function(data) {
                console.log("An email has been sent to notify all users that the final budget is now included.");
               },
               error: function(jqXHR, textStatus, errorThrown) {
                console.log(jqXHR.statusText);
               }
               });
             }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#BudgetErrorID").text("Please enter a number greater than zero.");
            $("#BudgetErrorID").setAttribute("color","red");
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
          
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText);
        }
      });
      
      
    }
    

    
    // Join a group on click button:

function joinClick() {
  
  // Get user entries from the form:
  
  var Group_Name = document.getElementById('usernameForm').value;
  var Group_Password = document.getElementById('passwordForm').value;
    
  // Convert to JSON to send in Ajax:
  
  var groupLogin = {"Group_Name":Group_Name,"Group_Password":Group_Password};
      
  JSON.stringify(groupLogin);
  
  $.ajax({
        url: "joingroup.php",
        dataType: "json",
        type: "POST",
        data: groupLogin,
        success: function(data) {
          
          console.log("successss");
          
          console.log("Data returned from server: ", data);
          
          if (data["error"] == "yes") {
          document.getElementById("joinGroupError").innerHTML = "Error: " + data["return"];
          }
          if (data["error"] == "no") {
            
            Group_Description = data["Group_Description"];
          
            // Add the group to the page:
            
            tables.innerHTML += "<div class='clickableDiv'><a id=" + Group_Name + " href='#' data-toggle='modal' onClick='reply_click(this.id)' data-target='#aboutModal'><div class='row xs-12 mx-2'><li class='media'><img class='mr-2 mb-3' src='img/mygroups/suit.jpeg' alt='group picture'><div class='media-body'><h4 class='mt-0 mb-1'>" + Group_Name + "</h4><p>" + Group_Description + "</p></div></li></div></a></div>";
            
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText);
        }
      });
  
}
    
  // Create a group on click button:

function createClick() {
  
  // Get user entries from the form:
  
  var Group_Name = document.getElementById('groupNameForm').value;
  var Group_Password = document.getElementById('confirmGroupPasswordForm').value;
  var Group_Description = document.getElementById('descriptionForm').value;
  var Group_Size = document.getElementById('totalPeople').value;
    
  // Convert to JSON to send in Ajax:
  
  var groupRegister = {"Group_Name":Group_Name,"Group_Password":Group_Password,"Group_Description":Group_Description,"Group_Size":Group_Size};
      
  JSON.stringify(groupRegister);
  
  $.ajax({
        url: "creategroup.php",
        dataType: "json",
        type: "POST",
        data: groupRegister,
        success: function(data) {
          
          console.log("successss");
          
          console.log("Data returned from server: ", data);
          
          if (data["error"] == "yes") {
          document.getElementById("createGroupError").innerHTML = "Error: " + data["return"];
          }
          if (data["error"] == "no") {
          
            // Add the group to the page:
            
            tables.innerHTML += "<div class='clickableDiv'><a id=" + Group_Name + " href='#' data-toggle='modal' onClick='reply_click(this.id)' data-target='#aboutModal'><div class='row xs-12 mx-2'><li class='media'><img class='mr-2 mb-3' src='img/mygroups/suit.jpeg' alt='group picture'><div class='media-body'><h4 class='mt-0 mb-1'>" + Group_Name + "</h4><p>" + Group_Description + "</p></div></li></div></a></div>";
          
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