//gör en lista med alla bloggar.
<?php
    $blogLink = "";
    $blogName = "";


<<<<<<< Updated upstream
  require_once("blog_db.php");
  $db = new DB();
=======
    require_once("blog_db.php");
    $db = new DB("localhost", "root", "", "blog");
>>>>>>> Stashed changes

    $sql = "SELECT blogID, blogTitle FROM blog";
    $matrix = $db->getData($sql);

    for($i = 0; $i<count($matrix); $i++) {
        echo "<a href=blog/blog_".$matrix[$i][0]."/blog.php>".$matrix[$i][1]."</a><br/>";
    }
?>
