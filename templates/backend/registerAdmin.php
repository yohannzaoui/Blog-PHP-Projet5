<?php $this->title = "Inscription" ?>

<div class="title_center">
  <h4>Inscription Administration</h4>
</div>


<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-10 mx-auto">
      <form action="/addAdmin" method="post">
        <div class="control-group">
          <label for="pseudo">Votre Pseudo</label>
          <input type="text" name="pseudo" class="form-control" <p class="help-block text-danger">
          </p>
        </div>
        <div class="control-group">
          <label for="pass">Votre mot de passe</label>
          <input type="password" name="pass" class="form-control" <p class="help-block text-danger">
          </p>
        </div>
        <div class="control-group">
          <label for="pass1">Confirmez votre mot de passe</label>
          <input type="password" name="pass1" class="form-control" <p class="help-block text-danger">
          </p>
        </div>
        <div class="control-group">
          <label for="email">Votre adresse Email</label>
          <input type="email" name="email" class="form-control" <p class="help-block text-danger">
          </p>
        </div>
        <br>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" value="" name="submit">S'inscrire</button>
          <button type="reset" class="btn btn-danger">Effacer</button>
        </div>
      </form>

      <p>Vous avez un compte ?
        <a href="/admin">Connectez vous !</a>
      </p>
