<?php $this->title = "Connexion membre" ?>

<div class="title_center">
  <h4>Connexion Membre</h4>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-6 col-md-10 mx-auto">
      <form action="" method="post">
        <div class="control-group">
          <label for="pseudo">Votre Pseudo</label>
          <input type="text" class="form-control" name="pseudo">
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label for="pass">Votre mot de passe</label>
          <input type="password" class="form-control" name="pass">
          <p class="help-block text-danger"></p>
        </div>
        <br>
        <div class="form-group">
          <button type="submit" name="submit" value="send" class="btn btn-primary">Se connecter</button>
          <button type="reset" class="btn btn-danger">Effacer</button>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember">
          <label class="form-check-label" for="remember">Se souvenir de moi</label>
        </div>
      </form>
      <p>Pas de compte ?
        <a href="/registerUser">Inscrivez vous !</a>
      </p>
      <small><p>
        <a href="/resetUser">Mot de passe oublié ?</a>
    </p></small>
    </div>
  </div>
