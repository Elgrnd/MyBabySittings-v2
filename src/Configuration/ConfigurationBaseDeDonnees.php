<?php

namespace App\MyBabySittings\Configuration;

class ConfigurationBaseDeDonnees
{
    static private array $configurationBaseDeDonnees = array(
        'nomHote' => 'sql7.freesqldatabase.com',
        'nomBaseDeDonnees' => 'sql7767753',
        'port' => '3306',
        'login' => 'sql7767753',
        'motDePasse' => '4FLHv4LUmc'
    );

    static public function getLogin() : string {
        // L'attribut statique $configurationBaseDeDonnees
        // s'obtient avec la syntaxe ConfigurationBaseDeDonnees::$configurationBaseDeDonnees
        // au lieu de $this->configurationBaseDeDonnees pour un attribut non statique
        return ConfigurationBaseDeDonnees::$configurationBaseDeDonnees['login'];
    }

    static public function getNomHote() : string {
        return ConfigurationBaseDeDonnees::$configurationBaseDeDonnees['nomHote'];
    }

    static public function getPort() : string {
        return ConfigurationBaseDeDonnees::$configurationBaseDeDonnees['port'];
    }

    static public function getNomBaseDeDonnees() : string {
        return ConfigurationBaseDeDonnees::$configurationBaseDeDonnees['nomBaseDeDonnees'];
    }

    static public function getPassword() : string {
        return ConfigurationBaseDeDonnees::$configurationBaseDeDonnees['motDePasse'];
    }
}