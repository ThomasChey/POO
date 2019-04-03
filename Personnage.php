<?php

class Personnage
{

// Les variables et fonctions propres à la CLASS ont le mot clé static qui les précède
// static var --> elle sera donc appellée de la manière suivante self::var (personnage::var dans index.php)
    private static $_compteur = 0;
    public static function getCompteur(){
        return self::$_compteur;
    }


// Constantes de classe --> UNE CONSTANTE EN POO EST RELATIVE A LA CLASSE ET PAS AUX OBJETS !!! ex: self::FORCE_PETITE
    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 90;

// -- attributs = variable --> ILS SONT RELATIFS AUX OBJETS ! ex: $this->_nom

    private $_nom;
    private $_force;
    private $_localisation;
    private $_experience;
    private $_degats;

// constructor

    public function __construct($n, $f, $lieu, $xp, $d)
    {
        echo 'Constructor : Boom ! Un personnage est né ! <br/>';
        $this->setNom($n);
        $this->setForce($f);
        $this->setLocalisation($lieu);
        $this->setExperience($xp);
        $this->setDegats($d);
        self::$_compteur++;
        // $this fait référence à l'objet instancié ( Vegeta, Sangoku ...). -> correspond à un élément DANS l'objet instancié.
        // self fait référence à la classe ou je suis actuellement (Personnage). :: correspond à un élément DANS la classe ou je suis actuellement.
        // Quand on va créer un objet dans index.php ( $perso1=new Personnage(a,b,c,x..) ),
        // on peut acceder $perso1 remplace $this !! et Personnage:: remplace self::
    }

    public function display()
    {
        echo 'Prenom : ' . $this->_nom . '<br/>';
        echo 'Force : ' . $this->_force . '<br/>';
        echo 'Localisation : ' . $this->_localisation . '<br/>';
        echo 'Experience : ' . $this->_experience . '<br/>';
        echo 'Dégats : ' . $this->_degats . '<br/>';

        // Il est préférable de faire comme suit :
//        echo 'Prenom : ' . $this->getNom() . '<br/>';
//        echo 'Force : ' . $this->getForce() . '<br/>';
//        echo 'Localisation : ' . $this->getLocalisation() . '<br/>';
//        echo 'Experience : ' . $this->afficherExperience() . '<br/>';
//        echo 'Dégats : ' . $this->getDegats() . '<br/>';
    }

// -- Méthodes = Fonctions --

// Mes autres fonctions
    public function frapper($persoAFrapper)
    {
        $persoAFrapper->_degats += $this->_force;
    }

    public function deplacer()
    {
    }

    public function saluer()
    {
        echo 'Bonjour, je suis un nouveau personnage';
    }

    public function crier()
    {
        echo 'Bouyaaaaaaah';
    }

// Mes getters et setters

// --- Experience ---
    public function afficherExperience()
    { // getter experience
        echo $this->_experience;
    }

    public function gagnerExperience()
    { // setter experience
        $this->_experience = $this->_experience + 1;
    }

    public function setExperience($xp)
    {
        if ($xp > 1000) {
            trigger_error('Attention l\'experience ne peut excéder 1000 !', E_USER_WARNING);
            return;
        }
        $this->_experience = $xp;
    }

// --- Localisation ---
    public function getLocalisation()
    { // getter localisation
        echo $this->_localisation;
    }

    public function setLocalisation($lieu)
    { // setter localisation
        $this->_localisation = $lieu;
    }

// ---- Force ----
    public function getForce()
    { // getter force
        echo $this->_force;
    }

    public function setForce($f)
    { // setter force
        if (!is_int($f)) {
            trigger_error('Attention la force doit être un nombre entier !', E_USER_WARNING);
            return;
        }
        if ($f > 3000) {
            trigger_error('Attention la force assignée doit être inférieure à 3000 !', E_USER_WARNING);
            return;
        }
        if(in_array($f, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])){
            $this->_force = $f;
        }
        $this->_force = $f;
    }

// --- Degats ---
    public function getDegats()
    { // getter degats
        echo $this->_degats;
    }

    public function setDegats($d)
    { // setter force
        $this->_degats = $d;
    }

// ---- Nom ----
    public function getNom()
    { // getter nom
        echo $this->_nom;
    }

    public function setNom($n)
    { // setter nom
        $this->_nom = $n;
    }

}



//echo '<br/> Voici les infos de mon personnage 1 : <br/>';
//
//echo '<br/>Voici son prénom : ';
//$perso1->getNom();
//
//echo '<br/> Voici sa force : ';
//$perso1->getForce();
//
//echo '<br/> Voici sa localisation : ';
//$perso1->getLocalisation();
//
//echo '<br/> Voici ses dégats : ';
//$perso1->getDegats();
//
//echo '<br/> Voici son experience : ';
//$perso1->afficherExperience();
//echo '<br/> <strong>WAIT WHAT?</strong> il gagne déjà en experience !!';
//$perso1->gagnerExperience();
//echo '<br/> Voici son experience actuelle : ';
//$perso1->afficherExperience();


//echo '<hr/><br/> Voici les infos de mon personnage 1 : <br/>';
//
//echo '<br/>Voici son prénom : ';
//$perso2->getNom();
//
//echo '<br/> Voici sa force : ';
//$perso2->getForce();
//
//echo '<br/> Voici sa localisation : ';
//$perso2->setLocalisation('Blazus');
//$perso2->getLocalisation();
//
//echo '<br/> Voici ses dégats : ';
//$perso2->getDegats();
//
//echo '<br/> Voici son experience : ';
//$perso2->afficherExperience(); // experience = 20
//
//echo '<br/> <strong>WAIT WHAT?</strong> il gagne déjà en experience !!';
//
//$perso2->gagnerExperience();
//$perso2->gagnerExperience();
//$perso2->gagnerExperience();
//$perso2->gagnerExperience();
//
//echo '<br/> Voici son experience actuelle : ';
//$perso2->afficherExperience(); // experience = 24
//
//
//// Combat !
//echo '<hr/><br/> Les deux personnages montent sur le ring ! : <br/>';
//$perso1->getNom();
//echo ' : ';
//$perso1->crier();
//echo '<br/>';
//$perso2->getNom();
//echo ' : ';
//$perso2->crier();
//echo '<br/>';
//
//$perso1->frapper($perso2);
//$perso1->gagnerExperience();
//
//$perso2->frapper($perso1);
//$perso2->gagnerExperience();
//
//echo '<br/><br/> Les dégats : <br/>';
//$perso1->getNom();
//echo ' : ';
//$perso1->getDegats();
//echo '<br/>';
//$perso2->getNom();
//echo ' : ';
//$perso2->getDegats();
//echo '<br/>';
//
//echo '<br/><br/> L\'Experience : <br/>';
//$perso1->getNom();
//echo ' : ';
//$perso1->afficherExperience();
//echo '<br/>';
//$perso2->getNom();
//echo ' : ';
//$perso2->afficherExperience();
//echo '<br/>';


