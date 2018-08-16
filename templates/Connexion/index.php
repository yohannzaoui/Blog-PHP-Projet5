<?php $this->title = "Mon Blog - Connexion" ?>


<div class="container">
   <div class="row">
     <div class="col-lg-6 col-md-10 mx-auto">
       <h2 class="title_center">Connexion</h2>
       <form action="connexion/connecter" method="post">
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label for="pseudo">Pseudo</label>
             <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo" id="pseudo" required data-validation-required-message="SVP Entrez votre pseudo.">
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label for="pass">Mot de passe</label>
             <input type="password" class="form-control" name="pass" placeholder="Votre mot de passe" id="password" required data-validation-required-message="SVP Entrez votre mot de passe.">
             <p class="help-block text-danger"></p>
           </div>
         </div>

         <br>
         <div class="form-group">
           <button type="submit" name="login" value="" class="btn btn-primary" id="sendMessageButton">Connexion</button>
           <button type="reset" class="btn btn-danger" id="sendMessageButton">Effacer</button>
         </div>
       </form>

<?php if (isset($msgErreur)): ?>
    <p><?= $msgErreur ?></p>
<?php endif; ?>
