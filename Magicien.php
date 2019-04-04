<?php

class Magicien extends Personnage// Magicien hérite des attributs et méthodes de la classe Personnage.
{

    protected $_magie;

    public function __construct($n, $f, $lieu, $xp, $d, $m, $mag) {
        parent::__construct($n, $f, $lieu, $xp, $d, $m);
        $this->_magie = $mag;
    }

    public function Bonjour() {
        echo 'Bonjour, je suis un Magicien <br/>';
    }

    public static function quiEstLa() {
        echo 'Hello je suis la classe fille';
    }

    public function getMagie() {
        echo $this->_magie;
    }

    public function setMagie($m) {
        $this->_magie = $m;
    }

    public function display() {
        parent::display();
        echo 'Magie : ' . $this->_magie . '<br/>';
    }

    public function lancerUnSort($perso) {
        $perso->recevoirDegats($this->_magie);
    }

    public function gagnerExperience() {
        // Nous allons surcharger la fonction de la classe mère spécifiquement pour le magicien.
        // self se réfère à la classe actuelle (Magicien).
        // parent se réfère à la classe mère (Personnage).
        // Conclusion, la surcharge commence par le comportement de la classe mère.

        parent::gagnerExperience();
        $this->_magie += 15;
    }

    public function repos() {
        $this->_force = $this->_force + 10;
    }
}