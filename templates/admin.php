<?php $this->title = "Administration"; ?>

<strong><h4 class="flash">
<?php if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
} ?></h4></strong>

<div class="title_center">
  <h4>Connexion Administration</h4>
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <form action="index.php?route=adminConnexion" method="post">
        <div class="control-group">
          <label for="pseudo">Votre Pseudo</label>
          <input type="text" class="form-control" name="pseudo" id="pseudo" value="">
          <p class="help-block text-danger"></p>
        </div>
        <div class="control-group">
          <label for="pass">Votre mot de passe</label>
          <input type="password" class="form-control" name="pass" id="pass">
          <p class="help-block text-danger"></p>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" name="submit" value="send" class="btn btn-primary">Se connecter</button>
          <button type="reset" class="btn btn-danger">Effacer</button>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" value="" id="remember">
          <label class="form-check-label" for="remember">Se souvenir de moi</label>
        </div>
      </form>
      <p>Pas de compte ?
        <a href="index.php?route=registration">Inscrivez vous !</a>
      </p>
    </div>
  </div>
