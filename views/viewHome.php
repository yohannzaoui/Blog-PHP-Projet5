<?php

foreach($posts as $post) : ?>
<p><?=$post->getTitle() ?></p>
<p><?=$post->getSubtitle() ?></p>
<p><?=$post->getAuthor() ?></p>
<p><?=$post->getContent() ?></p>
<p><?=$post->getCreation_date() ?></p>
<?php endforeach ?>