<?php
/**
 * Created by PhpStorm.
 * User: PCC
 * Date: 2/24/2018
 * Time: 6:32 PM
 */

/*
 * CREATE TABLE Members (member_id SMALLINT (4) AUTO_INCREMENT PRIMARY KEY,
                      fname VARCHAR(30) NOT NULL,
                      lname VARCHAR(30) NOT NULL,
                      age TINYINT(2) NOT NULL,
                      gender CHAR(6) NOT NULL,
                      phone CHAR(12) NOT NULL,
                      email VARCHAR(30) NOT NULL,
                      state VARCHAR(30) NOT NULL,
                      seeking CHAR(6) NOT NULL,
                      bio VARCHAR (300) NOT NULL,
                      premium TINYINT(3) NOT NULL,
                      image VARCHAR(100),
                      interests VARCHAR(300)
                      );
 */

require_once("/home/btorresm/config.php");

abstract class DataObject
{
    protected $data = array();

    public function __construct($data)
    {
        foreach ($data as $key => $value) {
            if (array_key_exists($key, $this->data)) $this->data[$key] = $value;
        }
    }

    public function getValue($field)
    {
        if (array_key_exists($field, $this->data)) {
            return $this->data[$field];
        } else {
            die("Field not found");
        }
    }

    public function getValueEncoded($field)
    {
        return htmlspecialchars($this->getValue($field));
    }

    protected function connect()
    {
        try {
            $conn = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            $conn->setAttribute(PDO::ATTR_PERSISTENT, true);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        return $conn;
    }

    protected function disconnect($conn)
    {
        $conn = "";
    }
}

?>
