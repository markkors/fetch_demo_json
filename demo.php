<?php


//$conn = new mysqli("localhost", "voetbalstanden", "voetbalstanden", "voetbalstanden");
//var_dump($conn);

$conn = new PDO("mysql:host=localhost;dbname=voetbalstanden", "voetbalstanden", "voetbalstanden");
var_dump($conn);