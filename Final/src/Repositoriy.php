<?php

namespace GachiNameSpace;

class Repositoriy
{
    public static function store(Gachimuchenik2 $gachimuchenik)
    {
        return DataMapper::save($gachimuchenik);
    }

    public static function remove(Gachimuchenik2 $gachimuchenik)
    {
        return DataMapper::remove($gachimuchenik);
    }

    public static function getAll()
    {
        return DataMapper::getAll();
    }

    public static function getById($id)
    {
        return DataMapper::getById($id);
    }

    public static function getByFields($surname, $name, $fathername, $city, $rang, $ZarplataInBucks)
    {
        return DataMapper::getByFields($surname, $name, $fathername, $city, $rang, $ZarplataInBucks);
    }
}