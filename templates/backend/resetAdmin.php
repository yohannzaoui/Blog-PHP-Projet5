<?php $this->title = "récupération de compte" ?>

<div class="title_center">
  <h4>Récupération de compte</h4>
</div>
<br>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-10 mx-auto">
      <form action="/passAdmin" method="post">
        <div class="control-group">
          <label for="pseudo">Votre adresse Email</label>
          <input type="email" class="form-control" name="email">
          <p class="help-block text-danger"></p>
        </div>
        <br>
        <div class="form-group">
          <button type="submit" name="submit" value="send" class="btn btn-primary">Envoyer</button>
          <button type="reset" class="btn btn-danger">Effacer</button>
        </div>
      </form>
      <small><p class="title_center">
          <?php if(isset($_SERVER['HTTP_REFERER'])) : ?>
          <a href="<?=$_SERVER['HTTP_REFERER']?>"> <<<< RETOUR</a>
          <?php endif; ?>
      </p></small>
    </div>
  </div>
