<?php

namespace App\MyBabySittings\Controleur;

use App\MyBabySittings\Lib\ConnexionUtilisateur;
use App\MyBabySittings\Lib\MessageFlash;
use App\MyBabySittings\Modele\DataObject\Utilisateur;
use App\MyBabySittings\Lib\MotDePasse;
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

    public static function afficherFormulaireCreation(): void
    {
        self::afficherVue('vueGenerale.php', ['titre' => 'Créer un compte', 'cheminCorpsVue' => 'utilisateur/formulaireCreation.php']);
    }

    /**
     * @return Utilisateur
     */
    public static function construireDepuisFormulaire(array $tableauDonneesFormulaire): Utilisateur
    {
        $login = $tableauDonneesFormulaire['login'];
        $nom = $tableauDonneesFormulaire['nom'];
        $prenom = $tableauDonneesFormulaire['prenom'];
        $mdpHache = MotDePasse::hacher($tableauDonneesFormulaire['mdp']);
        $estAdmin = isset($tableauDonneesFormulaire['estAdmin']);
        if (ConnexionUtilisateur::estConnecte() && !ConnexionUtilisateur::estAdministrateur()) {
            $estAdmin = false;
        }
        $email = $tableauDonneesFormulaire['email'];
        return new Utilisateur($login, $nom, $prenom, $email, $mdpHache, $estAdmin);
    }

    public static function creerDepuisFormulaire(): void
    {
        if ($_REQUEST['confirm_mdp'] !== $_REQUEST['mdp']) {
            MessageFlash::ajouter("warning", "Les mots de passes sont distincts");
            self::redirectionVersUrl("controleurFrontal.php?action=afficherFormulaireCreation&controleur=utilisateur");
            return;
        }

        if (isset($_REQUEST["nom"], $_REQUEST["prenom"], $_REQUEST["mdp"], $_REQUEST["confirm_mdp"], $_REQUEST["email"])) {

            $utilisateur = (new UtilisateurRepository())->recupererParClePrimaire($_REQUEST['login']);
            if (!$utilisateur) {
                if (filter_var($_REQUEST["email"], FILTER_VALIDATE_EMAIL)) {
                    // Vérification des mots de passe
                    if ($_REQUEST["mdp"] === $_REQUEST["confirm_mdp"]) {
                        $utilisateur = self::construireDepuisFormulaire($_REQUEST);
                        (new UtilisateurRepository())->ajouter($utilisateur);
                        MessageFlash::ajouter("success", "Compte créé avec succès!");
                        self::redirectionVersUrl("controleurFrontal.php?action=afficherDetail&login=" . $utilisateur->getLogin() ."&controleur=utilisateur");
                    }
                }
            }
        }
    }
}