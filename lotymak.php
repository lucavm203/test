<?php 
         require_once 'Session.php';
         require_once 'secure/Connect.php';
         require_once 'class/User.php';
         require_once 'class/Lotterij.php';
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <a href="index.php">home</a>
    <a href="regdo.php">registreren</a>
    <a href="indo.php">inloggen</a>
    <a href="lotyzien.php" >lotterij zien</a>
    <?php 
    
    if( !empty($_SESSION['logged_in'])){
        echo '<a href="profile.php" >Profile</a>
        <a href="uitloggen.php">uitloggen</a>';
    echo"
    <br>
    <br>
    <br>
    <form method=post>
        <input type=text name=naam placeholder=naam_voor_lotterij><br>
        <input type=text name=prijs placeholder=prijs_om_te_winnen><br>
        <input type=datetime-local name=datum ><br>
        <input type=submit name=submit value=aanmaken><br>
    </form>";

        if(isset($_POST['submit'])){
            $name = $_POST['naam'];
            $prijs = $_POST['prijs'];
            $datum = $_POST['datum'];
            $id = $_SESSION['id'];
            $lotterys = new Lotterij('',$name,$datum,$prijs,$id);
            $lotterys->addLotterij($Lotterij);
            echo "lotterij toegevoegd";
        }


    }
    ?>
</body>
</html>