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
            <p><small><a href="index.php?url=All">Retour à la liste d'articles</a></small></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
   <div class="row">
     <div class="col-lg-12 col-md-10 mx-auto">
       <h2 class="title_center">Ecrire un commentaire</h2>
       <form action="" method="post">
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label for="pseudo">Auteur</label>
             <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo" id="pseudo" required data-validation-required-message="SVP Entrez votre pseudo.">
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label for="message">Commentaire</label>
             <textarea rows="5" class="form-control" name="content" placeholder="Message" id="message" required data-validation-required-message="SVP Entrez votre commentaire."></textarea>
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <br>
         <div class="form-group">
           <button type="submit" name="sendComment" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
           <button type="reset" class="btn btn-danger" id="sendMessageButton">Effacer</button>
         </div>
       </form>


<div class="container">
   <div class="row">
     <div class="col-lg-12 col-md-10 mx-auto">
       <h2 class="title_center">Les commentaire</h2>
       <?php foreach($comments as $comment) : ?>
          <p><strong><?=$comment->getPseudo() ?></strong> le <?= $comment->getCreation_date() ?></p>
            <p><?=$comment->getContent() ?></p>
            <hr>
            <?php endforeach ?>
        </div>
      </div>
</div>