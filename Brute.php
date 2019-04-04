<?php 

class Brute extends Personnage // Brute hérite des attributs et méthodes de la classe Personnage.
{

    public static function test(){
        self::test_parent();
    }

    public function repos(){
        $this->_force = $this->_force +2;
    }

    public function Bonjour(){
        echo 'Bonjour, je suis une Brute <br/>';
    }
}