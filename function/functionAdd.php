<?php 
function addStaff($firstname,$lastname,$phone,$mail,$password,$poste,$role){
    $dbh = dbconnect();
    $query = "INSERT INTO user(role, poste,firstname,lastname,phone,mail,password )
    VALUES (:role, :poste, :firstname, :lastname, :phone, :mail, :password)";
    $stmt = $dbh -> prepare($query);
    $stmt->bindParam(':role',$role);
    $stmt->bindParam(':poste',$poste);
    $stmt->bindParam(':firstname',$firstname);
    $stmt->bindParam(':lastname',$lastname);
    $stmt->bindParam(':phone',$phone);
    $stmt->bindParam(':mail',$mail);
    $stmt->bindParam(':password',$password);
    $stmt -> execute();
}

function deleteStaff($firstname,$lastname){
    $dbh = dbconnect();
    $query = "DELETE FROM user WHERE firstname = :name AND lastname = :prenom";
    $stmt = $dbh ->prepare($query);
    $stmt->bindParam(':name', $firstname);
    $stmt ->bindParam(':prenom', $lastname);
    $stmt->execute();
}