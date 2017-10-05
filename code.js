function blog_passwordCheck() {
    alert("hej!");
    var password1 = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;
    console.log(password1);
    console.log(password2);
    if (password1 !== password2) {
        document.getElementById("info").innerHTML ="</br>Du har angett olika lösenord";
        return false;
        
    } else {
        return true;
    }
    return false;
}

function blog_regUserToDB() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("eMail").value;
    var password = document.getElementById("password").value;

    var data = "username="+username+"&eMail="+email+"&password="+password;

    sendData("regUserToDB", "blog_regUserToDB.php", data, blog_userRegistered);

}

function blog_userRegistered(id, request) {
    var text = request.responseText;

    if(text == "True") {
        alert("You are now registered!");
        location.replace("blog_logIn.php");

    } else {

        alert(text);
    }

}

function showModal(modalName) {
    console.log(modalName);
    document.getElementById(modalName).style.display = "block";

}
