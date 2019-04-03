<?php

function chargerClass($classe){
    require $classe.'.php';
}

spl_autoload_register('chargerClass');

//require 'Personnage.php';

echo 'Bienvenue dans ce super jeu vidéo <br/>';

$perso1 = new Personnage('Goku', Personnage::FORCE_GRANDE, 'Namek', 50, 0);
$perso1->display();
echo '<br/>';

$perso2 = new Personnage('Vegeta', Personnage::FORCE_GRANDE, 'Planète Vegeta', 45, 0);
$perso2->display();
echo '<br/>';

$perso3 = new Personnage('Gohan', Personnage::FORCE_MOYENNE, 'Terre', 45, 0);
$perso3->display();
echo '<br/>';

$perso4 = new Personnage('Krillin', Personnage::FORCE_PETITE, 'Terre', 45, 0);
$perso4->display();
echo '<br/>';

$perso5 = new Personnage('Boo', Personnage::FORCE_MOYENNE, 'Inconnu', 45, 0);
$perso5->display();
echo '<br/>';

echo Personnage::getCompteur();








