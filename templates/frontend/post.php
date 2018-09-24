<?php $this->title = "Blog Yohann Zaoui - " . $this->check($post->getTitle()); ?>

<?php if (isset($_SESSION['flash'])) : ?>
<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?=  $_SESSION['flash'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php endif; unset($_SESSION['flash']); ?>

<div class="container">
  <div class="alert alert-primary" role="alert">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <div class="post-preview">
            <a><h2 class="post-title">
                <?=$this->check($post->getTitle())?>
            </h2>
            <h4 class="post-subtitle">
              <?=$this->check($post->getSubtitle())?>
          </h4></a>
          <p>
            <?=$this->check($post->getContent())?>
          </p>
          <p class="post-meta">
            <?php echo 'Ecrit par '.$post->getAuthor().' le '.$post->getCreationDate(); if ($post->getUpdateDate() != null) {echo " -- Modifié le ". $post->getUpdateDate();} ?>
          </p>
          <small><p>
              Partagez l'article : <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
          </p></small>
          <p>
            <small>
              <a href="/allPosts">Retour à la liste d'articles</a>
            </small>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php if (isset($_SESSION['roleUser'], $_SESSION['pseudoUser']) && $_SESSION['roleUser'] == "member") { ?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <h2 class="title_center">Ecrire un commentaire</h2>
      <form action="" method="post">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="pseudo">Auteur</label>
            <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo" value="<?php if (isset($_SESSION['pseudoUser'])) {
            echo $_SESSION['pseudoUser'];
        } ?>" id="pseudo" required data-validation-required-message="SVP Entrez votre pseudo.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label for="message">Commentaire</label>
            <textarea rows="5" class="form-control" name="content" placeholder="Message" required data-validation-required-message="SVP Entrez votre commentaire."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        <div class="form-group">
          <input type="hidden" name="idPost" value="<?= $this->check($post->getId()) ?>" />
          <button type="submit" name="submit" value="send" class="btn btn-primary">Envoyer</button>
          <button type="reset" class="btn btn-danger">Effacer</button>
          <a href="../logoutUser"><button type="button" class="btn btn-success">Déconnexion</button></a>
        </div>
      </form>
      <br>

<?php } else {
  echo'<p class="title_center">
  <a href="../loginUser"><button type="button" class="btn btn-success">Connectez vous pour commenter</button></a>
</p>';
} ?>


      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-10 mx-auto">
            <h2 class="title_center">Les commentaires</h2>
            <?php foreach ($comments as $comment) : ?>
            <p>
              <strong>
                <?=$this->check($comment->getPseudo())?>
              </strong> le
              <?=$this->check($comment->getCreationDate())?>
            </p>
            <p>
              <?=$this->check($comment->getContent())?>
            </p>
            <hr>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
