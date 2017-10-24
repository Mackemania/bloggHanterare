<?php
    require_once("blog_db.php");
    $db = new DB();

    session_start();
    $blogID = $_SESSION["blogID"];
    $userID = $_SESSION["userID"];
    $postID = $_SESSION["postID"];
    $commentText = $db->getCon()->real_escape_string($_POST["commentArea"]);

    
    if (preg_match("/[\\\*\/<>%]/", $commentText)){
        
        header("location: blog_blog.php?blogID=$blogID");
        echo "do over uu shit";
        die();
}

    $SQL = "SELECT commentID FROM comment ORDER BY commentID DESC";
    $matrix = $db->getData($SQL);


    if(isset($matrix[0][0])) {
        $commentID = $matrix[0][0]+1;
    } else {

        $commentID = 1;
    }

    $source = "blog/blog_$blogID/post_$postID/comment_$commentID.txt";

    $getIP = $_SERVER['REMOTE_ADDR'];

    $user_agent     =   $_SERVER['HTTP_USER_AGENT'];
    $os_platform    =   "Unknown OS Platform";
    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }

    $SQL = "INSERT INTO comment(OS, IP, source, userID, postID) VALUES('$os_platform','$getIP', '$source', $userID, $postID)";
    $db->execute($SQL);

    $old = umask(0);

    $commentFile = fopen($source, "w");
    fwrite($commentFile, $commentText);

    umask($old);

    /*
    $postfile = fopen("blogg/".$blogg."/".$post."/post.php", "w");
    fwrite($postfile, $posttext);

    $commentfile = fopen("blogg/".$blogg."/".$post."/comment_".$counter.".txt", "w");
    fwrite($commentfile, $commenttext);
    */
    header("location: blog_blog.php?blogID=$blogID");
?>
