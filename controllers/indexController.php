<?php
require('models/Players.php');
require('models/Postes.php');
require('models/Users.php');
require('models/Clubs.php');

$clubs = getAllClubs();
$users = getAllUsers();

include 'views/index.php';