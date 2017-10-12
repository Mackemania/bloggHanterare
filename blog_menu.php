<?PHP
    //övre menyn högst upp på sidan som finns på varje sida.
    session_start();
    require_once('blog_logIn.php');
    require_once('blog_registerUser.php');

?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
    <script src="code.js"></script>
    <script src="ajaxlib.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <?PHP
        echo("<link href='blog_style.css' media='screen' type='text/css' rel='stylesheet'/>");
    ?>

    <script src="code.js"></script>
</head>

<div id="menu">
    <ul>
        <?PHP
            echo("
                <li><img src='graphics/logga.svg' class='menuLogo'/></li>
                <li><a class='menuA' href='index.php' title='KYS' data-toggle='popover' data-trigger='hover' data-content='Some content'>Startsida</a></li>
            ");

            if(!isset($_SESSION["userID"])) {
                echo(
                '<li><a class="menuA" href="javascript: showModal(\'register\');">Registrera</a></li>
                <li><a class="menuA" href="javascript: showModal(\'login\');">Logga in</a></li>');

            } else {

                echo("<li><a class='menuA' href='blog_userBlogs.php' title='Se dina bloggar' data-toggle='popover' data-trigger='hover' data-content='Some content'>Mina bloggar</a></li>");
                echo("<li><a class='menuA' href='blog_userSettings.php' title='Inställningar för din profil och dina bloggar' data-toggle='popover' data-trigger='hover' data-content='Some content'>Min profil</a></li>");
                echo("<li><a class='menuA' href='blog_logout.php' title='Klicka här för att logga ut' data-toggle='popover' data-trigger='hover' data-content='Some content'>Logga ut</a></li>");

            }

        ?>
        <form action = "blog_search.php" method = "POST">
        <div id="searchbar">
            <span class="input-group-btn">
            <span class="glyphicon glyphicon-search"></span> Search
            <input type="text" class="form-control" name = "searchStuff" placeholder="Sök efter bloggar...">
            <button class="btn btn-success" type="submit">Sök</button>
        </div>
      </form>
    </ul>
</div>

 <!--
<a class="menuA" href="index.php" title="KYS" data-toggle="popover" data-trigger="hover" data-content="Some content">Hem</a>
<a class="menuA" href="blog_userSettings.php">My profile</a>
<a class="menuA" href="blog_logout.php">Sign out</a>
     -->
