<?php
function dbConnect(){
    try{
        $db = new PDO('mysql:host=185.177.44.67;dbname=dv19heddadi;charset=utf8', 'dv19heddadi', 'octF97$SSm8azens', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); //affichage des erreurs
    }
    catch (Exception $exception)
    {
        die( 'Erreur : ' . $exception->getMessage() );
    }

    return $db;

}