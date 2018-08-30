<?php $this->title = "Inscription membre" ?>

<strong><h4 class="flash">
<?php if (isset($_SESSION['flash'])) {
    echo $_SESSION['flash'];
    unset($_SESSION['flash']);
} ?></h4></strong>


<div class="title_center">
  <h4>Inscription membre</h4>
</div>


<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-10 mx-auto">
      <form action="index.php?route=addUser" method="post">
        <div class="control-group">
          <label for="pseudo">Votre Pseudo</label>
          <input type="text" name="pseudo" class="form-control" value="<?php if (isset($pseudo)) {
                  echo $pseudo; } ?>" id="pseudo" <p class="help-block text-danger">
          </p>
        </div>
        <div class="control-group">
          <label for="pass">Votre mot de passe</label>
          <input type="password" name="pass" class="form-control" id="pass" <p class="help-block text-danger">
          </p>
        </div>
        <div class="control-group">
          <label for="pass1">Confirmez votre mot de passe</label>
          <input type="password" name="pass1" class="form-control" id="pass1" <p class="help-block text-danger">
          </p>
        </div>
        <div class="control-group">
          <label for="email">Votre adresse Email</label>
          <input type="email" name="email" class="form-control" id="" <p emailclass="help-block text-danger">
          </p>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" value="send" id="submit" name="submit">S'inscrire</button>
          <button type="reset" class="btn btn-danger" id="reset">Effacer</button>
        </div>
      </form>

      <p>Vous avez un compte ?
        <a href="index.php?route=loginUser">Connectez vous !</a>
      </p>
