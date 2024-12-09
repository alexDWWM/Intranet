<?php  require_once('components/head.php');
if (empty($_SESSION['user'])){
    header('location:loginUser.php');
}else if(($_SESSION['user']['role'] === 'user')){
    header('location:404.php');}