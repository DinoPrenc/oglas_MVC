<?php
class PredajaModel{
function __construct($db)
    {
        try{
            $this->db = $db;
        }catch(PDOException $e){
            exit('Nemogu se povezati sa bazom!');
        }
    }

    public function getKategorija(){
        $sql = "SELECT * FROM kategorija";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    public function spremiOglas($id_user, $naslov, $opis, $cijena, $kategorija){
        $sql = "INSERT INTO oglas (id_user, naslov, opis, cijena, id_kategorija, aktivan, br_pogleda)"
            . "VALUES ('$id_user', '$naslov','$opis', $cijena, $kategorija, 1, 0)";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function delete($id){
        $sql = "DELETE FROM oglas WHERE id_oglas = $id LIMIT 1";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}