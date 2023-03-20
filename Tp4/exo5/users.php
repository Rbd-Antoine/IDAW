<?php
    require_once('connection.php');
    require_once('api.php');


    function getAllUsers() {
        global $pdo;
        // Récupération des utilisateurs
        $request = $pdo->prepare('select * from users');
        $request->execute();
        $users = $request->fetchAll(PDO::FETCH_OBJ);
        
        // Conversion en JSON
        $json = json_encode($users);

        // HTPP response of 200 OK
        header('HTTP/1.1 200 OK');
        header('Content-Type: application/json');
        echo $json;
    }

    function createUser() {
        // Vérification des paramètres
        $name = $_POST['name'];
        $email = $_POST['email'];
        if (empty($name) || empty($email)) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Missing parameter';
            return;
        }
        
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=tp4;charset=utf8', 'root', '');
        
        // Ajout de l'utilisateur à la base de données
        $stmt = $pdo->prepare('INSERT INTO users (name, email) VALUES (?, ?)');
        $stmt -> execute([$name, $email]);
        $id = $pdo->lastInsertId();
        
        // Envoi de la réponse HTTP
        header('HTTP/1.1 201 Created');
        header('Location: /users.php/' . $id);
        header('Content-Type: application/json');
        $user = ['id' => $id, 'name' => $name, 'email' => $email];
        $json = json_encode($user);
        echo $json;
    }

    function deleteUser() {
        // Vérification des paramètres
        $id = $_GET['id'];
        if (empty($id)) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Missing parameter';
            return;
        }
        // Suppression de l'utilisateur de la base de données
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt -> execute([$id]);
        
        // Envoi de la réponse HTTP
        header('HTTP/1.1 204 No Content');
    }

    $pdo = null;
?>