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
$message = "";

$gerechtService = new GerechtService();
$categorieService = new CategorieService();


if (isset($_GET["selectie"])) {
    $gerecht = $gerechtService->getGerecht((int) $_GET["selectie"]);
    $categorie = $categorieService->getCategorie($gerecht->getCategorieId());
};

if(isset($_POST["id"])){
    $gerecht = $gerechtService->getGerecht((int) $_POST["id"]);
    $categorie = $categorieService->getCategorie($gerecht->getCategorieId());
}

print $twig->render(
    "detailPagina.twig",
    array(
        "message" => $message,
        "gerecht" => $gerecht,
        "categorie" => $categorie
    )
);
