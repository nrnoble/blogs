function usernameValidation(){
    var Regex = /^[a-zA-Z\-]+$/;
    var validUsername = document.frm.username.value.match(Regex);
    if(validUsername == null){
        alert("username is not valid. Only characters A-Z, a-z and '-' can be used.");
        document.frm.firstName.focus();
        return false;
    }
}

$('.numbersOnly').returnValue(function () {
    if (this.value != this.value.match(/^[a-zA-Z\-]+$/, '')) {
        this.value = this.value.replace (/^[a-zA-Z\-]+$/, '');
    }
});


$('.phoneNumberFilter').keyup(function () {
    if (this.value != this.value.match(/^[a-zA-Z\-]+$, '')) {
        this.value = this.value.replace (/^[a-zA-Z\-]+$/, '');
    }
});
