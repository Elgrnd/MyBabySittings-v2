<?php

namespace App\MyBabySittings\Controleur;

use App\MyBabySittings\Lib\MessageFlash;

class ControleurGenerique
{
    protected static function afficherVue(string $cheminVue, array $parametres = []): void
    {
        extract($parametres); // Crée des variables à partir du tableau $parametres
        $messagesFlash = MessageFlash::lireTousMessages();
        require __DIR__ . "/../vue/$cheminVue"; // Charge la vue
    }

    public static function afficherErreur(string $erreur = ""): void
    {
        ControleurGenerique::afficherVue("vueGenerale.php", ["titre" => "Erreur", "cheminCorpsVue" => "erreur.php", "erreur" => $erreur]);
    }

    public static function redirectionVersUrl($url): void {
        header("Location: $url");
        exit();
    }
}