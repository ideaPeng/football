function check() {
    var user_ok = false;
    var pwd_ok = false;

    if ($('#name').val() !== '') {
        user_ok = true;
    }

    if ($('#pwd').val() !== '') {
        pwd_ok = true;
    }

    if (user_ok & pwd_ok) {
        $('form').submit();
    } else {
        alert("Please input both your name and your password!");
        return false;
    }
}

function logout(){
    
}




