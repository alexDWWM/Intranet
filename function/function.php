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