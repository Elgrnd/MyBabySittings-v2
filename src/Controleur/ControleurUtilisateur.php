<?php

namespace App\MyBabySittings\Controleur;

use App\MyBabySittings\Modele\Repository\UtilisateurRepository;

class ControleurUtilisateur extends ControleurGenerique
{
    public static function afficherDetail(): void
    {
        $login = $_REQUEST['login'];
        $utilisateur = (new UtilisateurRepository())->recupererParClePrimaire($login);
        self::afficherVue('vueGenerale.php', ['utilisateur' => $utilisateur, 'titre' => 'Détails utilisateur', 'cheminCorpsVue' => 'utilisateur/details.php']);
    }

    public static function afficherFormulaireConnexion(): void
    {
        self::afficherVue('vueGenerale.php', ['titre' => 'Connexion', 'cheminCorpsVue' => 'utilisateur/formulaireConnexion.php']);
    }
}