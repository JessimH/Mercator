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

    $_SESSION['cart'][] = [
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

 function newOrder(){

     $db = dbConnect();

     $query = $db->prepare('INSERT INTO orders (user_id, club_id, username) VALUES (?,?,?)');
     $result = $query->execute(
        [
            $_SESSION['user']['id'],
            $_SESSION['user']['club_id'],
            $_SESSION['user']['username'],
        ]
    );

    $_SESSION['order_id'] = $db->lastInsertId();
    return $result;
 }

function orderDetails(){

    $db = dbConnect();

    if(isset($_SESSION['order_id'])){

        $orderId = $_SESSION['order_id'];

        foreach($_SESSION['cart'] as $cartPlayer){

        $query = $db->prepare('SELECT * FROM players WHERE id = ?');
        $player = $query->execute(
        [
            $cartPlayer['id']
        ]);

        $player =  $query->fetch();
        
        $query = $db->prepare('INSERT INTO order_details (quantity, price, name, order_id) VALUES (?,?,?,?)');

        $result = $query->execute(
            [
                $player['quantity'],
                $player['price'],
                $player['name'],
                $orderId
            ]
        );
    } 
    return $result; 
    };
    
}



