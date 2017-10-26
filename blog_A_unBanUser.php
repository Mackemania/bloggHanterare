<div id="adminTools" class="adminTools">
    <?PHP
        session_start();
        if(isset($_SESSION["admin"])) {
            if($_SESSION["admin"] == 1) {

                $date = date("Y-m-d");
                require_once("blog_db.php");
                $db = new DB();
                echo "<br/><form action='blog_A_unBanUserDB.php' method='post'>";
                
                echo("<h2>Ta bort en bann</h2>");
                echo "<select name='userID' id='userID' class='formText'></br>
                <option value=''>Välj en...</option>";
                $SQL = "SELECT userID, alias, suspended FROM user WHERE suspended>$date";
                echo($SQL);
                $matrix = $db->getData($SQL);
                for($i = 0; $i<count($matrix); $i++)
                {
                    if(strtotime($matrix[$i][2])>time())
                    {
                    echo "<option value='".$matrix[$i][0]."'>".$matrix[$i][1];
                    echo " [Banned Until: ".$matrix[$i][2]."]";
                    echo "</option>";
                    }
                }
                echo "</select><br/><br/>";

                echo "Anledning till borttagen bann:</br>
                <input type='text' name='reason' class='formText' placeholder='Skriv anledningen' required='required'><br/></br>";

                echo "<input type='submit' value='Ta bort bann' class='formButton'> </form>";

                

                echo "<br/><form action='blog_A_userBlogs.php' method='post'>Vems bloggar?:</br>
                <select name='userID' id='userID' class='formText'>";
                $SQL = "SELECT userID, alias FROM user WHERE admin=0";
                $matrix = $db->getData($SQL);
                echo("<option value=''>Välj en...</option>");
                for($i = 0; $i<count($matrix); $i++)
                {
                    echo "<option value='".$matrix[$i][0]."'>".$matrix[$i][1]."</option>";
                }
                echo "</select><br/></br>";
                echo "<input type='submit' class='formButton' value='kolla användarens bloggar'> </form>";
            
            } else {

            }
        }
    ?>
</div>