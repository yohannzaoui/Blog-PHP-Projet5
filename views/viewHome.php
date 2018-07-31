<?php $this->titre = "Mon Blog"; ?>

<?php require('about.php'); ?>


<div class="container">
  <h2 class="title_center">Articles récents</h2>
  <div class="alert alert-primary" role="alert">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
    <?php foreach ($billets as $billet) :?>
      <div class="post-preview">
      <a href="<?= "index.php?action=billet&id=" . $billet['id'] ?>">
          <h2 class="post-title">
          <p><?=$billet['title'] ?></p>
          </h2>
          <h3 class="post-subtitle">
          <?=$billet['subtitle']?>
          </h3>
        </a>
        <p class="post-meta">
          <?php echo "Ecrit par ".$billet['author']?>
          <?php echo "le ".$billet['creation_date'] ?></p>
      </div>
      <hr>
            <?php endforeach; ?>
    </div>
  </div>
</div>
</div>

<?php require('contactForm.php');
