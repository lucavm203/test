<?php
require_once 'Session.php';
require_once 'secure/Connect.php';
require_once 'class/User.php';
            if(isset($_POST['submit'])){
                $username = $_POST['username'];
                $password = $_POST['password1'];
                $password2 = $_POST['password2'];

                $foundUser = $User->findOne(['username' => "$username"]);
                if (empty($foundUser['username'])){
                    if($password == $password2 ){
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $Users = new User('',$username,$hash);
                        $Users->addUser($User);
                }else{
                    echo 'wachtwoord is niet hetzelfde.';
                }

            }else{
                echo 'username is al gebruikt.';
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
        <input type="text" name="username" placeholder="gebruikersnaam"><br>
        <input type="password" name="password1" placeholder="wachtwoord"><br>
        <input type="password" name="password2" placeholder="herhaal wachtwoord"><br>
        <input type="submit" name="submit" value='toevoegen'><br>
    </form><br>
    <a href="index.php">home</a>
   
</body>
</html>