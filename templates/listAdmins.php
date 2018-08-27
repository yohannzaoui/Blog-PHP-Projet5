<?php $this->title = "Les administrateurs" ?>

<?php if(isset($_SESSION['role'], $_SESSION['pseudo']) && $_SESSION['role'] == "admin") { ?>

<?php require_once 'adminNav.php'; ?>

<h4 class="title_center">Administrateurs</h4>
<br>
<div class="title_center">
  <button type="button" class="btn btn-primary">
    Nombre d'administrateurs :
    <span class="badge badge-light">
      <?=$line?>
    </span>
  </button>
</div>
<br>

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <?php foreach ($users as $user) :?>
      <div class="post-preview">
        <h4 class="post-title">Pseudo :
          <?= htmlspecialchars($user->getPseudo()) ?>
        </h4>
        <p>Administrateur depuis le :
          <?= $user->getCreation_date() ?>
            <a class="btn btn-danger" href="index.php?route=deleteAdmin&id=<?=$user->getId()?>">Supprimer</a>
        </p>
      </div>
      <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</div>

<?php } ?>
