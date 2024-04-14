// Dynamisation Front formulaire
const inputPseudo = document.getElementById('inputPseudo');
const inputTitre = document.getElementById('inputTitre');
const inputMail = document.getElementById('inputMail');

inputPseudo.addEventListener('keyup', validateForm);
inputTitre.addEventListener('keyup',validateForm);
inputMail.addEventListener('keyup', validateForm);

function validateForm(){
    validateRequired(inputPseudo);
    validateRequired(inputTitre);
    validateMail(inputMail);
}

function validateMail(input){
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
function validateRequired(input){
    if(input.value != '' && input.value.length > 3){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
    }else{
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
    }
}
