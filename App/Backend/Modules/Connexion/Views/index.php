<h2 class="title_center">Connexion</h2>

<div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-10 mx-auto">
          <form action="" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Pseudo</label>
                <input type="text" name="login" class="form-control" placeholder="login" id="login" required data-validation-required-message="Entrez votre Pseudo">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Mot de passe</label>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" id="password" required data-validation-required-message="Entrez votre mot de passe">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" value="Connexion" class="btn btn-primary">Connexion</button>
              <button type="reset" class="btn btn-danger">Effacer</button>
            </div>
          </form>
        </div>
      </div>
</div>