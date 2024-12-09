<?php  require_once('components/redirect.php');
if(empty($_SESSION['point'])){
    header('location:loginStore.php');}
if ($_SESSION['user']['role'] === 'admin'){
    $departement = getDepartements($_SESSION['user']['id']);
}else{
    $departement = getAllDepartements($_SESSION['point']['id']);
}
    ?>
    <p><?php echo $departement['name']?></p>

