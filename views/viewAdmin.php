<?php $this->titre = "Yohann Zaoui - Administration - Connexion"; ?>


      <div class="titleConnexion">
        <h3>ADMINISTRATION</h3>
        <h4>Connexion</h4>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-10 mx-auto">
            <form action="" method="post">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="pseudo">Votre Pseudo</label>
                  <input type="text" class="form-control" name="pseudo" id="pseudo" value="<?php if (isset($_COOKIE['pseudo'])) {
                    echo $_COOKIE['pseudo'];
                    }?>">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls">
                  <label for="password">Votre mot de passe</label>
                  <input type="password" class="form-control" name="password" id="password">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" name="formconnexion" class="btn btn-primary">Se connecter</button>
                <button type="reset" class="btn btn-danger">Effacer</button>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="" id="remember">
                <label class="form-check-label" for="remember">
                      Se souvenir de moi
                </label>
                </div>
            </form>
            <p>Pas de compte ? <a href="index.php?page=registration">Inscrivez vous !</a></p>
            <?php
         if (isset($error)) {
             echo '<font color="red">'.$error."</font>";
         }
         ?>
          </div>
        </div>
      </div>
