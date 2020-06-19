<?php
require('models/Players.php');
require('models/Postes.php');
require('models/Users.php');
require('models/Clubs.php');
require('models/Cart.php');

$clubs = getAllClubs();
$users = getAllUsers();
$orders = getOrders();

include 'views/orders.php';