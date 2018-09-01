<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
      <p>Vous voulez entrer en contact? Remplissez le formulaire ci-dessous pour m'envoyer un message et je vous répondrai dès que possible!</p>
      <form action="index.php?route=sendMail" method="post">
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Nom et Prénom</label>
            <input type="text" name="name" class="form-control" placeholder="Nom et prénom" required data-validation-required-message="SVP entrez votre nom et prénom.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Adresse Email</label>
            <input type="email" name="email" class="form-control" placeholder="Adresse Email" required data-validation-required-message="SVP entrez votre adresse Email.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Message</label>
            <textarea rows="5" name="message" class="form-control" placeholder="Message" required data-validation-required-message="SVP entrez votre message."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        <div class="form-group">
          <button type="submit" name ="submit" value="send" class="btn btn-primary">Envoyer</button>
          <button type="reset" class="btn btn-danger">Effacer</button>
        </div>
      </form>
    </div>
  </div>
</div>
