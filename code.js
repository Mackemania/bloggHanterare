var fName = "";
var lName = "";
var birthdate = "";
var serverRootFolder = "";
var postTitles;
var postIDs;
var commentIDs;
var commentDates;
var commentUsers;

function blog_showEditCommentIfAllowed(commentID) {

    var data = "commentID="+commentID;
    sendData("isEditPostAllowed", "blog_getOwnerFromDB.php", data, blog_showEditComment);

}

function blog_showEditComment(id, request) {

    var modals = document.getElementsByClassName("modal");
    
    for(var i = 0; i<modals.length; i++)  {
        modals[i].style.display='none';
    }

    var text = request.responseText;
    //console.log(text);
    var returningValue = text.split("&");
    
    if(returningValue[0] == 1) {
        var commentID = returningValue[1];
        var comment = document.getElementById("comment"+commentID);
        var nodes = comment.childNodes;
        var content = nodes[0].textContent;
        //console.log(nodes[2].innerHTML);
        document.getElementById("editCommentContent").innerHTML = "";
        document.getElementById("editCommentText").innerHTML = content;
        showModal('editComment');

    } else {

        alert("det här är inte ditt inlägg!");

    }
}

function blog_showEditPostIfAllowed(postID) {

    var data = "postID="+postID;
    sendData("isEditPostAllowed", "blog_getOwnerFromDB.php", data, blog_showEditPost);
}

function blog_showEditPost(id, request) {

    var text = request.responseText;
    //console.log(text);
    var returningValue = text.split("&");
    
    if(returningValue[0] == 1) {
        var postID = returningValue[1];
        var post = document.getElementById(postID);
        var nodes = post.childNodes;
        var header = nodes[0].innerHTML;
        var content = nodes[2].textContent;
        //console.log(nodes[2].innerHTML);
        document.getElementById("postContent").innerHTML = "";
        document.getElementById("editPostTitle").value = header;
        document.getElementById("editPostText").innerHTML = content;
        showModal('editPost');
        var data = "postID="+postID;
        sendData("setPostOnEdit", "blog_setPostID.php", data, blog_editPostIsShowing);
    } else {

        alert("det här är inte ditt inlägg!");

    }
}

function blog_editPostIsShowing(id, request) {
    
    var text = request.responseText;

}

function blog_sendToPostReport(postID) {
    
    location.replace("blog_flagReport.php?postID="+postID);
}

function blog_sendToCommentReport(commentID) {
    
    location.replace("blog_flagReport.php?commentID="+commentID);
}

function blog_showCommentPost(postID) {

    document.getElementById("commentContent").innerHTML = "";
    var post = document.getElementById(postID);
    var commentPost = post.cloneNode(true);
    document.getElementById("commentContent").appendChild(commentPost);
    showModal('comment');
    var data = "postID="+postID;
    sendData("setPostIDOnComment", "blog_setPostID.php", data, blog_postIDIsSet);
}

function blog_postIDIsSet(id, request) {
    var text = request.responseText;
    //console.log(text);
    blog_getCommentIDsFromDB();
}

function blog_getCommentIDsFromDB() {

    sendData("getPostIDs", "blog_getCommentIDsFromDB.php", "", blog_commentIDs);
}

function blog_commentIDs(id, request) {
    var text = request.responseText;
    
    //console.log(text);

    var comments = text.split("§");
    if(comments[1]!=null) {
        this.commentIDs = comments[1].split("&");
        var commentSources = comments[2].split("&");
        this.commentDates = comments[3].split("&");
        this.commentUsers = comments[4].split("&");

        //console.log(commentIDs, commentSources);

        blog_getCommentTextFromDB(commentSources);
    }
}

function blog_getCommentTextFromDB(source) {
    
    var data = "source=";
    for(var i = 1; i<source.length; i++) {
        data = data+","+source[i];

    }
    data = data+"&type=comment";

    //console.log(data);
    sendData("getCommentTextFromServer", "blog_getPostTextFromServer.php", data, blog_serverText);

}

function blog_getPostIDsFromDB() {
    //alert("hej");
    sendData("getPostIDs", "blog_getPostIDsFromDB.php", "", blog_postIDs);
}

function blog_postIDs(id, request) {
    var text = request.responseText;
    var posts = text.split("§");
    this.postIDs = posts[1].split("&");
    this.postTitles = posts[2].split("&");
    var postSources = posts[3].split("&");

    //console.log(postIDs, postTitles, postSources);

    blog_getPostTextFromDB(postSources);
    
}

function blog_getPostTextFromDB(source) {
    
    var data = "source=";
    for(var i = 1; i<source.length; i++) {
        data = data+","+source[i];

    }
    data = data+"&type=post";
    //console.log(data);
    sendData("getPostTextFromServer", "blog_getPostTextFromServer.php", data, blog_serverText);

}

function blog_serverText(id, request) {
    document.getElementById("comments").innerHTML = "";
    var text = request.responseText;

    //console.log(text);

    //alert(id);
    if(id=="getPostTextFromServer") {

        var dataArray = text.split("§");

        var posts = dataArray[0].split("&");
        var isUserCreator = dataArray[1].split("&");

        for(var i = 1; i<posts.length; i++) {
            var title = this.postTitles[i];
            var postID = this.postIDs[i];

            var header = document.createElement("h3");
            header.setAttribute("class", "postH3");
            header.innerHTML = title;
            var div = document.createElement("div");
            div.setAttribute("id", postID);
            div.setAttribute("class", "post");
            div.appendChild(header);
            var divContent = div.innerHTML;
            div.innerHTML = divContent+"<hr>";
            document.getElementById("postTexts").appendChild(div);

            var content = document.getElementById(postID).innerHTML;
            div.innerHTML = content+posts[i];
            
            var commentReportArea = document.createElement("div");
            var craID = "cra"+postID;
            commentReportArea.setAttribute("id", craID);
            commentReportArea.setAttribute("class", "CRA");
            
            var commentButton = document.createElement("button");
            commentButton.setAttribute("class", "CRAButton");
            commentButton.setAttribute("onclick", "javascript: blog_showCommentPost("+postID+");");
            commentButton.setAttribute("value", postID);
            commentButton.innerHTML = "<span class='material-icons'>insert_comment</span>";
            commentReportArea.appendChild(commentButton);

            var reportButton = document.createElement("button");
            reportButton.setAttribute("onclick", "javascript: blog_sendToPostReport("+postID+")");
            reportButton.setAttribute("class", "CRAButton");
            reportButton.innerHTML = "<span class='material-icons'>flag</span>";
            commentReportArea.appendChild(reportButton);
            div.appendChild(commentReportArea);
            
            if(isUserCreator[i] == 1) {
                var editButton = document.createElement("button");
                editButton.setAttribute("onclick", "javascript: blog_showEditPostIfAllowed("+postID+")");
                editButton.setAttribute("class", "CRAButton");
                editButton.innerHTML = "<span class='material-icons'>edit</span>";
                commentReportArea.appendChild(editButton);
                div.appendChild(commentReportArea);
            }
            
        }

    } else {
        
        var dataArray = text.split("§");
        var comments = dataArray[0].split("&");
        var isUserCreator = dataArray[1].split("&");

        for(var i = 1; i<comments.length; i++) {
            
            var commentID = this.commentIDs[i];
            var user = this.commentUsers[i];
            var date = this.commentDates[i];

            var div = document.createElement("div");
            div.setAttribute("id", "comment"+commentID);
            div.setAttribute("class", "comment");
            document.getElementById("comments").appendChild(div);
            var content = document.getElementById("comments").innerHTML;
            div.innerHTML = comments[i]+"<hr><span class='commentName'>"+user+"</br>"+date+"</span></br>";

            var reportButton = document.createElement("button");
            reportButton.setAttribute("onclick", "javascript: blog_sendToCommentReport("+commentID+")");
            reportButton.setAttribute("class", "commentReportButton");
            reportButton.innerHTML = "<span class='material-icons'>flag</span>";
            div.appendChild(reportButton);
            
            if(isUserCreator[i] == 1) {
                var editButton = document.createElement("button");
                editButton.setAttribute("onclick", "javascript: blog_showEditCommentIfAllowed("+commentID+")");
                editButton.setAttribute("class", "commentReportButton");
                editButton.innerHTML = "<span class='material-icons'>edit</span>";
                div.appendChild(editButton);
            }
            
            
        }

    }

}

function blog_editProfileInDB() {
    var firstName = document.getElementById("editFirstName").value;
    var lastName = document.getElementById("editLastName").value;
    var birthdate = document.getElementById("editBirthDate").value;
    var password1 = document.getElementById("editPassword").value;
    var password2 = document.getElementById("editPassword2").value;
    var data = "";

    if(password1 != null && password2 != null) {
        if(blog_passwordCheck(password1, password2)) {
            data = data+"password="+password1;

        }

    }
    
    data = data+"&firstName="+firstName+"&lastName="+lastName+"&birthdate="+birthdate;
    //alert(data);
    sendData("editUserInDB", "blog_editUserInDB.php", data, blog_profileEdited);
    
}

function blog_profileEdited(id, request) {
    var text = request.responseText;
    if(text == "true") {

        alert("Din profil har ändrats!");
        location.reload();
    }
}


function blog_getNamesFromDB() {
    
    sendData("getNames", "blog_getNamesFromDB.php", "", blog_showName);

}


function blog_showName(id, request) {
    var text = request.responseText;
    //console.log(text);
    var names = text.split("&");
    
    document.getElementById("editFirstName").value = names[0];
    this.fName = names[0];

    document.getElementById("editLastName").value = names[1];
    this.lName = names[1];

    document.getElementById("editBirthDate").value = names[2];
    this.birthdate = names[2];
    
}


function blog_enableEditButton() {
    //console.log(this.lName);
    if(document.getElementById("editFirstName").value != this.fName || document.getElementById("editLastName").value != this.lName || document.getElementById("editBirthDate").value != birthdate ||document.getElementById("editPassword").value != "") {
        document.getElementById("editButton").removeAttribute("disabled");
    } else {
        
        document.getElementById("editButton").setAttribute("disabled", "disabled");

    }

}
function blog_loadAdminSettings(page) {
    
    
        var buttons = document.getElementsByClassName("selectedButton")
        for(var i = 0; i<buttons.length; i++) {
            buttons[i].setAttribute("class", "button");
    
        }
        document.getElementById("adminSettingsContent").innerHTML ="";
    
        if(page == "ban") {
            
            var button = document.getElementById("banButton");
            button.setAttribute("class", "selectedButton");
    
            sendData("loadUserSettings", "blog_A_banUser.php", "", blog_writeAdminSettings);
            
    
        } else if(page == "unBan") {
            
            var button = document.getElementById("unBanButton");
            button.setAttribute("class", "selectedButton");
    
            sendData("loadUserSettings", "blog_A_unBanUser.php", "", blog_writeAdminSettings);
        
        } else if(page == "admins") {
    
            var button = document.getElementById("admins");
            button.setAttribute("class", "selectedButton");
    
            sendData("loadUserSettings", "blog_A_admins.php", "", blog_writeAdminSettings);
        }
    
    }
    
    
    function blog_writeAdminSettings(id, request) {
        console.log(request.responseText);
        document.getElementById("adminSettingsContent").innerHTML = request.responseText;
    
        if(request.responseText.includes("Profil")) {
            
            blog_getNamesFromDB();
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

        sendData("loadUserSettings", "blog_blogSettings.php", "", blog_writeUserSettings);
    
    } else if(page == "edit") {

        var button = document.getElementById("editProfileButton");
        button.setAttribute("class", "selectedButton");

        sendData("loadUserSettings", "blog_editProfile.php", "", blog_writeUserSettings);
    }

}


function blog_writeUserSettings(id, request) {

    document.getElementById("userSettingsContent").innerHTML = request.responseText;

    if(request.responseText.includes("Profil")) {
        
        blog_getNamesFromDB();
    }

}

function blog_loginToDB() {
    var username = document.getElementById("loginUsername").value;
    var password = document.getElementById("loginPassword").value;

    var data = "username="+username+"&password="+password;
    //console.log(data);
    sendData("login", "blog_loginDB.php", data, blog_loggedIn);

}


function blog_loggedIn(id, request) {

    var text = request.responseText;
    //console.log(text);
    if(text == true) {
        //alert("Du loggades in");
        document.getElementById("login").style.display = "none";
        location.reload();

    } else {
        //alert("Du loggades inte in");
        document.getElementById("info").innerHTML = text;

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
        var infoDivs = document.getElementsByName("info");
        
        for(var i = 0; i<infoDivs.length; i++) {
            
            infoDivs[i].innerHTML ="</br>Du har angett olika lösenord";
        
        }
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
    //alert(data);
    sendData("regUserToDB", "blog_regUserToDB.php", data, blog_userRegistered);

}


function blog_userRegistered(id, request) {
    var text = request.responseText;

    if(text == 1) {
        alert("Du är nu registrerad!");
        location.replace("index.php");

    } else {

        alert(text);
    }

}


function showModal(modalName) {
    //console.log(modalName);
    var infoDivs = document.getElementsByName("info");
    for(var i = 0; i<infoDivs.length; i++) {
        infoDivs[i].innerHTML = "";
    }

    document.getElementById(modalName).style.display = "block";

}