<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Flatpoint - Responsive Web App Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Le styles -->
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/stylesheet.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->theme->baseUrl; ?>/icon/font-awesome.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <!-- Le fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/img/favicon.png">
    </head>
    <body>
        <!--Header begin-->
        <header class="dark_grey"> 
            <a href="#" class="logo_image"><span class="hidden-480">MEETCLIC</span></a>
            <ul class="header_actions pull-left hidden-480 hidden-768">
                <li rel="tooltip" data-placement="bottom" title="Hide/Show main navigation" ><a href="#" class="hide_navigation"><i class="icon-chevron-left"></i></a></li>
            </ul>
            <ul class="header_actions">

                <li class="dropdown">
                    <a href="#">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar-mini.png" alt="User image" class="avatar">
                        <span class="username"><?php echo Yii::app()->user->name ? Yii::app()->user->name : "Welcome" ?></span><i class="icon-angle-down"></i>
                    </a>
                    <ul>
                        <?php if (!Yii::app()->user->isGuest): ?>
                            <li><?php echo CHtml::link('<i class="icon-user"></i>&nbsp;&nbsp;Mi Cuenta', array('/cruge/ui/editprofile')) ?></a></li>
                            <?php if (Yii::app()->user->checkAccess('admin')): ?>
                                <li><?php echo CHtml::link('<i class="icon-cog"></i>&nbsp;&nbsp;Administración', Yii::app()->user->ui->userManagementAdminUrl) ?></li>
                            <?php endif; ?>
                            <li><?php echo CHtml::link('<i class="icon-key"></i>&nbsp;&nbsp;Cerrar Sesión', Yii::app()->user->ui->logoutUrl) ?></a></li>
                        <?php else: ?>
                            <li><?php echo CHtml::link('<i class="icon-key"></i>&nbsp;&nbsp;Iniciar Sesión', Yii::app()->user->ui->loginUrl) ?></a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <li class="responsive_menu">
                    <a class="iconic" href="#"><i class="icon-reorder"></i></a>
                </li>
            </ul>
        </header>
        <!--Header end-->

        <!--Navigator begin-->
        <div id="main_navigation" class="dark_navigation"> 
            <div class="inner_navigation">
                <ul class="main">
                    <li class="active navAct"><a class="expand" id="current" href="dashboard.html"><i class="icon-home"></i> Dashboard</a>
                        <ul class="sub_main">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="dashboard_2.html">Dashboard multimedia</a></li>
                        </ul>
                    </li>

                    <li><a href="#"><i class="icon-warning-sign"></i> Error pages</a>
                        <ul class="sub_main">
                            <li><a href="error_404.html">404</a></li>
                            <li><a href="error_405.html">405</a></li>
                            <li><a href="error_406.html">406</a></li>
                            <li><a href="error_406.html">500</a></li>
                            <li><a href="error_406.html">502</a></li>
                        </ul>
                    </li>


                </ul>
            </div>
        </div>  
        <!--Navigator end-->

        <div id="content" style="padding-top: 45px;"> <!-- Content start -->
            <div class="inner_content">
                <div class="container-fluid">
                    <div class="row-fluid">
                        <div id="maiMessages" class="flash-messages">
                            <?php
                            $messages = Yii::app()->user->getFlashes();
                            if ($messages) {
                                foreach ($messages as $key => $message) {
                                    echo '<div class="alert alert-' . $key . '">'
                                    . '<button data-dismiss="alert" class="close" type="button">×</button>'
                                    . $message . "</div>\n";
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="widgets_area row-fluid">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>


        <!-- Le javascript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.10.2.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-ui-1.10.3.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.collapsible.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mCustomScrollbar.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mousewheel.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.uniform.min.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.autosize-min.js"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/footable.js"></script>

        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/flatpoint_core.js"></script>

        <script>

            jQuery(document).ready(function($) {
                $('.responsive_table_container').mCustomScrollbar({
                    set_height: 400,
                    advanced: {
                        updateOnContentResize: true,
                        updateOnBrowserResize: true
                    }
                });

                $('.responsive_table_container_2').mCustomScrollbar({
                    set_height: 520,
                    advanced: {
                        updateOnContentResize: true,
                        updateOnBrowserResize: true
                    }
                });

                /*  $('.inner_sidebar').easytabs({
                 animationSpeed: 300,
                 collapsible: false,
                 updateHash: false
                 });*/
            });
        </script>
    </body>
</html>
