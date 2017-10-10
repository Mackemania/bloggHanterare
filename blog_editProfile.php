<?PHP
    /*
        Shows on "My profile" after someone presses the edit profile button.
    */
?>

<html>
    <body>
        <h2>Edit profile</h2>
        <div id="editProfileContent">
            <div id="editProfileContentPane">
                First name:</br>
                <input type="text" id="editFirstName" name="editFirstName" class="formText" onkeyup="javascript: blog_enableEditButton();" placeholder="First name" maxlength="30"/></br></br>
                
                Last name:</br>
                <input type="text" id="editLastName" name="editLastName" class="formText" onkeyup="javascript: blog_enableEditButton();" placeholder="Last name" maxlength="30"/></br></br>

                Change password:</br>
                <input type="password" id="editPassword" name="editPassword" class="formText" onkeyup="javascript: blog_enableEditButton();" placeholder="New password" maxlength="30"/></br></br>
            
                Repeat password:</br>
                <input type="password" id="editPassword2" name="editPassword2" class="formText" onkeyup="javascript: blog_enableEditButton();" placeholder="Repeat password" maxlength="30"/></br></br>
            
                <input type="button" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Save changes" disabled="disabled">

            </div>
        </div>
    </body>
</html>