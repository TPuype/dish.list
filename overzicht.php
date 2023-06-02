<?php

declare(strict_types=1);

spl_autoload_register();

use Business\CategorieService;
use Business\GerechtService;
use Entities\Gerecht;
use Exceptions\GeenResultaatException;

require_once("vendor/autoload.php");

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new FilesystemLoader('Presentation');
$twig = new Environment($loader);
$message = "";

$gerechtService = new GerechtService();
$gerechten = $gerechtService->getAll();

$categorieService = new CategorieService();
$categorieen = $categorieService->getAll();

session_start();

$criteria = [];

if (!isset($_SESSION["gerechten"])) {
    $_SESSION["gerechten"] = $gerechten;
}

if (!isset($_SESSION["critera"])) {
    $_SESSION["criteria"] = $criteria;
}

if (isset($_GET["action"]) && $_GET["action"] == "reset") {
    session_destroy();
    header('location: overzicht.php');
}

if (isset($_POST["btnSearch"])) {
    try {
        $lijst = $gerechtService->zoekGerecht($_POST["search"]);
        $_SESSION["gerechten"] = $lijst;
    } catch (GeenResultaatException $ex) {
        $message = "Geen resultaten gevonden";
    }
}

if (isset($_POST["btnFilter"])) {
    try {
        $lijst = $gerechtService->zoekGerechtOpCategorie((int) $_POST["categorieId"]);
        $_SESSION["gerechten"] = $lijst;
        $_SESSION["categorieId"] = $_POST["categorieId"];

    } catch (GeenResultaatException $ex) {
        $message = "Geen resultaten gevonden.";
    }
}

function sortFunction($a, $b)
{
    return strtotime($a[1]) - strtotime($b[1]);
}


if (isset($_POST["btnSorteer"])) {
    switch ($_POST["sorteerOpties"]) {
        case "hoog":
            usort($_SESSION["gerechten"], function ($a, $b) {
                return $b->waardering - $a->waardering;
            });
            break;
        case "laag":
            usort($_SESSION["gerechten"], function ($a, $b) {
                return $a->waardering - $b->waardering;
            });
            break;
        case "nieuw":
            usort($_SESSION["gerechten"], function ($a, $b) {
                return strtotime($b->getDatum()) - strtotime($a->getDatum());
            });
            break;
        case "oud":
            usort($_SESSION["gerechten"], function ($a, $b) {
                return strtotime($a->getDatum()) - strtotime($b->getDatum());
            });
            break;
    }
}

if (isset($_POST["btnDatum"])) {
    try {
        $lijst = $gerechtService->zoekGerechtOpDatum($_POST["datum"]);
        $_SESSION["gerechten"] = $lijst;
    } catch (GeenResultaatException $ex) {
        $message = "Geen gerecht op deze datum opgeslagen.";
    }
}

if (isset($_POST["btnVerwijderen"])) {
    $gerechtService->gerechtVerwijderen((int) $_POST["id"]);
    header("location: overzicht.php");
}

print $twig->render(
    "overzicht.twig",
    array(
        "message" => $message,
        "gerechten" => $_SESSION["gerechten"],
        "categorieen" => $categorieen
    )
);
