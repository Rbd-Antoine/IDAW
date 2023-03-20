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
    $request = $pdo->prepare("select * from users");

    // retrieve data from database using fetch(PDO::FETCH_OBJ) and

    $request->execute();
    $users = $request->fetchAll(PDO::FETCH_OBJ);

    // display them in HTML array
    echo '<table border="1">';
    echo '<tr><th>id</th><th>name</th><th>email</th></tr>';
    foreach($users as $user) {
        echo '<tr>';
        echo '<td>' . $user->id . '</td>';
        echo '<td>' . $user->nom . '</td>';
        echo '<td>' . $user->email . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    // close connection
    $pdo = null;
?>