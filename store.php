<?php  require_once('components/head.php');
if (empty($_SESSION['user'])){
    header('location:loginUser.php');
}else if(($_SESSION['user']['role'] === 'user')){
    header('location:404.php');
}else{
    $user = $_SESSION['user'];
    $pdv = $_SESSION['point'];  //Get all id from PDV
    $tab = 0; //init veriable for navigate in tab 'departements'
    $user_role = $_SESSION['user']['role'];
    // if(($user_role === 'admin')){
    //     $departements = getDepartements($pdv['id']);
    // }else{
    //     $departements = getAllDepartements($pdv['id']);var_dump($departements);
    // };
?>

<p>Vous êtes sur le <?php echo $pdv['name'] ?><!--mettre le nom du PDV--></p>
<p><?php echo $user['lastname'] ?></p> 

    <?php if ($user_role ==="admin"){
        $departements = getDepartements($pdv['id']);?>
        <a href="departement.php"><p><?php echo $departements['name'];?></p></a>
    <?php }else{ 
        $departements = getAllDepartements($pdv['id'])?>
        <?php foreach($departements as $departement){?>
    <a href="departement.php"><p><?php echo $departements[$tab]['name'];?></p></a>
    <?php $tab= $tab + 1;}//add 1 at each loop for get the following tab?>
<?php };
} ?>