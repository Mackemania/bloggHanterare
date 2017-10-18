<div id="adminTools" class="adminTools">
    <?PHP
        session_start();
        if($_SESSION["admin"] == 1) {
            require_once("blog_db.php");
            $db = new DB();

            $date = date("Y-m-d");

            $SQL = "SELECT userID, alias, suspended FROM user WHERE admin != 1";

            $matrix = $db->getData($SQL);
            
            echo("<h2>Banna en användare</h2>");

            echo "<br/><form action='blog_A_banUserDB.php' method='post'>Vem är det som ska bli bannad:</br>
            <select name='userID' id='userID' class='formText' required='required'>
            <option value=''>Välj en...</option>";
            
                for($i = 0; $i<count($matrix); $i++)
                {
                    echo "<option value='".$matrix[$i][0]."'>".$matrix[$i][1];
                    if(strtotime($matrix[$i][2])>time())
                    {
                        echo " [Banned Until: ".$matrix[$i][2]."]";
                    }
                    echo "</option>";
                }
            
            echo "</select><br/><br/>";

            echo "Hur lång bann?</br>";

            echo("<input type='date' id='suspendedUntil' name='suspendedUntil' class='formText' onkeyup='javascript: blog_enableEditButton();' onchange='javascript: blog_enableEditButton();' min='$date'/></br></br>");

            echo "Andledning till bann:</br>
            <select class='formText' required='required'>
                <option value=''>Välj en...</option>
                <option value='1'>Spam</option>
                <option value='2'>Förtal</option>
                <option value='3'>Pornografi</option>
                <option value='4'>Anstötligt uppförande</option>
            </select></br></br>
            <input type='text' name='reason' class='formText' placeholder='Övrig information'></br></br>
            <input type='submit' value='Banna en användare' class='formButton'>
            </form>";
        } else {

            header("location: index.php");
        }
    ?>
</div>