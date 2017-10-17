<?PHP
    //en form som används för att göra nya bloggar
?>
<div class="contentPane">
    <button id="showCreateBlog" class="postButton" onclick="javascript: showModal('createBlog');">Skapa ny blogg</button></br></br>
</div>
    <div id ="createBlog" class="modal form">
        <div id="modalContent" class="modalContent">
            <div id="closeDiv">
                <span onclick="document.getElementById('createBlog').style.display='none'" class="close" title="Stäng">&times;</span>
            </div>
            <h2>Skapa en ny blogg</h2></br>
            <form action='blog_createBlog.php' method='post'>

                Bloggens namn:</br>
                <input type='text' name='blogTitle' class="formText" required="required"><br/><br/>
        
                Beskrivning av bloggen:</br>
                <textarea name='blogDescription' rows="5" class="formText" maxlength="140" required="required"></textarea><br/><br/>
        
                <input type='submit' class="formButton" value='Skapa blog'>

            </form>
        </div>
    </div>
