<?php

class SuperBrute extends Brute { // SuperGuerrier hérite des attributs et méthodes de la classe Guerrier.

    public function repos(){
        $this->_force = $this->_force +20;
    }

    public function Bonjour(){
        echo 'Bonjour - Je suis une super brute ! <br/>
        ';
    }
}