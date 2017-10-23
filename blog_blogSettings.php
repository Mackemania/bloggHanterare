<?PHP
    //här sätter man behörighet och väljer vem som skall vara administratör eller läsbehörig på din/dina bloggar.
    require_once("blog_menu.php");

?>
<html>
    <body>
        <h2>Blogginställingar</h2>
        <div id="editProfileContent">
            <div id="editProfileContentPane">
                <form action='blog_sendPermissionsToDB.php' method='post'>
                    <?PHP require("blog_getBlogsFromUser.php");?><br />
                    Sätt behörighet på din blogg<br />
                    <select id="accesBlog" name ="accessBlog" class="formText"  required="required">

                       <option value=''>Välj en...</option>
                       <option value='0'>Öppen</option>
                       <option value='1'>Endast inloggade</option>
                       <option value='2'>Privat</option>

                    </select><br /><br />

                    <input type="submit" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Spara Behörighetsändring">

                </form>
                <form action='blog_sendWhiteListToDB.php' method='post'>

                    <?PHP require("blog_getBlogsFromUser.php");?><br />


                    Skriv personens namn.<br />
                    <input type="text" id="permissionName" name="permissionName" class="formText" required="required" placeholder="Namn" autocomplete="off"></br></br>

                    Välj personens roll.<br />
                    <select id="userAccess" name ="userAccess" class="formText" required="required">
                        <option value=''>Välj en...</option>
                        <option value='2'>Skrivbehörig</option>
                        <option value='1'>Läsbehörig</option>
                        <option value='0'>Obehörig</option>
                    </select><br /><br />


                    <input type="submit" id="editButton" name="editButton" class="formButton" value="Whitelista Person">
                </form>
            </div>
        </div>
    </body>
</html>
