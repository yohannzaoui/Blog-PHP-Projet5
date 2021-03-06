<?php $this->title = "Modifier article"?>

<?php if (isset($_SESSION['roleAdmin'], $_SESSION['pseudoAdmin']) && $_SESSION['roleAdmin'] == "admin") {?>

<?php if (isset($_SESSION['flash'])): ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-10 mx-auto">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?=$_SESSION['flash']?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif;unset($_SESSION['flash']);?>

<?php require_once 'adminNav.php';?>

<h4 class="title_center">Modifier/Supprimer un article</h4>
<br>
<div class="title_center">
  <button type="button" class="btn btn-primary">
    Nombre d'article sur le blog :
    <span class="badge badge-light">
      <?=$line?>
    </span>
  </button>
</div>
<br>

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <?php foreach ($posts as $post): ?>
      <div class="post-preview">
        <h4 class="post-title">
          <?=$this->check($post->getTitle())?>
        </h4>
        <h5 class="post-subtitle">
          <?=$this->check($post->getSubtitle())?>
        </h5>
        <p class="post-meta">
          <?php echo "Auteur : " . $this->check($post->getAuthor()) ?>
          <?php echo " - Date : " . $this->check($post->getCreationDate()) ?>
          <?php if ($post->getUpdateDate() != null) {echo " -- Modifié le " . $this->check($post->getUpdateDate());}?>
        </p>
        <p>
          <a href="/post/<?=$this->check($post->getId())?>"><i class="fas fa-eye"></i></a> |
          <a href="/editPost/<?=$this->check($post->getId())?>"><i class="fas fa-edit"></i></a> |
          <a href="/deleteComments/<?=$this->check($post->getId())?>"><i class="fas fa-comment-slash"></i></a> |
          <a href="/deletePost/<?=$this->check($post->getId())?>"><i class="fas fa-trash-alt"></i></a>
        </p>
      </div>
      <hr>
      <?php endforeach;?>
    </div>
  </div>
</div>
</div>

<?php } else {
	echo '<p class="title_center">
    <a href="../admin"><button type="button" class="btn btn-success">Se connecter</button></a>
</p>';
}?>
