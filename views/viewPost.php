<div class="container">
      <div class="alert alert-primary" role="alert">
        <div class="row">
          <div class="col-lg-12 col-md-10 mx-auto">
            <div class="post-preview">
            <h2 class="post-title">
            <?= $post->getTitle() ?>
            </h2>
            <h3 class="post-subtitle">
            <?= $post->getSubtitle() ?>
            </h3>
            <p><?= $post->getContent() ?></p>
            <p class="post-meta">
            <?php echo 'Article de '.$post->getAuthor().' le '.$post->getCreation_date().' -- Modifié le '.$post->getUpdate_date() ?>
            </p>
            <p><small><a href="listPost.php">Retour à la liste d'articles</a></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>