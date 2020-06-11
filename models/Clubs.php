<?php

function getAllClubs()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM clubs');
    $clubs =  $query->fetchAll();

    return $clubs;
}

function getClub($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM clubs WHERE id = ?');
    $query->execute(
        [
            $id
        ]
    );

    $result =  $query->fetch();

    return $result;
}

function addClub($informations)
{
	$db = dbConnect();
	
	$query = $db->prepare('INSERT INTO clubs (name, abbreviation) VALUES( :name, :abbreviation)');
	$result = $query->execute(
		[
			'name' => $informations['name'],
			'abbreviation' => $informations['abbreviation'],
		]
	);
	if($result && isset($_FILES['image']['tmp_name'])){
		$clubId = $db->lastInsertId();

		if(isset($clubId)){
			$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
			$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
			if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $clubId . '.' . $my_file_extension ;
			$destination = 'assets/images/clubs/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE clubs SET image = '$new_file_name' WHERE id = $clubId ");
			}	
		}	
	return $result;
	}
}

function updateClub($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE clubs SET name = ?, abbreviation = ? WHERE id = ?');
    $result = $query->execute(
		[
			$informations['name'],
			$informations['abbreviation'],
			$id
		]
	);

	$fileExtention = pathinfo($id, PATHINFO_EXTENSION);

	unlink('../assets/images/clubs/'.$id.'.'.$fileExtention);

	if($result && isset($_FILES['image']['tmp_name'])){
		$clubId = $id;
		
		$allowed_extensions = array( 'jpg' , 'jpeg' , 'gif', 'png' );
		$my_file_extension = pathinfo( $_FILES['image']['name'] , PATHINFO_EXTENSION);
		if (in_array($my_file_extension , $allowed_extensions)){
			$new_file_name = $clubId . '.' . $my_file_extension ;
			$destination = 'assets/images/clubs/' . $new_file_name;
			$result = move_uploaded_file( $_FILES['image']['tmp_name'], $destination);
			
			$db->query("UPDATE clubs SET image = '$new_file_name' WHERE id = $clubId");
		}
	}
	
	return $result;
}

function deleteClub($id)
{
	$db = dbConnect();

	$query = $db->prepare('DELETE FROM clubs WHERE id = ?');
	$result = $query->execute(
		[
			$id,
		]
	);
	
	return $result;
}