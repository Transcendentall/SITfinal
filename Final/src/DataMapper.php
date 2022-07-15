<?php

namespace GachiNameSpace;

class DataMapper
{

    public static function save(Gachimuchenik2 $gachimuchenik)
    {
        $gachimuchenikByFields = self::getByFields(
            $gachimuchenik->getSurname(),
            $gachimuchenik->getName(),
            $gachimuchenik->getFathername(),
            $gachimuchenik->getCity(),
            $gachimuchenik->getRang(),
            $gachimuchenik->getZarplataInBucks());
        if ($gachimuchenik->getId() == null) {
            if (!$gachimuchenikByFields->getId()) {
                if ((!empty($gachimuchenik->getSurname())) && (!empty($gachimuchenik->getName())) && (preg_match('/^[0-9]*$/', $gachimuchenik->getZarplataInBucks())))
                {
                $foundgachimuchenik = DataBaseRequester::execute_with_fetch(
                    'INSERT INTO GachiBaza.gachitable(surname, name, fathername, city, rang, ZarplataInBucks) 
                    VALUES(:surname,:name,:fathername,:city,:rang,:ZarplataInBucks)',
                    [
                        'surname' => $gachimuchenik->getSurname(),
                        'name' => $gachimuchenik->getName(),
                        'fathername' => $gachimuchenik->getFathername(),
                        'city' => $gachimuchenik->getCity(),
                        'rang' => $gachimuchenik->getRang(),
                        'ZarplataInBucks' => $gachimuchenik->getZarplataInBucks()
                    ]);
                return true;

                }
                return false;
            }
            return false;
        }
        else {
            if ((!empty($gachimuchenik->getSurname())) && (!empty($gachimuchenik->getName())) && (preg_match('/^[0-9]*$/', $gachimuchenik->getZarplataInBucks())))
            {
                DataBaseRequester::execute('UPDATE GachiBaza.gachitable 
                SET
                    surname=:surname,
                    name=:name,
                    fathername=:fathername,
                    city=:city,
                    rang=:rang,
                    ZarplataInBucks=:ZarplataInBucks 
                WHERE id=:id',
                    [
                        'surname' => $gachimuchenik->getSurname(),
                        'name' => $gachimuchenik->getName(),
                        'fathername' => $gachimuchenik->getFathername(),
                        'city' => $gachimuchenik->getCity(),
                        'rang' => $gachimuchenik->getRang(),
                        'ZarplataInBucks' => $gachimuchenik->getZarplataInBucks(),
                        'id' => $gachimuchenik->getId()
                    ]);

                return self::getById($gachimuchenik->getId());
            }
            return false;
        }
    }

    public static function remove(Gachimuchenik2 $gachimuchenik): bool
    {
        if (DataMapper::getById($gachimuchenik->getId())->getId()) {
            DataBaseRequester::execute(
                'DELETE
                FROM GachiBaza.gachitable 
                WHERE id=?',
                [$gachimuchenik->getId()]);
            return true;
        }
        return false;
    }

    public static function getAll(): array
    {
        $gachimucheniks = [];
        $rows = DataBaseRequester::execute_with_fetch(
            'SELECT * 
                FROM GachiBaza.gachitable', [], true);
        foreach ($rows as $row) {
            $gachimuchenik = new Gachimuchenik2(
                (int)$row['id'],
                (string)$row['surname'],
                (string)$row['name'],
                (string)$row['fathername'],
                (string)$row['city'],
                (string)$row['rang'],
                (int)$row['ZarplataInBucks']);
            $gachimucheniks[] = $gachimuchenik;
        }
        return $gachimucheniks;
    }

    public static function getById(int $id): Gachimuchenik2
    {
        $foundgachimuchenik = DataBaseRequester::execute_with_fetch(
            'SELECT * 
            FROM GachiBaza.gachitable 
            WHERE id=?',
            [$id]);
        return !$foundgachimuchenik ? new Gachimuchenik2() : new Gachimuchenik2(
            $foundgachimuchenik['id'],
            $foundgachimuchenik['surname'],
            $foundgachimuchenik['name'],
            $foundgachimuchenik['fathername'],
            $foundgachimuchenik['city'],
            $foundgachimuchenik['rang'],
            $foundgachimuchenik['ZarplataInBucks']);
    }

    public static function getByFields(string $surname, string $name, string $fathername, string $city, string $rang, int $ZarplataInBucks): Gachimuchenik2
    {
        $foundgachimuchenik = DataBaseRequester::execute_with_fetch(
            'SELECT * 
        FROM GachiBaza.gachitable 
        WHERE surname=:surname 
          AND name=:name 
          AND fathername=:fathername 
          AND city=:city 
          AND rang=:rang 
          AND ZarplataInBucks=:ZarplataInBucks',
            [
                'surname' => $surname,
                'name' => $name,
                'fathername' => $fathername,
                'city' => $city,
                'rang' => $rang,
                'ZarplataInBucks' => $ZarplataInBucks
            ]);

        return !$foundgachimuchenik ? new Gachimuchenik2() : new Gachimuchenik2(
            $foundgachimuchenik['id'],
            $foundgachimuchenik['surname'],
            $foundgachimuchenik['name'],
            $foundgachimuchenik['fathername'],
            $foundgachimuchenik['city'],
            $foundgachimuchenik['rang'],
            $foundgachimuchenik['ZarplataInBucks']);
    }
}