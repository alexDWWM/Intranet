<?php 
    require_once('components/head.php');
    session_destroy();
    header('location:index.php');
?>