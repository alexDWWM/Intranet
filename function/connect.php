<?php 
function dbconnect(){
    try{
        $dbh = new PDO('mysql:host=localhost;dbname=intranet', 'root', '');
        return $dbh;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>