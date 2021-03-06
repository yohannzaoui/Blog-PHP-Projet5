<?php $this->title = "Les administrateurs" ?>

<?php if (isset($_SESSION['roleAdmin'], $_SESSION['pseudoAdmin']) && $_SESSION['roleAdmin'] == "admin") { ?>

<?php if (isset($_SESSION['flash'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10 mx-auto">
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
          <?= $this->check($user->getPseudo()) ?>
        </h4>
        <p>Administrateur depuis le :
          <?= $this->check($user->getCreationDate())?>
            <a href="/deleteAdmin/<?=$this->check($user->getId())?>"><i class="fas fa-trash-alt"></i></a>
        </p>
      </div>
      <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</div>

<?php } else {
    echo'<p class="title_center">
    <a href="../admin"><button type="button" class="btn btn-success">Se connecter</button></a>
</p>';
} ?>
