document.addEventListener('DOMContentLoaded', function () {
    let alertSuccess = document.querySelector('#alertSuccess');
    if (alertSuccess) {
        setTimeout(() => {
            alertSuccess.remove();
        }, 3000);
    }
});