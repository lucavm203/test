<?php
require_once 'Session.php';
$_SESSION = array();
session_destroy();
die(header("Location: index.php"));