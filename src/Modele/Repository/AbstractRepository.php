<?php

namespace App\MyBabySittings\Modele\Repository;

use App\MyBabySittings\Modele\DataObject\AbstractDataObject;
use PDOException;

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

    public function ajouter(AbstractDataObject $objet): bool
    {
        $nomTable = $this->getNomTable();
        $colonnes = join(",", $this->getNomColonnes());
        $donneeColonnes = $this->formatTableauSQL($objet);
        $colonnesTag = "";
        foreach ($this->getNomColonnes() as $nomColonne) {
            $colonnesTag = $colonnesTag . ":" . $nomColonne . "Tag, ";
        }
        $colonnesTag = substr($colonnesTag, 0, -2);
        try {
            $sql = "INSERT INTO $nomTable ($colonnes) VALUES ($colonnesTag)";
            $pdoStatement = ConnexionBaseDeDonnees::getPdo()->prepare($sql);

            $pdoStatement->execute($donneeColonnes);
            return true;
        } catch (PDOException $e) {
            return false;
        }

    }

    protected abstract function formatTableauSQL(AbstractDataObject $objet): array;

    protected abstract function getNomTable(): string;
    protected abstract function getNomClePrimaire(): string;
    protected abstract function getNomColonnes(): array;
    protected abstract function construireDepuisTableauSQL(array $objetFormatTableau) : AbstractDataObject;
}