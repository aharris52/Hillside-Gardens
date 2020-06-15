document.getElementById("Order").onsubmit = validate;

function validate(){
    //Create a flag variable
    let valid = true;

    //Clear all errors
    let errors = document.getElementsByClassName("err");
    for (let i=0; i<errors.length; i++) {
        errors[i].style.visibility = "hidden";

    }
    alert("errors cleared");
    //Check first name
    let first = document.getElementById("firstName").value;
    if (first === "") {
        let errFirst = document.getElementById("errFname");
        errFirst.style.visibility = "visible";
        valid = false;
    }


    //Check last name
    let last = document.getElementById("lastName").value;
    if (last === "") {
        let errLname = document.getElementById("errLname");
        errLname.style.visibility = "visible";
        valid = false;
    }

    //Check email
    let email = document.getElementById("email").value;
    if (email === "") {
        let errEmail = document.getElementById("errEmail");
        errEmail.style.visibility = "visible";
        valid = false;
    }
    if (!emailIsValid(email)) {
        let errEmailValid = document.getElementById("errEmailValid");
        errEmailValid.style.visibility = "visible";
        valid = false;
    }

    //Check phone number
    alert("starting phone");
    let phone = document.getElementById("phoneNum").value;
    alert("Phone = "+phone);
    if (phone === "") {
        let errNumber = document.getElementById("errNumber");
        errNumber.style.visibility = "visible";
        valid = false;
    }

    return valid;

}