<?PHP
    //här sätter man behörighet och väljer vem som skall vara administratör eller läsbehörig på din/dina bloggar.
    require_once("blog_menu.php");

?>
<html>
    <body>
        <h2>Blogginställingar</h2>
        <div id="editProfileContent">
            <div id="editProfileContentPane">   
            <form action='blog_setUserBlogSettings.php' method='post'> 
                <?PHP require("blog_getBlogsFromUser.php");?><br />
                    Sätt behörighet på din blogg<br />
                    <select class="formText" required="required" name="permissionLevel">
                        <option value="">Välj en...</option>
                        <option value="LoggedIn">Endast inloggade</option>
                        <option value="Open">Öppen</option>
                        <option value="Private">Privat</option>
                    </select><br /><br />
                        <input type="submit" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Spara Behörighetsändring">
                </form>
                <form action='blog_setPermissionToBlog.php' method='post'>
                    Välj whitelistad persons roll.<br />
                    <select name="permission" class="formText" required="required">
                        <option value="">Välj en...</option>
                        <option value="Admin">Administratör</option>
                        <option value="Read">Läsbehörig</option>
                    </select><br />
                    <?PHP require("blog_getBlogsFromUser.php");?><br />
                    Skriv personens namn.<br /> 
                        <input type="text" name="alias" required="required" placeholder="Namn" autocomplete="off"></br></br>
                        <input type="submit" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Whitelista Person">
                </form>
            </div>
        </div>
    </body>
</html>