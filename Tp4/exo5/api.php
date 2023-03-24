<?php
    require_once('connection.php');
    require_once('users.php');

    // Récupération de la méthode HTTP
    $method = $_SERVER['REQUEST_METHOD'];

    // Récupération de l'URI
    $uri = $_SERVER['PATH_INFO']; 
    $uri = explode('/', $uri);
    // print_r($uri[1]);

    // Parameter of POST request
    $params = json_decode(file_get_contents('php://input'), true);
    // print_r($params);

    //Define array key id with value $id
    $params['id'] = $uri[1];    

    // Exécution de la méthode HTTP
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        getUser( $params['id']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        createUser( $params['nom'], $params['email']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        updateUser( $params['id'], $params['nom'], $params['email']);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
        deleteUser( $params['id']);
    }

?>