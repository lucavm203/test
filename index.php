<?php
require_once 'Session.php';
require_once 'secure/Connect.php';
require_once 'class/Winner.php';
?>
<html>
    <head>
        <title>lotterij </title>

        
    </head>
    <body>
        <a href="regdo.php">registreren</a>
        <a href="indo.php">inloggen</a>
        <a href="lotymak.php" >aanmaken lotterij</a>
        <a href="lotyzien.php">lotterij zien</a>
        <?php 
        if( !empty($_SESSION['logged_in'])){
            echo '<a href="profile.php" >Profile</a>
            <a href="uitloggen.php">uitloggen</a>';
        }
        ?>
    </body>
</html>
<?php

$winner = new Winner;

$thing = $winner->resultLotterij($Lotterij,$Lot,$Winner);
if($thing == "nope"){
    echo "no winnars";
}else{
    echo"there are winners.";
}

?>