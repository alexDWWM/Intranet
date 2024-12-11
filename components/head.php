<!-- take all the function for all page and start the session -->
<?php 

require_once('function/functionSelect.php');
require_once('function/functionLogin.php');

session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Intranet</title>
</head>
<body>
<!-- put navbar on all page -->
<?php require_once('navbar.php');   
