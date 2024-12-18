<?php  
require_once('components/redirect.php');
if(empty($_SESSION['point'])){
    header('location:loginStore.php');}
if (($_SESSION['user']) && ($_GET['id'])){
    $id = $_GET['id'];
    $fournisseur = getFournisseurById($id);
    $factures = getFactureByFour($id);
}?>
<h1><?php echo $fournisseur['name']?></h1>
<p>ADRS:<?php echo $fournisseur['adress'];?></p>
<p>TEL:<?php echo $fournisseur['phone'];?></p>
<p>MAIL:<?php echo $fournisseur['mail'];?></p>
<p>SIRET:<?php echo $fournisseur['siret'];?></p>

<?php foreach($factures as $fact){
    $dt = new DateTime($fact['date'])?>
    <a href="facture.php?id=<?php echo $fact['id_facture']?>">
        <p>Facture n° :<?php echo $fact['numero'];?></p></a>
        <button id="voirFacture">Voir Facture</button>
        <img src="uploads/<?php echo $fact['image']?>" class="img-fact"
            alt="img_facture n° : <?php echo $fact['numero']?>" width="100%">
        <p><?php echo $fact['total'],' ';?>€</p>
        <p><?php echo $date = $dt->format('j/m/Y');?></p>
<?php } 
require_once('components/footer.php')?>