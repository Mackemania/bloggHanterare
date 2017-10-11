//loggar ut användaren och förstör sessionen.
<?PHP
    session_start();
    session_unset();
    session_destroy();
    header("location: index.php");
?>
