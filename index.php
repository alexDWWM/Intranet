<?php require_once('components/head.php');


?>
<section>
    <?php if (!empty($_SESSION['point'])){
        header('location:store.php');
    }else if ((!empty($_SESSION['user'])) && (empty($_SESSION['point']))){
        if(($_SESSION['user']['role'] === 'admin') OR ($_SESSION['user']['role'] === 'admin')){
        header('location:loginStore.php');
        }else{
            
        }
    }?>
</section>
<section>
    <h2>Bienvenue sur l'intranet de<!--name business--></h2>
    <?php if (isset($_SESSION['user'])&& !empty($_SESSION['user'])){
        $user = ($_SESSION['user']); ?>
        <h5>Bienvenue <?php echo $user['lastname']?></h5>
    <?php }else{
        require_once('loginUser.php');
     } ?>
</section>


<?php require_once('components/footer.php')?>