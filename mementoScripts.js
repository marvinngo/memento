function construction() {
    alert("Page is under construction!");
}



function check(input) {
    if (input.value != document.getElementById('passwordForm').value){
        input.setCustomValidity("passwords don't match");
    }  else {
        // gets rid of alert box if inputs match
        input.setCustomValidity('');
    }
}

