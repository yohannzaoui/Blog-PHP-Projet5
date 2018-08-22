<?php $this->title = "Modifier un article" ?>

<?php require_once 'adminNav.php'; ?>
<div class="container">
    <h3 class="title_center">Modifier article</h3>
    <div class="row">
        <div class="col-lg-6 col-md-10 mx-auto">
            <form action="../index.php?route=updatePost" method="post">
                <div class="control-group">
                    <label for="author">Auteur</label>
                    <input type="text" class="form-control" id="author" name="author" value="<?=$post->getAuthor()?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?=$post->getTitle()?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="subtitle">Sous titre</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?=$post->getSubtitle()?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="content">Contenu de l'article</label>
                    <textarea rows="5" class="form-control" id="content" name="content">
                    <?=$post->getContent()?>
                    </textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                <input type="hidden" name="id" value="<?= htmlspecialchars($post->getId()) ?>" />
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Modifier l'article</button>
                </div>
            </form>