<?php
    include("connection bdd/connection_BDD.php");
    include("controller/loginController.php");
    include("controller/detailController.php");
    include("mep/header.php");
?>
<div class="row pt-3">
    <div class= "col-6">
        <img class="img-fluid" src="src/img/<?= $row->disc_picture ?>" alt="<?= $row->disc_picture ?>" title="<?= $row->disc_picture ?>"> 
    </div>
    <div class="col-6">
        <div class="row">
            <div class="bold col-2">
                <p class="h4">Titre:</p>
            </div>
            <div class="col-auto">
                <p><?= $row->disc_title ?></p>
            </div>
            <div class="w-100"></div>
            <div class="bold col-2">
                <p class="h4">Artiste:</p>
            </div>
            <div class="col-auto">
                <p><?= $row->artist_name ?> (<?= $row->disc_year?>)</p>
            </div>
            <div class="w-100"></div>
            <div class="bold col-2">
                <p class="h4">Genre:</p>
            </div>
            <div class="col-auto">
                <p><?= $row->disc_genre ?></p>
            </div>
            <div class="w-100"></div>
            <div class="bold col-2">
                <p class="h4">Label:</p>
            </div>
            <div class="col-auto">
                <p><?= $row->disc_label ?></p>
            </div>
        </div>
    </div>



</div>
<div class="row pt-3">
    <div class="col-sm"></div>
    <p class=" h3 col-sm"><?= $row->disc_price ?>€</p>
    <div class="col-sm"></div>
</div>
<?php if(isset( $_SESSION["niveau"]) &&  $_SESSION["niveau"]=="admin") {?>    
    <div class="row pt-3">
        <div class="col-sm"></div>
        <form method="post" class="col-sm mx-1">
        <a type="button" class="btn btn-dark bouton-card  mx-1" href="modifier.php?disc_id=<?= $row->disc_id ?>">Modifier</a>
            <input type="submit" class="btn btn-dark bouton-card  suppression" name="supprimer" value="supprimer">
            <input type="input" name="supprimer_id" value=<?= $row->disc_id?> hidden> 
        </form>
        <div class="col-sm"></div>
    </div>
<?php } ?>
   
<?php
    include("mep/footer.php");
?>