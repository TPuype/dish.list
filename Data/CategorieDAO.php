<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Categorie;


class CategorieDAO
{
    public function getAll(): array
    {
        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $resultSet = $dbh->query("select * from categorieen");

        $lijst = array();
        foreach ($resultSet as $rij) {
            $categorie= new Categorie((int) $rij["id"], $rij["naam"]);
            array_push($lijst, $categorie);
        }
        $dbh = null;
        return $lijst;
    }

    public function getCategorie(int $id){
        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $sql = "select naam from categorieen where id = :id";
   
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij= $stmt->fetch(PDO::FETCH_ASSOC);

        $categorie = $rij["naam"];

        $dbh = null;

        return $categorie;
    }
}
