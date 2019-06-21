<?php

class AdminModel
{

    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Nemogu se povezati sa bazom!');
        }
    }

    public function spremiKat($kat)
    {
        $sql = "INSERT INTO kategorija (naziv) VALUES ('$kat')";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function getUsers()
    {
        $sql = "SELECT COUNT(id_user) as count FROM user";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
    public function getOglasi()
    {
        $sql = "SELECT COUNT(id_oglas) as count FROM oglas";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
    public function getKategorije()
    {
        $sql = "SELECT COUNT(id_kategorija) as count FROM kategorija";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
    public function getNumLogs()
    {
        $sql = "SELECT COUNT(log_no) as count FROM logs WHERE success_login = 1";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }
    public function getPogledi()
    {
        $sql = "SELECT SUM(br_pogleda) as count FROM oglas";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch();
    }

    public function getLogs(){
        $sql = "SELECT * FROM logs";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }
}
