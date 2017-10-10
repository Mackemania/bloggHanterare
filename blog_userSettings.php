<html lang="en">
	<head>
		<title>Min profil | Bloog</title>
		<link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
        <script src="code.js"></script>
        <script src="ajaxlib.js"></script>
	</head>
	<body onload="javascript: blog_loadUserSettings('about');">
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
