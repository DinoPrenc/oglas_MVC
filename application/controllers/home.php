<?php

/**
 * Class Home
 * 
 * Home controller 
 *
 */
class Home extends Controller
{
    /**
     * index
     * 
     * ucitavanje pocetne stranice
     */
    public function index()
    {
        require 'application/views/home/index.php';
    }

}
