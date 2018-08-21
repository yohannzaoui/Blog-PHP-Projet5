<?php $this->title = "Ajouter un article"; ?>

<?php require_once 'adminNav.php'; ?>
<div class="container">
    <h3 class="title_center">Ajouter article</h3>
    <div class="row">
        <div class="col-lg-6 col-md-10 mx-auto">
            <form method="post" action="../public/index.php?route=savePost">
                <div class="control-group">
                    <label for="author">Auteur</label>
                    <input type="text" class="form-control" placeholder="" id="author" name="author" value="<?php
            if(isset($post['author'])){
                echo $post['author'];}
        ?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="title">Titre</label>
                    <input type="text" class="form-control" placeholder="" id="title" name="title" value="<?php
            if(isset($post['title'])){
                echo $post['title'];}
        ?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for subtitle>Sous titre</label>
                    <input type="text" class="form-control" placeholder="" id="subtitle" name="subtitle" value="<?php
            if(isset($post['subtitle'])){
                echo $post['subtitle'];}
        ?>">
                    <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                    <label for="content">Contenu de l'article</label>
                    <textarea rows="5" class="form-control" placeholder="" id="content" name="content">
                        <?php if(isset($post['content'])){ echo $post['content']; } ?>
                    </textarea>
                    <p class="help-block text-danger"></p>
                </div>
                <br>
                <div id="success"></div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary" id="submit">Ajouter</button>
                    <button type="reset" class="btn btn-danger" id="sendMessageButton">Effacer</button>
                </div>
            </form>