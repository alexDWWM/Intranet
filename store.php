<?php  require_once('components/head.php');
if (empty($_SESSION['user'])){
    header('location:index.php');
}else if(($_SESSION['user']['role'] === 'user')){
    header('location:404.php');
}else{
    $user = $_SESSION['user'];
    $pdv = $_SESSION['point'];  //Get all id from PDV
    $tab = 0; //init veriable for navigate in tab 'departements'
    $user_role = $_SESSION['user']['role'];
};
$staffs = getAllStaff($pdv['id']);
try{
    if(isset($_POST['addStaff']) && !empty($_POST['addStaff'])){
        $firstname = $_POST['firstname'];
        $lastname =$_POST['lastname'];
        $phone =$_POST['phone'];
        $mail =$_POST['mail'];
        $password =$_POST['password'];
        $poste=$_POST['poste'];
        $role =$_POST['role'];
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        addStaff($firstname,$lastname,$phone,$mail,$passwordHash,$poste,$role);
    }else if(isset($_POST['deleteStaff']) && !empty($_POST['deleteStaff'])){
        $firstname=$_POST['nom'];
        $lastname = $_POST['prenom'];
        deleteStaff($firstname, $lastname);
    }
}
catch (Exception $e){
    echo "ERREUR LORS DE L'ENVOI". $e->getMessage();
}
?>


<p>Vous êtes sur le <?php echo $pdv['name'] ?><!--mettre le nom du PDV--></p>
<p><?php echo $user['lastname'] ?></p> 

    <?php if ($user_role ==="admin"){
        $departements = getDepartements($pdv['id']);?>
        <a href="departement.php?id=<?php echo $departements['id']?>"><p><?php echo $departements['name'];?></p></a>
    <?php }else{ 
        $departements = getAllDepartements($pdv['id'])?>
        <?php foreach($departements as $departement){?>
    <a href="departement.php?id=<?php echo $departement['id']?>"><p><?php echo $departements[$tab]['name'];?></p></a>
    <?php $tab= $tab + 1;}//add 1 at each loop for get the following tab?>
<?php }; ?>
<!--Button for open form add staff -->
<button id="addStaff" >Ajouter un employé</button>

    <form action="" method="post" class="addStaff" id="addStaff">
        <h6>AJOUTER UN SALARIE</h6>
        <label for="">nom</label>
            <input type="text" name="firstname" required>
        <label for="">prenom</label>
            <input type="text"name="lastname" required>
        <label for="">tel</label>
            <input type="tel" name="phone" required>
        <label for="">mail</label>
            <input type="email" name="mail" required>
        <label for="">password</label>
            <input type="password" name="password" required>
        <label for="">poste</label>
            <input type="text" name="poste" required>
            <?php if($user_role === 'admin'){?>
                <input type="hidden" name="role" value="user">
            <?php }else{?>
            <select name="role" id="role" required>
                <option value="user">Salarié</option>
                <option value="admin">Chef</option>
            </select>
            <?php } ?>
        <input type="submit" placeholder="submit" name="addStaff">
    </form>
<!-- Button for open form deleteStaff  -->
<button id="deleteStaff">Enlever un Salarié</button>
    <form action="" method="post" class="deleteStaff"> 
        <h6>ENLEVER UN SALARIE</h6>
        <label for="">Nom</label>
            <input type="text" name="nom" required>
        <label for="">Prenom</label>
            <input type="text" name ="prenom">
        <input type="submit" placeholder="Supprimer" name="deleteStaff" required>
    </form>
<!-- get all user in pdv -->
<?php foreach($staffs as $staff){?>
    <div class="containStaff">
        <p>NOM:<?php echo $staff['firstname']?>
        <p>PRENOM:<?php echo $staff['lastname']?>
        <p>EMAIL:<?php echo $staff['mail']?>
        <p>TEL:<?php echo $staff['phone']?>
        <p>POSTE:<?php echo $staff['poste']?>
    </div>
<?php } ?>
<?php require_once('components/footer.php')?>


