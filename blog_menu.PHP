
<?PHP
    session_start();
    require_once("blog_logIn.php");
    require_once("blog_registerUser.php");
    
?>
<head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
    <script src="code.js"></script>
</head>

<div id="menu">
    <ul>
        <li><a class="menuA" href="index.php" title="KYS" data-toggle="popover" data-trigger="hover" data-content="Some content">Hem</a></li>
        
        <?PHP
            if(!isset($_SESSION["userID"])) {
                echo(
                '<li><a class="menuA" href="javascript: showModal(\'register\');">Sign up</a></li>
                <li><a class="menuA" href="javascript: showModal(\'login\');">Sign in</a></li>');
            
            } else {

                echo('<li><a class="menuA" href="blog_userSettings.php" title="Ändra din profil och bloggar" data-toggle="popover" data-trigger="hover" data-content="Some content">Min profil</a></li>');
                echo('<li><a class="menuA" href="blog_logout.php" title="Klicka här för att logga ut" data-toggle="popover" data-trigger="hover" data-content="Some content">Logga ut</a></li>');
            }
            
        ?>
        <div id="searchbar">
            <span class="input-group-btn">
            <span class="glyphicon glyphicon-search"></span> Search
            <input type="text" class="form-control" placeholder="Sök efter bloggar...">
        </div>
    </ul>
</div>

 <!--
<a class="menuA" href="index.php" title="KYS" data-toggle="popover" data-trigger="hover" data-content="Some content">Hem</a>
<a class="menuA" href="blog_userSettings.php">My profile</a>
<a class="menuA" href="blog_logout.php">Sign out</a>
     -->