
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--><html lang="en"> <!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <link rel="shortcut icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="<?php echo Yii::app()->theme->baseUrl; ?>/images/favicon.ico" type="image/x-icon">

        <!-- CSS FILES -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/front_end/css/fonts/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/front_end/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/front_end//css/style-responsive.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/front_end/css/jquery.selectBox.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/front_end/css/kanban.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/front_end/css/custom-fixes.css" />
        <!--<link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->theme->baseUrl;             ?>/css/bootstrap-modal.css" />-->
        <!--<link rel="stylesheet" type="text/css" href="<?php // echo Yii::app()->theme->baseUrl;                        ?>/css/reports.css" />-->

        <script>
            var baseUrl = "<?php print Yii::app()->baseUrl . '/'; ?>";
            var themeUrl = "<?php print Yii::app()->theme->baseUrl . '/'; ?>";
            var user_id = "<?php print Yii::app()->user->id; ?>";
        </script>
    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class="fixed-top ">

        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!--BEGIN SIDEBAR TOGGLE-->
                    <!--                    <div class="sidebar-toggle-box hidden-phone">
                                            <div class="icon-reorder"></div>
                                        </div>-->
                    <!--END SIDEBAR TOGGLE-->
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="<?php echo Yii::app()->homeUrl ?>">
                        <!--<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo.png" alt="Rio Mira" />-->
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>

                    <div class="top-nav">
                        <?php
                        $owner_id = Yii::app()->user->id;
                        $rolname = Util::getFirstRolUser($owner_id);
                        $mostrarAdminRoles = Cruge_Constants::getMenuAdministracionCuentas($rolname);
                        $mostrarAdminClientes = Cruge_Constants::getMenuAdministracionClientes($rolname);
                        ?>
                        <ul class="nav pull-right top-menu notify-row">
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle link-current-user" data-toggle="dropdown">
                                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/demo/avatar1_small.jpg" alt="">
                                    <span class="username"><?php echo Yii::app()->user->name ? Yii::app()->user->name : "Guest" ?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <?php if (!Yii::app()->user->isGuest): ?>

                                        <li><?php echo CHtml::link('<i class="icon-user"></i>&nbsp;&nbsp;Mi Cuenta', array('/cruge/ui/editprofile')) ?></a></li>
                                        <?php if (Yii::app()->user->checkAccess('admin')): ?>
                                            <li><?php echo CHtml::link('<i class="icon-cog"></i>&nbsp;&nbsp;Administración', Yii::app()->user->ui->userManagementAdminUrl) ?></li>
                                        <?php endif; ?>
                                        <?php if ($mostrarAdminRoles): ?>
                                            <li><?php echo CHtml::link('<i class="icon-cog"></i>&nbsp;&nbsp;Administración', Yii::app()->user->ui->UserManagementAdminRolesUrl) ?></li>
                                        <?php endif; ?>
                                        <?php if ($mostrarAdminClientes): ?>
                                            <li><?php echo CHtml::link('<i class="icon-tasks"></i>&nbsp;&nbsp;Clientes', array('/crm/entidad/admin')) ?></li>
                                        <?php endif; ?>
                                        <li><?php echo CHtml::link('<i class="icon-key"></i>&nbsp;&nbsp;Cerrar Sesión', Yii::app()->user->ui->logoutUrl) ?></a></li>
                                    <?php else: ?>
                                        <li><?php echo CHtml::link('<i class="icon-key"></i>&nbsp;&nbsp;Iniciar Sesión', Yii::app()->user->ui->loginUrl) ?></a></li>
                                    <?php endif; ?>

                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->


        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->

            <!-- END SIDEBAR -->

            <!-- BEGIN PAGE -->  
            <div id="inicio"  >
                <!-- BEGIN PAGE CONTAINER-->
                <div class="container-fluid " >
                    <!-- BEGIN PAGE HEADER-->
                    <!-- FLASH MESSAGES -->
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
                    <!-- END PAGE HEADER-->

                    <!-- BEGIN PAGE CONTENT-->
                    <div  id ="contenido" class="row-fluid">
                        <?php echo $content ?>
                    </div>
                    <!-- END PAGE CONTENT-->    
                    <?php ?>
                </div>
                <!-- END PAGE CONTAINER-->
            </div>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->

        <!-- MAIN MODAL -->
        <div class="row-fluid">
            <?php
// El modal de la página
            $this->beginWidget('bootstrap.widgets.TbModal', array('id' => 'mainModal', 'options' => array('backdrop' => 'static')));
            $this->endWidget();
//            
            ?>
            <!--// El modal-full width de la página-->
            <!--            <div id="responsive" class="modal hide fade" tabindex="-1" data-width="80%"></div>
                        <div id="long" class="modal hide fade" tabindex="-1"></div>-->
        </div>

        <!-- END MAIN MODAL -->

        <!-- BEGIN FOOTER -->
        <div id="footer">
            <?php echo date('Y') ?> &copy; MeetClic
        </div>
        <!-- END FOOTER -->

        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.selectBox.js" type="text/javascript"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mask.min.js" type="text/javascript"></script>
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;             ?>/js/bootstrap-modal.js" type="text/javascript"></script>-->
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;              ?>/js/bootstrap-modalmanager.js" type="text/javascript"></script>-->
        <!--scroll infinito-->
        <!--<script src="<?php // echo Yii::app()->theme->baseUrl;                        ?>/js/jquery-ias.min.js" type="text/javascript"></script>--> 

        <!--//        common script for all pages-->
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/common-scripts.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.validateAjax.js"></script>
        <script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/googlemaps.js"></script>

        <!--Asignadas--> 
        <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
        <!--<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>-->
        <!-- END JAVASCRIPTS -->   

    </body>
    <!-- END BODY -->
</html>