<?php

declare(strict_types=1);

namespace Business;

use Data\GerechtDAO;
use Entities\Gerecht;

class GerechtService
{
    public function getAll(): array
    {
        $gerechtDAO = new GerechtDAO();
        $lijst = $gerechtDAO->getAll();
        return $lijst;
    }

    public function gerechtOpslaan(Gerecht $gerecht){
        $gerechtDAO = new GerechtDAO();
        $gerechtDAO->gerechtOpslaan($gerecht);
    }

    public function gerechtVerwijderen(int $id){
        $gerechtDAO = new GerechtDAO();
        $gerechtDAO->gerechtVerwijderen($id);
    }

    public function getGerecht(int $id): Gerecht{
        $gerechtDAO = new GerechtDAO();
        $gerecht = $gerechtDAO->getGerecht($id);
        return $gerecht;
    }

    public function gerechtUpdaten(Gerecht $gerecht){
        $gerechtDAO = new GerechtDAO();
        $gerecht = $gerechtDAO->updateGerecht($gerecht);
    }

    public function zoekGerecht(string $zoekterm) : array{
        $gerechtDAO = new GerechtDAO();
        $gerechten = $gerechtDAO->zoekGerecht($zoekterm);
        return $gerechten;
    }

    public function zoekGerechtOpCategorie(int $categorieId) : array{
        $gerechtDAO = new GerechtDAO();
        $gerechten = $gerechtDAO->zoekGerechtOpCategorie($categorieId);
        return $gerechten;
    }

    public function zoekGerechtOpDatum(string $datum) : array{
        $gerechtDAO = new GerechtDAO();
        $gerechten = $gerechtDAO->zoekGerechtOpDatum($datum);
        return $gerechten;
    }
}
