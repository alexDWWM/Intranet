<?php require_once('components/head.php');

if(isset($_POST) && !empty($_POST)){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = loginUser($email);
    if($user){
        $registered_password = $user['password'];
        $isCredentialsOK = password_verify($password, $registered_password);
        if($isCredentialsOK){
            session_start();
            $_SESSION['user'] = [
                'id' =>$user['id'],
                'email'=>$user['mail'],
                'role'=>$user['role'],
                'lastname'=>$user['lastname'],
            ];
            
            if($_SESSION['user']['role'] === 'user'){
                header('location:staff.php'); 
            }else{
                header('location:loginStore.php');
            }
        }else{
            echo 'mauvais identifiant ou mauvais mot de passe';
        }
    }else{
        echo 'mauvais identifiant ou mauvais mot de passe';
    }
}
    // do not specify the wrong credantial for not to facilitate attacks

?>
<!-- connection for all users-->
<section>
    <form action="" method="post">
        <input type="mail" placeholder="email" name=email>
        <input type="password" placeholder="password" name="password">
        <input type="submit" value="Connexion" class="btnSub">
    </form>    
</section>
<!--if user get role='superAdmin' or role='Admin', redirect to page 'loginPDV'-->
<!--if user get role='user', redirect to page 'staff'-->
<?php require_once('components/footer.php')?>