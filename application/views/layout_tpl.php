<!DOCTYPE html>
<!--[if IE 8]> <html lang="ru" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="ru" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="ru"> <!--<![endif]-->
    <head>
        <!-- Meta -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?=$title?></title>
        <?php if ($description): ?> 
            <meta name="description" content="<?=$description?>">
        <?php endif ?>

        <!-- Web Fonts -->
        <link rel='stylesheet' type='text/css' href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;subset=cyrillic,latin'>

        <!-- CSS Global Compulsory -->
        <link rel="stylesheet" href="/media/plugins/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/media/css/style.css">
    </head>

    <body>
        <?= $content ?>

        <!-- JS Global Compulsory -->
        <script type="text/javascript" src="/media/plugins/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>