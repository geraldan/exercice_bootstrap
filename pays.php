<?php
//Je me connecte a ma base de donnée
$connect = new PDO('mysql:host=localhost;dbname=cour_bootstrap','root','',[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //indique les erreures
    ]);

$pdoStat = $connect->query("SELECT * FROM pays");  //dans la base de donnée on va selectionner ( c'est le select ) tout les donner du tableau avec etoile ( l'etoile celectionne tout les données du tableau sans ciblé de donné ) provenant (FROM) du tableau appelé “nom_du_tableau” (la on cible le paneaux)

$pays = $pdoStat->fetchAll();
// le get envois les information dans la base de donnée et le isset recupaire c'est donné et les affiche ex si dans lurl il y a pays=pays tu executes ce qui suis
if (isset($_GET['pays'])) {
    $cap = $_GET['pays'];
    $sql = $connect->prepare("SELECT Pays FROM pays WHERE capital = :capital"); //le SELECT ... indique la colone et le from lui indique la table ( tableau ) where une condition qui trouve une ou des valeurs dans une colone spécifique ( un des capitale est le tableaux et l'autre represente le get )
    $sql->bindParam(":capital", $cap);
    $sql->execute();                                           // c'est la commande qui execute
    $pay = $sql->fetch();
    echo "Le pays " . $pay['Pays'] . " a pour capital $cap";  // le echo affiche ce qu'il y a dans la table le pays puis la ville
    }
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
                <form method="GET" action="pays.php">                                                   //création d'un  formulaire avec la methode get
                    <div class="s d-flex align-items-center">
                        <select  class="form-control " name="pays" >
                            <?php foreach ($pays as $list): ?>                                         // creation d'une boucle pour le menu deroulant
                            <option name="<?= $list['capital'] ?>" > <?= $list['capital'] ?> </option> // fabrication du get
                            <?php endforeach ?>
                        </select> 
                    </div> 
                    <button type="submit" class="btn btn-secondary">Envoyer</button> //envoie du get dans l'url (boutton)
                </form>
            </div>
    </body>
</html>