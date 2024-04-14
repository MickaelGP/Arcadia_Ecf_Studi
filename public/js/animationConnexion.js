const inputPassword = document.getElementById('inputPassword');
const inputEmail = document.getElementById('inputEmail');

inputEmail.addEventListener('keyup', validateFormLogin);
inputPassword.addEventListener('keyup', validateFormLogin);


function validateFormLogin(){
    validateEmail(inputEmail);
    validatePassword(inputPassword);
}

function validatePassword(input){
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
    const passwordUser = input.value;
    if(passwordUser.match(passwordRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid"); 
    }
    else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
    }
}
function validateEmail(input){
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mailUser = input.value;
    if(mailUser.match(emailRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
    }else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
    }
}