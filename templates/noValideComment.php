<?php $this->title = "Modération commentaire"; ?>

<?php require_once 'adminNav.php'; ?>

<div class="container">
  <h3 class="title_center">Modération commentaire</h3>
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <?php foreach ($comments as $comment) : ?>
      <div class="container">
        <?php echo '<p><b>Pseudo</b> : '.$comment->getPseudo().'<b> - Le</b> '.$comment->getCreation_date().'<br> <b>Commentaire</b> : '.$comment->getContent().'</p>'?>
        <a class="btn btn-primary" href="index.php?route=post&id=<?= $comment->getPostId() ?>">Voir l'article</a>
        <a class="btn btn-success" href="index.php?route=validateComment&id=<?=$comment->getId()?>">Valider</a>
        <a class="btn btn-danger" href="index.php?route=deleteComment&id=<?=$comment->getId()?>">Supprimer</a>
        </p>
        <hr>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>