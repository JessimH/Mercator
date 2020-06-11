<?php
function getAllUsers()
{
    $db = dbConnect();

    $query = $db->query('SELECT * FROM users');
    $clubs =  $query->fetchAll();

    return $clubs;
}

function getUser($id)
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM users WHERE id = ?');
    $query->execute(
        [
            $id
        ]
    );

    $result =  $query->fetch();

    return $result;
}

function isUsernameUsed ()
{
    $db = dbConnect();

    $query = $db->prepare('SELECT username FROM users WHERE username = ?');
    $query->execute([
        $_POST['username']
    ]);
    $usernameUsed = $query->fetch();

    return $usernameUsed;
}

function addUser ()
{
    $db = dbConnect();

    $emailUsed = isUsernameUsed();

    if(!$emailUsed){
        $query = $db->prepare('INSERT INTO users (username, password, email, club_id, adress) VALUES (?, ?, ?, ?, ?)');
        $result = $query->execute(
            [
                $_POST['username'],
                hash('md5', $_POST['password']),
                $_POST['email'],
                $_POST['club_id'],
                $_POST['adress'],
            ]
        );
        $_SESSION['user'] = [
            'username' => $_POST['username'],
            'club_id' => $_POST['club_id'],
            'email' => $_POST['email'],
            'adress' => $_POST['adress'],
            'is_admin' => 0,
        ];

        return $result;
    }
    else {
        return false;
    }
}

function updateUser($id, $informations)
{
    $db = dbConnect();

    $query = $db->prepare('UPDATE users SET username = ?, is_admin = ?, club_id = ?  WHERE id = ?');
    $result = $query->execute(
		[
			$informations['username'],
            $informations['is_admin'],
            $informations['club_id'],
			$id
		]
	);
	
	return $result;
}

function deleteUser($id)
{
	$db = dbConnect();

	$query = $db->prepare('DELETE FROM users WHERE id = ?');
	$result = $query->execute(
		[
			$id,
		]
	);
	
	return $result;
}

function connectUser()
{
    $db = dbConnect();

    $query = $db->prepare('SELECT * FROM users WHERE email = :email AND password = :password');

    $query->execute([
        'email' => $_POST['email'],
        'password' => md5($_POST['password']),
    ]);

    $user = $query->fetch();

    if($user != false){
        $_SESSION['user'] = [
            'username' => $user['username'],
            'club_id' => $user['club_id'],
            'email' => $user['email'],
            'is_admin' => $user['is_admin'],
        ];
    }
    return $user;
}