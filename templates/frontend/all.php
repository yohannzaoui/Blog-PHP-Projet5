<?php $this->title = "Mon Blog - Les articles" ?>

<div class="container">
  <h2 class="title_center">Les articles</h2>
  <div class="alert alert-primary" role="alert">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <?php foreach ($posts as $post) :?>
        <div class="post-preview">
          <a href="/post/<?= $this->check($post->getId());?>">
            <h2 class="post-title">
              <p>
                <?= $this->check($post->getTitle()) ?>
              </p>
            </h2>
            <h3 class="post-subtitle">
              <?= $this->check($post->getSubtitle()) ?>
            </h3>
          </a>
          <p class="post-meta">
            <?php echo 'Ecrit par '.$this->check($post->getAuthor()).' le '.$this->check($post->getCreationDate()); if ($post->getUpdateDate() != NULL) {echo " -- Modifié le ". $this->check($post->getUpdateDate());} ?>
          </p>
        </div>
        <hr>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>
