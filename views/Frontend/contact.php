    <div class="container">
      <div class="row">

        <div class="col-lg-12 col-md-10 mx-auto">

          <h2 class="title_center">
            Contact
          </h2>
          <p>Voulez-vous entrer en contact? Remplissez le formulaire ci-dessous pour m'envoyer un message et je reviendrai vers vous dès que possible!</p>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Nom et Prénom</label>
                <input type="text" class="form-control" placeholder="Nom et Prénom" id="name" required data-validation-required-message="SVP entrez votre nom et prénom.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Adresse Email</label>
                <input type="email" class="form-control" placeholder="Adresse Email" id="email" required data-validation-required-message="SVP entrez votre adresse E-mail.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Numéro de téléphone</label>
                <input type="tel" class="form-control" placeholder="Numéro de téléphone" id="phone" required data-validation-required-message="SVP entrez votre numéro de téléphone.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="SVP entrez votre message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
              <button type="reset" class="btn btn-danger" id="sendMessageButton">Effacer</button>
            </div>
          </form>
        </div>
      </div>
    </div>
