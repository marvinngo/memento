var count=0;
var regexPass=false;

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

function construction() {
    alert("Page is under construction!");
}


//checks username regex and displays alert 
function checkUsername(input) {
    let regex = /^[a-zA-Z0-9]+$/;

    //true if username is not between 4-20 chars AND does not match regex
    if ((input.value.length < 4 || input.value.length > 20) && !regex.test(input.value)) {
        input.setCustomValidity('Username must be between 4 and 20 characters and can only contain letters and numbers.');
    } 
    // true if username is not between 4-20 chars
    else if (input.value.length < 4 || input.value.length > 20) {
        input.setCustomValidity('Username must be between 4 and 20 characters.'); 
    } 
    //true if username does not match regex
    else if (!regex.test(input.value)) {
        input.setCustomValidity('Username can only contain letters and numbers.'); 
    } else {
            // gets rid of alert box if username is valid
      input.setCustomValidity('');
    }
}

//checks password regex and displays alert 
function checkPw(input) {
    let regex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    //console.log(!regex.test(input.value));
    //console.log((document.getElementById("passwordForm").value !== document.getElementById("confirmpasswordForm").value));

     if (!regex.test(input.value)) {
        input.setCustomValidity("Password must be at least 8 characters long and contain one letter and number.");
    } else if (input.value !== document.getElementById("confirmpasswordForm").value) {
        input.setCustomValidity('Passwords do not match.');
    } else {
        // gets rid of alert box if username is valid
    input.setCustomValidity('');

    }

}


// //checks if passwords match
// function validate(){
//     // console.log((document.getElementById("passwordForm").value === document.getElementById("confirmpasswordForm").value));

// if ((document.getElementById("passwordForm").value !== document.getElementById("confirmpasswordForm").value)){
//     alert("Passwords do not match.");

//     return (document.getElementById("passwordForm").value === document.getElementById("confirmpasswordForm").value);
// }
// }

function checkEmail(input) {
    let regex = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/;

    //true if username is not between 4-20 chars AND does not match regex
    if (!regex.test(input.value)) {
        input.setCustomValidity('Please enter a valid email.');
    } else {
            // gets rid of alert box if username is valid
      input.setCustomValidity('');
    }
}


//prevents form from submitting if no option has been selected for group size
function validate() {
    var select = document.getElementById('totalPeople');
    // console.log(select.value);
    return !select.value == 0;
}



//checks username regex and displays alert 
function checkGroupName(input) {
    let regex = /^[a-zA-Z0-9_]+( [a-zA-Z0-9_]+)*$/;

    //true if username is not between 4-20 chars AND does not match regex
    if ((input.value.length < 4 || input.value.length > 20) && !regex.test(input.value)) {
        input.setCustomValidity('Group name must be between 4 and 20 characters and can only contain letters and numbers.');
        regexPass=false;
    } 
    // true if username is not between 4-20 chars
    else if (input.value.length < 4 || input.value.length > 20) {
        input.setCustomValidity('Group name must be between 4 and 20 characters.'); 
        regexPass=false;
    } 
    //true if username does not match regex
    else if (!regex.test(input.value)) {
        input.setCustomValidity('Group name can only contain letters and numbers.'); 
        regexPass=false;
    } else {
            // gets rid of alert box if username is valid
      input.setCustomValidity('');
      regexPass=true;
    }
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

// Function that validates the create group form:

$("#createSubmitButton").click(function(event) {
  
  event.preventDefault;
  
  var groupnameRegex = /^[a-zA-Z0-9]+$/;
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
        document.getElementById('groupnameError').innerHTML = "Group can only contain uppercase letters, lowercase letters, numbers, no spaces, and must be between 4 and 20 characters.";
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
            
            document.getElementById("createGroupError").innerHTML = "You have successully created " + Group_Name + "!";
          
            // Add the group to the page:
            
            tables.innerHTML += "<div class='clickableDiv'><a id=" + Group_Name + " href='#' data-toggle='modal' onClick='reply_click(this.id)' data-target='#aboutModal'><div class='row xs-12 mx-2'><li class='media'><img class='mr-2 mb-3' src='img/mygroups/suit.jpeg' alt='group picture'><div class='media-body'><h4 class='mt-0 mb-1'>" + Group_Name + "</h4><p>" + Group_Description + "</p></div></li></div></a></div>";
          
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
            
            document.getElementById("joinGroupError").innerHTML = "You have successfully joined " + Group_Name + "!";
            
            Group_Description = data["Group_Description"];
          
            // Add the group to the page:
            
            tables.innerHTML += "<div class='clickableDiv'><a id=" + Group_Name + " href='#' data-toggle='modal' onClick='reply_click(this.id)' data-target='#aboutModal'><div class='row xs-12 mx-2'><li class='media'><img class='mr-2 mb-3' src='img/mygroups/suit.jpeg' alt='group picture'><div class='media-body'><h4 class='mt-0 mb-1'>" + Group_Name + "</h4><p>" + Group_Description + "</p></div></li></div></a></div>";
            
          }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(jqXHR.statusText);
        }
      });
      });

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

  console.log("Sent: ", indivBudgJSON); // seems to work.

  // This Ajax call updates the database with the user's personal budget and then returns every row in the registration table associated with the group. 

  $.ajax({
  url: "ajax-post-personalBudget.php",
  dataType: "json",
  type: "POST",
  data: indivBudgJSON,
  success: function(data) {
    
    console.log("Received: ", data);

    var Group_Budget = 0;

    var groupMax = document.getElementById("groupSizeID").innerHTML;
    
    // console.log("Group size: " + groupMax);

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


