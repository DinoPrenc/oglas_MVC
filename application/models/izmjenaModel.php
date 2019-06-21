<?php

class IzmjenaModel{

    function __construct($db)
    {
        try{
            $this->db = $db;
        }catch(PDOException $e){
            exit('Nemogu se povezati sa bazom!');
        }
    }

    public function getDetails($id){
        $sql = "SELECT * FROM oglas WHERE id_oglas= $id";
        $query = $this->db->prepare($sql);
        $query->execute();
       
        return $query->fetchAll();
    }

    public function changeOglas($id, $naslov, $opis, $cijena, $kategorija, $aktivan){
        $sql = "UPDATE oglas SET naslov='$naslov', opis='$opis', cijena=$cijena, id_kategorija=$kategorija, aktivan=$aktivan WHERE id_oglas= $id";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}