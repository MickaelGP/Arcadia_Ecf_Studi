const password = document.getElementById('password');
const password_confirmation = document.getElementById('password_confirmation');
const nomInput = document.getElementById('nom');

nomInput.addEventListener('keyup', validateForm);
password.addEventListener('keyup', validateForm);
password_confirmation.addEventListener('keyup', validateForm);

function validateForm(){
    validatePassword(password);
    validateConfirmationPassword(password, password_confirmation);
    validateNom(nomInput);
}
function validateNom(input){
    if(input.value.length > 2){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid"); 
    }
    else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
    }
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
function validateConfirmationPassword(inputPwd, inputConfirmPwd){
    if(inputPwd.value == inputConfirmPwd.value){
        inputConfirmPwd.classList.add("is-valid");
        inputConfirmPwd.classList.remove("is-invalid");
    }
    else{
        inputConfirmPwd.classList.add("is-invalid");
        inputConfirmPwd.classList.remove("is-valid");
    }
}