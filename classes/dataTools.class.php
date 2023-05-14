<?php

class DataTools
{
    private $connection;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function setCity($city_id)
    {
        $_SESSION['CITY'] = $this->connection->select('cities', "id = $city_id", true);
    }

    public function getAllFilials()
    {
        if (isset($_SESSION['CITY'])) {
            $city_id = $_SESSION['CITY']['id'];
        } else {
            $result = $this->connection->select('filials', "id = {$_SESSION['STAFF']['filial_id']}");
            $city_id = $result['city_id'];
        }

        $sql = "SELECT f.*, c.city_title FROM filials AS f LEFT JOIN cities AS c ON f.city_id = c.id WHERE c.id = $city_id";
        $result = $this->connection->query($sql);
        $citiesAll = $this->connection->processRowSet($result, false);

        return json_encode($citiesAll, JSON_UNESCAPED_UNICODE);
    }
}
