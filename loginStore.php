<?php 
require_once('components/head.php');
$pdvs = getPdv($_SESSION['user']['id']);
if (empty($_SESSION['user'])){
    header('location:loginUser.php');
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
<?php foreach($pdvs as $pdv){
    echo $pdv['name'];?>
    <section>
    <form action="" method="post">
        <input type="hidden" name="pdvId" value="<?php echo $pdv['id']?>">
        <input type="email" placeholder="email" name=mail>
        <input type="password" placeholder="password" name="password">
        <input type="submit" value="Connexion" class="btnSub">
    </form>    
</section>
<?php } ?>
<!--when Admin is connect redirect to page on his departement-->
<!--when superAdmin is connect redirect to page where he got all the departement
or if he got several store, he got a choice in input select with all his store -->
<?php require_once('components/footer.php');}?>