<?php

require_once("blog_db.php");
$db = new DB();

$blogGet = "SELECT * FROM blog";

$matrix = $db->getData($blogGet);


for ($i=0;$i<count($matrix);$i++){
  $randomizer=$matrix[$i][1];
}

//$i = rand(0,count($matrix)-1);
$i=0;
shuffle($matrix);
if(count($matrix)<4)
{
  while ($i<count($matrix))
  {
    echo $matrix[$i][1]."<br/>";
    $i++;
  }
}
else
{
  while ($i<4)
  {
    echo $matrix[$i][1]."<br/>";
    $i++;
  }
}


?>
