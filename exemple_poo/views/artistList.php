<?php
include '../controllers/artistListController.php';
include 'header.php';
?>
    <div class="container">
    <div class="row">
            <div class="col s1 offset-s11">
                <a href="addArtist.php" title="Ajout d'un artiste" class="waves-effect waves-light btn">
                    <i class="material-icons">add</i>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <table class="highlight centered responsive-table">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>URL</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // boucle permettant d'afficher la liste des disques (tableaux d'objet)
                    foreach ($artList as $artist) {
                        ?>
                        <tr>
                            <td><?= $artist->artist_name ?></td>
                            <td><?= $artist->artist_url ?></td>
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