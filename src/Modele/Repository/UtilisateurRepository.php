<?php

namespace App\MyBabySittings\Modele\Repository;

use App\MyBabySittings\Modele\DataObject\AbstractDataObject;
use App\MyBabySittings\Modele\DataObject\Utilisateur;

class UtilisateurRepository extends AbstractRepository
{
    protected function formatTableauSQL(AbstractDataObject $objet): array
    {
        /** @var Utilisateur $objet */
        return array(
            "loginTag" => $objet->getLogin(),
            "nomTag" => $objet->getNom(),
            "prenomTag" => $objet->getPrenom(),
            "emailTag" => $objet->getEmail(),
            "mdpHacheTag" => $objet->getMdpHache(),
            "estAdminTag" => $objet->isEstAdmin()
        );
    }

    protected function getNomColonnes(): array
    {
        return ["login", "nom", "prenom", "email", "mdpHache", "estAdmin"];
    }

    protected function getNomClePrimaire() : string {
        return 'login';
    }
    protected function getNomTable(): string
    {
        return 'utilisateur';
    }

    public function construireDepuisTableauSQL(array $objetFormatTableau): Utilisateur
    {
        return new Utilisateur(
            $objetFormatTableau['login'],
            $objetFormatTableau['nom'],
            $objetFormatTableau['prenom'],
            $objetFormatTableau['email'],
            $objetFormatTableau['mdpHache'],
            $objetFormatTableau['estAdmin']
        );
    }
}