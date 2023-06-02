<?php

declare(strict_types=1);

namespace Entities;

class Gerecht
{
    private $id;
    private $naam;
    private $categorieId;
    private $datum;
    public  $waardering;
    private $bron;
    private $info;


    public function __construct($cid = null, $cnaam = null, $ccategorieId = null, $cdatum = null, $cwaardering = null, $cbron = null, $cinfo = null){
        $this->id = $cid;
        $this->naam = $cnaam;
        $this->categorieId = $ccategorieId;
        $this->datum = $cdatum;
        $this->waardering = $cwaardering;
        $this->bron = $cbron;
        $this->info = $cinfo;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNaam(): string
    {
        return $this->naam;
    }

    public function getCategorieId(): int
    {
        return $this->categorieId;
    }

    public function getDatum(): string
    {
        return $this->datum;
    }

    public function getWaardering(): int
    {
        return $this->waardering;
    }

    public function getBron(): string
    {
        return $this->bron;
    }

    public function getInfo(): string
    {
        return $this->info;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
    

    public function setNaam(string $naam)
    {
        $this->naam = $naam;
    }

    public function setCategorieId(int $categorieId)
    {
        $this->categorieId = $categorieId;
    }

    public function setDatum(string $datum)
    {
        $this->datum = $datum;
    }

    public function setWaardering(int $waardering)
    {
        $this->waardering = $waardering;
    }

    public function setBron(string $bron)
    {
        $this->bron = $bron;
    }

    public function setInfo(string $info){
        $this->info = $info;
    }
}
