<?php $this->title = "Les administrateurs" ?>

<?php if(isset($_SESSION['roleAdmin'], $_SESSION['pseudoAdmin']) && $_SESSION['roleAdmin'] == "admin"):?>

<?php if (isset($_SESSION['flash'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-10 mx-auto">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?=  $_SESSION['flash'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; unset($_SESSION['flash']); ?>

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
            <a href="index.php?route=deleteAdmin&id=<?=$user->getId()?>"><i class="fas fa-trash-alt"></i></a>
        </p>
      </div>
      <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</div>

<?php endif; ?>
