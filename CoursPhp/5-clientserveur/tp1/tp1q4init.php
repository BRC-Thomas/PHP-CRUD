<?php
session_start();
require_once '../../4-accesDonnees/tp1/tp1cnx.php';

$enregistrer = filter_input(INPUT_POST, 'Enregistrer', FILTER_DEFAULT);
if ($enregistrer) {
    // Récupération du modèle s'il existe ou création de celui-ci sinon
    $reqM = $pdo->prepare('SELECT id_modele FROM modeles ' .
        'WHERE marque = :mar AND modele = :mod AND carburant = :car');
    $reqM->bindValue(':mar', filter_input(INPUT_POST, 'Marque',
            FILTER_DEFAULT));
    $reqM->bindValue(':mod', filter_input(INPUT_POST, 'Modle',
            FILTER_DEFAULT));
    $reqM->bindValue(':car', filter_input(INPUT_POST, 'Carb',
            FILTER_DEFAULT));
    $reqM->execute();
    if ($reqM->rowCount() === 0) {
        $reqM2 = $pdo->prepare('INSERT INTO modeles'
                . '(id_modele, marque, modele, carburant) '
                . 'VALUES(:id_modele, :marque, :modele, :carburant);');
        $marque = filter_input(INPUT_POST, 'Marque', FILTER_DEFAULT);
        $modele = filter_input(INPUT_POST, 'Modle',FILTER_DEFAULT);
        $carb = filter_input(INPUT_POST, 'Carb', FILTER_DEFAULT);
        $idModele = strtoupper(substr($marque, 0, 3).'_'.substr($modele, 0, 3).
                '_'. substr($carb, 0, 2));
        $reqM2->bindValue(':id_modele', $idModele);
        $reqM2->bindValue(':marque', $marque);
        $reqM2->bindValue(':modele', $modele);
        $reqM2->bindValue(':carburant', $carb);
        $reqM2->execute();
        $reqM2->closeCursor();
    } else {
        $idModele = $reqM->fetch()['id_modele'];
    }
    $reqM->closeCursor();

    // Création de la voiture
    $reqV = $pdo->prepare('INSERT INTO voitures(immat, id_modele, datevoiture) '
            . 'VALUES(:immat, :id_modele, :date);');
    $immat = filter_input(INPUT_POST, 'Immat', FILTER_DEFAULT);
    $date = preg_replace('#^(\d{1,2})/(\d{1,2})/(\d{4})$#', '$3-$2-$1',
            filter_input(INPUT_POST, 'Date', FILTER_DEFAULT));
    $reqV->bindValue(':immat', $immat);
    $reqV->bindValue(':id_modele', $idModele);
    $reqV->bindValue(':date', $date);
    $reqV->execute();
    $reqV->closeCursor();

    // Création de la carte grise
    $reqC = $pdo->prepare('INSERT INTO cartesgrises(id_pers, immat, datecarte) '
            . 'VALUES(:id_pers, :immat, :date)');
    $reqC->bindValue(':id_pers', $_SESSION['id_pers']);
    $reqC->bindValue(':immat', $immat);
    $reqC->bindValue(':date', date('o-m-d'));
    $reqC->execute();
    $reqC->closeCursor();
}
