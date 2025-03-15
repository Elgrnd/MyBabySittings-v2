<?php

namespace App\MyBabySittings\Modele\Repository;

use App\MyBabySittings\Modele\DataObject\AbstractDataObject;

abstract class AbstractRepository
{
    public function recupererParClePrimaire(string $valeurClePrimaire): ?AbstractDataObject
    {
        $nomTable = $this->getNomTable();
        $nomClePrimaire = $this->getNomClePrimaire();
        $sql = "SELECT * from $nomTable WHERE $nomClePrimaire = :valeurClePrimaireTag";
        // Préparation de la requête
        $pdoStatement = ConnexionBaseDeDonnees::getPdo()->prepare($sql);

        $values = array(
            "valeurClePrimaireTag" => $valeurClePrimaire,
            //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exécute la requête
        $pdoStatement->execute($values);

        // On récupère les résultats comme précédemment
        // Note: fetch() renvoie false si pas d'utilisateur correspondant
        $objetFormatTableau = $pdoStatement->fetch();

        if (empty($objetFormatTableau)) {
            return null;
        }

        return $this->construireDepuisTableauSQL($objetFormatTableau);
    }
}