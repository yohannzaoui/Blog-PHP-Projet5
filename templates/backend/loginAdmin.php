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
      <form action="/admin" method="post">
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
          <button type="submit" name="submit" value="" class="btn btn-primary">Se connecter</button>
          <button type="reset" class="btn btn-danger">Effacer</button>
        </div>
      </form>
      <p>Pas de compte ?
        <a href="/registerAdmin">Inscrivez vous !</a>
      </p>
      <small><p>
        <a href="/resetAdmin">Mot de passe oublié ?</a>
    </p></small>
    </div>
  </div>
