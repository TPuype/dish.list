<?php

declare(strict_types=1);

spl_autoload_register();

use Business\CategorieService;
use Business\GerechtService;
use Entities\Gerecht;

require_once("vendor/autoload.php");

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new FilesystemLoader('Presentation');
$twig = new Environment($loader);
$message ="";

$gerechtService = new GerechtService();
$gerechten = $gerechtService->getAll();

$categorieService = new CategorieService();
$categorieen = $categorieService->getAll();

if(isset($_POST["btnOpslaan"])){
    $gerecht = new Gerecht();

    $gerecht->setNaam($_POST["naam"]);
    $gerecht->setCategorieId((int) $_POST["categorieId"]);

    $date=date("Y-m-d H:i:s",strtotime($_POST["datum"]));

    $gerecht->setDatum($date);
    $gerecht->setWaardering((int) $_POST["waardering"]);

    $gerecht->setBron($_POST["bron"]);
    $gerecht->setInfo($_POST["info"]);

    $gerechtService->gerechtOpslaan($gerecht);
}

if(isset($_POST["btnVerwijderen"])){
    $gerechtService->gerechtVerwijderen((int) $_POST["id"]);
}

$gerechten = $gerechtService->getAll();

print $twig->render(
    "index.twig",
    array("message" => $message,
    "gerechten" => $gerechten,
    "categorieen" => $categorieen)
);