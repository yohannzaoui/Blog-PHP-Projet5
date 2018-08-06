<div class="container">
   <div class="row">
     <div class="col-lg-12 col-md-10 mx-auto">
       <h2 class="title_center">Ajouter un article</h2>
       <form action="" method="post">
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label for="pseudo">Auteur</label>
             <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo" id="pseudo" required data-validation-required-message="SVP Entrez votre pseudo.">
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label for="title">Titre</label>
             <input type="text" class="form-control" name="title" placeholder="Titre" id="title" required data-validation-required-message="Entrez le titre">
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label for="subtitle">Sous titre</label>
             <input type="text" class="form-control" name="subtitle" placeholder="Titre" id="subtitle" required data-validation-required-message="Entrez le titre">
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <div class="control-group">
           <div class="form-group floating-label-form-group controls">
             <label for="message">Article</label>
             <textarea rows="5" class="form-control" name="content" placeholder="Message" id="message" required data-validation-required-message="SVP Entrez votre commentaire."></textarea>
             <p class="help-block text-danger"></p>
           </div>
         </div>
         <br>
         <div class="form-group">
           <button type="submit" name="Comment" class="btn btn-primary" id="sendMessageButton">Envoyer</button>
           <button type="reset" class="btn btn-danger" id="sendMessageButton">Effacer</button>
         </div>
       </form>
