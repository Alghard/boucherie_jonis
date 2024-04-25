<link rel="stylesheet" href="../public/style/admin.css">

<section id="admin-panel">
    <h1>Cest ici que tu vas ajouter/modifier/supprimer tes articles</h1>
    <h2>Taux de TVA actuel : <?php echo $tva ?> %</h2>
    <ul></ul>
    <div class="add-element">
        <form class="form-add" action="admin.php" method="post">
            <fieldset>
                <legend>Ajout Race</legend>
                <input type="text" name="add-race" placeholder="Nom race">
                <input type="submit" name="submitRace" value="Ajouter">
            </fieldset>
        </form>

        <p><?php echo $messageRace ?></p>

        <span>----------------------------------</span>


        <form class="form-add" action="admin.php" method="post">
            <fieldset>
                <legend>Ajout pays d'origine</legend>
                <input type="text" name="add-origine" placeholder="Nom origine">
                <input type="submit" name="submitOrigine" value="Ajouter">
            </fieldset>
        </form>

        <p><?php echo $messageOrigine ?></p>

        <span>----------------------------------</span>

        <form class="form-add" action="admin.php" method="post">
            <fieldset>
                <legend>Ajout type d'article</legend>
                <input type="text" name="add-type" placeholder="Nom type d'article">
                <input type="submit" name="submitType" value="Ajouter">
            </fieldset>
        </form>

        <p><?php echo $messageType ?></p>

        <span>----------------------------------</span>

        <form class="form-add" action="admin.php" method="post">
            <fieldset>
                <legend>Ajout animal</legend>
                <input type="text" name="add-animal" placeholder="Nom animal">
                <label for="sel-origine">Origine</label>
                <select name="sel-origine">
                    <?php echo $optionOri ?>
                </select>
                <label for="sel-race">Race</label>
                <select name="sel-race">
                    <option value="9999">Non définie</option>
                    <?php echo $optionRace ?>
                </select>
                <input type="submit" name="submitAnimal" value="Ajouter">
            </fieldset>
        </form>

        <p><?php echo $messageAnimal ?></p>

        <span>----------------------------------</span>

        <form class="form-add" action="admin.php" method="post">
            <fieldset>
                <legend>Ajout article</legend>
                <input type="text" name="name-article" id="" placeholder="Nom article">
                <input type="text" name="description-article" id="" placeholder="Description article">
                <input type="text" name="prix-unit" id="" step="0.01" placeholder="Prix unitaire">
                <input type="text" name="prix-kg" step="0.01" placeholder="Prix au kg">
                <select name="animal" id="">
                    <?php echo $optionAnimal ?>
                </select>
                <input type="text" name="qty" placeholder="Quantité en gr">
                <?php //foreach ($checkbox_options as $option) {
                    //echo '<input type="checkbox" name="check_list[]" value="'.$option['id_poids'].'">'.$option['valeur_poids'].' gr<br>';}
                ?>
                <input type="submit" name="submitArticle" value="Ajouter">
            </fieldset>
        </form>

        <p><?php echo $messageArticle ?></p>

        <form class="form-add" action="admin.php" method="post">
            <input type="number" name="id-article" placeholder="ID article">
            <br>
            <?php foreach ($checkbox_options as $option) {
                echo '<input type="checkbox" name="check_list[]" value="'.$option['id_poids'].'">'.$option['valeur_poids'].' gr<br>';}
            ?>
            <input type="submit" name="add-poids" value="Ajouter">
        </form>



    </div>
    <div class="liste-article">
        <h3>Liste articles</h3>
        <?php echo $liste_article?>
    </div>
</section>
<section id="admin-commands"></section>