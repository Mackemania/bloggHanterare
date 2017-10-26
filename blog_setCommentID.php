<?PHP
    session_start();
    $commentID = $_REQUEST["commentID"];
    $_SESSION["commentID"] = $commentID;
    echo(1);
?>