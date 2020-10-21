<?php
$connect = new PDO('mysql:host=localhost;dbname=cour_bootstrap','root','');

$pdoStat = $connect->query("SELECT * FROM pays");

$pays = $pdoStat->fetchAll();

if (isset($_GET['pays'])){



    $capital = $_GET['pays'] ;
    if($capital == 'Paris'){
        $result = "$capital est la capital de la France ";
    }
    elseif($capital == 'Berlin'){
        $result =  "$capital est la capital de l'Allemagne";
    }
    elseif($capital == 'Londre'){
        $result = "$capital est la capital de l'Angleterre";
    }
}
//$var->bindParam();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>ESPACE NATURE</title>
    </head>
    <body style="background-color:#f1f6f9" >

        <div class="container text-center">
            <?php if (isset($result)): ?>

            <h1><?= $result?></h1>

            <?php endif; ?>
                <label class="" for="" >Quel est votre pays ?</label>
                <form method="GET" action="pays.php">
                    <div class="s d-flex align-items-center">
                        <select  class="form-control " name="pays" >
                            <?php foreach ($pays as $list): ?>
                            <option name="<?php $list['capital'] ?>" > <?= $list['capital'] ?> </option>
                            <?php endforeach ?>
                        </select> 
                    </div> 
                    <button type="submit" class="btn btn-secondary">Envoyer</button>
                </form>
            </div>
    </body>
</html>