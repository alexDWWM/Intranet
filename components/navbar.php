<section class="navbar">
    <img src="" alt="logo">
    <a href="index.php"><p>accueil</p></a>
    <?php if(isset($_SESSION) && !empty($_SESSION)){?>
        <a href="logout.php"><button>Se deconnecter</button></a>
        <?php } ?>
</section>