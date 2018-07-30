<div class="container">
<h2 class="title_center">Ajouter un commentaire</h2>
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <form action="" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Auteur</label>
                <input type="text" class="form-control" name="auteur" placeholder="Auteur" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Contenu</label>
                <textarea rows="5" class="form-control" name="contenu" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" value="commenter" class="btn btn-primary" id="sendMessageButton">Commenter</button>
              <button type="reset" class="btn btn-danger" id="sendMessageButton">Effacer</button>
            </div>
          </form>
        </div>
      </div>
</div>