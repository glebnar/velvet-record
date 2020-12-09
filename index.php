<?php
    include("connection bdd/connection_BDD.php");
    include("controller/indexController.php");
    include("mep/header.php");
?>
<div class="row">
    <?php 
        while ($row = $result->fetch(PDO::FETCH_OBJ))
        {?>
        <div class="col-sm-6">
        <div class="row pt-3 m-1 border" id="card">
                <img class="col-sm-6" src="src/img/<?= $row->disc_picture ?>" alt="<?= $row->disc_picture ?>" title="<?= $row->disc_picture ?>"> 
                <div class="col-sm-6 ">
                    <p class=" h4 font-weight-bold"><?=$row->disc_title?></p>
                    <p class=""><?=$row->artist_name?></p>
                    <a type="button" class="btn btn-dark bouton-card col-12" href="detail.php?disc_id=<?= $row->disc_id?>">Détail</a>
                    <a type="button" class="btn btn-dark mt-2 bouton-card col-12" href="modifier.php?disc_id=<?= $row->disc_id ?>">Modifier</a>
                    <a type="button" class="btn btn-dark mt-2 bouton-card col-12" href="script/deleteDisc.php?disc_id=<?= $row->disc_id?>">Supprimer</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
    include("mep/footer.php");
?>