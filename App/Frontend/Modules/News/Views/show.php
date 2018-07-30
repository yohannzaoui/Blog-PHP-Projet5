<div class="container">
  <div class="alert alert-primary" role="alert">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <div class="post-preview">
          <h2 class="post-title">
            <?=$news['titre']?>
          </h2>
          <h3 class="post-subtitle">
            <?=$news['soustitre']?>
          </h3>
        </a>
        <p><?=$news['contenu']?></p>
        <p class="post-meta">
          <?php echo "Ecrit par ".$news['auteur']?>
          <a href="#"></a>
          <?php echo "le " .$news['dateAjout']->format('d/m/Y à H\hi')?></p>
      </div>
      <hr>
    </div>
  </div>
</div>
</div>


<div class="container">
  <div class="row">
  <div class="col-lg-12 col-md-10 mx-auto">

<p><a href="commenter-<?= $news['id'] ?>.html">Ajouter un commentaire</a></p>

<?php
if (empty($comments))
{
?>
<p>Aucun commentaire n'a encore été posté. Soyez le premier à en laisser un !</p>
<?php
}

foreach ($comments as $comment)
{
?>
<fieldset>
  <legend>
    Posté par <strong><?= htmlspecialchars($comment['auteur']) ?></strong> le <?= $comment['date']->format('d/m/Y à H\hi') ?>
    <?php if ($user->isAuthenticated()) { ?> -
      <a href="admin/comment-update-<?= $comment['id'] ?>.html">Modifier</a> |
      <a href="admin/comment-delete-<?= $comment['id'] ?>.html">Supprimer</a>
    <?php } ?>
  </legend>
  <p><?= nl2br(htmlspecialchars($comment['contenu'])) ?></p>
</fieldset>
<hr>
<?php
}
?>
</div>
</div>
</div>