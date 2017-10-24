<html>
    <head>

        <title>Startsida | Bloog</title>
        
    </head>

    <body>

        <?PHP
            require_once("blog_menu.php");
        ?>

        <div id="container">
            <?PHP 
                require_once("blog_blogMaker.php");
                if(isset($_REQUEST["ogiltig"])) {
                    echo("<div class='info'>Du använde förbjudna tecken t.ex. /, < eller ></div>");
                }
            ?>
            
            <div class="contentPane">
                
                <?PHP 
                    require_once("blog_blogLink.php");
                ?>
            
            <div>
        </div>
        
    </body>
</html>