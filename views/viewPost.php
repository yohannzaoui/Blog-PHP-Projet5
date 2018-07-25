 <div class="container">
      <div class="alert alert-primary" role="alert">
        <div class="row">
          <div class="col-lg-12 col-md-10 mx-auto">
            <div class="post-preview">
            <h2 class="post-title"><?= $post->title() ?></h2>
            <h3 class="post-subtitle"><?= $post->subtitle() ?></h3>
            <p><?= $post->content() ?></p>
            <p class="post-meta">
            <?php echo 'Article de '.$post->author().' le '.$post->creation_date().' -- Modifié le '.$post->update_date() ?>
            </p>
            <p><small><a href="listPost.php">Retour à la liste d'articles</a></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>