Voici un exemple de README pour un middleware de base de données PHP :

---

# Middleware de Base de Données PHP

Ce middleware de base de données PHP est conçu pour simplifier et sécuriser l'accès à une base de données SQL à partir d'une application PHP. Il fournit une interface abstraite pour interagir avec différentes bases de données, ce qui facilite le changement de système de base de données sans avoir à modifier le code de l'application.

## Fonctionnalités

- Connexion sécurisée à une base de données SQL.
- Prise en charge de multiples types de bases de données (MySQL, PostgreSQL, SQLite, etc.).
- Méthodes simplifiées pour l'exécution de requêtes SQL (sélection, insertion, mise à jour, suppression).
- Prévention des attaques par injection SQL grâce à l'utilisation de requêtes préparées.
- Gestion des erreurs et des exceptions de manière efficace pour un débogage facile.

## Installation

1. Clonez ce dépôt dans le répertoire de votre projet :

```
git clone https://github.com/votre_utilisateur/middleware-db-php.git
```

2. Incluez le fichier `database.php` dans vos scripts PHP où vous souhaitez interagir avec la base de données :

```php
require_once('middleware-db-php/database.php');
```

## Configuration

1. Ouvrez le fichier `database.php`.
2. Modifiez les informations de connexion à votre base de données en remplaçant les valeurs par défaut par celles de votre base de données.

```php
$servername = "localhost";
$username = "votre_nom_d_utilisateur";
$password = "votre_mot_de_passe";
$dbname = "votre_base_de_donnees";
```

3. Choisissez le type de base de données en décommentant la ligne appropriée et en commentant les autres :

```php
//$db_type = "mysql";
//$db_type = "pgsql";
//$db_type = "sqlite";
```

## Utilisation

```php
// Exemple de connexion à la base de données
$db = new Database();
$db->connect();

// Exemple d'exécution d'une requête SQL
$sql = "SELECT * FROM utilisateurs";
$result = $db->query($sql);

// Exemple d'utilisation de requête préparée avec des paramètres
$sql = "INSERT INTO utilisateurs (nom, email) VALUES (?, ?)";
$params = ["John Doe", "john.doe@example.com"];
$db->execute($sql, $params);

// Exemple de récupération des résultats d'une requête SELECT
while ($row = $result->fetch_assoc()) {
    echo "Nom: " . $row["nom"] . " - Email: " . $row["email"] . "<br>";
}

// Exemple de déconnexion de la base de données
$db->disconnect();
```

## Contribution

Les contributions sont les bienvenues ! Si vous souhaitez améliorer ce middleware de base de données PHP, n'hésitez pas à soumettre une pull request.

## Licence

Ce middleware de base de données PHP est sous licence MIT. Consultez le fichier [LICENSE](LICENSE) pour plus de détails.

---
