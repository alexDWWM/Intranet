<?php 
require_once('connect.php');

function getOnePdv($id){
    $dbh = dbconnect();
    $query ="SELECT id, name, adress, mail, phone, siret FROM pdv WHERE id = :thisPdv";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':thisPdv', $id);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getAllDepartements($id){
    $dbh = dbconnect();
    $query="SELECT * FROM rayon WHERE pdv_id = :pdv";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':pdv', $id);
    $stmt->execute();
    $results = $stmt ->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getDepartements($user){
    $dbh = dbconnect();
    $query="SELECT * FROM rayon WHERE responsable_id = :user";
    $stmt = $dbh->prepare($query);
    $stmt->bindParam(':user', $user);
    $stmt->execute();
    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;
}

// function getStock($dep_id){
//     $dbh = dbconnect();
//     $query="SELECT * FROM stock WHERE stock_id = :dep";
//     $stmt = $dbh->prepare($query);
//     $stmt ->bindParam(':dep', $dep_id);
//     $stmt->execute();
//     $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
//     return $results;

// }
function getSousCategory($CatId){
    $dbh = dbconnect();
    $query = "SELECT * FROM sous_category 
    JOIN cat_sousCat ON cat_sousCat.id_souscat = sous_category.id 
    WHERE cat_sousCat.id_cat = :sous";
    $stmt = $dbh->prepare($query);
    $stmt ->bindParam(':sous', $CatId);
    $stmt->execute();
    $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getCategory($stockId){
    $dbh = dbconnect();
    $query = "SELECT * FROM category 
    JOIN stock ON category.id = stock.category_id
    JOIN  cat_souscat ON cat_souscat.id_cat = category.id
    WHERE stock.id_stock = :sous";
    $stmt = $dbh->prepare($query);
    $stmt ->bindParam(':sous', $stockId);
    $stmt->execute();
    $results= $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
function getStock($rayonId){
    $dbh = dbconnect();
    $query = "SELECT * FROM stock 
    JOIN stockg ON stockg.stock_id = stock.id_stock WHERE stockg.rayon_id = :rayon";
    $stmt = $dbh->prepare($query);
    $stmt ->bindParam(':rayon', $rayonId);
    $stmt->execute();
    $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getRayon($rayonId){
    $dbh = dbconnect();
    $query = "SELECT * FROM rayon 
    JOIN stockg ON stockg.rayon_id = rayon.id
    WHERE stockg.rayon_id = :rayon";
    $stmt = $dbh ->prepare($query);
    $stmt->bindParam(':rayon', $rayonId);
    $stmt ->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}