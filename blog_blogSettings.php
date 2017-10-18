<?PHP
    //här sätter man behörighet och väljer vem som skall vara administratör eller läsbehörig på din/dina bloggar.
    require_once("blog_menu.php");

?>
<html>
    <body>
        <h2>Blogginställingar</h2>
        <div id="editProfileContent">
            <div id="editProfileContentPane">   
                <?PHP require("blog_getBlogsFromUser.php");?><br />
                    Sätt behörighet på din blogg<br />
                    <select class="formText" required="required">
                        <option value="">Välj en...</option>
                        <option value="Admin">Endast inloggade</option>
                        <option value="Open">Öppen</option>
                        <option value="Private">Privat</option>
                    </select><br /><br />
                    <input type="submit" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Spara Behörighetsändring">
                </form>
                <form>
                    Välj whitelistad persons roll.<br />
                    <select class="formText" required="required">
                        <option value="">Välj en...</option>
                        <option value="Admin">Administratör</option>
                        <option value="Readable">Läsbehörig</option>
                    </select><br />
                    </form>
                    <?PHP require("blog_getBlogsFromUser.php");?><br />
                    <form>
                    Skriv personens namn.<br /> 
                    <input type="text" name="namn" required="required" placeholder="Namn" autocomplete="off"></br></br>
                    <input type="submit" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Whitelista Person">
                </form>
            </div>
        </div>
    </body>
</html>