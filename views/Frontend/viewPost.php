<?php $this->_title = "Mon Blog - " . $this->clean($post['title']); ?>

<div class="container">
      <div class="alert alert-primary" role="alert">
        <div class="row">
          <div class="col-lg-12 col-md-10 mx-auto">
            <div class="post-preview">
            <h2 class="post-title">
            <?= $this->clean($post['title']) ?>
            </h2>
            <h3 class="post-subtitle">
            <?= $this->clean($post['subtitle']) ?>
            </h3>
            <p><?= $post['content'] ?></p>
            <p class="post-meta">
            <?php echo 'Article de '.$this->clean($post['author']).' le '.$this->clean($post['creation_date']).' -- Modifié le '.$this->clean($post['update_date']) ?>
            </p>
            <p><small><a href="index.php?action=listposts">Retour à la liste d'articles</a></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <h2 class="title_center">Commentaires</h2>
          <form method="post" action="index.php?action=comment">
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Votre pseudo</label>
                <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo" id="pseudo" required data-validation-required-message="SVP entrez votre pseudo.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Votre commentaire</label>
                <textarea rows="5" class="form-control" name="content" placeholder="Votre commentaire" id="comment" required data-validation-required-message="SVP entrez votre commentaire."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
            <input type="hidden" name="id" value="<?= $this->clean($post['id']) ?>" />
              <input type="submit" value="commenter" class="btn btn-primary" id="sendMessageButton">
              <input type="reset" value="Effacer" class="btn btn-danger" id="sendMessageButton">
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-10 mx-auto">
        <h2 class="title_center">Les commentaires</h2>
          <?php foreach($comments as $comment):?>
            <p>Pseudo : <?=$this->clean($comment['pseudo'])?></p>
            <p>Message : <?=$this->clean($comment['content'])?></p>
            <p>Date: <?=$this->clean($comment['creation_date'])?></p>
            <br>
            <hr>
            <?php endforeach; ?>
      </div>
    </div>
  </div>

