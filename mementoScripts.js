var count=0;
var regexPass=false;

function registerClick() {

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

    if (usernamePass && passwordPass && confirmPass && emailPass){
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
  }

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

    console.log(!regex.test(input.value));
    console.log((document.getElementById("passwordForm").value !== document.getElementById("confirmpasswordForm").value));

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
    let regex = /^[a-zA-Z0-9]+$/;

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

function huehuehue() {
    count++;
    console.log(count);
    var x = document.getElementById("A");
    if (count === 5) {
        x.style.display = "block";
    }
}

