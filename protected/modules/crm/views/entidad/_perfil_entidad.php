<script>
    var empresas =<?php echo json_encode($points); ?>
</script>
<div class=" profile">
    <div class="span2">
        <div class="profile-photo">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/lock-thumb.jpg" alt="">
            <!--<a href="javascript:;" class="edit" title="Edit Photo">-->
                <!--<i class="icon-pencil"></i>-->
            <!--</a>-->
        </div>
        <a href="profile.html" class="profile-features active">
            <i class=" icon-user"></i>
            <p class="info">Perfil</p>
        </a>
        <a href="profile_activities.html" class="profile-features ">
            <i class=" icon-calendar"></i>
            <p class="info">Eventos</p>
        </a>
        <a href="profile_contact.html" class="profile-features ">
            <i class=" icon-phone"></i>
            <p class="info">Contactanos</p>
        </a>
        <a href="profile_contact.html" class="profile-features ">
            <i class=" icon-camera-retro"></i>
            <p class="info">Galeria</p>
        </a>
    </div>
    <div class="span10">
        <div class="profile-head">
            <div class="span4">
                <h1> <?php echo $model->nombre ?></h1>
            </div>

            <div class="span4">
                <ul class="social-link-pf">
                    <li><a href="#">
                            <i class="icon-facebook"></i>
                        </a></li>
                    <li><a href="#">
                            <i class="icon-twitter"></i>
                        </a></li>
                    <li><a href="#">
                            <i class="icon-linkedin"></i>
                        </a></li>
                </ul>
            </div>

            <div class="span4">
                <!--<a href="edit_profile.html" class="btn btn-edit btn-large pull-right mtop20"> Edit Profile </a>-->
            </div>
        </div>
        <div class="space15"></div>

        <div class="row-fluid">


            <div class="span8 bio">
                <?php $this->renderPartial('portletsPerfil/_entidad_foto', array('model' => $model)); ?>

                <h2>Informacion</h2>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Donec ut volutpat metus. Aliquam tortor lorem, fringilla tempor dignissim at, pretium et arcu. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                <div class="space15"></div>
                <p><label>Ocupacion </label>:<?php echo ($model->industria !== null) ? $model->industria : "Sin Especificacion" ?> </p>
                <p><label>Email </label>:<?php echo ($model->email !== null) ? $model->email : "Sin Especificacion" ?> </p>
                <p><label>Telf. </label>: <?php echo ($model->telefono !== null) ? $model->telefono : ($model->celular !== null) ? $model->celular : "Sin Especificacion."  ?> </p>
                <p><label>Website Url </label>: <a href="#"><?php echo ($model->website !== null) ? $model->website : "Sin Especificacion" ?></a></p>
                <div class="space15"></div>
                <hr>
                <div class="widget white-full">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Direccion</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>

                    </div>
                    <div class="widget-body">
                        <?php $this->renderPartial('portletsPerfil/_ubicacion', array('model' => $model)); ?>
                        <?php $this->renderPartial('portletsPerfil/_direccion', array('model' => $model)); ?>


                    </div>
                </div>
            </div>
            <div class="span4">

                <div class="profile-side-box red">
                    <h1>Recomendado</h1>
                    <div class="desk">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="text-center">
                                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar1.jpg" alt=""></a>
                                    <p><a href="#">Fill Martin</a></p>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="text-center">
                                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar2.jpg" alt=""></a>
                                    <p><a href="#">Scatel Filip</a></p>
                                </div>
                            </div>
                            <div class="span4">
                                <div class="text-center">
                                    <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/avatar3.jpg" alt=""></a>
                                    <p><a href="#">Paul Robin</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="profile-side-box">
                    <h1>Eventos</h1>
                    <div class="desk">
                        <div class="row-fluid experience">
                            <h4>Envento 1</h4>
                            <p>Duration: 4 years as Senior Designer from June 2033 to June 2007</p>
                        </div>
                        <div class="space10"></div>
                        <div class="row-fluid experience">
                            <h4>Evento 2</h4>
                            <p>Duration: 4 years as Senior Designer from June 2033 to June 2007</p>
                        </div>
                        <div class="space10"></div>
                        <div class="row-fluid experience">
                            <h4>Evento 3</h4>
                            <p>Duration: 4 years as Senior Designer from June 2033 to June 2007</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
