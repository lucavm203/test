<?php 
        require_once 'Session.php';
        require_once 'secure/Connect.php';
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
    <script src="./node_modules/jquery-countdown/dist/jquery.countdown.js"></script>
</head>
<body>
        <a href="index.php">home</a>
        <a href="regdo.php">registreren</a>
        <a href="indo.php">inloggen</a>
        <a href="lotymak.php" >aanmaken lotterij</a>
        <a href="lotzien.php" >lotterij zien</a>
        <?php 
        if( !empty($_SESSION['logged_in'])){
            echo '<a href="profile.php" >Profile</a>
            <a href="uitloggen.php">uitloggen</a>';
        }

        $id = $_GET['id'];
        $foundlottery = $Lotterij->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);

                $lotterys = new Lotterij($foundlottery['_id'],$foundlottery['lotterij_naam'],$foundlottery['lotterij_datum'],$foundlottery['lotterij_prijs'],$foundlottery['user_id']);
                $timer = date("Y-m-d H:i:s",strtotime(str_replace('T',' ', $lotterys->getLotterij_Datum()))  );
                echo "
                <br>
                <div> 
                    <p>".$lotterys->getLotterij_Naam()." </p>
                    <p>eind datum: ".$lotterys->getLotterij_Datum()." </p>
                    <p>prijs: ".$lotterys->getLotterij_Prijs()." </p>
                    <div id=getting-started></div>
                    <script type=text/javascript>
                    $('#getting-started').countdown('$timer', function(event) {
                        $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
                    });
                    </script>
                    
                </div>
                <br>
            
                ";
                $datenow = New DateTime(date('Y-m-d H:i:s'));
                $datumlotterij = New DateTime($lotterys->getLotterij_Datum());
                
                $interval1 = $datenow->diff($datumlotterij);
                
                if( $interval1->invert == 0){
                    $_SESSION['lottery_ID'] = $lotterys->getLotterij_Id();
                    echo "<a href=lot.php >mee doen met lotterij</a>";
                }

        
        ?>
</body>
</html>