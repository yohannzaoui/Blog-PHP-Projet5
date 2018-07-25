<div class="container">
<h3 class="title_center">Articles récents</h3>
</div>
<?php foreach($posts as $post) : ?>
<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="post-preview">
          
              <p><h2 class="post-title"><a href="Post?id=<?=htmlspecialchars($post->id())?>"><?= $post->title() ?></h2></p></a>
              <p><h3 class="post-subtitle"><?= $post->subtitle() ?></h3></p>
            <p class="post-meta">Ecrit par <?= $post->author() ?> le <?= $post->creation_date() ?></p>
          </div>
          <hr>
        </div>
      </div>
    </div>

<?php endforeach ?>