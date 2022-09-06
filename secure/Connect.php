<?php
require './vendor/autoload.php'; // include Composer's autoloader

$Mongo = new MongoDB\Client("mongodb://localhost:27017");
$Lot = $Mongo->Lottery->Lot;
$Lotterij = $Mongo->Lottery->Lotterij;
$User = $Mongo->Lottery->User;
$Winner = $Mongo->Lottery->Winner;