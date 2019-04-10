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

$query = $db->query('SELECT * FROM personnages');

$datas = $query->fetchAll();

$nom = null;
$force = null;
$localisation = null;
$experience = null;
$degats = null;
$membres = null;

if (!empty($_POST)) {

    $nom = $_POST['nom'];
    $theforce = $_POST['theforce'];
    $localisation = $_POST['localisation'];
    $experience = $_POST['experience'];
    $degats = $_POST['degats'];
    $membres = $_POST['membres'];

    // var_dump($_POST);

    $persoX = new Personnage(1, $_POST['nom'], $_POST['theforce'], $_POST['localisation'], $_POST['experience'], $_POST['degats'], $_POST['membres']);

    $manager->add($persoX);
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulaire Personnage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row p-3">
        <div class="col-md-9 mx-auto bg-info">
            <h1 class="text-center p-4">Ajouter/Supprimer Personnage</h1>

            <form method="post" class="p-4">
                <!------ Nom ------>
                <div class="form-group">
                    <input type="text" class="form-control" name="nom" placeholder="Nom du Personnage">
                </div>

                <!------ Force ------>
                <div class="form-group">

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="theforce" class="custom-control-input"
                               value="20" checked>
                        <label class="custom-control-label" for="customRadioInline1">Force Petite</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="theforce" class="custom-control-input"
                               value="50">
                        <label class="custom-control-label" for="customRadioInline2">Force Moyenne</label>
                    </div>

                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="theforce" class="custom-control-input"
                               value="90">
                        <label class="custom-control-label" for="customRadioInline3">Force Grande</label>
                    </div>

                </div>

                <!------ Localisation ------>
                <div class="form-group">
                    <input type="text" class="form-control" name="localisation"
                           placeholder="Localisation du Personnage">
                </div>

                <!------ Experience ------>
                <div class="form-group">
                    <input type="number" class="form-control" name="experience" placeholder="Experience du Personnage">
                </div>

                <!------ Degats ------>
                <div class="form-group">
                    <input type="number" class="form-control" name="degats" placeholder="Degats du Personnage">
                </div>

                <!------ Membres ------>
                <div class="form-group">
                    <input type="number" class="form-control" name="membres"
                           placeholder="Nombre de membres du Personnage">
                </div>

                <!------ Button ------>
                <button class="btn btn-block btn-dark" type="submit">Créer Personnage</button>
            </form>

        </div> <!-- ./col-md-8 -->
    </div> <!-- ./row -->

    <div class="row">
        <div class="col-md-8 offset-2 p-2">
            <table class="table mt-4">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Force</th>
                    <th scope="col">Localisation</th>
                    <th scope="col">Experience</th>
                    <th scope="col">Degats</th>
                    <th scope="col">Membres</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($datas as $data) { ?>
                    <tr>
                        <th scope="row"><?= $data['id'] ?></th>
                        <td><?= $data['nom'] ?></td>
                        <td><?= $data['theforce'] ?></td>
                        <td><?= $data['localisation'] ?></td>
                        <td><?= $data['experience'] ?></td>
                        <td><?= $data['degats'] ?></td>
                        <td><?= $data['membres'] ?></td>
                        <td>
                            <form method="post" action="file.php">
                                <input  name="mock" value="<?= $data['id'] ?>" hidden />
                                 <input type="submit" class="btn btn-danger" />
                            </form>
                        </td>
                    </tr>
                <?php } // Fin du foreach de $datas
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div> <!-- ./container -->

</body>
</html>