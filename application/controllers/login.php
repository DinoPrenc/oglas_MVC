<?php

/**
 * Class: Login
 * 
 * Login controller
 */
class Login extends Controller
{
    /**
     * index
     * 
     * provjera ako je korisnik vec prijavljen
     */
    public function index()
    {

        if (!isset($_SESSION['id'])) {
            require('application/views/login/index.php');
        } else {
            echo 'vec si prijavljen';
        }
    }

    /**
     * loginUser
     * 
     * dohvacanje podataka iz obrasca submit_login
     * @var string $email
     * @var string $pass
     * @var string $timestamp vrijeme prijave/pokusaja prijave
     * @var string $userAgent pretrazivac/platforma korisnika
     * @var string $ip ip adresa korisnik
     * @var $logs zadnji element->1 ako je uspijesna prijava, inace 0
     */
    public function loginUser()
    { {
            if (isset($_POST['submit_login'])) {
                $email = $_POST['email'];
                $pass = md5($_POST['pass']);

                $timestamp = $_SERVER['REQUEST_TIME'];
                $userAgent = $_SERVER['HTTP_USER_AGENT'];
                $ip = $_SERVER['REMOTE_ADDR'];

                $login_model = $this->loadModel('LoginModel');
                $login = $login_model->login($email, $pass);
                if (isset($login)) {
                    $_SESSION['id'] = $login->id_user;
                    $_SESSION['ime'] = $login->ime;
                    $_SESSION['admin'] = $login->admin;
                    $logs = $login_model->saveLogs($login->id_user, $timestamp, $userAgent, $ip, 1);
                    header('Location: ' .URL);
                }else{
                    $logs = $login_model->saveLogs2($timestamp, $userAgent, $ip, 0);
                }
            }
        }
    }

    /**
     * logout
     * 
     * odjava prijavljenog korisnika
     */
    public function logout()
    {
        $login_model = $this->loadModel('LoginModel');
        $logut = $login_model->logout();
        header('Location: ' .URL);
    }

    /**
     * register
     * 
     * prikaz obrasca za registraciju
     * @var object $zupanije dohvacanje zupanija za obrazac
     * 
     */
    public function register()
    {

        if (!isset($_SESSION['id'])) {
            $model = $this->loadModel('LoginModel');
            $zupanije = $model->getZupanija();
            require('application/views/login/register.php');
        } else {
            header('Location: ' .URL);
        }
    }

    /**
     * newUser
     * 
     * spremanje novog korisnika ako se lozinke podudaraju i ako vec ne postoji email u bazi
     * @var string $ime
     * @var string $prezime
     * @var string $email
     * @var int $zupanija id_zupanija kao vanjski kljuc
     * @var string $br_tel
     * @var string $pass
     * @var string $pass_check provjera ako se lozinke podudaraju
     */
    public function newUser()
    {
        if (isset($_POST['submit_register'])) {
            $ime = $_POST['ime'];
            $prezime = $_POST['prezime'];
            $email = $_POST['email'];
            $zupanija = $_POST['zupanija'];
            $br_tel = $_POST['tel'];
            $pass = md5($_POST['pass']);
            $pass_check = md5($_POST['pass_check']);

            $model = $this->loadModel('LoginModel');
            $check = $model->check($email);

            if ($pass != $pass_check) {
                echo '<script type="text/javascript">alert("Lozinke se ne podudaraju"); window.location.href = " ' .URL. '/login/register";</script>';
            } else if ($check == 0) {
                echo '<script type="text/javascript">alert("Korisnik sa navedenim emailom vec postoji"); window.location.href = " ' .URL. '/login/register";</script>';
            } else {
                $new = $model->registration($ime, $prezime, $email, $zupanija, $br_tel, $pass);
                header('Location: ' .URL. '/login');
            }
        }
    }
}
