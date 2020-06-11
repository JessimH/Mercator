<?php

function getAllPostes()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM postes');
    $postes =  $query->fetchAll();

    return $postes;
}

function getPoste($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM postes WHERE id = ?');
    $query->execute(
        [
            $id
        ]
    );

    $result =  $query->fetch();

    return $result;
}
