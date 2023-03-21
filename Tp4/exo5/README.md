
# **Configuration de la base de données**

La configuration de la base de données est stockée dans un fichier config.php. Les paramètres de connexion à la base de données, tels que le nom d'utilisateur, le mot de passe et le nom de la base de données, sont stockés en tant que constantes et peuvent être modifiés dans le fichier config.php.


# API REST pour la gestion d'utilisateurs

Cette API permet de créer, lire, mettre à jour et supprimer des utilisateurs dans une base de données MySQL. Elle est construite selon l'architecture REST et utilise le format JSON pour la transmission des données.

## Endpoints

Les endpoints de l'API sont les suivants :

- `GET /users.php/` : Récupère tous les utilisateurs de la base de données
- `GET /users.php/{id}` : Récupère l'utilisateur ayant l'identifiant {id}
- `POST /users.php` : Ajoute un utilisateur à la base de données
- `PUT /users.php/{id}` : Met à jour l'utilisateur ayant l'identifiant {id}
- `DELETE /users.php/{id}` : Supprime l'utilisateur ayant l'identifiant {id}

## Exemple d'utilisation

Voici un exemple d'utilisation de l'API pour récupérer l'utilisateur ayant l'identifiant 1 :
