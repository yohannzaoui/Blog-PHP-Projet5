<?php $this->title = "Nouveau mot de passe" ?>

<div class="title_center">
  <h4>Votre nouveau mot de passe</h4>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-10 mx-auto">
      <form action="index.php?route=changePassUser" method="post">
        <div class="control-group">
          <label for="pseudo">Votre nouveau mot de passe</label>
          <input type="password" class="form-control" name="pass1">
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label for="pseudo">Confirmez votre nouveau mot de passe</label>
          <input type="password" class="form-control" name="pass2">
          <p class="help-block text-danger"></p>
        </div>
        <br>
        <div class="form-group">
            <input type="hidden" name="id" value="<?= htmlspecialchars($_GET['id']) ?>"></input>
            <input type="hidden" name="token" value="<?= htmlspecialchars($_GET['token']) ?>"></input>
          <button type="submit" name="submit" value="send" class="btn btn-primary">Envoyer</button>
          <button type="reset" class="btn btn-danger">Effacer</button>
        </div>
      </form>
    </div>
  </div>
