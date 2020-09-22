<?php
require 'connection.php';

class DataBase
{

    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function registerNewMessage($a, $b, $c)
    {
        try {

            $insert = $this->db->prepare("INSERT INTO chat (user, message, dateTime) VALUES (:a, :b, :c)");
            $insert->bindParam(':a', $a);
            $insert->bindParam(':b', $b);
            $insert->bindParam(':c', $c);
            $insert->execute();
            return $insert;
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function registerNewUser($a)
    {
        try {

            $insert = $this->db->prepare("INSERT INTO users (name) VALUES (:a)");
            $insert->bindParam(':a', $a);
            $insert->execute();
            return $insert;
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function listUsers()
    {
        try {

            $select = $this->db->prepare("SELECT * FROM users ORDER BY name ASC");
            $select->execute();
            return $select;
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function user($a)
    {
        try {

            $select = $this->db->prepare("SELECT * FROM users WHERE id_user = :a");
            $select->bindParam(':a', $a);
            $select->execute();
            $array = $select->fetch(PDO::FETCH_ASSOC);
            return $array;
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }

    public function listChat()
    {
        try {

            $select = $this->db->prepare("SELECT chat.*, users.* FROM chat INNER JOIN users ON id_user = user ORDER BY id_chat ASC");
            $select->execute();
            return $select;
        } catch (PDOException $e) {

            echo $e->getMessage();
        }
    }
}
