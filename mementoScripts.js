var count=0;

// User registration front and back end validation and submission function:

$("#registerSubmit").click(function(event) {
  
  event.preventDefault;

    var usernameRegex = /^[a-zA-Z0-9]+$/;
    var passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    var emailRegex =  /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;

    var usernamePass;
    var passwordPass;
    var confirmPass;
    var emailPass;

    var User_Name = document.getElementById('usernameRegistrationForm').value;
    var User_Password = document.getElementById('passwordForm').value;
    var User_Confirm_Password = document.getElementById('confirmpasswordForm').value;
    var User_Email = document.getElementById('emailRegistrationForm').value;
    
    if (!usernameRegex.test(User_Name) || User_Name.length < 4 || User_Name.length > 20) {
        document.getElementById('usernameError').innerHTML = "Username can only contain uppercase letters, lowercase letters, numbers, and must be between 4 and 20 characters.";
        usernamePass=false;
    } else {
      document.getElementById('usernameError').innerHTML = "";
      usernamePass=true;
    }

    if (!passwordRegex.test(User_Password) || User_Password.length < 8) {
        document.getElementById('passwordError').innerHTML = "Password must have at least one uppercase, one lowercase, one number, and must be at least 8 characters.";
        passwordPass=false;
    } else {
      document.getElementById('passwordError').innerHTML = "";
      passwordPass=true;
    }

    if (User_Password !== User_Confirm_Password) {
      document.getElementById('passwordMatch').innerHTML = "Passwords must match";
      confirmPass=false;
    } else {
      document.getElementById('passwordMatch').innerHTML = "";
      confirmPass=true;
    }

    if (!emailRegex.test(User_Email)) {
        document.getElementById('emailError').innerHTML = "Must be valid email address";
        emailPass=false;
    } else {
      document.getElementById('emailError').innerHTML = "";
      emailPass=true;
    }

    // Run Ajax call if front-end validation passes:
  
    if (usernamePass && passwordPass && confirmPass && emailPass) {
      
    var userRegistration = {"User_Name":User_Name,"User_Password":User_Password,"User_Email":User_Email};
      
    JSON.stringify(userRegistration);
      
    console.log(userRegistration);
          
      // This Ajax call sends user login info to the server to either login
      // the user and redirect them to a new page or return an error message.

        $.ajax({
        url: "register.php",
        dataType: "json",
        type: "POST",
        data: userRegistration,
        success: function(data) {
          
          console.log("successss");
          
          console.log("Data returned from server: ", data);
          
          // Update page with meaningful error if registration is not successful:
          if (data["error"] == "yes") {
            document.getElementById("registrationError").innerHTML = "Error: " + data["return"];
          }
          
          // Redirect user to Groups page if registration is successful:
          if (data["error"] == "no") {
            window.location = 'createjoin.php';
          }


        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText);
        }
      });
    }
  });

//prevents form from submitting if no option has been selected for group size
function validate() {
    var select = document.getElementById('totalPeople');
    // console.log(select.value);
    return !select.value == 0;
}

// Easter egg function
function huehuehue() {
    count++;
    console.log(count);
    var x = document.getElementById("A");
    if (count === 5) {
        x.style.display = "block";
    }
}

// Function that checks if user is logged in, and if they are, changes the 
// Navigation buttons to welcome the user and give access to the Groups page
// instead of Registration.

$(function() {
  
  // The sessionJS class ignores the Registration page, which redirects to Index
  // if logged in, so styling for logged in users isn't necessary.
  
  if ($('body').is('.sessionJS')) {
    
    if (document.getElementById("sessionStatusID").innerHTML == true) {
    
      var User_Name = userNameID.innerHTML;

      // Add a welcome and style for the user:

      document.getElementById("ms").innerHTML = "Welcome " + User_Name + "!"; 
      document.getElementById("ms").setAttribute("class", "nav-link ml-5"); 

      // Change the navigation elements - removes the Login button, center the Home button:

      document.getElementById("footerHome").innerHTML = "";
      document.getElementById("footerSignup").innerHTML = "Home";
      document.getElementById("footerSignup").setAttribute("href", "index.php");
      document.getElementById("footerLogin").innerHTML = ""; 
    }
  }
  
  // For pages with a Sign Up navigation button:
  
  if ($('body').is('.changeSignUp')) {
    if (document.getElementById("sessionStatusID").innerHTML == true) {

      // Convert the Signup button to Logout if user is logged in:

        document.getElementById("signup").innerHTML = "Logout";
        document.getElementById("signup").setAttribute("href", "logout.php");
    } else {
      
      // Hide the Groups navigation button:
      
      document.getElementById("Groups").innerHTML = ""; 
      document.getElementById("groupDivider").setAttribute("class", "");
      
    }
  }

  // Only for the Index homepage, change the Get Started buttons to redirect to the Groups
  // page if the user is logged in, or back to the Registration if the user logs out:
  
  if ($('body').is('.indexPHPpage')) {
    
    if (document.getElementById("sessionStatusID").innerHTML == true) {

      document.getElementById("getStarted1").setAttribute("onclick", "location.href='createjoin.php'");
      document.getElementById("getStarted2").setAttribute("onclick", "location.href='createjoin.php'");
      document.getElementById("getStarted3").setAttribute("onclick", "location.href='createjoin.php'");
        
    } else {
      
      // Redirect Get Started to registration if user isn't logged in:
      
      document.getElementById("getStarted1").setAttribute("onclick", "location.href='registration.php'");
      document.getElementById("getStarted2").setAttribute("onclick", "location.href='registration.php'");
      document.getElementById("getStarted3").setAttribute("onclick", "location.href='registration.php'");
      
    }
  }
  
  
  
});

// Function that populates createjoin.php with group content:

$(function() {
  
  if ($('body').is('.createJoinPage')) {

  var User_Name = userNameID.innerHTML;
  
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
    }
});

// Function that populates allevents.php with events:

  if ($('body').is('.eventsPage')) {

    $.ajax({
      url: "ajax-get-all-events.php",
      dataType: "json",
      type: "POST",
      success: function(data) {

        //console.log("received: ", data);

        var length = Object.keys(data).length;
        
        for (i = 0; i < length; i++) {
          tables.innerHTML += "<div id='eventDiv1' class='w-100 mb-3'>"
          + "<div id='eventcard' class='card mx-auto'><img id='event1image' class='card-img-top'"
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

  }

// Login click - for allevents.php page - handles the modal login.

function loginClick(clicked_id) {
      
    if (clicked_id == "submitButton") {
        var User_Name = document.getElementById('usernameForm2').value;
        var User_Password = document.getElementById('passwordForm2').value;
        }
    
    if (clicked_id == "submitButton2") {
        var User_Name = document.getElementById('usernameForm').value;
        var User_Password = document.getElementById('passwordForm3').value;
        }
    
    var userLogin = {"User_Name":User_Name,"User_Password":User_Password};
      
    JSON.stringify(userLogin);
          
      // This Ajax call sends user login info to the server to either login
      // the user and redirect them to a new page or return an error message.
        $.ajax({
        url: "signin.php",
        dataType: "json",
        type: "POST",
        data: userLogin,
        success: function(data) {
          
          if (data["error"] == "yes") {
            
          if (clicked_id == "submitButton") {
            document.getElementById("loginErrorID").innerHTML = "Error: " + data["return"];
            }
    
          if (clicked_id == "submitButton2") {
            document.getElementById("loginErrorID2").innerHTML = "Error: " + data["return"];
            }
            
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

// Reply click - populates group modal with information about the group

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

// Defines action of the 'Select This Event For Your Group' button.

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

// Function that validates the create group form:

$("#createSubmitButton").click(function(event) {
  
  event.preventDefault;
  
  var groupnameRegex = /^[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*$/;
  var groupPwRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

  var groupnamePass;
  var groupPwPass;
  var confirmPass;
  var groupDescrSet;
  var groupSizeSet;
  
    // Get user entries from the form:
  
  var Group_Name = document.getElementById('groupNameForm').value;
  var Group_Password_Ini = document.getElementById('groupPasswordForm').value;
  var Group_Password = document.getElementById('confirmGroupPasswordForm').value;
  var Group_Description = document.getElementById('descriptionForm').value;
  var Group_Size = document.getElementById('totalPeople').value;
  
  if (!groupnameRegex.test(Group_Name) || Group_Name.length < 4 || Group_Name.length > 20) {
        document.getElementById('groupnameError').innerHTML = "Group name must be between 4 and 20 characters and can only contain letters, numbers and/or spaces.";
        groupnamePass=false;
    } else {
      document.getElementById('groupnameError').innerHTML = "";
      groupnamePass=true;
    }

    if (!groupPwRegex.test(Group_Password_Ini) || Group_Password_Ini < 8) {
        document.getElementById('groupPwError').innerHTML = "Password must have at least one letter, one number, and must be at least 8 characters long.";
        groupPwPass=false;
    } else {
      document.getElementById('groupPwError').innerHTML = "";
      groupPwPass=true;
    }

    if (Group_Password_Ini !== Group_Password) {
      document.getElementById('groupPwMatch').innerHTML = "Passwords must match";
      confirmPass=false;
    } else {
      document.getElementById('groupPwMatch').innerHTML = "";
      confirmPass=true;
    }
  
  if (Group_Description == null || Group_Description == "") {
      groupDescrSet = false;
      document.getElementById('descriptionError').innerHTML = "Group description must be set.";
      } else {
      groupDescrSet = true;
      document.getElementById('descriptionError').innerHTML = "";
      }
  
  if (Group_Size == 0) {
    groupSizeSet = false;
    document.getElementById('groupSizeError').innerHTML = "Group size must be set.";
  } else {
    groupSizeSet = true;
    document.getElementById('groupSizeError').innerHTML = "";
  }
  
  if (groupnamePass && groupPwPass && confirmPass && groupDescrSet && groupSizeSet) {
    
  // Convert to JSON to send in Ajax:
  
  var groupRegister = {"Group_Name":Group_Name,"Group_Password":Group_Password,"Group_Description":Group_Description,"Group_Size":Group_Size};
      
  JSON.stringify(groupRegister);
    
  console.log("sent: ", groupRegister);
  
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
            
            document.getElementById("createGroupError").innerHTML = "You have successully created: " + Group_Name + "!<br> Anyone else that wishes to join this group will require the group's ID and password. The ID for this group is: " + data["Group_ID"];
          
            // Add the group to the page:
            
            tables.innerHTML += "<div class='clickableDiv' id='" + data["Group_ID"] + "hideid'><a id=" + data["Group_ID"] + " href='#' data-toggle='modal' onClick='reply_click(this.id)' data-target='#aboutModal'><div class='row xs-12 mx-2'><li class='media'><img class='mr-2 mb-3' src='img/mygroups/suit.jpeg' alt='group picture'><div class='media-body'><h4 class='mt-0 mb-1'>" + Group_Name + "</h4><p>Group ID: " + data["Group_ID"] + "</p><p>" + Group_Description + "</p></div></li></div></a><p><form action='upload.php' method='post' enctype='multipart/form-data'>Choose a profile picture for your group (optional):<input type='hidden' name='GroupName' value=" + data["Group_ID"] + "><input type='file' name='grouppic'><input type='submit' value='Upload' name='submit'></form></p><div class='text-center'><button type='button' id='0" + data["Group_ID"] + "' name='deleteButton' onClick='delete_click(this.id)' class='groupDelete mb-2' href='#' data-toggle='modal' data-target='#deleteModal'>Delete Group</button></div></div>";
          
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText);
        }
      });
      }
      });

// Function that handles joining group form:

$("#joinSubmitButton").click(function(event) {
  
  //event.preventDefault;
  
    // Get user entries from the form:
  
  var Group_ID = document.getElementById('usernameForm').value;
  var Group_Password = document.getElementById('passwordForm').value;
    
  // Convert to JSON to send in Ajax:
  
  var groupLogin = {"Group_ID":Group_ID,"Group_Password":Group_Password};
      
  JSON.stringify(groupLogin);
  
  console.log("Sent:",groupLogin);
  
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
            
            Group_Name = data["Group_Name"];
            
            document.getElementById("joinGroupError").innerHTML = "You have successfully joined " + Group_Name + "(group id:" + Group_ID + ")!";
            
            Group_Description = data["Group_Description"];
          
            // Add the group to the page:
            
            tables.innerHTML += "<div class='clickableDiv' id='" + Group_ID + "hideid'><a id=" + Group_ID + " href='#' data-toggle='modal' onClick='reply_click(this.id)' data-target='#aboutModal'><div class='row xs-12 mx-2'><li class='media'><img class='mr-2 mb-3' src='" + data["Group_ImgLoc"] + "' alt='group picture'><div class='media-body'><h4 class='mt-0 mb-1'>" + Group_Name + "</h4><p>Group ID: " + Group_ID + "</p><p>" + Group_Description + "</p></div></li></div></a><p><form action='upload.php' method='post' enctype='multipart/form-data'>Choose a profile picture for your group (optional):<input type='hidden' name='GroupName' value=" + Group_ID + "><input type='file' name='grouppic'><input type='submit' value='Upload' name='submit'></form></p><div class='text-center'><button type='button' id='0" + Group_ID + "' name='deleteButton' onClick='delete_click(this.id)' class='groupDelete mb-2' href='#' data-toggle='modal' data-target='#deleteModal'>Delete Group</button></div></div>";
            
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText);
        }
      });
      });

// Function that clears errors from the modals associated with the Create and Join Group buttons when they are pressed.

function clearModalErrors() {
  document.getElementById("createGroupError").innerHTML = "";
  document.getElementById("joinGroupError").innerHTML = "";
  document.getElementById("groupnameError").innerHTML = "";
  document.getElementById("groupPwError").innerHTML = "";
  document.getElementById("groupPwMatch").innerHTML = "";
  document.getElementById("descriptionError").innerHTML = "";
  document.getElementById("groupSizeError").innerHTML = "";
  document.getElementById("joinGroupError").innerHTML = "";
}

// Login function for login modal on index.php, registration.php and allevents.php 

// Changed from onclick to Jquery $('#id').click(fn()){} 
// because apparently .onclick() is problematic to use with
// external script files and generally not great practice:
// https://stackoverflow.com/questions/17378199/uncaught-referenceerror-function-is-not-defined-with-onclick

$("#submitButton").click(function(event) {
  
  event.preventDefault;
  
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
    });

// Login function for non-modal login on registration.php

$("#submitButton2").click(function(event) {
  
  event.preventDefault;
  
  var User_Name = document.getElementById('usernameForm').value;
  var User_Password = document.getElementById('passwordForm3').value;
  
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
        document.getElementById("loginErrorID2").innerHTML = "Error: " + data["return"];
        }
        if (data["error"] == "no") {
        window.location = 'createjoin.php';
        }


      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR.statusText);
      }
    });
    });


// Function to validate user budget input, send to server, and update page if appropriate.

$("#budgetSubmit").click(function(event) {
  
  event.preventDefault;
      
  // Get user's newly input budget value:

  var Registration_Budget = document.getElementById('personalBudget').value;
  
  //var Group_Name previously assigned still points to correct variable based on testing:

  //console.log("Group Name: " + Group_Name);

  var indivBudgJSON = {"User_Name":User_Name,"Group_Name":Group_Name,"Registration_Budget":Registration_Budget};

  JSON.stringify(indivBudgJSON);

  console.log("Budget sent: ", indivBudgJSON); // seems to work.

  // This Ajax call updates the database with the user's personal budget and then returns every row in the registration table associated with the group. 

  $.ajax({
  url: "ajax-post-personalBudget.php",
  dataType: "json",
  type: "POST",
  data: indivBudgJSON,
  success: function(data) {
    
    console.log("Budget received: ", data);

    var Group_Budget = 0;

    var groupMax = document.getElementById("groupSizeID").innerHTML;
    
    console.log("Group size: " + groupMax);

    var budgetCount = 0;
    
    // Iterate through each registration row associated with each user in the group to find out if the group is full and everyone has entered a budget yet:

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

        // If all users have entered a budget, update the Group Budget per person value:
    
        console.log("budgetCount: " + budgetCount);
    
        if (groupMax == budgetCount) {
          var groupBudgetPP = Group_Budget / groupMax;
          
          allbudgetsentered = true;

          document.getElementById("groupBudgeth5").innerHTML = "Budget per Person: <span id=groupBudget>$" + Number(groupBudgetPP).toFixed(2) + "</span>";
          
          //console.log("Group Budget: " + Group_Budget);
          
          // Check if the group has set an event yet, and if not, find and show appropriate events:
          
          var Group_Event_ID = document.getElementById("groupEventID").innerHTML;
          
          var groupInfo = {"Group_Size":groupMax,"Group_Budget_Set":allbudgetsentered,"Group_BudgetPP":groupBudgetPP,"Group_Event_ID":Group_Event_ID}
      
          console.log("sent: ", groupInfo);
      
        $.ajax({
        url: "ajax-get-events.php",
        dataType: "json",
        type: "POST",
        data: groupInfo,
        success: function(data) {
            //console.log("test");
            //console.log(data);
          
            console.log("received: ", data);
            console.log("Group_Event_ID: " + Group_Event_ID);
          
            console.log("!Group_Event_ID = " + !Group_Event_ID);
          
            if (allbudgetsentered && !Group_Event_ID) {
              
            var length = Object.keys(data).length;
              
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
        },
        error: function(jqXHR, textStatus, errorThrown) {
            $("#modalgroupdescription").text(jqXHR.statusText);
        }
      });
          
          
          
          // Send emails to the group if the budget has been set for the group:

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
    });

// Function that updates the delete modal with the ID of the group that was clicked, which is then used if the user confirms the delete action.

function delete_click(clicked_id) {
      var Group_ID = clicked_id.substring(1);
      document.getElementById("deletemodalID").innerHTML = Group_ID;
}

// Calls ajax to delete a group from the registration and group tables, then removes it from the page:

$("#deleteButton").click(function(event) {
  
  event.preventDefault;
  
  var Group_ID = document.getElementById("deletemodalID").innerHTML;
  
  console.log("Group_ID = " + Group_ID);
  
  var groupIDjson = {"Group_ID":Group_ID};
    
  JSON.stringify(groupIDjson);
    
  console.log(groupIDjson);
        
    // This Ajax call sends user login info to the server to either login
    // the user and redirect them to a new page or return an error message.

      $.ajax({
      url: "ajax-post-delete-group.php",
      dataType: "json",
      type: "POST",
      data: groupIDjson,
      success: function(data) {
        
        console.log("successss");
        
        console.log("Data returned from server: ", data);
        
        if (data["error"] == "yes") {
        document.getElementById("loginErrorID2").innerHTML = "Error: " + data["return"];
        }
        if (data["error"] == "no") {
          
        var divID = Group_ID + "hideid";
        
        document.getElementById(divID).style.display = "none";
          
        }


      },
      error: function(jqXHR, textStatus, errorThrown) {
          console.log(jqXHR.statusText);
      }
    });
    });

// Binds enter to the Submit button for the modal login on index.php, registration.php and allevents.php
// see for more info:
// https://stackoverflow.com/questions/6542413/bind-enter-key-to-specific-button-on-page

$('body').on('keypress', '#usernameForm2, #passwordForm2', function(args) {
    if (args.keyCode == 13) {
      console.log("Enter pressed");
        $("#submitButton").click();
        return false;
    }
});

// Handles enter presses for the non-modal login form on registration.php

$('body').on('keypress', '#usernameForm, #passwordForm3', function(args) {
    if (args.keyCode == 13) {
      console.log("Enter pressed");
        $("#submitButton2").click();
        return false;
    }
});

// Binds enter presses for the non-modal user registration form on registration.php to the Registration Submit button

$('body').on('keypress', '#usernameRegistrationForm, #passwordForm, #confirmpasswordForm, #emailRegistrationForm', function(args) {
    if (args.keyCode == 13) {
      console.log("Enter pressed");
        $("#registerSubmit").click();
        return false;
    }
});

// Binds enter press for the create group modal to its Submit button on createjoin.php

$('body').on('keypress', '#groupNameForm, #groupPasswordForm, #confirmGroupPasswordForm, #descriptionForm, #totalPeople', function(args) {
    if (args.keyCode == 13) {
      console.log("Enter pressed");
        $("#createSubmitButton").click();
        return false;
    }
});

// Binds enter press for the join group modal to its Submit button on createjoin.php

$('body').on('keypress', '#userNameForm, #passwordForm', function(args) {
    if (args.keyCode == 13) {
      console.log("Enter pressed");
        $("#joinSubmitButton").click();
        return false;
    }
});

// Binds enter press for the budget input to its Submit button on createjoin.php

$('body').on('keypress', '#personalBudget', function(args) {
    if (args.keyCode == 13) {
      console.log("Enter pressed");
        $("#budgetSubmit").click();
        return false;
    }
});


