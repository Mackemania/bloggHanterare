<?PHP
            require_once("blog_menu.php");


?>
<html>
    <body>
        <h2>Blogginställingar</h2>
        <div id="editProfileContent">
            <div id="editProfileContentPane">
                <form>
                    <select class="formText" required>
                        <option value="">Välj en...</option>
                        <option value="Admin">Administratör</option>
                        <option value="Open">Öppen</option>
                        <option value="Private">Privat</option>
                    </select></br></br>
                    <input type="submit" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Spara ändringar">
                </form>
            </div>
        </div>
    </body>
</html>