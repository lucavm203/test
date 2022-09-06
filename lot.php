<?php 
require_once 'Session.php';
require_once 'secure/Connect.php';
require_once 'class/Lot.php';


$id = $_SESSION['lottery_ID'];
$id2 = $_SESSION['id'];
$lot = new Lot('',$id,$id2);
$lot->addLot($Lot);
die(header("Location: lotyfull.php?id=$id"))
?>