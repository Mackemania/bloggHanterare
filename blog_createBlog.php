<?PHP
    //ini_set("display_errors", "on");
    //error_reporting(-1);
    require_once("blog_db.php");
    $db = new DB();

    session_start();
    $blogOwner = $_SESSION["userID"];
    $blogTitle = $db->getCon()->real_escape_string($_POST["blogTitle"]);
    $blogDescription = $db->getCon()->real_escape_string($_POST["blogDescription"]);
    
   
   
        if (preg_match("/[\\\*\/<>%]/", $blogTitle)) {
            
            header("location: blog_userBlogs.php?ogiltig=1");

        } else if (preg_match("/[\\\*\/<>%]/", $blogDescription)) {

            header("location: blog_userBlogs.php?ogiltig=1");

        } else {

            $SQL = "INSERT INTO blog(blogTitle, blogDescription, css, userID, permissionStatus) VALUES('$blogTitle', '$blogDescription', '1', $blogOwner, 0)";
            //echo($SQL);
            $db->execute($SQL);


            $SQL = "SELECT blogID FROM blog ORDER BY blogID DESC";
            //echo($SQL);
            $matrix = $db->getData($SQL);

            $blogLocation = "blog_".$matrix[0][0];
            $blogID = $matrix[0][0];
            $old = umask(0);
            
            mkdir("blog/".$blogLocation);
            
            umask($old);

            
            header("location: blog_blog.php?blogID=$blogID");
        }
?>
