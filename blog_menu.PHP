<?PHP
    session_start();
    require_once("blog_logIn.php");
    require_once("blog_registerUser.php");
?>
<head>
    <script src="code.js"></script>
</head>
<div id="menu">
    <a class="menuA" href="index.php">Home</a> |
    <a class="menuA" href="javascript: showModal('register');">Sign up</a> |
    <a class="menuA" href="javascript: showModal('login');">Sign in</a>
</div>
