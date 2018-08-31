<?php $this->title = "Ajouter un article"; ?>

<?php if (isset($_SESSION['roleAdmin'], $_SESSION['pseudoAdmin']) && $_SESSION['roleAdmin'] == "admin") : ?>

<?php require_once 'adminNav.php'; ?>

<?php if (isset($_SESSION['flash'])) : ?>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-10 mx-auto">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?=  $_SESSION['flash'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
</div>
<?php endif; unset($_SESSION['flash']); ?>

<div class="container">
    <h4 class="title_center">Ajouter article</h4>
    <div class="row">
        <h4 class="title_center">Ajouter article</h4>
            <form method="post" action="index.php?route=savePost">
                <div class="control-group">
                    <label for="author">Auteur</label>
                    <input type="text" class="form-control" placeholder="" id="author" name="author" value="">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" placeholder="" id="title" name="title" value="">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for subtitle>Sous titre</label>
                    <input type="text" class="form-control" placeholder="" id="subtitle" name="subtitle" value="">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="content">Contenu de l'article</label>
                    <textarea rows="5" class="form-control" placeholder="" id="content" name="content"></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" name="submit" value="send" class="btn btn-primary" id="submit">Ajouter</button>
                    <button type="reset" class="btn btn-danger" id="sendMessageButton">Effacer</button>
                </div>
            </form>

<?php endif; ?>
