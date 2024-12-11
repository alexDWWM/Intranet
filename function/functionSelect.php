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

function getFournisseur($rayonId){
    $dbh = dbconnect();
    $query = "SELECT * FROM fournisseur 
    JOIN rayon_fournisseur ON rayon_fournisseur.id_fournisseur = fournisseur.id 
    WHERE rayon_fournisseur.id_rayon = :rayon";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':rayon', $rayonId);
    $stmt -> execute();
    $results = $stmt-> fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
function getFournisseurById($id){
    $dbh = dbconnect();
    $query = "SELECT * FROM fournisseur JOIN facture ON facture.fournisseur = fournisseur.id 
    WHERE fournisseur.id = :id";
    $stmt = $dbh->prepare($query);
    $stmt -> bindParam(':id', $id);
    $stmt -> execute();
    $result = $stmt-> fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getFactureByFour($fourID){
    $dbh = dbconnect();
    $query="SELECT * FROM facture JOIN fournisseur ON facture.fournisseur = fournisseur.id 
    WHERE facture.fournisseur = :fourId ORDER BY date DESC";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindParam(':fourId', $fourID);
    $stmt -> execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
function getFournByFact($factID){
    $dbh = dbconnect();
    $query="SELECT * FROM fournisseur JOIN facture ON facture.fournisseur = fournisseur.id 
    WHERE facture.fournisseur = :factId";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindParam(':factId', $factID);
    $stmt -> execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
function getCA($ca){
    $dbh = dbconnect();
    $query="SELECT * FROM ca JOIN courbe ON courbe.ca_id = ca.id 
    WHERE ca.id = :c"; 
    $stmt = $dbh -> prepare($query);
    $stmt ->bindParam(':c', $ca);
    $stmt -> execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}

function getCourbe($rayonCourbeId){
    $dbh = dbconnect();
    $query="SELECT * FROM courbe JOIN rayon ON rayon.courbe_id = courbe.id   
    WHERE courbe.id = :rayonCourbeId";
    $stmt = $dbh -> prepare($query);
    $stmt-> bindParam(':rayonCourbeId', $rayonCourbeId);
    $stmt -> execute();
    $results = $stmt->fetch(PDO::FETCH_ASSOC);
    return $results;
}
function getSpend($courbeSpendId){
    $dbh =dbconnect();
    $query ="SELECT * FROM spend JOIN courbe ON courbe.spend_id = spend.id
    WHERE spend.id = :c";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindParam(':c', $courbeSpendId);
    $stmt ->execute();
    $results = $stmt ->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}
function getFacture($id){
    $dbh =dbconnect();
    $query ="SELECT * FROM facture WHERE facture.id_facture = :i";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindParam(':i', $id);
    $stmt ->execute();
    $result = $stmt ->fetch(PDO::FETCH_ASSOC);
    return $result;
}
