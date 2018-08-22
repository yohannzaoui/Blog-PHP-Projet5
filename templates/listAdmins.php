<?php $this->title = "Administrateurs" ?>

<?php require_once 'adminNav.php'; ?>

<div class="container">
  <h3 class="title_center">Administrateurs</h3>
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
    <?php foreach ($users as $user) :?>
      <div class="post-preview">
          <h4 class="post-title"><?= htmlspecialchars($user->getPseudo()) ?></h4>
        <p><a class="btn btn-danger" href="index.php?route=deleteAdmin&id=<?=$user->getId()?>">Supprimer l'administrateur</a></p>
      </div>
      <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div> 
</div>