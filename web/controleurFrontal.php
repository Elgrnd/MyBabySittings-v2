<?php

require __DIR__ . '/../src/Lib/psr4AutoloaderClass.php';

// initialisation en activant l'affichage de débogage
$chargeurDeClasse = new App\MyBabySittings\Lib\Psr4AutoloaderClass(false);
$chargeurDeClasse->register();
// enregistrement d'une association "espace de nom" → "dossier"
$chargeurDeClasse->addNamespace('App\MyBabySittings', __DIR__ . '/../src');

$action = $_GET['action'];
$controller = "App\MyBabySittings\Controleur\Controleur" . ucfirst($_GET['controleur']);

$controller::$action();