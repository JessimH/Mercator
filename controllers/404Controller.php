<?php
require('models/Players.php');
require('models/Postes.php');
require('models/Users.php');
require('models/Clubs.php');
require('models/Cart.php');

$clubs = getAllClubs();
$users = getAllUsers();

include 'views/404.php';