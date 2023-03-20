#**Documentation du code**
Ce fichier PHP permet de manipuler des données d'utilisateurs en utilisant une base de données MySQL. Il contient deux fonctions : getAllUsers() et createUser().

#Configuration de la base de données
La configuration de la base de données est stockée dans un fichier config.php. Les paramètres de connexion à la base de données, tels que le nom d'utilisateur, le mot de passe et le nom de la base de données, sont stockés en tant que constantes et peuvent être modifiés dans le fichier config.php.

**Fonction getAllUsers()**
La fonction getAllUsers() récupère tous les utilisateurs stockés dans la base de données et les retourne sous forme de tableau JSON. Les étapes effectuées sont :

Établissement d'une connexion à la base de données MySQL en utilisant la configuration stockée dans le fichier config.php.
Exécution d'une requête SQL pour récupérer tous les utilisateurs de la table users.
Conversion du tableau d'objets PHP contenant les utilisateurs en une chaîne JSON.
Envoi de la réponse HTTP avec un code 200 OK et la chaîne JSON contenant les utilisateurs.

**Fonction createUser()**
La fonction createUser() permet de créer un nouvel utilisateur dans la base de données. Les étapes effectuées sont :

Récupération des données de l'utilisateur à partir des paramètres POST de la requête HTTP (le nom et l'adresse email).
Vérification que les paramètres sont présents et non vides.
Établissement d'une connexion à la base de données MySQL en utilisant la configuration stockée dans le fichier config.php.
Exécution d'une requête SQL pour insérer le nouvel utilisateur dans la table users.
Récupération de l'identifiant de l'utilisateur inséré.
Envoi de la réponse HTTP avec un code 201 Created, l'URL de la nouvelle ressource créée et la chaîne JSON contenant les données de l'utilisateur créé.

**Utilisation du code**
Ce code peut être utilisé comme API pour manipuler des données d'utilisateurs. La fonction getAllUsers() permet de récupérer tous les utilisateurs stockés dans la base de données, tandis que la fonction createUser() permet de créer un nouvel utilisateur. Les appels à ces fonctions peuvent être effectués en utilisant une requête HTTP GET ou POST respectivement.