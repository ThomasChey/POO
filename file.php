<?php

function chargerClass($classe)
{
    require $classe . '.php';
}
spl_autoload_register('chargerClass');

// 1 - J'instancie ma BDD : connexion
$db = new PDO('mysql:host=localhost;dbname=phpoo', 'root', '');
// 2 - Pour faire mes opérations CRUD : j'appelle PersonnagesManager
$manager = new PersonnagesManager($db);

if(!empty($_POST)){
    $my_id = $_POST['mock'];

    $manager->delete($manager->get($my_id));
}

?>






