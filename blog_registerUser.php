<?PHP
	//sida och form för att göra en ny användare.
?>

<div id="register" class="modal register form">
	<div class="modalContent">
		<div id="closeDiv">
			<span onclick="document.getElementById('register').style.display='none'" class="close" title="Stäng">&times;</span>
		</div>
		<span class="commentName">Genom att registrera dig accpeterar du <a href="blog_eula.php">Slutanvändaravtalet</a></span>
		<h2>Registrera användare</h2></br>
		
		<form method="post" onsubmit="return blog_registerPasswordCheck();" action="javascript: blog_regUserToDB();">

			Användarnamn:</br>
			<input type="text"  id="regUsername" name="regUsername" class="formText" placeholder="Användarnamn" autocomplete="off" maxlength="30" required="required"/></br></br>

			E-mail:</br>
			<input type="email" id="eMail" name="eMail" class="formText" placeholder="T.ex: epost@mail.se" maxlength="50" required="required"/></br></br>

			Lösenord:</br>
			<input type="password" id="regPassword" name="regPassword" class="formText" placeholder="Lösenord" autocomplete="off" maxlength="100" required="required"/></br></br>

			Upprepa lösenord</br>
			<input type="password" id="regPassword2" name="regPassword2" class="formText" placeholder="Upprepa lösenord" autocomplete="off" maxlength="100" required="required"/>
			<div id="regInfo" name="info">
			</div>
			</br></br>

			<input type="submit" id="registerUser" name="registerUser" class="formButton" value="Registrera"/>
		</form>
	</div>
</div>
		