<?php 

class PersonnagesManager
{
    // on le met en private our éviter de donner l'accès à l'attribut aux "supposées" classes filles


    // attributs
    private $_db; // instance de PDO

    // constructor
    public function __construct($db){
        $this->setDb($db);
    }

    // getter setter
    public function setDb(PDO $db){
        $this->_db = $db;
    }

    public function getDb(){
        return $this->_db;
    }

    // MES FONCTIONS CRUD : Create, Read, Update, Delete

    public function add(Personnage $perso){
        // preparer la requete d'insertion
        $q = $this->_db->prepare('INSERT INTO personnages(nom, theforce, localisation, experience, degats, membres)
                                VALUES (:nom, :theforce, :localisation, :experience, :degats, :membres)');

        // on assigne les valeurs : nom, force, degats, membres ..
        $q->bindValue(':nom', $perso->getNom());
        $q->bindValue(':theforce', $perso->getForce(), PDO::PARAM_INT);
        $q->bindValue(':localisation', $perso->getLocalisation());
        $q->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);
        $q->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
        $q->bindValue(':membres', $perso->getMembres(), PDO::PARAM_INT);

        // Execution de la requete
        $q->execute();
    }

    public function delete(Personnage $perso){
        // Executer une requete de type delete
        $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->getId());
        // Autre façon moins rapide : un prepare puis un execute
    }

    public function update(Personnage $perso){
        // preparer la requete de mise à jour
        $q = $this->_db->prepare('UPDATE personnages SET nom = :nom, theforce = :theforce, localisation = :localisation, experience = :experience,
         degats = :degats, membres = :membres WHERE id = :id');
                                
        // Assignation des valeurs à la requete
        $q->bindValue(':nom', $perso->getNom());
        $q->bindValue(':theforce', $perso->getForce(), PDO::PARAM_INT);
        $q->bindValue(':localisation', $perso->getLocalisation());
        $q->bindValue(':experience', $perso->getExperience(), PDO::PARAM_INT);
        $q->bindValue(':degats', $perso->getDegats(), PDO::PARAM_INT);
        $q->bindValue(':membres', $perso->getMembres(), PDO::PARAM_INT);
        $q->bindValue(':id', $perso->getId(), PDO::PARAM_INT);

        // Execution de la requete
        $q->execute();
    }

    public function get($id){
        // Executer un SELECT avec un clause WHERE id = $id retournant un personnage
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, nom, theforce, localisation, experience, degats, membres FROM personnages WHERE id ='.$id);

        $data = $q->fetch(PDO::FETCH_ASSOC);

        // return new Personnage($data['id'], $data['nom'], $data['theforce'], $data['localisation'], $data['experience'], $data['degats'], $data['membres']);

        return Personnage::construct2($data);
    }

    public function getList(){
        // SELECT ALL de tous les personnages existants
        $persos = [];
        $q = $this->_db->query('SELECT id, nom, theforce, localisation, experience, degats, membres FROM personnages ORDER BY nom ');

        while($data = $q->fetch(PDO::FETCH_ASSOC)){
            $persos[] = Personnage::construct2($data);
        }

        return $persos;
    }

}