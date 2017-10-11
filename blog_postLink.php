//gör en lista för alla inlägg på den bloggen du är på.
<?php
  $postLink = "";
  $postName = "";
  $blogID = $_SESSION["blogID"];

  require_once("blog_db.php");
  $db = new DB();

  $sql = "SELECT postID, postTitle FROM post WHERE blogID=$blogID";



  $matrix = $db->getData($sql);

  for($i = 0; $i<count($matrix); $i++)
  {
    echo "<a href=post_".$matrix[$i][0]."/post.php>".$matrix[$i][1]."</a><br/>";
  }

?>
