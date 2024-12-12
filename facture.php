<?php  
require_once('components/redirect.php');
if(empty($_SESSION['point'])){
    header('location:loginStore.php');}
if (($_SESSION['user']) && ($_GET['id'])){
    $id= $_GET['id'];
    $facture = getFacture($id);
    $fournisseur = getFournByFact($facture['fournisseur']);
    $allFactures = getFactureByFour($fournisseur['fournisseur']);
}?>
<div class="facture">
    <h3>Facture n° : <?php echo $facture['numero']?></h3>
    <h4><a href="fournisseur.php?id=<?php echo $fournisseur['id']?>">
        <?php echo $fournisseur['name']?></h4></a>
    <!--faire une modal pour afficher toutes les données du fournisseur-->
    <img src="uploads/invoices/<?php echo $facture['image']?>" alt="facture n° : <?php echo $facture['numero']?>" width="100%">
    <h5>Total: <?php echo $facture['total'],' ';?>€</h5>
    <a href="fournisseur.php?id=<?php echo $fournisseur['id']?>"><p>Voir toutes les factures de ce fournisseur</p></a>
</div>
