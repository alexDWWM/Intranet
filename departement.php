<?php  require_once('components/redirect.php');
if(empty($_SESSION['point'])){
    header('location:loginStore.php');}
if (($_SESSION['user']) && (isset($_GET['id']))){
        $id = $_GET['id'];
    $id = $_GET['id'];// get ID of departement
    $tab = 0;// init tab for $cat
   }

    ?>
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

