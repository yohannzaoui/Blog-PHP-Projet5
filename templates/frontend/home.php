<?php $this->title = "Yohann Zaoui Blog"; ?>

<?php if (isset($_SESSION['flash'])) : ?>
<div class="container">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?=  $_SESSION['flash'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
</div>
<?php endif; unset($_SESSION['flash']); ?>

<?php require_once 'about.php'; ?>

<?php require_once 'recent_post.php'; ?>

<?php require_once 'contact.php'; ?>
