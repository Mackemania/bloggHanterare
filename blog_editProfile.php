<?PHP
    /*
        Shows on "My profile" after someone presses the edit profile button.
    */
?>

<html lang="en">
    <body>
        <h2>Profilinställningar</h2>
        <div id="editProfileContent">
            <div id="editProfileContentPane">
                Förnamn:</br>
                <input type="text" id="editFirstName" name="editFirstName" class="formText" onkeyup="javascript: blog_enableEditButton();" placeholder="Förnamn" maxlength="30"/></br></br>

                Efternamn:</br>
                <input type="text" id="editLastName" name="editLastName" class="formText" onkeyup="javascript: blog_enableEditButton();" placeholder="Efternamn" maxlength="30"/></br></br>

                Födelsedatum:
                <?PHP
                $date = date("Y-m-d");
                echo("
                    <input type='date' id='editBirthDate' name='editBirthDate' class='formText' onkeyup='javascript: blog_enableEditButton();' onchange='javascript: blog_enableEditButton();' max='$date'/></br></br>
                ");
                ?>
                Ändra lösenord:</br>
                <input type="password" id="editPassword" name="editPassword" class="formText" onkeyup="javascript: blog_enableEditButton();" placeholder="Nytt lösenord" maxlength="30"/></br></br>

                Upprepa lösenord:</br>
                <input type="password" id="editPassword2" name="editPassword2" class="formText" onkeyup="javascript: blog_enableEditButton();" placeholder="Upprepa lösenord" maxlength="30"/></br></br>

                <div id="editInfo" name="info">
                </div>

                <input type="button" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Spara ändringar" disabled="disabled">

            </div>
        </div>
    </body>
</html>
