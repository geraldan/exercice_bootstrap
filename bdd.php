<?php
$connect = new PDO('mysql:host=localhost;dbname=cour_bootstrap','root','');

$sql = "INSERT INTO pays (capital, pays)
VALUES ( 'Berlin', 'allemagne')";

$connect->exec($sql);