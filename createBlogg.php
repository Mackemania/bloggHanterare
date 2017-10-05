<?php
$blogg = "blogg_1";
$post = "post_1";
$bloggtext = "det här är en blogg";
$posttext = "det här är en post";
$commenttext = "det här är en kommentar";

mkdir("blogg/".$blogg);
mkdir("blogg/".$blogg."/".$post);

$bloggfile = fopen("blogg/".$blogg."/blogg.php", "w");
fwrite($bloggfile, $bloggtext);

$postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
fwrite($postfile, $posttext);

$commentfile = fopen("blogg/".$blogg."/".$post."/comment.txt", "w");
fwrite($commentfile, $commenttext);
?>
