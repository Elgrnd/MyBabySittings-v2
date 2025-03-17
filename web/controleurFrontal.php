<?php

require __DIR__ . '/../src/Lib/psr4AutoloaderClass.php';

// initialisation en activant l'affichage de débogage
$chargeurDeClasse = new App\MyBabySittings\Lib\Psr4AutoloaderClass(false);
$chargeurDeClasse->register();
// enregistrement d'une association "espace de nom" → "dossier"
$chargeurDeClasse->addNamespace('App\MyBabySittings', __DIR__ . '/../src');

// Définir le contrôleur et l'action par défaut
$action = 'afficherFormulaireCreation';
$nomDeClasseControleur = '';

// Vérifier si 'controleur' est défini et construire le nom de la classe du contrôleur
if (isset($_REQUEST['controleur'])) {
    $controleur = ucfirst($_REQUEST['controleur']);
    $nomDeClasseControleur = "App\MyBabySittings\Controleur\Controleur" . $controleur;
} else {
    $nomDeClasseControleur = "App\MyBabySittings\Controleur\ControleurUtilisateur";
}

// Vérifier si la classe du contrôleur existe, sinon afficher une erreur
if (!class_exists($nomDeClasseControleur)) {
    $nomDeClasseControleur = 'App\MyBabySittings\Controleur\ControleurUtilisateur';
    $action = 'afficherErreur';
} else {
    // Si l'action est définie, la vérifier et l'utiliser
    if (isset($_REQUEST['action'])) {
        $action = $_REQUEST['action'];
        // Si l'action n'est pas une méthode de la classe, afficher une erreur
        if (!method_exists($nomDeClasseControleur, $action)) {
            $action = 'afficherErreur';
        }

    }
}

// Appeler l'action sur le contrôleur déterminé
$nomDeClasseControleur::$action();

//$action = $_GET['action'];
//$controller = "App\MyBabySittings\Controleur\Controleur" . ucfirst($_GET['controleur']);
//
//$controller::$action();