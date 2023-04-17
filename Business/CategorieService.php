<?php

declare(strict_types=1);

namespace Business;

use Data\CategorieDAO;
use Entities\Categorie;

class CategorieService
{
    public function getAll(): array
    {
        $categorieDAO = new CategorieDAO();
        $lijst = $categorieDAO->getAll();
        return $lijst;
    }

    public function getCategorie(int $id) : string{
        $categorieDAO = new CategorieDAO();
        $categorie = $categorieDAO->getCategorie($id);
        return $categorie;
    }
}
