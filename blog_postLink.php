<?php
  $postLink = "";
  $postName = "";
  $blogID = $_SESSION["blogID"];

  require_once("blog_db.php");
  $db = new DB("localhost", "root", "", "blog");

  $sql = "SELECT postID, postTitle FROM post WHERE bloggID=".$blogID;

  $matrix = $db->getData($sql);

  for($i = 0; $i<count($matrix); $i++)
  {
    echo "<a href=blog/blog_".$blogID."/post_".$matrix[$i][0].".php>".$matrix[$i][1]."</a><br/>";
  }
?>
