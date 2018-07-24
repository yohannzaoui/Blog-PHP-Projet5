<?php

$this->_title="Le BLOG";

foreach($posts as $post) : ?>

<h2><?= $post->title() ?></h2>
<p><?= $post->content() ?></p>
<p><?= $post->author() ?></p>
<p><?= $post->creation_date() ?></p>



<?php endforeach ?>