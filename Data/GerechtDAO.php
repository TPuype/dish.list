<?php

declare(strict_types=1);

namespace Data;

use \PDO;
use Data\DBConfig;
use Entities\Gerecht;
use Exceptions\GeenResultaatException;


class GerechtDAO
{
    public function getAll(): array
    {
        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $resultSet = $dbh->query("select * from gerechten order by datum desc");

        $lijst = array();
        foreach ($resultSet as $rij) {
            $gerecht = new Gerecht((int) $rij["id"], $rij["naam"], (int) $rij["categorieId"], $rij["datum"], (int) $rij["waardering"]);
            array_push($lijst, $gerecht);
        }

        if (empty($lijst)) {
            throw new GeenResultaatException();
        } else {
            $dbh = null;
            return $lijst;
        }
    }

    public function gerechtOpslaan(Gerecht $gerecht)
    {
        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $stmt = $dbh->prepare("INSERT INTO gerechten (naam, categorieId, datum, waardering, bron, info) 
        VALUES (:naam, :categorieId, :datum, :waardering, :bron, :info)");
        $stmt->bindValue(":naam", $gerecht->getNaam());
        $stmt->bindValue(":categorieId", $gerecht->getCategorieId());
        $stmt->bindValue(":datum", $gerecht->getDatum());
        $stmt->bindValue(":waardering", $gerecht->getWaardering());
        $stmt->bindValue(":bron", $gerecht->getBron());
        $stmt->bindValue(":info", $gerecht->getInfo());


        $stmt->execute();

        $dbh = null;
    }

    public function gerechtVerwijderen(int $id)
    {
        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $sql = "delete from gerechten where id = :id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function getGerecht(int $id)
    {
        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $sql = "select * from gerechten where id = :id";

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$rij) {
            throw new GeenResultaatException();
        } else {
            $gerecht = new Gerecht((int) $rij["id"], $rij["naam"], (int) $rij["categorieId"], $rij["datum"], (int) $rij["waardering"], $rij["bron"], $rij["info"]);
            $dbh = null;

            return $gerecht;
        }
    }

    public function updateGerecht(Gerecht $gerecht)
    {
        $sql = "update gerechten set naam = :naam, categorieId = :categorieId, datum = :datum, waardering = :waardering, bron = :bron, info = :info where id = :id";

        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(
            ':id' => $gerecht->getId(),
            ':naam' => $gerecht->getNaam(),
            ':categorieId' => $gerecht->getCategorieId(),
            ':datum' => $gerecht->getDatum(),
            ':waardering' => $gerecht->getWaardering(),
            ':bron' => $gerecht->getBron(),
            ':info' => $gerecht->getInfo(),
        ));
        $dbh = null;
    }

    public function zoekGerecht(string $zoekterm)
    {

        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $sql = "select * from gerechten where naam like :zoekterm";


        $stmt = $dbh->prepare($sql);
        $stmt->execute([':zoekterm' => "%" . $zoekterm . "%"]);
        $data = $stmt->fetchAll();


        $lijst = array();
        foreach ($data as $rij) {
            $gerecht = new Gerecht((int) $rij["id"], $rij["naam"], (int) $rij["categorieId"], $rij["datum"], (int) $rij["waardering"]);
            array_push($lijst, $gerecht);
        }

        if (empty($lijst)) {
            throw new GeenResultaatException();
        } else {
            $dbh = null;
            return $lijst;
        }
    }

    public function zoekGerechtOpCategorie(int $categorieId)
    {

        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $sql = "select * from gerechten where categorieId = :categorieId";


        $stmt = $dbh->prepare($sql);
        $stmt->execute([':categorieId' => $categorieId]);
        $data = $stmt->fetchAll();


        $lijst = array();
        foreach ($data as $rij) {
            $gerecht = new Gerecht((int) $rij["id"], $rij["naam"], (int) $rij["categorieId"], $rij["datum"], (int) $rij["waardering"]);
            array_push($lijst, $gerecht);
        }

        if (empty($lijst)) {
            throw new GeenResultaatException();
        } else {
            $dbh = null;
            return $lijst;
        }
    }

    public function zoekGerechtOpDatum(string $datum)
    {

        $dbh = new PDO(
            DBConfig::$DB_CONNSTRING,
            DBConfig::$DB_USERNAME,
            DBConfig::$DB_PASSWORD
        );

        $sql = "select * from gerechten where datum = :datum";


        $stmt = $dbh->prepare($sql);
        $stmt->execute([':datum' => $datum]);
        $data = $stmt->fetchAll();


        $lijst = array();
        foreach ($data as $rij) {
            $gerecht = new Gerecht((int) $rij["id"], $rij["naam"], (int) $rij["categorieId"], $rij["datum"], (int) $rij["waardering"]);
            array_push($lijst, $gerecht);
        }

        if (empty($lijst)) {
            throw new GeenResultaatException();
        } else {
            $dbh = null;
            return $lijst;
        }
    }
}
