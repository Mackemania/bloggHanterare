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
    while ($i<4){
    echo $matrix[$i][1];
    $i++;
}


?>
