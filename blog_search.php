<?php


session_start();

if (isset($_POST['searchStuff'])) {

require_once("blog_db.php");
$db = new DB();


$searchIsh = $_POST['searchStuff'];


$selectUser = "SELECT * FROM user WHERE alias LIKE '%$searchIsh%'";
$selectBlogTitle = "SELECT * FROM blog WHERE blogTitle LIKE '%$searchIsh%'";


$matrix = $db->getData($selectUser);


for ($i=0;$i<count($matrix);$i++){
  $alias=$matrix[$i][2];
  echo $alias;


    }

    $matrix = $db->getData($selectBlogTitle);


    for ($i=0;$i<count($matrix);$i++){
      $blogSearch=$matrix[$i][1];
      echo $blogSearch;

    }

}
 ?>