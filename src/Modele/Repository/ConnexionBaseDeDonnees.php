<?php

namespace App\MyBabySittings\Modele\Repository;

use App\MyBabySittings\Configuration\ConfigurationBaseDeDonnees;
use PDO;

class ConnexionBaseDeDonnees
{
    private PDO $pdo;
    private static ?ConnexionBaseDeDonnees $instance = null;

    public function __construct()
    {
        $nomHote = ConfigurationBaseDeDonnees::getNomHote();
        $port = ConfigurationBaseDeDonnees::getPort();
        $nomBaseDeDonnees = ConfigurationBaseDeDonnees::getNomBaseDeDonnees();
        $login = ConfigurationBaseDeDonnees::getLogin();
        $motDePasse = ConfigurationBaseDeDonnees::getPassword();
        // Connexion à la base de données
        // Le dernier argument sert à ce que toutes les chaines de caractères
        // en entrée et sortie de MySql soient dans le codage UTF-8
        $this->pdo = new PDO("mysql:host=$nomHote;port=$port;dbname=$nomBaseDeDonnees", $login, $motDePasse,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

        // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getPdo(): PDO
    {
        return ConnexionBaseDeDonnees::getInstance()->pdo;
    }

    private static function getInstance(): ConnexionBaseDeDonnees
    {
        if (is_null(ConnexionBaseDeDonnees::$instance))
            // Appel du constructeur
            ConnexionBaseDeDonnees::$instance = new ConnexionBaseDeDonnees();
        return ConnexionBaseDeDonnees::$instance;
    }
}