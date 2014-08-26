<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php // echo CHtml::encode($this->pageTitle); ?></title>
        <meta charset="utf-8" />
        <title><?php // echo CHtml::encode($this->pageTitle); ?></title>
        <!--<meta content="width=device-width, initial-scale=1.0" name="viewport" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">

        <!-- CSS FILES -->


        <!-- Le styles -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
        <!--<link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">-->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/stylesheet.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/icon/font-awesome.css" rel="stylesheet">
        <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>-->

        <!-- Le fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.png">
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->

    <body class="blue-login" style>

        <div class="login-container opacity">
            <div class="login-header bordered">
                <h4>Iniciar Sesion</h4>
            </div>
            <?php echo $content ?>
        </div>
    </body>



    <!-- END BODY -->
</html>