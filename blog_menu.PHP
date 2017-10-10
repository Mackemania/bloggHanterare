<?PHP
    session_start();
    require_once("blog_logIn.php");
    require_once("blog_registerUser.php");
    
?>
<head>
    <script src="code.js"></script>
</head>
<div id="menu">
    <ul>
        <li><a class="menuA" href="index.php">Startsida</a></li>
        <?PHP
            if(!isset($_SESSION["userID"])) {
                echo(
                '<li><a class="menuA" href="javascript: showModal(\'register\');">Registrera</a></li>
                <li><a class="menuA" href="javascript: showModal(\'login\');">Logga in</a></li>');
            
            } else {

                echo('<li><a class="menuA" href="blog_userSettings.php">Min profil</a></li>');
                echo('<li><a class="menuA" href="blog_logout.php">Logga ut</a></li>');
            }
        ?>
        
    </ul>
</div>
 