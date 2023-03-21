<?php
    require_once('connection.php');

    function createUser() {
        // Vérification des paramètres
        global $params;
        global $pdo;
        global $nom;
        global $email;
        $pdo = new PDO('mysql:host=localhost;dbname=dbtest;charset=utf8', 'root', '');
        $nom = $params['nom'];
        $email = $params['email'];
        if (empty($nom) || empty($email)) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Missing parameter';
            return;
        }
        
        // Connexion à la base de données
        $pdo = new PDO('mysql:host=localhost;dbname=dbtest;charset=utf8', 'root', '');
        
        // Ajout de l'utilisateur à la base de données
        $stmt = $pdo->prepare('INSERT INTO users (nom, email) VALUES (?, ?)');
        $stmt -> execute([$nom, $email]);
        $id = $pdo->lastInsertId();
        
        // Envoi de la réponse HTTP
        header('HTTP/1.1 201 Created');
        header('Location: /users.php/' . $id);
        header('Content-Type: application/json');
        $user = ['id' => $id, 'nom' => $nom, 'email' => $email];
        $json = json_encode($user);
        echo $json;
    }

    function deleteUser() {
        // Vérification des paramètres
        global $params;
        global $id;
        $id = $params['id'];
        if (empty($id)) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Missing parameter';
            return;
        }
        // Suppression de l'utilisateur de la base de données
        global $pdo;
        $pdo = new PDO('mysql:host=localhost;dbname=dbtest;charset=utf8', 'root', '');
        $stmt = $pdo->prepare('DELETE FROM users WHERE id = ?');
        $stmt -> execute([$id]);
        
        // Envoi de la réponse HTTP
        header('HTTP/1.1 204 No Content');
    }

    function getUser(){
        // Récupération des utilisateurs OU récupération d'un utilsiateur en particulier
        global $pdo;
        global $params;
        global $id;
        $pdo = new PDO('mysql:host=localhost;dbname=dbtest;charset=utf8', 'root', '');

        //if id in parameter of GET request
        if(($params['id'] != null)){
            $request = $pdo->prepare('select * from users where id = ?');
            $request->execute([$params['id']]);
            $users = $request->fetchAll(PDO::FETCH_OBJ);
            
            // Conversion en JSON
            $json = json_encode($users);

            // HTPP response of 200 OK
            header('HTTP/1.1 200 OK');
            header('Content-Type: application/json');
            echo $json;
        }

        else {
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
    }

    function updateUser(){
        // Vérification des paramètres
        global $params;
        global $id;
        global $nom;
        global $email;
        $id = $params['id'];
        $nom = $params['nom'];
        $email = $params['email'];
        if (empty($id) || empty($nom) || empty($email)) {
            header('HTTP/1.1 400 Bad Request');
            echo 'Missing parameter';
            return;
        }
        
        // Connexion à la base de données
        global $pdo;
        $pdo = new PDO('mysql:host=localhost;dbname=dbtest;charset=utf8', 'root', '');
        
        // Modification de l'utilisateur dans la base de données
        $stmt = $pdo->prepare('UPDATE users SET nom = ?, email = ? WHERE id = ?');
        $stmt -> execute([$nom, $email, $id]);
        
        // Envoi de la réponse HTTP
        header('HTTP/1.1 204 No Content');
    }
    $pdo = null;
?>