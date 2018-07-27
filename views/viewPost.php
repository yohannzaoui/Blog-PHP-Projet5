<?php $this->_title = $post->getTitle(); ?>

<div class="container">
      <div class="alert alert-primary" role="alert">
        <div class="row">
          <div class="col-lg-12 col-md-10 mx-auto">
            <div class="post-preview">
            <h2 class="post-title">
            <?= $post->getTitle() ?>
            </h2>
            <h3 class="post-subtitle">
            <?= $post->getSubtitle() ?>
            </h3>
            <p><?= $post->getContent() ?></p>
            <p class="post-meta">
            <?php echo 'Article de '.$post->getAuthor().' le '.$post->getCreation_date().' -- Modifié le '.$post->getUpdate_date() ?>
            </p>
            <p><small><a href="index.php?url=ListPosts">Retour à la liste d'articles</a></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <h2 class="title_center">Commentaires</h2>
          <form method="post" action="" name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Votre pseudo</label>
                <input type="text" class="form-control" placeholder="Votre pseudo" id="pseudo" required data-validation-required-message="SVP entrez votre pseudo.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Votre commentaire</label>
                <textarea rows="5" class="form-control" placeholder="Votre commentaire" id="comment" required data-validation-required-message="SVP entrez votre commentaire."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
              <button type="reset" class="btn btn-danger" id="sendMessageButton">Effacer</button>
            </div>
          </form>
        </div>
      </div>
    </div>