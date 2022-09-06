<?php
require_once 'Session.php';
require_once 'secure/Connect.php';
    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password1'];

        $foundUser = $User->findOne(['username' => "$username"]);
        if(!empty($foundUser)){
            if (password_verify($password, $foundUser['password']) == true){
            $_SESSION['id'] = $foundUser['_id'];
            $_SESSION['logged_in'] = 'yes';
            die(header("Location:index.php"));
            }else{
                echo 'incorrect wachtwoord';
            }
        }else{
            echo 'incorrect gebruikersnaam';
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="gebruikersnaam">
        <input type="password" name="password1" placeholder="wachtwoord">
        <input type="submit" name="submit" value='toevoegen'>
    </form>
</body>
</html>