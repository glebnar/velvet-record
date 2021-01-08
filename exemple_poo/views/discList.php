<?php
include '../controllers/discListController.php';
include 'header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col s1 offset-s11">
                <a href="addDisc.php" title="Ajout d'un disque" class="waves-effect waves-light btn">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <table class="highlight centered responsive-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Année</th>
                        <th>Jaquette</th>
                        <th>Label</th>
                        <th>Genre</th>
                        <th>Prix</th>
                        <th>Artiste</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // boucle permettant d'afficher la liste des disques (tableaux d'objet)
                    foreach ($list as $disc) {
                        ?>
                        <tr>
                            <td><?= $disc->disc_id ?></td>
                            <td><?= $disc->disc_title ?></td>
                            <td><?= $disc->disc_year ?></td>
                            <td>
                                <img src="../assets/img/<?= $disc->disc_picture ?>" class="circle responsive-img" alt="Jaquette de l'album <?= $disc->disc_title ?>" title="Jaquette de l'album <?= $disc->disc_title ?>">
                            </td>
                            <td><?= $disc->disc_label ?></td>
                            <td><?= $disc->disc_genre ?></td>
                            <td><?= $disc->disc_price ?></td>
                            <td><?= $disc->artist_id ?></td>
                            <td> 
                                <form  action="#" method="post">
                                    <input type="text" name="delete_disc" value="<?=$disc->disc_id?> " hidden>
                                    <button type="submit" name="delete_submit" class="waves-effect waves-light btn">
                                        <i class="material-icons">remove</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
include 'footer.php';

