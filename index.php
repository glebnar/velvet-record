<?php
    include("connection bdd/connection_BDD.php");
    include("controller/loginController.php");
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
                    
                    <?php if(isset( $_SESSION["niveau"]) &&  $_SESSION["niveau"]=="admin") {?>    
                    <a type="button" class="btn btn-dark mt-2 bouton-card col-12" href="modifier.php?disc_id=<?= $row->disc_id ?>">Modifier</a>
                    <form method="post">
                    <input type="submit" class="btn btn-dark mt-2 bouton-card col-12 suppression" name="supprimer" value="supprimer">
                    <input type="input" name="supprimer_id" value=<?= $row->disc_id?> hidden> 
                    <?php } ?>
                    
                    </form>

                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
    include("mep/footer.php");
?>