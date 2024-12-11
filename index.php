<?php require_once('components/head.php');


?>

<section>
    <h2>Bienvenue sur l'intranet de<!--name business--></h2>
    <?php if (isset($_SESSION['user'])&& !empty($_SESSION['user'])){
        $user = ($_SESSION['user']); ?>
        <h5>Bienvenue <?php echo $user['lastname']?></h5>
    <?php }else{
        require_once('loginUser.php');
     } ?>
</section>
<section>
    <?php if (!empty($_SESSION['point'])){
        require_once('store.php');
    }else if (!empty($_SESSION['user'])){
        require_once('loginStore.php');
        }?>
</section>

<?php require_once('components/footer.php')?>