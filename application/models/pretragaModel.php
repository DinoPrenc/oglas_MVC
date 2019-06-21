<?php

class PretragaModel{

    function __construct($db)
    {
        try{
            $this->db = $db;
        }catch(PDOException $e){
            exit('Nemogu se povezati sa bazom!');
        }
    }


    public function getAllOglasiASCPrice($keyword, $kat){
        if($kat==0){
            $sql = "SELECT * FROM oglas WHERE ((naslov LIKE '%$keyword%') OR (opis LIKE '%$keyword%')) AND aktivan = 1 ORDER BY cijena DESC";
        }else{
        $sql = "SELECT * FROM oglas WHERE ((naslov LIKE '%$keyword%') OR (opis LIKE '%$keyword%')) AND id_kategorija = $kat AND aktivan = 1 ORDER BY cijena DESC";
        }
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getAllOglasiDESCPrice($keyword, $kat){
        if($kat==0){
            $sql = "SELECT * FROM oglas WHERE ((naslov LIKE '%$keyword%') OR (opis LIKE '%$keyword%')) AND aktivan = 1 ORDER BY cijena ASC";
        }else{
        $sql = "SELECT * FROM oglas WHERE ((naslov LIKE '%$keyword%') OR (opis LIKE '%$keyword%')) AND id_kategorija = $kat AND aktivan = 1 ORDER BY cijena ASC";
        }
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function getAllKategorija(){
        $sql = "SELECT * FROM kategorija ORDER BY naziv ASC";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }


    public function getPrivatniOglasiASCPrice($keyword, $kat){
        $id_user = $_SESSION['id'];
        if($kat==0){
            $sql = "SELECT * FROM oglas WHERE ((naslov LIKE '%$keyword%') OR (opis LIKE '%$keyword%')) AND id_user=$id_user ORDER BY cijena DESC";
        }else{
        $sql = "SELECT * FROM oglas WHERE ((naslov LIKE '%$keyword%') OR (opis LIKE '%$keyword%')) AND id_kategorija = $kat AND id_user=$id_user  ORDER BY cijena DESC";
        }
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function getPrivatniOglasiDESCPrice($keyword, $kat){
        $id_user = $_SESSION['id'];
        if($kat==0){
            $sql = "SELECT * FROM oglas WHERE ((naslov LIKE '%$keyword%') OR (opis LIKE '%$keyword%')) AND id_user=$id_user ORDER BY cijena ASC";
        }else{
        $sql = "SELECT * FROM oglas WHERE ((naslov LIKE '%$keyword%') OR (opis LIKE '%$keyword%')) AND id_kategorija = $kat AND id_user=$id_user  ORDER BY cijena ASC";
        }
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function pregled($id){
        $sql = "SELECT * FROM oglas WHERE id_oglas = $id";
        $query = $this->db->prepare($sql);
        $query->execute();

        $data = $query->fetch();

        $br_pogleda = $data->br_pogleda;
        $br_pogleda = $br_pogleda+1;

        $update = $this->db->prepare("UPDATE oglas SET br_pogleda = $br_pogleda WHERE id_oglas = $id");
        $update->execute();

        return $data;
    }

    public function getContactEmail($id){
        $sql = "SELECT * FROM user WHERE id_user = $id";
        $query = $this->db->prepare($sql);
        $query->execute();

        $email = $query->fetch();
        $email = $email->email;

        return $email;
    }
}