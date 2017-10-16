<?PHP
    session_start();
    $postID = $_REQUEST["postID"];
    $_SESSION["postID"] = $postID;
    echo(1);
?>