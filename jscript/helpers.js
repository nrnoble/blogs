function usernameValidation(){
    var Regex = /^[a-zA-Z\-]+$/;
    var validUsername = document.frm.username.value.match(Regex);
    if(validUsername == null){
        alert("username is not valid. Only characters A-Z, a-z and '-' can be used.");
        document.frm.firstName.focus();
        return false;
    }
}

