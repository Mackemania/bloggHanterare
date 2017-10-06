function blog_loginToDB() {
    var username = document.getElementById("loginUsername").value;
    var password = document.getElementById("loginPassword").value;

    var data = "username="+username+"&password="+password;
    console.log(data);
    sendData("login", "blog_loginDB.php", data, blog_loggedIn);

}

function blog_loggedIn(id, request) {

    var text = request.responseText;
    console.log(text);
    if(text == true) {
        alert("Du loggades in");
        document.getElementById("login").style.display = "none";

    } else {
        alert("Du loggades inte in");
        document.getElementById("info").innerHTML = "Wrong username or password!";

    }
}


function blog_passwordCheck() {
    var password1 = document.getElementById("regPassword").value;
    var password2 = document.getElementById("regPassword2").value;
    console.log(password1);
    console.log(password2);
    if (password1 !== password2) {
        document.getElementById("info").innerHTML ="</br>Du har angett olika lösenord";
        return false;

    } else {

        return true;

    }

}

function blog_regUserToDB() {
    var username = document.getElementById("regUsername").value;
    var email = document.getElementById("eMail").value;
    var password = document.getElementById("regPassword").value;

    var data = "username="+username+"&eMail="+email+"&password="+password;

    sendData("regUserToDB", "blog_regUserToDB.php", data, blog_userRegistered);

}

function blog_userRegistered(id, request) {
    var text = request.responseText;

    if(text == "True") {
        alert("You are now registered!");
        location.replace("index.php");

    } else {

        alert(text);
    }

}

function showModal(modalName) {
    console.log(modalName);
    document.getElementById(modalName).style.display = "block";

}
