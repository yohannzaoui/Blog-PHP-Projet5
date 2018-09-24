<?php $this->title = "Modération commentaire"; ?>

<?php if (isset($_SESSION['roleAdmin'], $_SESSION['pseudoAdmin']) && $_SESSION['roleAdmin'] == "admin") { ?>

<?php if (isset($_SESSION['flash'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10 mx-auto">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['flash'] ?>
                    <button type="button" class="close"             data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; unset($_SESSION['flash']); ?>

<?php require_once 'adminNav.php'; ?>

<h4 class="title_center">Modération commentaire</h4>
<br>
<div class="title_center">
  <button type="button" class="btn btn-primary">
    Nombre de commentaires à moderer :
    <span class="badge badge-light">
      <?=$line?>
    </span>
  </button>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <?php foreach ($comments as $comment) : ?>
      <div class="container">
        <?php echo '<p><b>Pseudo</b> : '.$this->check($comment->getPseudo()).'<b> - Le</b> '.$this->check($comment->getCreationDate()).'<br> <b>Commentaire</b> : '.$this->check($comment->getContent()).'</p>'?>
        <a href="/post/<?= $this->check($comment->getPostId()) ?>"><i class="fas fa-eye"></i></a> |
        <a  href="/validateComment/<?= $this->check($comment->getId()) ?>"><i class="fas fa-check"></i></a> |
        <a  href="/deleteComment/<?= $this->check($comment->getId()) ?>"><i class="fas fa-trash-alt"></i></a>
        </p>
        <hr>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php } else {
    echo'<p class="title_center">
    <a href="../admin"><button type="button" class="btn btn-success">Se connecter</button></a>
</p>';
} ?>
