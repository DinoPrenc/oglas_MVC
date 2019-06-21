<?php

class LoginModel
{

    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Nemogu se povezati sa bazom!');
        }
    }

    //prijava
    public function login($email, $pass)
    {
        $sql = "SELECT * FROM user WHERE email='$email' AND password='$pass'";
        $query = $this->db->prepare($sql);
        $query->execute();
        $user_id = $query->fetch();



        if ($query->rowCount() >= 1) {
            return $user_id;
        } else {
            echo 'login neuspijesan<br>';
            echo '<a href=" ' .URL. '/login">Natrag</a>';
        }
    }

    public function logout()
    {
        unset($_SESSION);
        session_destroy();
    }

    public function getZupanija()
    {
        $sql = "SELECT * FROM zupanija";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query;
    }

    public function check($email)
    {
        $sql = "SELECT * FROM user WHERE email=$email";
        $query = $this->db->prepare($sql);
        $query->execute();
        if ($query->rowCount() >= 1) {
            return 0;
        }
    }

    public function registration($ime, $prezime, $email, $zupanija, $br_tel, $pass)
    {
        $sql = "INSERT INTO user (ime, prezime, email, id_zupanija, br_tel, password, admin)"
            . "VALUES ('$ime','$prezime', '$email', '$zupanija', '$br_tel', '$pass', '0')";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function saveLogs($id, $timestamp, $userAgent, $ip, $succes){
        //$sql = "INSERT INTO logs (id_user, time , user_agent, ip, success_login, stat) VALUES"
        //. "($id, '$timestamp', '$userAgent', '$ip', $succes, '/')";
        $sql = "INSERT INTO `logs`(`id_user`, `time`, `user_agent`, `ip`, `success_login`, `stat`) VALUES ($id,'$timestamp','$userAgent','$ip',$succes,'/')";
        $query = $this->db->prepare($sql);
        $query->execute();
    }

    public function saveLogs2($timestamp, $userAgent, $ip, $succes){
        //$sql = "INSERT INTO logs (id_user, time , user_agent, ip, success_login, stat) VALUES"
        //. "($id, '$timestamp', '$userAgent', '$ip', $succes, '/')";
        $sql = "INSERT INTO `logs`(`time`, `user_agent`, `ip`, `success_login`, `stat`) VALUES ('$timestamp','$userAgent','$ip',$succes,'/')";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}

//INSERT INTO `logs`(`id_user`, `time`, `user_agent`, `ip`, `success_login`, `stat`) VALUES (10,'00000','test','11.11.11',0,'test')
