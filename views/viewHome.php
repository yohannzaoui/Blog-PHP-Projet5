<?php

$this->_title = "Yohann Zaoui - le Blog";

foreach($posts as $post): ?>

<p><?= $post->getId() ?></p>
<p><?= $post->getAuthor() ?></p>
<p><?= $post->getTitle() ?></p>
<p><?= $post->getSubtitle() ?></p>
<p><?= $post->getContent() ?></p>
<p><?= $post->getCreation_date() ?></p>
<p><?= $post->getUpdate_date() ?></p>

<?php endforeach; ?>