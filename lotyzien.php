<?php 
        require_once 'Session.php';
        require_once 'secure/Connect.php';
        
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
        <a href="lotymak.php" >maken lotterij</a>
        <?php 
        if( !empty($_SESSION['logged_in'])){
            echo '<a href="profile.php" >Profile</a>
            <a href="uitloggen.php">uitloggen</a>';
        }
       

        $foundlottery = $Lotterij->find([]);

        if(!empty($foundlottery)){
            foreach($foundlottery as $lottery){
                $timer = date("Y-m-d H:i:s",strtotime(str_replace('T',' ', $lottery["lotterij_datum"]))  );
                echo "
                <br>
                <div> 
                    <p>$lottery[lotterij_naam] </p>
                    <p>eind datum: $lottery[lotterij_datum]</p>
                    <p>prijs: $lottery[lotterij_prijs]</p>
                    <a href=lotyfull.php?id=$lottery[_id]>lotterij snel link</a>
                    <div id=getting-started></div>
                    <script type=text/javascript>
                    
                    $('#getting-started').countdown('$timer', function(event) {
                        $(this).html(event.strftime('%w weeks %d days %H:%M:%S'));
                    });
                    </script>
                </div>
                <br>
                <script>
                ";
            }
        }
        ?>
        
        
</body>
</html>