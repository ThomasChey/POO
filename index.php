<?php

require 'Personnage.php';

echo 'Bienvenue dans ce super jeu vidéo <br/>';

$perso1 = new Personnage('Goku', 300, 'Namek', 50, 0);
$perso1->display();
echo '<br/>';

$perso2 = new Personnage('Vegeta', 250, 'Planète Vegeta', 45, 5);
$perso2->display();
echo '<br/>';

$perso3 = new Personnage('Gohan', 250, 'Terre', 45, 5);
$perso3->display();
echo '<br/>';

$perso4 = new Personnage('Krillin', 250, 'Terre', 45, 5);
$perso4->display();
echo '<br/>';

$perso5 = new Personnage('Boo', 250, 'Inconnu', 45, 5);
$perso5->display();
echo '<br/>';










