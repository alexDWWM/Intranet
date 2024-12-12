<?php 
require_once('components/head.php');
$pdvs = getPdv($_SESSION['user']['id']);
if (empty($_SESSION['user'])){
    header('location:index.php');
}else if(($_SESSION['user']['role'] === 'user')){
    header('location:404.php');
}else{
if(isset($_POST) && !empty($_POST)){
    $email = $_POST['mail'];
    $password = $_POST['password'];
    $id = $_POST['pdvId'];
    $pdv = loginStore($email);
    if($pdv){
        $registered_password = $pdv['password'];
        $isCredentialsOK = password_verify($password, $registered_password);
        if($isCredentialsOK){
            session_start();
            $_SESSION['point'] = [
                'id' =>$pdv['id'],
                'mail'=>$pdv['mail'],
                'name'=> $pdv['name'],
            ];
            header('location:store.php');
        }else{
            echo 'mauvais identifiant ou mauvais mot de passe';
        }
    }else{
        echo 'mauvais identifiant ou mauvais mot de passe';
    }
}


    // do not specify the wrong credantial for not to facilitate attacks
?>
<section class="loginStore-foreach">
<?php foreach($pdvs as $pdv){ ?>
    <section class="contain-log-pdv" style="width:20%">
        <img src="uploads/ressources/<?php echo $pdv['image']?>"alt="<?php echo $pdv['image']?>">
        <h2 class="log-pdv"><?php echo $pdv['name'];?> </h2>
        <form action="" method="post" class="form-log-pdv">
            <input type="hidden" name="pdvId" value="<?php echo $pdv['id']?>">
            <input type="email" placeholder="email" name=mail>
            <input type="password" placeholder="password" name="password">
            <input type="submit" value="Connexion" class="btnSub">
        </form>    
    </section>
<?php } ?>
</section>
<!--when Admin is connect redirect to page on his departement-->
<!--when superAdmin is connect redirect to page where he got all the departement
or if he got several store, he got a choice in input select with all his store -->
<?php require_once('components/footer.php');}?>