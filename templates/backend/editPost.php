<?php $this->title = "Modifier un article" ?>

<?php if (isset($_SESSION['roleAdmin'], $_SESSION['pseudoAdmin']) && $_SESSION['roleAdmin'] == "admin") { ?>

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
    <h4 class="title_center">Modifier article</h4>
    <div class="row">
        <div class="col-lg-6 col-md-10 mx-auto">
            <form action="" method="post">
                <div class="control-group">
                    <label for="author">Auteur</label>
                    <input type="text" class="form-control" name="author" value="<?=$this->check($post->getAuthor())?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" name="title" value="<?=$this->check($post->getTitle())?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="subtitle">Sous titre</label>
                    <input type="text" class="form-control" name="subtitle" value="<?=$this->check($post->getSubtitle())?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="content">Contenu de l'article</label>
                    <textarea rows="5" class="form-control" name="content"><?=$this->check($post->getContent())?></textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <br>
                <div class="form-group">
                    <input type="hidden" name="id" value="<?=$this->check($post->getId())?>" />
                    <button type="submit" name="submit" value="send" class="btn btn-primary">Modifier l'article</button>
                </div>
            </form>

<?php } else {
    echo'<p class="title_center">
    <a href="../admin"><button type="button" class="btn btn-success">Se connecter</button></a>
</p>';
} ?>
