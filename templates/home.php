<?php $this->title = "Yohann Zaoui Blog"; ?>

<?php require_once 'about.php'; ?>

<div class="container">
  <h2 class="title_center">Articles récents</h2>
  <div class="alert alert-primary" role="alert">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <?php foreach ($posts as $post) : ?>
        <div class="post-preview">
          <a href="../public/index.php?route=post&id=<?= htmlspecialchars($post->getId()); ?>">
            <h2 class="post-title">
              <p>
                <?= $post->getTitle() ?>
              </p>
            </h2>
            <h3 class="post-subtitle">
              <?= $post->getSubtitle() ?>
            </h3>
          </a>
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

<?php require_once 'form_contact.php'; ?>