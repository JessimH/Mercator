<?php

function addToCart($id){

    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM players WHERE id = ?');
    $query->execute(
        [
            $id
        ]
    );
    $playerChoice =  $query->fetch();

    $_SESSION['cart'][]= [
        'id' => $playerChoice['id'],
        'quantity' => $playerChoice['quantity'],
    ];

 }

 function OnecartPlayer(){
    $playersFromCart = $_SESSION['cart'];
     foreach( $playersFromCart as $oneCartPlayer){
         return $oneCartPlayer;
     }
 }



