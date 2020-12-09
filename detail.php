<?php
    include("connection bdd/connection_BDD.php");
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

<div class="row pt-3">
    <div class="col-sm"></div>
    <a type="button" class="btn btn-dark bouton-card col-2 mx-1" href="modifier.php?disc_id=<?= $row->disc_id ?>">Modifier</a>
    <a type="button" class="btn btn-dark bouton-card col-2 mx-1" href="script/deleteDisc.php?disc_id=<?= $row->disc_id?>">Supprimer</a>
    <div class="col-sm"></div>
</div>
<?php
    include("mep/footer.php");
?>