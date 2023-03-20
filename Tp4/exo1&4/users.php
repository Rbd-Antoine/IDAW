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

    //delete all tables from database dbtest
    /*$request = $pdo->prepare("drop table if exists users");
    $request->execute();
    */
    /*
    //create table users
    $sql = file_get_contents('users.sql');
    $request = $pdo->exec($sql);

    */
    // retrieve data from database using fetch(PDO::FETCH_OBJ)
    $request = $pdo->prepare("select * from users");
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
        //button to delete one user
        echo '<td><form method="post">';
        echo '<input type="hidden" name="action" value="Supprimer">';
        echo '<input type="hidden" name="id" value="' . $user->id . '">';
        echo '<input type="submit" value="Supprimer">';
        echo '</form></td>';
        //button to update one user
        echo '<td><form method="post">';
        echo '<input type="hidden" name="action" value="Modifier">';
        echo '<input type="hidden" name="id" value="' . $user->id . '">';
        echo '<input type="submit" value="Modifier">';
        echo '</form></td>';
        echo '</tr>';
    }
    echo '</table>';

    //form to add another user
    echo'Ajouter';
    echo '<form action="users.php" method="post">';
    echo '<input type="hidden" name="action" value="Ajouter">';
    echo '<input type="text" name="nom" placeholder="nom">';
    echo '<input type="text" name="email" placeholder="email">';
    echo '<input type="submit" value="Ajouter">';
    echo '</form>';

    //add a new user
    if((isset($_POST['nom'])) && (isset($_POST['action']) == 'Ajouter') && (isset($_POST['email']))) {
        $request = $pdo->prepare("insert into users(nom,email) values(:nom,:email)");
        $request->bindParam(':nom',$_POST['nom']);
        $request->bindParam(':email',$_POST['email']);
        $request->execute();
        header('Location: users.php');
    }
    
    //delete one user
    if(isset($_POST['action']) && $_POST['action']=='Supprimer' && isset($_POST['id'])) {
        $request = $pdo->prepare("delete from users where id=:id");
        $request->bindParam(':id',$_POST['id']);
        $request->execute();
        header('Location: users.php');
    }

    //form to update a user
    if(isset($_POST['action']) && isset($_POST['action']) == 'Modifier' && isset($_POST['id'])) {
        $request = $pdo->prepare("select * from users where id=:id");
        $request->bindParam(':id',$_POST['id']);
        $request->execute();
        $user = $request->fetch(PDO::FETCH_OBJ);
        echo 'Modifier : ';
        echo '<form method="post">';
        echo '<input type="hidden" name="id" value="' . $user->id . '">';
        echo '<input type="text" name="nom" value="' . $user->nom . '">';
        echo '<input type="text" name="email" value="' . $user->email . '">';
        echo '<input type="submit" value="Modifier">';
        echo '</form>';
    }

    //update one user
    if((isset($_POST['id'])) && (isset($_POST['email'])) && (isset($_POST['nom']))) {
        $request = $pdo->prepare("update users set nom=:nom,email=:email where id=:id");
        $request->bindParam(':id',$_POST['id']);
        $request->bindParam(':nom',$_POST['nom']);
        $request->bindParam(':email',$_POST['email']);
        $request->execute();
        header('Location: users.php');
    }

    // close connection
    $pdo = null;
?>