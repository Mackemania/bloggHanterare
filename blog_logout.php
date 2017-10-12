<?PHP
    //loggar ut användaren och förstör sessionen.
    session_start();
    session_unset();
    session_destroy();
    header("location: index.php");
?>
