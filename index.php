<?php

function chargerClass($classe){
    require $classe.'.php';
}

spl_autoload_register('chargerClass');

//require 'Personnage.php';

echo 'Bienvenue dans ce super jeu vidéo <br/><br/>';

/* $data1 = ['nom' => 'Goku', 'theforce' => Personnage::FORCE_GRANDE, 'localisation' => 'Namek', 'experience' => 50, 'degats' => 0, 'membres' => 4]; */

// Nous avons crée un objet comme à notre habitude TOUTEFOIS cet objet n'est pas stocké dans la base !
$data2=[11, 'Piccolo', Personnage::FORCE_GRANDE, 'Namek', 50, 0, 4 ];

$perso = new Personnage($data2[0], $data2[1], $data2[2], $data2[3], $data2[4],$data2[5], $data2[6]);

$perso->display();

echo '<br/>';

$perso_copie = clone $perso;
$perso_copie->setNom('Jacky');
$perso->display();
$perso_copie->display();

echo '<br/>';

$perso_ref = $perso;
$perso_ref->setNom('Gandalf');
$perso->display();
$perso_ref->display();

// $perso7 = new Personnage();


// Stockons le dans la base 

// 1 - J'instancie ma BDD : connexion
$db = new PDO('mysql:host=localhost;dbname=phpoo','root','');
// 2 - Pour faire mes opérations CRUD : j'appelle PersonnagesManager
$manager = new PersonnagesManager($db);



// $manager->add($perso7);
// $manager->delete($perso);
// $manager->update($perso);

$mon_perso_selected = $manager->get(10);
// == select * from personnages where id=10
$mon_perso_selected->display();

// select * from personnages
$ma_liste_de_persos = $manager->getList();
echo '<br/> Voici tous mes persos en BDD <br/>';

foreach($ma_liste_de_persos as $pers){
    $pers->display();
}


/* $perso0 = new Magicien('Merlin', Personnage::FORCE_GRANDE, 'Bretagne', 60, 0, 4, 100);
$perso0->display();
$perso0->gagnerExperience();
$perso0->gagnerExperience();
$perso0->gagnerExperience();
echo '<br/>';
$perso0->display();
echo '<br/>';

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
echo '<br/>'; */

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








