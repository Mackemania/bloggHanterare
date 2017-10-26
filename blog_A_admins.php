<?PHP
    session_start();
    $admin = $_SESSION["admin"];
    if($admin == 1) {


    } else {

        header("location: index.php");
    }
?>

<div id="adminTools" class="adminTools">
    <h2>Administratörer</h2></br>
    Skriv ett namn:
    <input type="text" id="adminUsers" name="adminUsers" class="formText" onkeyup="javascript: blog_getUsersFromDB();" placeholder="Namn" /></br></br>

    <div id="users">
    </div>
    
    <div id="selectedUsers">
    </div>

    <?PHP
        $SQL = "SELECT * FROM user WHERE admin=1";
    ?>

</div>
