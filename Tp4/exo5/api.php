<?php
    require_once('users.php');
    require_once('connection.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        getAllUsers();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        createUser();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        updateUser();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        deleteUser();
    }

?>