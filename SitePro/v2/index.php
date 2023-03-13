
<!DOCTYPE html>
<html>
    <head>
        <title>Cours PHP & MySQL</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="cours.css">
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <?php
            $prenoms = array('Mathilde', 'Pierre', 'Amandine', 'Florian');
            $ages = [27, 29, 21, 29];
        ?>
        <p>Date : </p>
        <?php
            // Return current date from the remote server
            $date = date('d-m-y h:i:s');
            echo $date;
        ?>
    </body>
</html>