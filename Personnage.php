<?php

// abstract class Personnage
class Personnage {

// Les variables et fonctions propres à la CLASS ont le mot clé static qui les précède
    // static var --> elle sera donc appellée de la manière suivante self::var (personnage::var dans index.php)
    private static $_compteur = 0;

    public static function getCompteur() {
        return self::$_compteur;
    }

    public static function quiEstLa() {
        echo 'Hello je suis la classe mère';
    }

    public static function toctoctoc() {
        static::quiEstLa();
    }

// Constantes de classe --> UNE CONSTANTE EN POO EST RELATIVE A LA CLASSE ET PAS AUX OBJETS !!! ex: self::FORCE_PETITE
    const FORCE_PETITE = 20;
    const FORCE_MOYENNE = 50;
    const FORCE_GRANDE = 90;

// -- attributs = variable --> ILS SONT RELATIFS AUX OBJETS ! ex: $this->_nom

    protected $_id;
    protected $_nom;
    protected $_force;
    protected $_localisation;
    protected $_experience;
    protected $_degats;
    protected $_membres;

// constructor

    public static function construct2($data) {

        $instance = new self($data['id'], $data['nom'], $data['theforce'], $data['localisation'], $data['experience'], $data['degats'], $data['membres']);
        return $instance;
    }

    public function __construct($id = 1, $n = 'temp', $f = 20, $lieu = 'temp', $xp = 20, $d = 10, $m = 3) {
        echo 'Constructor : Boom ! Un personnage est né ! <br/>';
        $this->setId($id);
        $this->setNom($n);
        $this->setForce($f);
        $this->setLocalisation($lieu);
        $this->setExperience($xp);
        $this->setDegats($d);
        $this->setMembres($m);
        self::$_compteur++;

        // $this fait référence à l'objet instancié ( Vegeta, Sangoku ...). -> correspond à un élément DANS l'objet instancié.
        // self fait référence à la classe ou je suis actuellement (Personnage). :: correspond à un élément DANS la classe ou je suis actuellement.
        // Quand on va créer un objet dans index.php ( $perso1=new Personnage(a,b,c,x..) ),
        // on peut acceder $perso1 remplace $this !! et Personnage:: remplace self::
    }

    public function display() {
        echo 'Prenom : ' . $this->_nom . '<br/>';
        echo 'Force : ' . $this->_force . '<br/>';
        echo 'Localisation : ' . $this->_localisation . '<br/>';
        echo 'Experience : ' . $this->_experience . '<br/>';
        echo 'Dégats : ' . $this->_degats . '<br/>';
        echo 'Membres : ' . $this->_membres . '<br/>';

        // Il est préférable de faire comme suit :
        //        echo 'Prenom : ' . $this->getNom() . '<br/>';
        //        echo 'Force : ' . $this->getForce() . '<br/>';
        //        echo 'Localisation : ' . $this->getLocalisation() . '<br/>';
        //        echo 'Experience : ' . $this->afficherExperience() . '<br/>';
        //        echo 'Dégats : ' . $this->getDegats() . '<br/>';
    }

    // Nous allons passer un tableau de données correspondant aux attributs d'un objet => pour le stocker dans une ligne de ma table en BDD

    // Ceci est la fonction d'hydratation : assignation des valeurs passées en paramètres aux attributs correspondant.
    // ucfirst() est une fonction qui prend en parametre un String et met la première lettre en MAJUSCULE --> ucfirst('localisation) -> Localisation.
    // 'set'.ucfirst(nom) ==> setNom
    // on se rappelra que $data[$key] = $value
    // $data as $key => $value

    public function hydrate(array $data) {

        foreach ($data as $key => $value) {
            // On tente de générer le bon setter !
            $method = 'set' . ucfirst($key); // 'set.$key pour ceux non camelCase
            if (method_exists($this, $method)) { // en gros on vérifie si la méthode $this->setX existe dans le code ou pas ! Si oui, on exécute les                                               instructions suivantes; On appelle donc le setter
                $this->$method($value);
            }
        }

        if (isset($data['id'])) {
            $this->setId($data['id']);
        }

        if (isset($data['nom'])) {
            $this->setNom($data['nom']);
        }

        if (isset($data['force'])) {
            $this->setForce($data['force']);
        }

        if (isset($data['localisation'])) {
            $this->setLocalisation($data['localisation']);
        }

        if (isset($data['experience'])) {
            $this->setExperience($data['experience']);
        }

        if (isset($data['degats'])) {
            $this->setDegats($data['degats']);
        }

        if (isset($data['membres'])) {
            $this->setMembres($data['membres']);
        }
    }

// -- Méthodes = Fonctions --

// Mes autres fonctions

    public function __clone() {
        return self::$_compteur++;
    }

    public function __destruct() {
        echo 'Oups - Destruction de mon objet !!! <br/>';
    }

    public static function test_parent() {
        static::Bonjour();
    }

    public function frapper($persoAFrapper) {
        $persoAFrapper->_degats += $this->_force;
    }

    public function recevoirDegats($valeur) {
        $this->_degats = $this->_degats + $valeur;
    }

    public function deplacer() {
    }

    public function saluer() {
        echo 'Bonjour, je suis un nouveau personnage';
    }

    public function crier() {
        echo 'Bouyaaaaaaah';
    }

    public function Bonjour() {
        echo 'Bonjour, je suis un personnage <br/>';
    }

    // abstract public function repos();

// Mes getters et setters

// ---  ID ---
    public function getId() {
        return $this->_id;
    }

    public function setId($i) {

        $i = (int) $i; // cast !

        if ($i > 0) {
            $this->_id = $i;
        }

        $this->_id = $i;
    }

// --- Experience ---
    public function afficherExperience() { // display experience
        echo $this->_experience;
    }

    public function getExperience() { // getter experience
        return $this->_experience;
    }

    public function gagnerExperience() { // setter experience
        $this->_experience = $this->_experience + 1;
    }

    public function setExperience($xp) {

        $xp = (int) $xp;

        if ($xp >= 1 && $xp <= 1000) {
            $this->_experience = $xp;
        }

        if ($xp > 1000) {
            trigger_error('Attention l\'experience ne peut excéder 1000 !', E_USER_WARNING);
            return;
        }
    }

// --- Localisation ---
    public function getLocalisation() { // getter localisation
        return $this->_localisation;
    }

    public function setLocalisation($lieu) { // setter localisation
        if (is_string($lieu)) {
            $this->_localisation = $lieu;
        }

    }

// ---- Force ----
    public function getForce() { // getter force
        return $this->_force;
    }

    public function setForce($f) { // setter force

        $f = (int) $f;

        if (!is_int($f)) {
            trigger_error('Attention la force doit être un nombre entier !', E_USER_WARNING);
            return;
        }

        if (in_array($f, [self::FORCE_PETITE, self::FORCE_MOYENNE, self::FORCE_GRANDE])) {
            $this->_force = $f;
        }
    }

// --- Degats ---
    public function getDegats() { // getter degats
        return $this->_degats;
    }

    public function setDegats($d) { // setter force

        $d = (int) $d;

        if ($d >= 0 && $d <= 1000) {
            $this->_degats = $d;
        }

    }

// ---- Nom ----
    public function getNom() { // getter nom
        return $this->_nom;
    }

    public function setNom($n) { // setter nom
        if (is_string($n)) {
            $this->_nom = $n;
        }
    }

// --- Membres ---

    public function getMembres() {
        return $this->_membres;
    }

    public function setMembres($m) {
        $m = (int) $m;

        if ($m >= 2) {
            $this->_membres = $m;
        }
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
