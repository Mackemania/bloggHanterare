<?php
  $blogLink = "";
  $blogName = "";

  require_once("blog_db.php");
  $db = new DB("localhost", "root", "", "bloggportal");

  $sql = "SELECT bloggID, name FROM blogg";
  $matrix = $db->getData($sql);

  for($i = 0; $i<count($matrix); $i++)
  {
    echo "<a href=blog/blog_".$matrix[$i][0]."/blog.php>".$matrix[$i][1]."</a><br/>";
  }
?>
