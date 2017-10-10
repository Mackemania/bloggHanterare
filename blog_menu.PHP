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
        <li><a class="menuA" href="index.php">Home</a></li>
        <?PHP
            if(!isset($_SESSION["userID"])) {
                echo(
                '<li><a class="menuA" href="javascript: showModal(\'register\');">Sign up</a></li>
                <li><a class="menuA" href="javascript: showModal(\'login\');">Sign in</a></li>');
            
            } else {

                echo('<li><a class="menuA" href="blog_userSettings.php">My profile</a></li>');
                echo('<li><a class="menuA" href="blog_logout.php">Sign out</a></li>');
            }
        ?>
        
    </ul>
</div>
 