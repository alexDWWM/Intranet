<?php  require_once('components/redirect.php');
if(empty($_SESSION['point'])){
    header('location:loginStore.php');}
if (($_SESSION['user']) && (isset($_GET['id']))){
        $id = $_GET['id'];
    $id = $_GET['id'];// get ID of departement
    $tab = 0;// init tab for $cat
}

?>
<!--STOCK-->
<p><?php $departement = getRayon($id);//get departement
echo $departement['name']?></p>
<?php  $stocks = getStock($departement['id']);//get stocks by rayonId
foreach($stocks as $stock){?><!--loop all 'stock' who are in 'departement'-->
    <p><?php $category = getCategory($stocks[$tab]['id_stock']);//get category from stock
    echo $category['name'];
    echo $category['quantite_cat'];
    ?></p> 
    <?php $sous_cat = getSousCategory($category['id_cat']);// get sous_category by category
    foreach($sous_cat as $cat){?> <!--loop all 'sous_category' who are in 'category' who are in 'stock'-->
        <?php 
        echo $cat['name'];
        echo $cat['quantite'];
        ?><br> 
    <?php }$tab = $tab + 1;// add 1 to each loop
}?>

<!--AGENDA-->

<!--FOURNISSEUR-->
<?php $fournisseurs = getFournisseur($id);// Get all supplier by departement
foreach($fournisseurs as $fournisseur){?>
    <a href="fournisseur.php?id=<?php echo $fournisseur['id']?>"><p><?php echo $fournisseur['name'];?></p></a>
    <!--FACTURE-->
    <?php $factures =getFactureByFour($fournisseur['id']);//Get all invoice by supplier
    foreach($factures as $facture){
        $dt = new DateTime($facture['date']);?>
        <a href="facture.php?id=<?php echo $facture['id']?>">
            <p>Commande n° :<?php echo $facture['numero']?>:</p>
            <p>Total :<?php echo $facture['total'];' '?>€
            <?php echo $date = $dt->format('j/m/Y') ;?></p>
        </a>
   <?php };
}?>
<!-- Courbe-->
 <div>
<?php 
    $courbe = getCourbe($departement['courbe_id']);
    $cas = getCA($courbe['ca_id']);
    foreach($cas as $ca){ ?>
        <p>CA : <?php echo $ca['ca'],' '?>€</p>
    <?php } ;
    $spends = getSpend($courbe['spend_id']);?>
    <?php foreach($spends as $spend){ ?>
        <p>Dépense : <?php echo $spend['spend'],' ';?>€</p>
    <?php }
?>
</div>