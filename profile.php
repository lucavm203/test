<?php 
    require_once 'Session.php';
    require_once 'secure/Connect.php';
    require_once 'class/User.php';
    require_once 'class/Lot.php';
    require_once 'class/Lotterij.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   
</head>
<body>
        <a href="index.php">home</a>
        
        <a href="lotymak.php" >aanmaken lotterij</a>
        <a href="lotyzien.php">lotterij zien</a>
        <a href="uitloggen.php">uitloggen</a>';
        
    <div id="user">
        <p>gerbuiker settings</p>
        <?php 
            $id = $_SESSION['id'] ;
            $foundUser = $User->findOne(['_id' => new MongoDB\Bson\ObjectId($id)]);
            $Users = new User($id, $foundUser['username'],$foundUser['password']);
            echo"
            <div>
            <p> naam: ".$Users->getUsername()."
            </div>
            ";
        ?>
        
    </div>    
    <div id="lottery">
        <p> uw lotterijen</p>
        <?php 
        $foundlottery = $Lotterij->find(['user_id' => $id]);
        if(!empty($foundlottery)){
            foreach($foundlottery as $lottery){
                echo "
                <div> 
                <p>$lottery[lotterij_naam] </p>
                <p>eind datum: $lottery[lotterij_datum]</p>
                <p>prijs: $lottery[lotterij_prijs]</p>
                <a href=lotyfull.php?id=$lottery[_id]>lotterij snel link</a>
                </div>
                
                
                
                
                ";
            }
        }
        ?>
    </div>
    <div class="lot">
        <p> uw lot</p>
        <?php 
            $foundLot = $Lot->find(['user_id' => $id]);
            
            if(!empty($foundLot)){
                foreach($foundLot as $lot){
                    $foundlottery = $Lotterij->findOne(['_id' => new MongoDB\Bson\ObjectId($lot["lotterij_id"])]);
                    echo"
                    <div>
                    <p>lottery naam: $foundlottery[lotterij_naam] </p>
                    </div>
                    ";
            }
            }
        ?>
    </div>
    <div class="winner">
            <p> uw winningen</p>
            <?php 
            $foundLot = $Lot->find(['user_id' => $id]);
            
            if(!empty($foundLot)){
                foreach($foundLot as $lot){
                    $foundwinner = $Winner->findOne(['lot_id' => new MongoDB\Bson\ObjectId($lot["_id"])]);
                    $foundlottery = $Lotterij->findOne(['_id' => new MongoDB\Bson\ObjectId($foundwinner["lotterij_id"])]);
                    echo"
                    <div>
                    <p>gewonnen lottery naam: $foundlottery[lotterij_naam] </p>
                    </div>
                    ";
            }
            }
        ?>
    </div>












</body>
</html>