<?php $this->_title = "Yohann Zaoui - Les Articles"; ?>

<div class="container">
  <h2 class="title_center">Les articles</h2>
  <div class="alert alert-primary" role="alert">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
    <?php foreach($posts as $post): ?>
      <div class="post-preview">
        <a href="post.php?id=<?=$post->getID()?>">
          <h2 class="post-title">
            <?=$post->getTitle();?>
          </h2>
          <h3 class="post-subtitle">
            <?=$post->getSubtitle();?>
          </h3>
        </a>
        <p class="post-meta">
          <?php echo "Ecrit par ".$post->getAuthor();?>
          <a href="#"></a>
          <?php echo "le " .$post->getCreation_date();?></p>
      </div>
      <hr>
            <?php endforeach; ?>
        </div>
    </div>
  </div>
</div>