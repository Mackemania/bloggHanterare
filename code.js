var fName = "";
var lName = "";

function blog_editProfileInDB() {
    var firstName = document.getElementById("editFistName");
    var lastName = document.getElementById("editLastName");
    var password1 = document.getElementById("editPassword");

}


function blog_getNamesFromDB() {
    
    sendData("getNames", "blog_getNamesFromDB.php", "", blog_showName);

}


function blog_showName(id, request) {
    var text = request.responseText;
    console.log(text);
    var names = text.split("&");

    document.getElementById("editFirstName").value = names[0];
    this.fName = names[0];

    if(names.length == 2) {
        document.getElementById("editLastName").value = names[1];
        this.lName = names[1];
    }
    
}


function blog_enableEditButton() {
    console.log(this.lName);
    if(document.getElementById("editFirstName").value != this.fName || document.getElementById("editLastName").value != this.lName ||document.getElementById("editPassword").value != "") {
        document.getElementById("editButton").removeAttribute("disabled");
    } else {
        
        document.getElementById("editButton").setAttribute("disabled", "disabled");

    }

}


function blog_loadUserSettings(page) {


    var buttons = document.getElementsByClassName("selectedButton")
    for(var i = 0; i<buttons.length; i++) {
        buttons[i].setAttribute("class", "button");

    }
    document.getElementById("userSettingsContent").innerHTML ="";

    if(page == "about") {
        
        var button = document.getElementById("aboutButton");
        button.setAttribute("class", "selectedButton");

        sendData("loadUserSettings", "blog_aboutMe.php", "", blog_writeUserSettings);
        

    } else if(page == "settings") {
        
        var button = document.getElementById("blogSettingsButton");
        button.setAttribute("class", "selectedButton");
    
    } else if(page == "edit") {

        var button = document.getElementById("editProfileButton");
        button.setAttribute("class", "selectedButton");

        sendData("loadUserSettings", "blog_editProfile.php", "", blog_writeUserSettings);
    }

}


function blog_writeUserSettings(id, request) {

    document.getElementById("userSettingsContent").innerHTML = request.responseText;

    if(request.responseText.includes("Edit profile")) {
        blog_getNamesFromDB();
    }

}

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
        //alert("Du loggades in");
        document.getElementById("login").style.display = "none";
        location.reload();

    } else {
        //alert("Du loggades inte in");
        document.getElementById("info").innerHTML = "Wrong username or password!";

    }
}


function blog_registerPasswordCheck() {
    var password1 = document.getElementById("regPassword").value;
    var password2 = document.getElementById("regPassword2").value;

    return (blog_passwordCheck(password1, password2));

}


function blog_passwordCheck(password1, password2) {
    //console.log(password1);
    //console.log(password2);
    if (password1 !== password2) {
        document.getElementById("regInfo").innerHTML ="</br>Du har angett olika lösenord";
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
    //console.log(modalName);
    document.getElementById(modalName).style.display = "block";

}