<?php $this->title = "Les membres" ?>

<?php require_once 'adminNav.php'; ?>

<h3 class="title_center">Membres</h3>
<br>
<h4 class="title_center">Nombre de membres :
  <?=$line?>
</h4>
<br>

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
    <?php foreach ($users as $user) :?>
      <div class="post-preview">
          <h4 class="post-title">Pseudo : <?= htmlspecialchars($user->getPseudo()) ?></h4>
          <p>Membre depuis le : <?= $user->getCreation_date() ?></p>
        <p><a class="btn btn-danger" href="index.php?route=deleteUser&id=<?=$user->getId()?>">Supprimer</a></p>
      </div>
      <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div> 
</div>