<?PHP
    //en form som används för att göra nya bloggar
?>
<form action='blog_createBlog.php' method='post'>

    Bloggens namn:</br>
    <input type='text' name='blogTitle' required="required"><br/><br/>

    Beskrivning av bloggen:</br>
    <input type='text' name='blogDescription' required="required"><br/><br/>

    <input type='submit' value='Skapa blog'>

</form>