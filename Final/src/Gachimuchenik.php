<?php

namespace GachiNameSpace;

use PDO;

class Gachimuchenik extends ActiveRecord
{
    private ?int $id;
    private string $surname;
    private string $name;
    private string $fathername;
    private string $city;
    private string $rang;
    private ?int $ZarplataInBucks;

    public function __construct(string $surname, string $name, string $fathername, string $city, string $rang, int $ZarplataInBucks, int $id = null)
    {
        $this->id = $id;
        $this->surname = $surname;
        $this->name = $name;
        $this->fathername = $fathername;
        $this->city = $city;
        $this->rang = $rang;
        $this->ZarplataInBucks = $ZarplataInBucks;
    }

    public static function delete($id): bool
    {
        if (Gachimuchenik::getById($id)) {
            self::connect();
            $connect = self::getConnection();

            $insertQuery = 'DELETE FROM GachiBaza.gachitable 
            WHERE id=?';
            $query = $connect->prepare($insertQuery);
            $query->execute([$id]);

            self::unsetConnect();
            return true;
        }
        return false;
    }

    public static function getByID($id)
    {
        self::connect();
        $connect = self::getConnection();

        $insertQuery = 'SELECT * 
        FROM GachiBaza.gachitable 
        WHERE id=?';
        $query = $connect->prepare($insertQuery);
        $query->execute([$id]);
        $foundGachiman = $query->fetch();

        self::unsetConnect();

        if ($foundGachiman == false)
            return false;
        else return new Gachimuchenik(
            $foundGachiman['surname'],
            $foundGachiman['name'],
            $foundGachiman['fathername'],
            $foundGachiman['city'],
            $foundGachiman['rang'],
            $foundGachiman['ZarplataInBucks'],
            $foundGachiman['id']);
    }

    public static function getAll(): array
    {
        self::connect();
        $connect = self::getConnection();

        $gachimuchies = array();

        foreach ($connect->query('SELECT * 
        FROM GachiBaza.gachitable 
        ORDER BY id') as $row) {
            $gachimuchenik = new Gachimuchenik(
                (string)$row['surname'],
                (string)$row['name'],
                (string)$row['fathername'],
                (string)$row['city'],
                (string)$row['rang'],
                (int)$row['ZarplataInBucks'],
                (int)$row['id']);

            $gachimuchies[] = $gachimuchenik;
        }

        self::unsetConnect();
        return $gachimuchies;
    }

    public function save(): bool
    {
        $gachimuchenikByFields = Gachimuchenik::getByFields($this->surname, $this->name, $this->fathername, $this->city, $this->rang, $this->ZarplataInBucks);

        if ((!empty($this->surname)) && (!empty($this->name)) && (preg_match('/^[0-9]*$/', $this->ZarplataInBucks)))
        {
            self::connect();
            $connect = self::getConnection();

            $insertQuery = 'UPDATE GachiBaza.gachitable 
            SET
            surname=:surname,
            name=:name,
            fathername=:fathername,
            city=:city,
            rang=:rang, 
            ZarplataInBucks=:ZarplataInBucks
            WHERE id=:id';
            $query = $connect->prepare($insertQuery);
            $query->execute(
                [
                    'surname' => $this->surname,
                    'name' => $this->name,
                    'fathername' => $this->fathername,
                    'city' => $this->city,
                    'rang' => $this->rang,
                    'ZarplataInBucks' => $this->ZarplataInBucks,
                    'id' => $this->id]);

            self::unsetConnect();
            return true;
        } else return false;
    }

    public static function getByFields($surname, $name, $fathername, $city, $rang, $ZarplataInBucks)
    {
        self::connect();
        $connect = self::getConnection();

        $selectQuery = 'SELECT * 
        FROM GachiBaza.gachitable 
        WHERE surname=:surname 
          AND name=:name 
          AND fathername=:fathername 
          AND city=:city 
          AND rang=:rang 
          AND ZarplataInBucks=:ZarplataInBucks';
        $selectQuery = $connect->prepare($selectQuery);
        $selectQuery->execute([
            'surname' => $surname,
            'name' => $name,
            'fathername' => $fathername,
            'city' => $city,
            'rang' => $rang,
            'ZarplataInBucks' => $ZarplataInBucks
        ]);
        $foundGachiman = $selectQuery->fetch();

        self::unsetConnect();

        if ($foundGachiman == false)
            return false;
        else {
            return new Gachimuchenik(
                $foundGachiman['surname'],
                $foundGachiman['name'],
                $foundGachiman['fathername'],
                $foundGachiman['city'],
                $foundGachiman['rang'],
                $foundGachiman['ZarplataInBucks'],
                $foundGachiman['id']
            );

        }
    }


    public static function getConnection(): PDO
    {
        return self::$connection;
    }

    public function add(): bool
    {
        $foundTask = self::getByFields($this->surname, $this->name, $this->fathername, $this->city, $this->rang, $this->ZarplataInBucks);
        if (!$foundTask) {
            if ((!empty($this->surname)) && (!empty($this->name)) && (preg_match('/^[0-9]*$/', $this->ZarplataInBucks)))
            {
            self::connect();
            $connect = self::getConnection();

            $insertQuery = 'INSERT INTO GachiBaza.gachitable(surname,name,fathername,city,rang,ZarplataInBucks) 
            VALUES(:surname,:name,:fathername,:city,:rang,:ZarplataInBucks)';
            $query = $connect->prepare($insertQuery);
            $query->execute([
                'surname' => $this->surname,
                'name' => $this->name,
                'fathername' => $this->fathername,
                'city' => $this->city,
                'rang' => $this->rang,
                'ZarplataInBucks' => $this->ZarplataInBucks]);

            self::unsetConnect();
            return true;

            } else return false;
        } else return false;
    }



    public function getID(): int
    {
        return $this->id;
    }
    public function getSurname(): string
    {
        return $this->surname;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getFathername(): string
    {
        return $this->fathername;
    }
    public function getCity(): string
    {
        return $this->city;
    }
    public function getRang(): string
    {
        return $this->rang;
    }
    public function getZarplataInBucks(): string
    {
        return $this->ZarplataInBucks;
    }



    public function setID(int $id): void
    {
        $this->id = $id;
    }
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setFathername(string $fathername): void
    {
        $this->fathername = $fathername;
    }
    public function setCity(string $city): void
    {
        $this->city = $city;
    }
    public function setRang(string $rang): void
    {
        $this->rang = $rang;
    }
    public function setZarplataInBucks(int $ZarplataInBucks): void
    {
        $this->ZarplataInBucks = $ZarplataInBucks;
    }



}