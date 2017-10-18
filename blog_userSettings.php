<?PHP
    //användarinställningar för den användare som är inloggad.
?>
    <html lang="en">
	<head>
		<title>Min profil | Bloog</title>
		
	</head>
    <?PHP

        if(isset($_REQUEST["page"])) {

            $page = $_REQUEST["page"];
    
        } else {

            $page = "about";
        }

        echo("<body onload='javascript: blog_loadUserSettings(\"$page\");'>");
    ?>
	
		<?PHP
        	require_once("blog_menu.php");
        ?>

		<div id="container">
            <div id="settingsMenu">
                <input type="button" id ="aboutButton" value="Om mig" class="selectedButton" onclick="javascript: blog_loadUserSettings('about');"/>
                <input type="button" id ="blogSettingsButton" value="Blogginställningar" class="button" onclick="javascript: blog_loadUserSettings('settings');"/>
                <input type="button" id ="editProfileButton" value="Profilinställningar" class="button" onclick="javascript: blog_loadUserSettings('edit');"/>
            </div>
            <div id="userSettingsContent">

            </div>
		</div>
	</body>

</html>
