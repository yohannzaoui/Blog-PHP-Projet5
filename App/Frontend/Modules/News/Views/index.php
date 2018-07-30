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
    <?php foreach ($listeNews as $news) :?>
      <div class="post-preview">
        <a href="news-<?= $news['id'] ?>.html">
          <h2 class="post-title">
            <?=$news['titre']?>
          </h2>
          <h3 class="post-subtitle">
            <?=$news['soustitre']?>
          </h3>
        </a>
        <p class="post-meta">
          <?php echo "Ecrit par ".$news['auteur']?>
          <a href="#"></a>
          <?php echo "le " .$news['dateAjout']->format('d/m/Y à H\hi')?></p>
      </div>
      <hr>
      <?php endforeach ?>
    </div>
  </div>
</div>
</div>



<div class="container">
<h2 class="title_center">Contact</h2>
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
          <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
          <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
          <!-- To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Name</label>
                <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Email Address</label>
                <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group col-xs-12 floating-label-form-group controls">
                <label>Phone Number</label>
                <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls">
                <label>Message</label>
                <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
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

