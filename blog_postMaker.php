<?PHP
    //form för att göra ett nytt inlägg
?>
<input type="button" class="postButton" onclick="javascript: showModal('createPost');" value="Gör inlägg">

<div id ="createPost" class="modal form">
    <div id="modalContent" class="postModalContent">
        <div id="closeDiv">
            <span onclick="document.getElementById('createPost').style.display='none'" class="postClose" title="Stäng">&times;</span>
        </div>
        
        <span class="commentName">Genom att registrera dig accpeterar du <a href="blog_eula.php">Slutanvändaravtalet</a></span>
		
        <h2>Skriv inlägg</h2></br>
        <form method="post" action="blog_postCreator.php">
            
            Inläggets namn:</br>
            <input type='text' id="postTitle" name='postTitle' class="formText" maxlength="30"><br/><br/>

            Inlägget:</br>
            <textarea id="postText" name="postText" class="textarea" rows="10" placeholder="Skriv något!" autocomplete="off" required="required"></textarea>

            <input type='submit' value='create post' class="formButton">

        </form>
    </div>
</div>
