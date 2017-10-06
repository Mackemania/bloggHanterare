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
        <li><a class="menuA" href="javascript: showModal('register');">Sign up</a></li>
        <li><a class="menuA" href="javascript: showModal('login');">Sign in</a></li>
    </ul>
</div>
 