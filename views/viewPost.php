<?php $this->_titre = "Mon Blog - " . $billet['title']; ?>

<div class="container">
      <div class="alert alert-primary" role="alert">
        <div class="row">
          <div class="col-lg-12 col-md-10 mx-auto">
            <div class="post-preview">
            <h2 class="post-title">
            <?= $billet['title'] ?>
            </h2>
            <h3 class="post-subtitle">
            <?= $billet['subtitle'] ?>
            </h3>
            <p><?= $billet['content'] ?></p>
            <p class="post-meta">
            <?php echo 'Article de '.$billet['author'].' le '.$billet['creation_date'].' -- Modifié le '.$billet['update_date'] ?>
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
          <form method="post" action="index.php?action=commenter">
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Votre pseudo</label>
                <input type="text" class="form-control" name="auteur" placeholder="Votre pseudo" id="pseudo" required data-validation-required-message="SVP entrez votre pseudo.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Votre commentaire</label>
                <textarea rows="5" class="form-control" name="contenu" placeholder="Votre commentaire" id="comment" required data-validation-required-message="SVP entrez votre commentaire."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
            <input type="hidden" name="id" value="<?= $billet['id'] ?>" />
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
          <?php foreach($commentaires as $commentaire):?>
            <p>Pseudo : <?=$commentaire['pseudo']?></p>
            <p>Message : <?=$commentaire['content']?></p>
            <p>Date: <?=$commentaire['creation_date']?></p>
            <br>
            <hr>
            <?php endforeach; ?>
      </div>
    </div>
  </div>

