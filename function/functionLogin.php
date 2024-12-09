<?php 
require_once('connect.php');

function loginUser($email){
    $dbh = dbconnect(); 
    $query = "SELECT mail, password, role, id, lastname FROM user WHERE mail = :mailto";
    $stmt = $dbh -> prepare($query);
    $stmt ->bindParam(':mailto', $email);
    $stmt->execute();
    $result= $stmt ->FETCH(PDO::FETCH_ASSOC);
    return $result;
}

function loginStore($email){
    $dbh = dbconnect(); 
    $query = "SELECT mail, password, id, name FROM pdv WHERE mail = :mailto";
    $stmt = $dbh -> prepare($query);
    $stmt ->bindParam(':mailto', $email);
    $stmt->execute();
    $result= $stmt ->FETCH(PDO::FETCH_ASSOC);
    return $result;
}

function getPdv($user){
    $dbh = dbconnect();
    $query = "SELECT * FROM PDV JOIN user_pdv ON pdv.id = user_pdv.id_pdv 
    WHERE user_pdv.user_id = :userPro";
    $stmt = $dbh -> prepare($query);
    $stmt -> bindParam(':userPro', $user);
    $stmt-> execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $results;
}