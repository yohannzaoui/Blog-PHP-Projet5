<div class="container">
  <h2 class="titlecenter">Articles récents</h2>
  <div class="alert alert-primary" role="alert">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <?php foreach ($posts as $post): ?>
      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            <?=$post['title']?>
          </h2>
          <h3 class="post-subtitle">
            <?=$post['subtitle']?>
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#"><?=$post['author']?></a>
          <?=$post['creation_date_fr']?></p>
      </div>
      <hr>
      <?php endforeach; ?>
    </div>
  </div>
</div>
</div>
