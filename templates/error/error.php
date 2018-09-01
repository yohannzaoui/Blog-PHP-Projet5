<?php $this->title = 'Erreur'; ?>

<div class="container">
    <div class="alert alert-warning" role="alert">
        <div class="title_center">
            <h4>
                <?=$error?>
            </h4>
            <strong>
                <p>
                    <?php if(isset($_SERVER['HTTP_REFERER'])) : ?>
                    <a href="<?=$_SERVER['HTTP_REFERER']?>"> <<<< RETOUR</a>
                    <?php endif; ?>
                </p>
            <strong>
        </div>
    </div>
</div>
