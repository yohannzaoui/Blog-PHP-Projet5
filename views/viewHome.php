<?php

$this->_title="Le BLOG";

require('about.php');

foreach($posts as $post) : ?>

<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <div class="post-preview">
            <a href="posts.php?id="<?=$post->id()?>">
              <h2 class="post-title">
              <?= $post->title() ?>
              </h2>
              <h3 class="post-subtitle">
              <p><?= $post->content() ?>
              </h3>
            </a>
            <p class="post-meta">Ecrit par le 
              <a href=""><?= $post->author() ?></a>
              <?= $post->creation_date() ?></p>
          </div>
          <hr>
        </div>
      </div>
    </div>


<?php endforeach ?>

