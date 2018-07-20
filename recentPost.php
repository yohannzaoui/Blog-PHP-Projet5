<div class="container">
  <h2 class="titlecenter">Articles récents</h2>
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <?php foreach($posts as $post):?>
      <div class="post-preview">
        <a href="post.html">
          <h2 class="post-title">
            <?=$post->getTitle()?>
          </h2>
          <h3 class="post-subtitle">
            <?=$post->getSubtitle()?>
          </h3>
        </a>
        <p class="post-meta">Ecrit par
          <a href="#"><?=$post->getAuthor()?></a>
          le <?=$post->getCreation_date()?></p>
      </div>
      <hr>
    <?php endforeach ?>
    </div>
  </div>
</div>
