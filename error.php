<?php $title = 'Yohann Zaoui - Le Blog - Erreur'; ?>

<?php ob_start() ?>
<p>Une erreur est survenue : <?= $msgError ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
