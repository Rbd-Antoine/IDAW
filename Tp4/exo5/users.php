<?php
    require_once('config.php');
    $connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT'))
        $connectionString .= ";port=". _MYSQL_PORT;
        $connectionString .= ";dbname=" . _MYSQL_DBNAME;
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );
        try {
            $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        myLog('Erreur : '.$erreur->getMessage());
    }
?>
<?php
    function getAllUsers() {
        // Récupération des utilisateurs
        $stmt = $pdo->query('SELECT * FROM users');
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        // Conversion en JSON
        $json = json_encode($users);

        // Envoi de la réponse HTTP
        header('HTTP/1.1 200 OK');
        echo $json;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        getAllUsers();
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
        header('Location: /users.php/' . $id)
        header('Content-Type: application/json')
        $user = ['id' => $id, 'name' => $name, 'email' => $email];
        $json = json_encode($user);
        echo $json;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        createUser();
    }

?>