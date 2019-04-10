<?php 

final class Guerrier extends Personnage // Guerrier hérite des attributs et méthodes de la classe Personnage.
{
    private $_arme;

    public function getArme(){
        return $this->_arme;
    }

    public function setArme($arm){
        $this->_arme = $arm;
    }

    public function __construct($n, $f, $lieu, $xp, $d, $m, $arm)
    {
        parent::__construct($n, $f, $lieu, $xp, $d, $m);
        $this->_arme = $arm;
    }

    public function __destruct()
    {
        echo 'Oups, un guerrier est mort <br/>';
    }

    public function display(){
        parent::display();
        echo 'Arme : '.$this->_arme. '<br/>';
    }

    public function repos(){
        $this->_force = $this->_force +20;
    }

    public function Bonjour(){
        echo 'Bonjour, je suis un Guerrier <br/>';
    }
}