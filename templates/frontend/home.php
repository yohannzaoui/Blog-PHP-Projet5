<?php $this->title = "Yohann Zaoui Blog"; ?>

<?php if (isset($_SESSION['flash'])) : ?>
<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?=  $_SESSION['flash'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php endif; unset($_SESSION['flash']); ?>

<?php require_once 'about.php'; ?>

<div class="container">
  <h2 class="title_center">Articles récents</h2>
  <div class="alert alert-primary" role="alert">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <?php foreach ($posts as $post) : ?>
        <div class="post-preview">
          <a href="../index.php?route=post&id=<?= htmlspecialchars($post->getId()); ?>">
            <h2 class="post-title">
                <?= $post->getTitle() ?>
            </h2>
            <h3 class="post-subtitle">
              <?= $post->getSubtitle() ?>
            </h3></a>

          <p class="post-meta">
            <?php echo "Ecrit par " . $post->getAuthor() ?>
            <?php echo "le " . $post->getCreation_date() ?>
          </p>
        </div>
        <hr>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?php require_once 'contact_form.php'; ?>
