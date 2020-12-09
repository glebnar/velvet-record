<?php
    include("connection bdd/connection_BDD.php");
    include("controller/ajoutController.php");
    include("mep/header.php");
?>
<div class=" form-group">
    <label for="disc_title">Titre</label>
    <input type="text" class="form-control" name="disc_title" id="disc_title" value="">
</div>
<div class=" form-group">
    <label for="artist_name">Artiste</label>
    <select  class="form-control" name="artist_name" id="artist_name">
        <?php 
        while ($row2 = $resultArtist->fetch(PDO::FETCH_OBJ))
        {?>
                <option value="<?= $row2->artist_id ?>"><?= $row2->artist_name ?> </option>
        <?php } ?>

    </select>
</div>
<div class=" form-group">
    <label for="disc_year">Année</label>
    <input type="text" class="form-control" name="disc_year" id="disc_year" value="">
</div>
<div class=" form-group">
    <label for="disc_label">Label</label>
    <input type="text" class="form-control" name="disc_label" id="disc_label" value="">
</div>
<div class=" form-group">
    <label for="disc_genre">Genre</label>
    <input type="text" class="form-control" name="disc_genre" id="disc_genre" value="">
</div>
<div class=" form-group">
    <label for="disc_price">Prix</label>
    <input type="number" step="0.01" class="form-control" name="disc_price" id="disc_price" value="">
</div>
<div class=" form-group">
    <label for=""></label>
</div>
<div class="form-group">
    <div class="row">
        <label for="disc_picture">Jaquette</label>
        <input type="file" name="disc_picture" id="disc_picture"  onchange="loadImg(event)"> 
        <img id="frame"  width="100px" height="auto" />    </div>
</div>  
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
        <button class="btn btn-dark bouton-card">valider</button>
        <a class="btn btn-dark bouton-card" href="#">annuler</a>
    </div>
    <div class="col-4"></div>
</div>
<?php
    include("mep/footer.php");
?>