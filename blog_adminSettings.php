<?PHP
//hemsidan där man börjar.
?>
<html>
	<head>

		<title>Startsida | Bloog</title>

	</head>
	<body onload="javascript: blog_loadAdminSettings('ban');">
		<?PHP
            require_once("blog_menu.php");
        ?>
		
        <div id="container">

            <div id="settingsMenu">
                <input type="button" id ="banButton" value="Porta användare" class="selectedButton" onclick="javascript: blog_loadAdminSettings('ban');"/>
                <input type="button" id ="unBanButton" value="Ångra portning" class="button" onclick="javascript: blog_loadAdminSettings('unBan');"/>
                <input type="button" id ="admins" value="Administratörer" class="button" onclick="javascript: blog_loadAdminSettings('admins');"/>
                <input type="button" id ="flags" value="Kolla flaggor" class="button" onclick="javascript: blog_loadAdminSettings('flags');"/>
            </div>
            <div id="adminSettingsContent">

            </div>
            <?PHP
                if(isset($_SESSION["admin"])) {
                    if($_SESSION["admin"] == 1) {


                    } else {
                    
                    echo("<h1>Du har inte rättigheter att visa den här sidan!</h1>");
                    
                    }
                } else {
                    
                    echo("<h1>Du har inte rättigheter att visa den här sidan!</h1>");
                }
            ?>
		</div>
	</body>

</html>
