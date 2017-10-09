<html>
	<head>
		<title>My profile | Bloog</title>
		<link href="blog_style.css" media="screen" type="text/css" rel="stylesheet"/>
        <script src="code.js"></script>
        <script src="ajaxlib.js"></script>
	</head>
	<body onload:"javascript: blog_loadUserSettings('about');">
		<?PHP
        	require_once("blog_menu.php");
        ?>

		<div id="container">
            <div id="settingsMenu">
                <input type="button" id ="aboutButton" value="About me" class="selectedButton" onclick="javascript: blog_loadUserSettings('about');"/>
                <input type="button" id ="blogSettingsButton" value="Blog Settings" class="button" onclick="javascript: blog_loadUserSettings('settings');"/>
                <input type="button" id ="editProfileButton" value="Edit profile" class="button" onclick="javascript: blog_loadUserSettings('edit');"/>
            </div>
            <div id="userSettingsContent">
                
            </div>
		</div>
	</body>

</html>
