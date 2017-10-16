<?PHP
    //här sätter man behörighet och väljer vem som skall vara administratör eller läsbehörig på din/dina bloggar.
    require_once("blog_menu.php");

?>
<html>
    <body>
        <h2>Blogginställingar</h2>
        <div id="editProfileContent">
            <div id="editProfileContentPane">
            <button onclick="document.getElementById('blogselect').style.display='block'">Välj en blogg</button>
            <div id ="blogselect" class="modal login form">
                <div id="modalContent" class="modalContent">
                    <div id="closeDiv">
                        <span onclick="document.getElementById('blogselect').style.display='none'" class="close" title="Stäng">&times;</span>
                    </div>
                    <form>
                        <select class="formText" required="required">
                            <option value="blogselect">Välj en blogg...</option>
                            <option value="fetchblogs"><?PHP require_once("blog_blogLink.php");?></option>
                        </select></br></br>
                        <input type="submit" value="Välj denna blogg" >
                    </form>
                </div>
            </div>
                <form>
                    Sätt behörighet på din/dina bloggar<br>
                    <select class="formText" required="required">
                        <option value="">Välj en...</option>
                        <option value="Admin">Endast inloggade</option>
                        <option value="Open">Öppen</option>
                        <option value="Private">Privat</option>
                    </select></br></br>
                    <input type="submit" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Spara Behörighetsändring">
                </form>
                <form>
                    Whitelista en person<br>
                    <select class="formText" required="required">
                        <option value="">Välj en...</option>
                        <option value="Admin">Administratör</option>
                        <option value="Readable">Läsbehörig</option>
                    </select></br></br>
                    <input type="text" name="namn" required="required" placeholder="Namn" autocomplete="off"></br></br>
                    <input type="submit" id="editButton" name="editButton" class="formButton" onclick="javascript: blog_editProfileInDB();" value="Whitelista Person">
                </form>
            </div>
        </div>
    </body>
</html>