<?php

function getHomePlayers()
{
	$db = dbConnect();
	$query = $db->query('SELECT * FROM players ORDER BY created_at LIMIT 3');
	$players = $query->fetchAll();

	return $players;
}


function getAllPlayers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM players ORDER by name');
	$players =  $query->fetchAll();

	return $players;


	
}

function getPlayer($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM players WHERE id = ?');
    $query->execute(
		[
        	$id
		]
	);

    $result =  $query->fetch();

    return $result;
}

function getPlayerPoste($post_id){

	$db = dbConnect();
	$query = $db->query('SELECT name FROM postes WHERE id = ' . $post_id);
	$postName = $query->fetch();

	return $postName;

}

function getPlayersByClub($clubId)
{

	$db = dbConnect();

	$query = $db->query('SELECT * FROM players WHERE id_club = ' . $clubId);
	$players = $query->fetchAll();

	return $players;
}

function getPlayersByPostes($postId)
{

	$db = dbConnect();

	$query = $db->query('SELECT * FROM players WHERE post_id = ' . $postId);
	$players = $query->fetchAll();

	return $players;
}

function addPlayer($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare('INSERT INTO players (name, description, id_club, post_id, price) VALUES( :name, :description, :id_club, :post_id, :price)');
	$result = $query->execute(
		[
			'name' => $informations['name'],
			'description' => $informations['description'],
            'id_club' => $informations['id_club'],
			'post_id' => $informations['post_id'],
            'price' => $informations['price'],
		]
	);
	if($result && isset($_FILES['image']['tmp_name'])){
		$playerId = $db->lastInsertId();

		if(isset($playerId)){
			$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
			$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
			if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $playerId . '.' . $my_file_extension ;
			$destination = 'assets/images/players/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE players SET image = '$new_file_name' WHERE id = $playerId ");
			}	
		}	
	return $result;
	}
	if($result && isset($_FILES['image_desc']['tmp_name'])){
		$playerId = $db->lastInsertId();

		if(isset($playerId)){
			$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
			$my_file_extension = pathinfo( $_FILES['image_desc']['name'] , PATHINFO_EXTENSION);
			if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $playerId . '.' . $my_file_extension ;
			$destination = 'assets/images/players/desc' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE players SET image_desc = '$new_file_name' WHERE id = $playerId ");
			}	
		}
	return $result;
	}	
}

function updatePlayer($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE players SET name = ?, description = ?, id_club = ?, post_id = ?, price = ?  WHERE id = ?');
    $result = $query->execute(
		[
			$informations['name'],
			$informations['description'],
            $informations['id_club'],
			$informations['post_id'],
            $informations['price'],
			$id
		]
	);

	$fileExtention = pathinfo($id, PATHINFO_EXTENSION);

	unlink('../assets/images/players/'.$id.'.'.$fileExtention);

	if($result && isset($_FILES['image']['tmp_name'])){
		$playerId = $id;
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $playerId . '.' . $my_file_extension ;
			$destination = 'assets/images/players/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE players SET image = '$new_file_name' WHERE id = $playerId");
		}
	}
	if($result && isset($_FILES['image_desc']['tmp_name'])){
		$playerId = $id;
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image_desc']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $playerId . '.' . $my_file_extension ;
			$destination = 'assets/images/players/desc' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image_desc']['tmp_name'], $destination);
			
			$db->query("UPDATE players SET image_desc = '$new_file_name' WHERE id = $playerId");
		}
	}
	return $result;
}

function deletePlayer($id)
{
	$db = dbConnect();

	$query = $db->prepare('DELETE FROM players WHERE id = ?');
	$result = $query->execute(
		[
			$id,
		]
	);
	return $result;
}


