<?php

namespace App\MyBabySittings\Modele\DataObject;

class Utilisateur extends AbstractDataObject
{
    private string $login;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $mdpHache;
    private bool $estAdmin;

    public function __construct(string $login, string $nom, string $prenom, string $email, string $mdpHache, bool $estAdmin) {
        $this->login = $login;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->mdpHache = $mdpHache;
        $this->estAdmin = $estAdmin;
    }

    public function __toString(): string
    {
        return $this->nom . " " . $this->prenom . "(" . $this->login . ")";
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getMdpHache(): string
    {
        return $this->mdpHache;
    }

    public function setMdpHache(string $mdpHache): void
    {
        $this->mdpHache = $mdpHache;
    }

    public function isEstAdmin(): bool
    {
        return $this->estAdmin;
    }

    public function setEstAdmin(bool $estAdmin): void
    {
        $this->estAdmin = $estAdmin;
    }



}