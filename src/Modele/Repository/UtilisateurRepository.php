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
            "mdpHacheTag" => $objet->getMdpHache(),
        );
    }

    protected function getNomColonnes(): array
    {
        return ["login", "nom", "prenom", "mdpHache"];
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
            $objetFormatTableau['mdpHache']
        );
    }
}