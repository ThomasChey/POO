<?php

function chargerClass($classe){
    require $classe.'.php';
}

spl_autoload_register('chargerClass');

//require 'Personnage.php';

echo 'Bienvenue dans ce super jeu vidéo <br/><br/>';

$perso0 = new Magicien('Merlin', Personnage::FORCE_GRANDE, 'Bretagne', 60, 0, 4, 100);
$perso0->display();
$perso0->gagnerExperience();
$perso0->gagnerExperience();
$perso0->gagnerExperience();
echo '<br/>';
$perso0->display();
echo '<br/>';

$perso1 = new Guerrier('Goku', Personnage::FORCE_GRANDE, 'Namek', 50, 0, 4, 'Epée');
$perso1->display();
echo '<br/>';

$perso2 = new Guerrier('Vegeta', Personnage::FORCE_GRANDE, 'Planète Vegeta', 45, 0, 4, 'Masse');
$perso2->display();
echo '<br/>';

$perso3 = new Guerrier('Gohan', Personnage::FORCE_MOYENNE, 'Terre', 45, 0, 4, 'Hache');
$perso3->display();
echo '<br/>';

$perso4 = new Magicien('Krillin', Personnage::FORCE_PETITE, 'Terre', 45, 0, 4, 80);
$perso4->display();
echo '<br/>';

$perso5 = new Brute('Boo', Personnage::FORCE_MOYENNE, 'Inconnu', 45, 0, 4);
$perso5->display();
echo '<br/>';

$perso6 = new SuperBrute('Rambo', Personnage::FORCE_GRANDE, 'Vietnam', 45, 0, 4);
$perso6->display();
echo '<br/>';

echo Personnage::getCompteur() . '<br/>';

Personnage::toctoctoc();
echo '<br/>';

Magicien::toctoctoc();
echo '<br/>';

Brute::test();
SuperBrute::test();
Guerrier::test_parent();

// Dans INDEX.php
// $perso2->display(); ==> CE QUI N'EST NI STATIC NI CONSTANTE ->
// TOUT CE QUI EST STATIC OU CONSTANTE ::
// Personnage::quiEstLa();
// Personnage::getCompteur();
// Personnage::FORCE_GRANDE;

// Dans la classe personnage
// $this->display();
// self::quiEstLa();

// ON COMMENTE LES PERSONNAGES CAR C'EST DES OBJETS NON INSTANTIABLES --> CLASSE ABSTRAITE








