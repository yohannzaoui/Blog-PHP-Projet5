<?php $this->title = "Yohann Zaoui Blog"; ?>

<div class="container">
<h2 class="title_center">A propos</h2>
<div class="alert alert-dark" role="alert">
<div class="row">
  <div class="col-lg-12 col-md-10 mx-auto">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut consequuntur magnam, excepturi aliquid ex itaque esse est vero natus quae optio aperiam soluta voluptatibus corporis atque iste neque sit tempora!</p>
  </div>
</div>
</div>
</div>


<div class="container">
  <h2 class="title_center">Articles récents</h2>
  <div class="alert alert-primary" role="alert">
  <div class="row">
    <div class="col-lg-12 col-md-10 mx-auto">
    <?php foreach ($posts as $post) :?>
      <div class="post-preview">
      <a href="<?= "Post/index/" . $this->check($post->getId()) ?>">
          <h2 class="post-title">
          <p><?=$this->check($post->getTitle()) ?></p>
          </h2>
          <h3 class="post-subtitle">
          <?=$this->check($post->getSubtitle())?>
          </h3>
        </a>
        <p class="post-meta">
          <?php echo "Ecrit par ".$this->check($post->getAuthor())?>
          <?php echo "le ".$this->check($post->getCreation_date())?></p>
      </div>
      <hr>
            <?php endforeach; ?>
    </div>
  </div>
</div>
</div>

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
