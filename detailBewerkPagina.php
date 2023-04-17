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
$categorieen = $categorieService->getAll();

$updated = false;

session_start();    

if (isset($_POST["id"])) {
    $_SESSION["id"]= $_POST["id"];
    $gerecht = $gerechtService->getGerecht((int) $_POST["id"]);
    $categorie = $categorieService->getCategorie($gerecht->getCategorieId());
};

if(isset($_POST["opslaan"])){

    $updated = true;

    $gerecht = new Gerecht();

    $gerecht->setId((int) $_SESSION["id"]);

    $gerecht->setNaam($_POST["naam"]);
    $gerecht->setCategorieId((int) $_POST["categorieId"]);

    $date=date("Y-m-d H:i:s",strtotime($_POST["datum"]));

    $gerecht->setDatum($date);
    $gerecht->setWaardering((int) $_POST["waardering"]);

    $gerecht->setBron($_POST["bron"]);
    $gerecht->setInfo($_POST["info"]);

    $gerechtService->gerechtUpdaten($gerecht);

    unset($_POST['opslaan']);
}


print $twig->render(
    "detailBewerkPagina.twig",
    array(
        "message" => $message,
        "categorieen" => $categorieen,
        "gerecht" => $gerecht,
        'updated' => $updated
    )
);

