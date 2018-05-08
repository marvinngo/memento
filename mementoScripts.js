

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
    } 
    // true if username is not between 4-20 chars
    else if (input.value.length < 4 || input.value.length > 20) {
        input.setCustomValidity('Group name must be between 4 and 20 characters.'); 
    } 
    //true if username does not match regex
    else if (!regex.test(input.value)) {
        input.setCustomValidity('Group name can only contain letters and numbers.'); 
    } else {
            // gets rid of alert box if username is valid
      input.setCustomValidity('');
    }
}



$('#ele').animate({left:'-8000px'},25000);