<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="public/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="public/bootstrap/css/bootstrap.css" />
    <link href="public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    
    <?php require('navbar.php'); ?>
    <?php require('header.php'); ?>

    
    <?= $content ?>

    <?php require('footer.php'); ?>


    <!-- Bootstrap core JavaScript -->
    <script src="public/jquery/jquery.min.js"></script>
    <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="public/js/jqBootstrapValidation.js"></script>
    <script src="public/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="public/js/clean-blog.min.js"></script>
</body>
</html>