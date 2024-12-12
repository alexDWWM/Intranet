<?php require_once('function/functionSelect.php');
?>
    <section class="navbar">
    
        <div class="nav">
            <img src="pngegg.png" alt="logo" width="5%">
            <a href="index.php">accueil</a>
            <a href="staff.php">Mon Espace</a>
                <!--Link for Departement(s)-->
            <?php 
            if (isset($_SESSION['point']) && !empty($_SESSION['user'])){
                $user = $_SESSION['user'];
                $pdv = $_SESSION['point'];
                $tab = 0; 
                $user_role = $_SESSION['user']['role'];  
                if ($user_role ==="admin"){
                    $departements = getDepartements($pdv['id']);?>
                    <a href="departement.php?id=<?php echo $departements['id']?>"><p style="margin-top:1%"><?php echo $departements['name'];?></p></a>
                <?php }else{ 
                    $departements = getAllDepartements($pdv['id'])?>
                    <?php foreach($departements as $departement){?>
                <a href="departement.php?id=<?php echo $departement['id']?>"><p style="margin-top:1%"><?php echo $departements[$tab]['name'];?></p></a>
                <?php $tab= $tab + 1;}
                };
            }?>
        </div>
        <div class="connexion-navbar">
        <?php if(!empty($_SESSION['point'])){?>
            <a href="store.php"><p>store</p></a>
            <?php }else if(empty($_SESSION['point'])&&(!empty($_SESSION['user']))){
                if($_SESSION['user']['role'] === 'user'){
                }else{?>
                    <a href="loginStore.php">Connexion PDV</a>
                <?php };
            }else{ ?>
                <a href="loginStore.php">Connexion</a>
            <?php }?>
            
            
            <?php if(isset($_SESSION) && !empty($_SESSION)){?>
                <a href="logout.php">Se deconnecter</a>
            <?php } ?>
        </div>
    </section>
<section class="container">