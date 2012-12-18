<?php ob_start() ?>

<form method="post" action="">
    <textarea class="txt" name="titre" rows="2" placeholder="Le titre de la news" required></textarea><br />
    <textarea class="txt" name="contenu" rows="4" placeholder="Le contenu de la news" required></textarea><br />
    
    <select name="categorie">
        <?php foreach ($categories as $categorie): ?>
        <option value="<?= $categorie['CAT_ID'] ?>"><?= $categorie['CAT_NOM'] ?></option>
        <?php endforeach; ?>
    </select>
    
    <p class="centre"><input id="btnAjouter" type="submit" value="Ajouter" /></p>
</form>

<?php $contenu = ob_get_clean() ?>
<?php include 'gabarit.php' ?>
