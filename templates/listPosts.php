<?php $this->title = "Modifier article" ?>

<?php require_once 'adminNav.php'; ?>

<h3 class="title_center">Modifier articles</h3>
<br>
<h4 class="title_center">Nombre d'article sur le blog :
  <?=$line?>
</h4>
<br>

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <?php foreach ($posts as $post) :?>
      <div class="post-preview">
        <h4 class="post-title">
          <?= htmlspecialchars($post->getTitle()) ?>
        </h4>
        <h5 class="post-subtitle">
          <?= htmlspecialchars($post->getSubtitle())?>
        </h5>
        <p class="post-meta">
          <?php echo "Auteur : ".htmlspecialchars($post->getAuthor())?>
          <?php echo " - Date : ".htmlspecialchars($post->getCreation_date())?>
        </p>
        <p>
          <a class="btn btn-primary" href="index.php?route=post&id=<?=$post->getId()?>">Voir</a>
          <a class="btn btn-success" href="index.php?route=editPost&id=<?=$post->getId()?>">Modifier</a>
          <a class="btn btn-secondary" href="index.php?route=deletePost&id=<?=$post->getId()?>">Supprimer l'article</a>
          <a class="btn btn-danger" href="index.php?route=deleteAll&id=<?=$post->getId()?>">Supprimer article et commentaires</a>
        </p>
      </div>
      <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</div>