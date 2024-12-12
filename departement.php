<?php  require_once('components/redirect.php');
if(empty($_SESSION['point'])){
    header('location:loginStore.php');}
if (($_SESSION['user']) && (isset($_GET['id']))){
        $id = $_GET['id'];
    $id = $_GET['id'];// get ID of departement
    $tab = 0;// init tab for $cat
}
if(isset($_POST) && !empty($_POST)){
    $numero = $_POST['numero'];
    $fournisseurID = $_POST['fournisseur'];
    $total = $_POST['total'];
    $date = $_POST['date'];
    if(isset($_FILES) && !empty($_FILES)){// get the (POST -> FILE)
        $tmpName = $_FILES['file']['tmp_name'];
        $name = $_FILES['file']['name'];
        $size = $_FILES['file']['size'];
        $error = $_FILES['file']['error'];
            $tabExtension = explode('.',$name);
            $extension = strtolower(end($tabExtension));//get type of file
            $uniqueName = uniqid('', true);// get unique name for the file
            $file = $uniqueName.".".$extension;//concatenation with extension of file
            $extensionsAvaible = ['jpeg','png', 'jpeg', 'jpg'];
            $maxSize = 400000;
            if(in_array($extension, $extensionsAvaible)){
                if($size <= $maxSize && $error == 0){
                    move_uploaded_file($tmpName, './uploads/invoices/'.$file);// move file in folder
                }else{
                    echo "Trop Volumineux";}
            }else{
                echo "Mauvaise Extension";
            }           
        }addFacture($date, $numero,$file,$total,$fournisseurID);
    echo 'Enregistrer';
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
        <div class="containStaff">
        <a href="facture.php?id=<?php echo $facture['id_facture'];?>">
            <p>Commande n° :<?php echo $facture['numero']?>:</p>
            <p>Total :<?php echo $facture['total'];' '?>€
            <?php echo $date = $dt->format('j/m/Y') ;?></p>
        </a></div>
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
<!-- add invoices -->
 <form action="" method="post" enctype="multipart/form-data">
    <label for="">Numéro de facture</label>
        <input type="text" name="numero">
    <label for="">Total:</label>
        <input type="text" name="total">
    <label for="">Facture</label>
        <input type="file" name="file">
    <label for="">Fournisseur</label>
        <select name="fournisseur" id="fournisseur">
            <?php foreach($fournisseurs as $fournisseur){?>
                <option value="<?php echo $fournisseur['id']?>"><?php echo $fournisseur['name'] ?></option>
            <?php } ?>
        </select>
    <input type="hidden" name="date" value="<?php echo date("Y-m-d H:i:s")?>">
    <input type="submit" placeholder="Enregistrer">
 </form>
</div>